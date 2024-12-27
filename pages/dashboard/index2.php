<?php
    require 'config/koneksi.php';
    $id_dokter = $_SESSION['id'];
    $id_poli = $_SESSION['id_poli'];

    $query_poli = "SELECT nama_poli FROM poli WHERE id = $id_poli";
    $result = mysqli_query($mysqli,$query_poli);

    if ($result) {
        // Ambil hasil query
        $row = mysqli_fetch_assoc($result);

        // Tampilkan nama poli
        $nama_poli = $row['nama_poli'];
    } else {
        // Handle error jika query gagal
        $nama_poli = "Tidak dapat mendapatkan nama poli";
    }
    // Pasien yang mendaftar
    $query_pendaftaran = "SELECT COUNT(*) AS jumlah_pendaftaran FROM daftar_poli dp JOIN jadwal_periksa jp ON dp.id_jadwal = jp.id WHERE jp.id_dokter = ? AND dp.status_periksa = '0'";
$stmt_pendaftaran = $mysqli->prepare($query_pendaftaran);
$stmt_pendaftaran->bind_param('i', $id_dokter);
$stmt_pendaftaran->execute();
$result_pendaftaran = $stmt_pendaftaran->get_result();
$jumlah_pendaftaran = $result_pendaftaran->fetch_assoc()['jumlah_pendaftaran'];

// Pasien yang sudah diberi obat
$query_diberi_obat = "SELECT COUNT(*) AS jumlah_diberi_obat FROM detail_periksa dp JOIN periksa p ON dp.id_periksa = p.id JOIN daftar_poli d ON p.id_daftar_poli = d.id JOIN jadwal_periksa jp ON d.id_jadwal = jp.id WHERE jp.id_dokter = ? AND d.status_periksa = '1'";
$stmt_diberi_obat = $mysqli->prepare($query_diberi_obat);
$stmt_diberi_obat->bind_param('i', $id_dokter);
$stmt_diberi_obat->execute();
$result_diberi_obat = $stmt_diberi_obat->get_result();
$jumlah_diberi_obat = $result_diberi_obat->fetch_assoc()['jumlah_diberi_obat'];

// Jumlah jadwal praktek
$query_jadwal_praktek = "SELECT COUNT(*) AS jumlah_jadwal_praktek FROM jadwal_periksa WHERE id_dokter = ? AND aktif = 'Y'";
$stmt_jadwal_praktek = $mysqli->prepare($query_jadwal_praktek);
$stmt_jadwal_praktek->bind_param('i', $id_dokter);
$stmt_jadwal_praktek->execute();
$result_jadwal_praktek = $stmt_jadwal_praktek->get_result();
$jumlah_jadwal_praktek = $result_jadwal_praktek->fetch_assoc()['jumlah_jadwal_praktek'];

$stmt_pendaftaran->close();
$stmt_diberi_obat->close();
$stmt_jadwal_praktek->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter Dashboard</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        /* Style umum untuk teks putih */
        .text-white {
            font-weight: 500;
            /* membuat teks sedikit lebih tebal */
        }

        /* Mengubah ukuran dan gaya font untuk judul dan konten yang berbeda */
        h1.text-white {
            font-size: 2.2rem;
            /* ukuran font yang lebih besar */
            font-family: 'Arial', sans-serif;
            /* ganti dengan font pilihan Anda */
        }

        h4.text-white {
            font-size: 1.6rem;
            font-family: 'Arial', sans-serif;
        }

        h5.text-white {
            font-size: 1.3rem;
            font-family: 'Arial', sans-serif;
        }

        /* Gaya khusus untuk teks pada info-box */
        .info-box-text {
            font-size: 1rem;
            /* menyesuaikan ukuran font */
            margin-bottom: 5px;
            /* memberikan sedikit ruang di bawah teks */
        }

        /* Gaya khusus untuk nomor pada info-box */
        .info-box-number {
            font-size: 1.2rem;
            /* menyesuaikan ukuran font */
            font-weight: bold;
            /* membuatnya tebal */
        }
        .card-custom {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card-custom:hover {
            transform: translateY(-10px);
        }

        .card-custom .card-body {
            text-align: center;
        }

        .card-custom .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-custom .card-text {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .card-custom .fa {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Content Header (Page header) -->
    <div class="content-header py-5 bg-primary text-white">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center">Selamat Datang <b>Dokter <?php echo $username ?></b></h1>
                    <h4 class="m-0 text-center">Anda berada di <?php echo $nama_poli; ?></h4>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content mt-5">
    <div class="container-fluid">

        <!-- Bagian baru untuk gambar dan running text -->
        <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <i class="fas fa-user-plus"></i>
                            
                            <h5 class="card-title">Pasien Mendaftar Periksa</h5>
                            <p class="card-text"><?php echo $jumlah_pendaftaran; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <i class="fas fa-pills"></i>
                            <h5 class="card-title">Pasien telah Diberi Obat</h5>
                            <p class="card-text"><?php echo $jumlah_diberi_obat; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="card card-custom">
                        <div class="card-body">
                            <i class="fas fa-calendar-alt"></i>
                            <h5 class="card-title">Jadwal Praktek</h5>
                            <p class="card-text"><?php echo $jumlah_jadwal_praktek; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Info boxes (existing content) -->
        <div class="row">
            <!-- ... isi tetap sama ... -->
        </div>
        <!-- /.row -->

        <!-- Custom Content Here (existing content) -->
        <div class="row">
            <!-- ... isi tetap sama ... -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

    <!-- Link to Bootstrap JS and other necessary scripts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


