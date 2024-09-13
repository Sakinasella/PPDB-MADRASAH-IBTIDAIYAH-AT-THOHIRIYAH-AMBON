<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Peserta Didik Baru - MI AT-THOHIRIYAH</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <a class="navbar-brand" href="#">MI AT-THOHIRIYAH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#kegiatan" id="kegiatan-link">KEGIATAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#panduan" id="panduan-link">PANDUAN</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="register.php">DAFTAR</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
            </ul>
        </div>
    </nav>

    <!-- Logo dan judul -->
    <header>
        <img src="LOGO_MI.png" alt="Logo Sekolah">
        <div class="content-title">Penerimaan Peserta Didik Baru </div>
          <a class="btn btn-outline-light btn-xl" href="#panduan">Info Pendaftaran</a>
    </header>

    <!-- foto -->
    <div id="kegiatan" class="container"><br>
        <h3 class="text-center mb-4">Kegiatan Sekolah</h3>
        <div class="row">
            <!-- Foto 1 -->
            <div class="col-md-4">
                <img src="assets/img/Kegiatan/kegiatan1.jpg" alt="Kegiatan 1" class="img-fluid">
            </div>
            <!-- Foto 2 -->
            <div class="col-md-4">
                <img src="assets/img/Kegiatan/kegiatan2.jpg" alt="Kegiatan 2" class="img-fluid">
            </div>
            <!-- Foto 3 -->
            <div class="col-md-4">
                <img src="assets/img/Kegiatan/kegiatan3.jpg" alt="Kegiatan 3" class="img-fluid">
            </div>
        </div>
        <div class="row mt-3">
            <!-- Foto 4 -->
            <div class="col-md-4">
                <img src="assets/img/Kegiatan/kegiatan4.jpg" alt="Kegiatan 4" class="img-fluid">
            </div>
            <!-- Foto 5 -->
            <div class="col-md-4">
                <img src="assets/img/Kegiatan/kegiatan5.jpg" alt="Kegiatan 5" class="img-fluid">
            </div>
            <!-- Foto 6 -->
            <div class="col-md-4">
                <img src="assets/img/Kegiatan/kegiatan6.jpg" alt="Kegiatan 6" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Panduan Pendaftaran -->
    <div id="panduan" class="registration-guide"><br>
        <h2 class="page-section-heading text-center text-uppercase mb-4">Panduan Pendaftaran</h2>
        <!-- Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-line"></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Section Content -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="lead mb-4">Pendaftaran siswa/siswi untuk tahun ajaran 2024-2025 akan dimulai pada tanggal 15 Juni 2024 hingga 15 Juli 2024. Jangan lewatkan kesempatan ini untuk bergabung dengan kami!</p>
                <p class="lead mb-4">Untuk memulai proses pendaftaran, klik tombol Daftar Sekarang di bawah ini. Jika Anda belum memiliki akun, Anda dapat membuatnya terlebih dahulu. Pastikan untuk melengkapi semua data dan berkas yang diperlukan agar proses pendaftaran berjalan lancar.</p>
                <!-- Button -->
                <div class="mt-4">
                    <a class="btn btn-xl btn-outline-light" href="register.php">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="info-section">
        <div class="row">
            <!-- Footer Social Icons-->
            <div class="col-lg-4 mb-2 mb-lg-0">
                <h4 class="text-uppercase mb-4">Media Sosial</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/mis.atthohiriyah.54?locale=id_ID">
                    <i class="fab fa-fw fa-facebook-f"></i>
                </a>
                <a class="btn btn-outline-light btn-social mx-1" href="https://www.youtube.com/@mi.at-thohiriyah_ambon">
                    <i class="fab fa-fw fa-youtube"></i>
                </a>
            </div>
            <!-- Footer School Mission-->
            <div class="col-lg-4">
                <h4 class="text-uppercase mb-4">Tujuan Sekolah</h4>
                <p class="lead mb-0">
                    MI AT-THOHIRIYAH Ambon bertujuan untuk memberikan pendidikan Islami yang berkualitas, membentuk karakter siswa yang berakhlak mulia, dan mempersiapkan mereka untuk sukses dalam kehidupan akademis dan spiritual.
                </p>
            </div>
            <!-- Footer Address-->
            <div class="col-lg-4 mb-2 mb-lg-0">
                <h4 class="text-uppercase mb-4">Alamat Sekolah</h4>
                <p class="lead mb-0">
                    JL. Dr. Malaihollo, Air Salobar-Pohon Mangga
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        © 2024 Madrasah Ibtidaiyah AT-THOHIRIYAH AMBON
    </div>

    <!-- JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('kegiatan-link').addEventListener('click', function(event) {
        event.preventDefault();  // Mencegah aksi default link (mengubah URL)
        
        // Scroll ke bagian kegiatan secara smooth
        document.getElementById('kegiatan').scrollIntoView({
            behavior: 'smooth'
        });
    });
    </script>
    <script>
        document.getElementById('panduan-link').addEventListener('click', function(event) {
    event.preventDefault();  // Mencegah aksi default link (mengubah URL)
    
    // Scroll ke bagian panduan secara smooth
    document.getElementById('panduan').scrollIntoView({
        behavior: 'smooth'
        });
    });
    </script>
</body>
</html>