<?php
session_start();
include 'dbconnect.php';

$alert = '';
$current_date = date("Y-m-d"); // tanggal saat ini
$open_registration = '2024-06-15'; // Tanggal mulai pendaftaran
$close_registration = '2024-09-15'; // Tanggal akhir pendaftaran

// Periksa periode pendaftaran
if ($current_date < $open_registration) {
    $alert = "<p style='color: red;'>Pendaftaran belum dibuka. Silakan kembali pada tanggal 15 Juni 2024.</p>";
    $registration_open = false;
} elseif ($current_date > $close_registration) {
    $alert = "<p style='color: red;'>Pendaftaran sudah ditutup. Pendaftaran hanya dibuka dari tanggal 15 Juni 2024 hingga 14 Juli 2024.</p>";
    $registration_open = false;
} else {
    $alert = "<p style='color: green;'></p>";
    $registration_open = true;
}

if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];

    if($role == 'Admin'){
        header("location:admin");
    } else {
        header("location:user");
    }
}

if(isset($_POST['btn-login']) && $registration_open) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Menyeleksi data user dengan username dan password yang sesuai
    $cariadmin = mysqli_query($conn, "select * from admin where adminemail='$email' and adminpassword='$password';");
    $cariuser = mysqli_query($conn, "select * from user where useremail='$email' and userpassword='$password';");

    // Menghitung jumlah data yang ditemukan
    $cekadmin = mysqli_num_rows($cariadmin);
    $cekuser = mysqli_num_rows($cariuser);

    // Cek apakah username dan password ditemukan pada database
    if($cekadmin > 0) {
        // Jika admin
        $data = mysqli_fetch_assoc($cariadmin);
        $_SESSION['email'] = $data['adminemail'];
        $_SESSION['role'] = "Admin";
        header("location:admin");
    } elseif($cekuser > 0) {
        // Jika user biasa
        $data = mysqli_fetch_assoc($cariuser);
        $_SESSION['email'] = $data['useremail'];
        $_SESSION['userid'] = $data['userid'];
        $_SESSION['role'] = "User";
        header("location:user");
    } else {
        // Jika user tidak ditemukan
        $alert = "<p style='color: red;'>Username atau Password salah</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="css/login.css" rel="stylesheet" />
</head>
<body>
    <div align="center">
        <br><br>
        <div class="container">
            <div style="color: green">
            <h2 style="font-weight: bold;">Form Login</h2>
            </div>
            <?php echo $alert; ?> <!-- Menampilkan pesan kesalahan atau informasi -->
            <?php if ($registration_open): ?>
            <form method="post">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" autofocus required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success" name="btn-login">Masuk</button>
                <a class="btn btn-secondary text-light" href="index.php">Kembali</a>
                <br>
                <h7>*Jika belum terdaftar, silakan Daftar Akun terlebih dahulu</h7>
            </form>
            <?php endif; ?>
            <br>
        </div>
    </div>
</body>
</html>