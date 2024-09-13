<!doctype html>
<html class="no-js" lang="en">

<?php 
    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='Admin'){
        header("location:../login.php");
    }
    
	?>
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

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Formulir</title>
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
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editUserId" />
                <div class="form-group">
                    <label for="editName">Nama Lengkap</label>
                    <input type="text" class="form-control" id="editName" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

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
                            <li>
                                <a href="admin.php"><i class="fa fa fa-user"></i><span>Kelola Admin</span></a>
                            </li>
                            <li>
                                <a href="user.php"><i class="fa fa-users"></i><span>User Terdaftar</span></a>
                            </li>
                            <li class="active">
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
        <div class="main-content">
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
                            <div class="card-body"><br>
                                <div class="d-sm-flex justify-content-between align-items-center"><h2>Kelola Formulir</h2></div>
                                <div class="row mt-3 mb-3">
                                    <div class="col-12 text-right">
                                   
                                        <select id="yearFilter" class="form-control" style="width:auto; display:inline-block;">
                                            <option value="">Pilih Tahun Ajaran</option>
                                            <!-- Add more years as needed -->
                                            <option value="2023">2023-2024</option>
                                            <option value="2024">2024-2025</option>
                                            <option value="2025">2025-2026</option>
                                        </select>
                                    </div>
                                </div>
                                <table id="dataTable3" class="table table-hover" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Submit</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $form=mysqli_query($conn,"SELECT * FROM userdata where status='Verified' ORDER BY userdataid DESC");
                                        $no=1;
                                        while($b=mysqli_fetch_array($form)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $b['namalengkap'] ?></td>
                                                <td><?php echo $b['tglkonfirmasi'] ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" href="view.php?u=<?php echo $b['userid'];?>">Lihat Formulir</a>
                                                    <a class="btn btn-success btn-sm" href="#" onclick="openEditModal('<?php echo $b['userid']; ?>', '<?php echo $b['namalengkap']; ?>')">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="#" onclick="confirmDelete('<?php echo $b['userid'];?>')">Hapus</a>
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
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
        <div class="copyright py-4 text-center text-light bg-dark">
                <div class="container"><small>© 2024 Madrasah Ibtidaiyah AT-THOHIRIYAH AMBON</small></div>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	

	
	<script>
		$(document).ready(function() {
		$('input').on('keydown', function(event) {
			if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
			   var $t = $(this);
			   event.preventDefault();
			   var char = String.fromCharCode(event.keyCode);
			   $t.val(char + $t.val().slice(this.selectionEnd));
			   this.setSelectionRange(1,1);
			}
		});
	
	
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
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
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
	
	<script>
		$(document).ready(function() {
		$('input').on('keydown', function(event) {
			if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
			   var $t = $(this);
			   event.preventDefault();
			   var char = String.fromCharCode(event.keyCode);
			   $t.val(char + $t.val().slice(this.selectionEnd));
			   this.setSelectionRange(1,1);
			}
		});
	});
	</script>
    
<script>
    document.getElementById('yearFilter').addEventListener('change', function() {
        var selectedYear = this.value;
        var table = $('#dataTable3').DataTable();
        table.column(2).search(selectedYear).draw();
    });
</script>

<script>
function confirmDelete(userId) {
    if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
        $.ajax({
            url: 'hapus_form.php', // Ganti dengan path ke skrip PHP untuk penghapusan
            type: 'POST',
            data: { userid: userId },
            success: function(response) {
                // Jika berhasil, reload halaman
                location.reload();
            },
            error: function() {
                alert('Terjadi kesalahan saat menghapus pengguna');
            }
        });
    }
}

</script>

<script>
function openEditModal(userId, userName) {
    $('#editUserId').val(userId);
    $('#editName').val(userName);
    $('#editModal').modal('show');
}

$('#saveChanges').on('click', function() {
    var userId = $('#editUserId').val();
    var newName = $('#editName').val();

    $.ajax({
        url: 'edit_form.php', // Ganti dengan path ke skrip PHP Anda
        type: 'POST',
        data: {
            userid: userId,
            namalengkap: newName
        },
        success: function(response) {
            // Kembali ke halaman yang sama untuk melihat perubahan
            location.reload();
        }
    });
});
</script>
</body>
</html>