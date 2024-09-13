<?php
include '../dbconnect.php';

// Pastikan admin yang login
include '../cek.php';
if ($role !== 'Admin') {
    header("location:../login.php");
}

if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    // Buat password baru secara acak
    $newPassword = bin2hex(random_bytes(4)); // 8 karakter panjang
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "UPDATE admin SET adminpassword='$hashedPassword' WHERE adminid='$adminid'");

    if ($query) {
        // Kirim email kepada admin dengan password baru (optional)
        // Di sini Anda bisa menambahkan kode untuk mengirim email jika diperlukan

        echo "<div class='alert alert-success'>
            Password berhasil direset. Password baru adalah: $newPassword
        </div>";
        echo "<meta http-equiv='refresh' content='3; url=admin.php'/>"; // Redirect ke halaman admin
    } else {
        echo "<div class='alert alert-warning'>
            Gagal mereset password. Silakan coba lagi nanti.
        </div>";
        echo "<meta http-equiv='refresh' content='3; url=admin.php'/>";
    }
} else {
    echo "<div class='alert alert-warning'>
        ID Admin tidak ditemukan.
    </div>";
    echo "<meta http-equiv='refresh' content='3; url=admin.php'/>";
}
?>
