<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='Admin'){
        header("location:../login.php");
    };

    if(isset($_POST['adminbaru'])){
        $email = $_POST['adminemail'];
        $password = $_POST['adminpassword'];
        $insert = mysqli_query($conn,"insert into admin(adminemail,adminpassword) values('$email','$password')");
        if($insert){
            //berhasil bikin
              echo " <div class='alert alert-success'>
              Berhasil tambah admin baru.
          </div>
          <meta http-equiv='refresh' content='1; url= admin.php'/>  ";  
          } else {
            echo "<div class='alert alert-warning'>
                  Gagal tambah admin baru. Silakan coba lagi nanti.
              </div>
              <meta http-equiv='refresh' content='3; url= admin.php'/> ";
          }
    };
    if (isset($_POST['hapus'])) {
        $idadmin = $_POST['idadmin']; // Ambil ID admin yang ingin dihapus
        $delete = mysqli_query($conn, "DELETE FROM admin WHERE adminid='$idadmin'");
        
        if ($delete) {
            echo "<div class='alert alert-success'>
                    Admin berhasil dihapus.
                  </div>
                  <meta http-equiv='refresh' content='1; url= admin.php'/> ";
        } else {
            echo "<div class='alert alert-warning'>
                    Gagal menghapus admin. Silakan coba lagi nanti.
                  </div>
                  <meta http-equiv='refresh' content='3; url= admin.php'/> ";
        }
    }
    
	?>
    
<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
	
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="css/admin.css" rel="stylesheet" />
</head>

<body>
    <!-- preloader area start-->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <a href="index.php"><img src="../LOGO_MI.png" alt="logo" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li><a href="index.php"><span>Dashboard</span></a></li>
                            <li class="active">
                                <a href="admin.php"><i class="fa fa-user"></i><span>Kelola Admin</span></a>
                            </li>
                            <li>
                                <a href="user.php"><i class="fa fa-users"></i><span>User Terdaftar</span></a>
                            </li>
                            <li>
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
        <!-- sidebar menu area end -->
        <!-- main content area start -->
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
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
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->

            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Kelola Admin</h2>
                                    <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-primary col-md-2">
                                        <i class="fa fa-plus"></i> Tambah Admin Baru
                                    </button>
                                </div><br><br>
										 <table id="dataTable3" class="table table-hover" style="width:100%"><thead class="thead-">
											<tr>
												<th>No</th>
												<th>Email</th>
                                                <th>Aksi</th>
												
											</tr></thead>
                                            <tbody>
                                        <?php 
                                        $form=mysqli_query($conn,"SELECT * FROM admin ORDER BY adminid ASC");
                                        $no=1;
                                        while($b=mysqli_fetch_array($form)){
                                            $adminid = $b['adminid'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $b['adminemail'] ?></td>
                                            <td>
                                                <form method="post" style="display:inline;">
                                                    <input type="hidden" value="<?php echo $adminid ?>" name="idadmin">
                                                    <button type="submit" class="btn btn-danger btn-sm" name="hapus">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>
                                    </tbody> 
									</table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- market value area end -->
            </div>
        </div>
        <div class="copyright py-4 text-center text-light bg-dark">
            <div class="container"><small>© 2024 Madrasah Ibtidaiyah AT-THOHIRIYAH AMBON</small></div>
        </div>
        <!-- main content area end -->
    </div>
    <!-- page container area end -->

	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Admin Baru</h4>
						</div>
						
						<div class="modal-body">
							<form action="admin.php" method="post">
								<div class="form-group">
									<label>Email</label>
									<input name="adminemail" type="text" class="form-control" required autofocus>
								</div>
								
								<div class="form-group">
									<label>Password</label>
									<input name="adminpassword" type="text" class="form-control" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="adminbaru" type="submit" class="btn btn-primary" value="Simpan">
							</div>
							</form>
						</div>
					</div>
				</div>

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
	<!-- Start datatable js -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>
 