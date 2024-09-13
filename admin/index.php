<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='Admin'){
        header("location:../login.php");
    }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin: Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-144808195-1');
    </script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- css lainnya -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- modernizr css -->
    <link href="css/index.css" rel="stylesheet" />
</head>
<body>
    <!-- area preloader mulai -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        <!-- area menu sidebar mulai -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <a href="index.php"><img src="../LOGO_MI.png" alt="logo" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active"><a href="index.php"><span>Dashboard</span></a></li>
                            <li>
                                <a href="admin.php"><i class="fa fa-user"></i><span>Kelola Admin</span></a>
                            </li>
                            <li>
                                <a href="user.php"><i class="fa fa-users"></i><span>User Terdaftar</span></a>
                            </li>
                            <li >
                                <a href="form.php"><i class="fa fa-file-alt"></i><span>Formulir</span></a>
                            </li>
                            <li>
                                <a href="../logout.php"><i class="fa fa-sign-out-alt"></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- area menu sidebar selesai -->
            <!-- area header mulai -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- tombol navigasi dan pencarian -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- info profil & notifikasi tugas -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3>
                                    <div class="date">
                                        <script type='text/javascript'>
                                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                        var date = new Date();
                                        var day = date.getDate();
                                        var month = date.getMonth();
                                        var thisDay = date.getDay(),
                                            thisDay = myDays[thisDay];
                                        var yy = date.getYear();
                                        var year = (yy < 1000) ? yy + 1900 : yy;
                                        document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                        </script>
                                    </div>
                                </h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- area header selesai -->
             
            <!-- area judul halaman selesai -->
            <div class="main-content-inner">
                <!-- area nilai pasar mulai -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="market-status-table mt-4">
                                <div class="text-center">
                                    <h3 style="font-family: 'Georgia', serif; color: #333; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); background: #f8f9fa; padding: 10px; border-radius: 5px;">
                                        Selamat datang di sistem penerimaan peserta didik baru (PPDB) online <br> Madrasah Ibtidaiyah At-Thohiriyah Ambon</span>.
                                    </h3>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- area baris mulai -->
            </div>
        </div>
         <!-- Copyright Section-->
         <div class="copyright py-4 text-center text-light bg-dark">
            <div class="container"><small>© 2024 Madrasah Ibtidaiyah AT-THOHIRIYAH AMBON</small></div>
        </div>
    </div>
    <!-- area kontainer halaman selesai -->

    <!-- versi terbaru dari jquery -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- mulai chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- mulai highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- mulai zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- aktivasi semua line chart -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- semua pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- plugin lainnya -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>