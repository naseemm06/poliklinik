<?php
include("../../config/koneksi.php");

function deleteDokter($mysqli, $id)
{
    try {
        // Validate input
        if (!is_numeric($id)) {
            throw new Exception('Invalid ID format');
        }

        // Start transaction
        mysqli_begin_transaction($mysqli);

        // Check if doctor exists and if they have any related records
        $checkQuery = "SELECT COUNT(*) as count FROM jadwal_periksa WHERE id_dokter = ?";
        $stmt = mysqli_prepare($mysqli, $checkQuery);
        if (!$stmt) {
            throw new Exception('Failed to prepare check statement: ' . mysqli_error($mysqli));
        }

        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if ($row['count'] > 0) {
            throw new Exception('Cannot delete doctor. There are related medical schedules.');
        }

        // Prepare delete statement
        $deleteQuery = "DELETE FROM dokter WHERE id = ?";
        $stmt = mysqli_prepare($mysqli, $deleteQuery);

        if (!$stmt) {
            throw new Exception('Failed to prepare delete statement: ' . mysqli_error($mysqli));
        }

        // Bind parameters and execute
        mysqli_stmt_bind_param($stmt, 'i', $id);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Failed to delete doctor: ' . mysqli_stmt_error($stmt));
        }

        // Check if any rows were affected
        if (mysqli_affected_rows($mysqli) === 0) {
            throw new Exception('Doctor not found');
        }

        mysqli_stmt_close($stmt);

        // Commit transaction
        mysqli_commit($mysqli);

        return ['success' => true, 'message' => 'Data dokter berhasil dihapus!'];
    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($mysqli);
        return ['success' => false, 'message' => $e->getMessage()];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    if (!$id) {
        $response = ['success' => false, 'message' => 'ID is required'];
    } else {
        $response = deleteDokter($mysqli, $id);
    }

    // Return response
    if ($response['success']) {
        echo '<script>';
        echo 'alert("' . $response['message'] . '");';
        echo 'window.location.href = "../../dokter.php";';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("Error: ' . addslashes($response['message']) . '");';
        echo 'window.location.href = "../../dokter.php";';
        echo '</script>';
    }
}

// Close connection
mysqli_close($mysqli);
