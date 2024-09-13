<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role !== 'User'){
        header("location:../login.php");
    }
    $userid = $_SESSION['userid'];
    
    // Ambil data pengguna untuk ditampilkan di form
    $cekdulu = mysqli_query($conn, "SELECT * FROM userdata WHERE userid='$userid'");
    $ambil = mysqli_fetch_array($cekdulu);
?>

<head>
    <!-- Include all necessary CSS and JS files -->
</head>

<body>
    <div class="page-container">
        <div class="main-content">
            <div class="main-content-inner">
                <!-- Form untuk mengedit data -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2>Edit Data</h2>
                                <form method="post" action="update_data.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input name="nik" type="text" class="form-control" maxlength="16" value="<?php echo $ambil['nik']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input name="namalengkap" type="text" class="form-control" maxlength="50" value="<?php echo $ambil['namalengkap']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" name="jeniskelamin">
                                                    <option value="L" <?php if ($ambil['jeniskelamin'] === 'L') echo 'selected'; ?>>Laki-laki</option>
                                                    <option value="P" <?php if ($ambil['jeniskelamin'] === 'P') echo 'selected'; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tambahkan input lain sesuai kebutuhan -->
                                    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include all necessary JS files -->
</body>
</html>
