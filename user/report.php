<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn, "SELECT * FROM userdata WHERE nik='$u'");
$ambil = mysqli_fetch_array($cekdulu);

// Get alamat
$prov = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM provinces WHERE id='".$ambil['provinsi']."'"))['name'];
$kab = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM regencies WHERE id='".$ambil['kabupaten']."'"))['name'];
$kec = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM districts WHERE id='".$ambil['kecamatan']."'"))['name'];
$kel = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM villages WHERE id='".$ambil['kelurahan']."'"))['name'];

// Check if wali data exists
$showWali = !empty($ambil['walinik']) && !empty($ambil['walinama']) && !empty($ambil['walipekerjaan']) && !empty($ambil['walitelepon']);

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

// HTML content
$html = '
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            padding: 0 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        hr {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
        }
        .photo {
            text-align: center;
            margin-bottom: 10px;
        }
        .photo img {
            width: 100px;
            height: auto;
        }
        .full-page {
            page-break-before: always;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .full-page img {
            width: 14cm;
            height: 20cm;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h3>Formulir Pendaftaran Siswa Baru<br>Madrasah Ibtidaiyah At-thohiriyah Ambon</h3>
    <br><br>
    <hr/>

    <table>
        <tr>
            <th colspan="3">Data Pribadi</th>
        </tr>
        <tr>
            <td rowspan="7" style="width: 150px; text-align: center;">
                <img src="../user/'. $ambil['foto'].'" style="width: 100%; height: auto;">
            </td>
            <td><strong>NIK</strong></td>
            <td>'.$ambil['nik'].'</td>
        </tr>
        <tr>
            <td><strong>Nama Lengkap</strong></td>
            <td>'.$ambil['namalengkap'].'</td>
        </tr>
        <tr>
            <td><strong>Jenis Kelamin</strong></td>
            <td>'.$ambil['jeniskelamin'].'</td>
        </tr>
        <tr>
            <td><strong>Tempat Lahir</strong></td>
            <td>'.$ambil['tempatlahir'].'</td>
        </tr>
        <tr>
            <td><strong>Tanggal Lahir</strong></td>
            <td>'.$ambil['tanggallahir'].'</td>
        </tr>
        <tr>
            <td><strong>Alamat Lengkap</strong></td>
            <td>'.$ambil['alamat'].'</td>
        </tr>
        <tr>
            <td><strong>Provinsi</strong></td>
            <td>'.$prov.'</td>
        </tr>
        <tr>
            <td><strong>Kota/Kabupaten</strong></td>
            <td colspan="2">'.$kab.'</td>
        </tr>
        <tr>
            <td><strong>Kecamatan</strong></td>
            <td colspan="2">'.$kec.'</td>
        </tr>
        <tr>
            <td><strong>Kelurahan</strong></td>
            <td colspan="2">'.$kel.'</td>
        </tr>
        <tr>
            <td><strong>Agama</strong></td>
            <td colspan="2">'.$ambil['agama'].'</td>
        </tr>
        <tr>
            <td><strong>No Telepon</strong></td>
            <td colspan="2">'.$ambil['telepon'].'</td>
        </tr>
    </table>';

/// Tambahkan data orang tua atau data wali secara kondisional
if ($showWali) {
    $html .= '
    <table>
        <tr>
            <th colspan="2">Data Wali</th>
        </tr>
        <tr><td><strong>NIK Wali</strong></td><td>'.$ambil['walinik'].'</td></tr>
        <tr><td><strong>Nama Wali</strong></td><td>'.$ambil['walinama'].'</td></tr>
        <tr><td><strong>Pekerjaan Wali</strong></td><td>'.$ambil['walipekerjaan'].'</td></tr>
        <tr><td><strong>No Telepon Wali</strong></td><td>'.$ambil['walitelepon'].'</td></tr>
    </table>';
} else {
    $html .= '
    <table>
        <tr>
            <th colspan="2">Data Orang Tua</th>
        </tr>
        <tr><td><strong>NIK Ayah</strong></td><td>'.$ambil['ayahnik'].'</td></tr>
        <tr><td><strong>Nama Ayah</strong></td><td>'.$ambil['ayahnama'].'</td></tr>
        <tr><td><strong>Pendidikan Ayah</strong></td><td>'.$ambil['ayahpendidikan'].'</td></tr>
        <tr><td><strong>Pekerjaan Ayah</strong></td><td>'.$ambil['ayahpekerjaan'].'</td></tr>
        <tr><td><strong>Penghasilan Ayah</strong></td><td>'.$ambil['ayahpenghasilan'].'</td></tr>
        <tr><td><strong>No Telepon Ayah</strong></td><td>'.$ambil['ayahtelepon'].'</td></tr>
        <tr><td><strong>NIK Ibu</strong></td><td>'.$ambil['ibunik'].'</td></tr>
        <tr><td><strong>Nama Ibu</strong></td><td>'.$ambil['ibunama'].'</td></tr>
        <tr><td><strong>Pendidikan Ibu</strong></td><td>'.$ambil['ibupendidikan'].'</td></tr>
        <tr><td><strong>Pekerjaan Ibu</strong></td><td>'.$ambil['ibupekerjaan'].'</td></tr>
        <tr><td><strong>Penghasilan Ibu</strong></td><td>'.$ambil['ibupenghasilan'].'</td></tr>
        <tr><td><strong>No Telepon Ibu</strong></td><td>'.$ambil['ibutelepon'].'</td></tr>
    </table>';
}

$html .= '
    <div class="full-page">
        <img src="../user/'. $ambil['scanijazahdepan'].'">
    </div>
    <div class="full-page">
        <img src="../user/'. $ambil['scanijazahbelakang'].'">
    </div>
</body>
</html>';



// Generate PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Use the student's name as the PDF file name
$namaFile = $ambil['namalengkap'] . '.pdf';
$dompdf->stream($namaFile);
?>

