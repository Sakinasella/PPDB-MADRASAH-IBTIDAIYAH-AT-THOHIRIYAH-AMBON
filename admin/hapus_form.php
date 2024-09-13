<?php 
include '../dbconnect.php';

if(isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $query = "DELETE FROM userdata WHERE userid = '$userid'";
    $result = mysqli_query($conn, $query);
    
    if($result) {
        echo 'Berhasil menghapus pengguna';
    } else {
        echo 'Gagal menghapus pengguna';
    }
}
?>