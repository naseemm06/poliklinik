<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Query untuk melakukan update data obat
    $query = "DELETE FROM obat WHERE id = $id";

    if (mysqli_query($mysqli, $query)) {

        echo '<script>';
        echo 'alert("Data obat berhasil dihapus!");';
        echo 'window.location.href = "../../obat.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
