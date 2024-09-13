<?php
include '../dbconnect.php';

if (isset($_POST['year'])) {
    $year = $_POST['year'];
    $query = "SELECT * FROM userdata WHERE status='Verified' AND YEAR(tglkonfirmasi) = '$year' ORDER BY userdataid DESC";
    $result = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row; // Menyimpan data yang diambil ke dalam array
    }
    // Kembalikan data dalam format JSON
    echo json_encode($data);
}
?>
