<?php
include '../dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userid = $_POST['userid'];
    $namalengkap = $_POST['namalengkap'];

    $updateQuery = "UPDATE userdata SET namalengkap='$namalengkap' WHERE userid='$userid'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Berhasil diperbarui";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
