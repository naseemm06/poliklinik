<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$path = $_SERVER['DOCUMENT_ROOT'] . '/poliklinik-main/config/koneksi.php';
require $path;

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    echo '<script>alert("Anda harus login terlebih dahulu!");window.location.href = "login.php";</script>';
    exit();
}

$id_dokter = $_SESSION['id'];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Dokter</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Data Dokter</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dokter</h3>
                        <div class="card-tools"></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokter</th>
                                    <th>Password</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>ID Poli</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = "SELECT * FROM dokter WHERE id='$id_dokter'";
                                $result = mysqli_query($mysqli, $query);

                                if ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo "••••••"; ?></td> <!-- Mask the password for security -->
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['no_hp']; ?></td>
                                    <td><?php echo $data['id_poli']; ?></td>
                                    <td>
                                        <button type='button' class='btn btn-sm btn-warning' data-toggle="modal" data-target="#editModal<?php echo $data['id']; ?>">Edit</button>
                                    </td>
                                </tr>
                                <!-- Modal Edit Data Dokter -->
                                <div class="modal fade" id="editModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Data Dokter</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form edit data dokter -->
                                                <form action="/poliklinik-main/pages/data_dokter/updateDokter.php" method="post">
                                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>" required>
                                                    <div class="form-group">
                                                        <label for="nama">Nama Dokter</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" value="" required> <!-- Make it a password field -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">No HP</label>
                                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_poli">ID Poli</label>
                                                        <input type="number" class="form-control" id="id_poli" name="id_poli" value="<?php echo $data['id_poli']; ?>" readonly>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <tr>
                                    <td colspan="7">Tidak ada data dokter yang ditemukan.</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
