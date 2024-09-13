<?php
session_start();
include 'dbconnect.php';

$alert = '';
$current_date = date("Y-m-d"); // Get the current date
$open_registration = '2024-06-15'; // Registration start date
$close_registration = '2024-09-18'; // Registration end date

// Check registration period
if ($current_date < $open_registration) {
    $alert = "<p style='color: red;'>Pendaftaran belum dibuka. Silakan kembali pada tanggal 15 Juni 2024.</p>";
    $registration_open = false;
} elseif ($current_date > $close_registration) {
    $alert = "<p style='color: red;'>Pendaftaran sudah ditutup. Pendaftaran hanya dibuka dari tanggal 15 Juni 2024 hingga 15 Juli 2024.</p>";
    $registration_open = false;
} else {
    $alert = "<p style='color: green;'></p>";
    $registration_open = true;
}

if (isset($_SESSION['role'])) {
    header("location:index.php");
}

if (isset($_POST['btn-daftar']) && $registration_open) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if email already exists
    $query = mysqli_query($conn, "SELECT * FROM user WHERE useremail='$email'");
    $email_exists = mysqli_num_rows($query);

    if ($email_exists < 1) {
        // Email not used
        $insert = mysqli_query($conn, "INSERT INTO user (useremail, userpassword) VALUES ('$email', '$password')");

        if ($insert) {
            $alert = "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
                      <meta http-equiv='refresh' content='2; url=login.php'/>";
        } else {
            // Registration failed
            $alert = "<div class='alert alert-warning'>Gagal mendaftar, silakan coba lagi.</div>
                      <meta http-equiv='refresh' content='2'>";
        }
    } else {
        // Email already used
        $alert = "<div class='alert alert-danger'>Email sudah pernah digunakan.</div>
                  <meta http-equiv='refresh' content='2'>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran PPDB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-144808195-1');
    </script>
    <link href="css/register.css" rel="stylesheet" />
</head>
<body>
<div align="center">
    <br><br>
    <div class="container">
        <div style="color: green">
        <h2 style="font-weight: bold;">Form Registrasi</h2>
        </div>
        <?php echo $alert; ?> <!-- Display messages based on registration status -->
        <?php if ($registration_open): ?>
            <form method="post">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" autofocus required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success" name="btn-daftar">Daftar</button>
                <a class="btn btn-secondary text-light" href="index.php">Kembali</a>
                <br><br>
                <h7>*Jika belum terdaftar, silakan Daftar Akun terlebih dahulu</h7>
            </form>
        <?php endif; ?>
        <br>
    </div>
</div>
</body>
</html>