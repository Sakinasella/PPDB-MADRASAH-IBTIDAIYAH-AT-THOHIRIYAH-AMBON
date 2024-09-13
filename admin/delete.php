<?php
include '../dbconnect.php';
include '../cek.php';

if($role !== 'Admin'){
    header("location:../login.php");
}

$userid = $_GET['u'];

// Periksa apakah userid ada di URL
if(isset($userid)){
    // Hapus data berdasarkan userid
    $query = "DELETE FROM userdata WHERE userid='$userid'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Data berhasil dihapus.');window.location='form.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.');window.location='form.php';</script>";
    }
} else {
    header("location:form.php");
}
?>