<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/poliklinik-main/config/koneksi.php';
include $path;
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    echo '<script>alert("Anda harus login terlebih dahulu!");window.location.href = "login.php";</script>';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $plain_password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $hashed_password = md5($plain_password); // Enkripsi kata sandi
    $alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($mysqli, $_POST['no_hp']);
    $id_poli = mysqli_real_escape_string($mysqli, $_POST['id_poli']);

    // Query untuk memperbarui data dokter
    $query = "UPDATE dokter SET nama='$nama', password='$hashed_password', alamat='$alamat', no_hp='$no_hp' WHERE id='$id'";

    // Debugging: Menampilkan query yang dieksekusi (hapus atau komen ini setelah debugging selesai)
    // echo "Query: $query <br>";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        echo '<script>';
        echo 'alert("Data dokter berhasil diubah!");';
        echo 'window.location.href = "../../dokter_data.php";';
        echo '</script>';
        exit();
    } else {
        // Debugging: Menampilkan pesan kesalahan MySQL
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>
