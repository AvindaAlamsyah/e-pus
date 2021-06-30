<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>Peraturan Perpustakaan | SMKN 1 Geger</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('asset/') ?>plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="<?php echo base_url('asset/') ?>plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="<?php echo base_url('asset/') ?>plugins/themify-icons/themify-icons.css">
    <!-- animation css -->
    <link rel="stylesheet" href="<?php echo base_url('asset/') ?>plugins/animate/animate.css">
    <!-- aos -->
    <link rel="stylesheet" href="<?php echo base_url('asset/') ?>plugins/aos/aos.css">
    <!-- venobox popup -->
    <link rel="stylesheet" href="<?php echo base_url('asset/') ?>plugins/venobox/venobox.css">

    <!-- Main Stylesheet -->
    <link href="<?php echo base_url('asset/') ?>css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url('asset/') ?>images/icon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('asset/') ?>images/icon.png" type="image/x-icon">

</head>

<body>
    <!-- preloader start -->
    <div class="preloader">
        <img src="<?php echo base_url('asset/') ?>images/preloader.gif" alt="preloader">
    </div>
    <!-- preloader end -->

    <!-- header -->
    <?php $this->load->view('header'); ?>
    <!-- /header -->

    <!-- page title -->
    <section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="<?php echo base_url('beranda') ?>">Beranda</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">Peraturan</li>
                    </ul>
                    <p class="text-lighten">Dalam menu ini disampaikan informasi keanggotaan meliputi deskripsi keanggotaan, syarat pendaftaran, sanksi, prosedur peminjaman, koleksi yang tidak dapat dipinjam dan peraturan bagi pengunjung Digital Library SMKN 1 Geger.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- notice details -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-4">Peraturan Peminjaman</h4>
                    <p class="mb-2">
                        <strong>1. Prosedur Peminjaman</strong><br />
                    <ol style="list-style-type: lower-alpha;" class="mb-2">
                        <li>Siswa yang dapat mengakses website adalah siswa aktis di SMK Negeri 1 Geger.</li>
                        <li>Setiap siswa tidak diperkenankan untuk menggunakan akun dari siswa lain untuk melakukan peminjaman.</li>
                        <li>Siswa diharuskan menyerahkan tanda tangan dalam bentuk gambar dengan format .PNG kepada admin di perpustakaan secara langsung agar dapat menbaca buku-buku yang berada di website.</li>
                        <li>Siswa mencari buku yang sesuai di halaman buku sesuai dengan tipe atau kategori yang diinginkan.</li>
                        <li>Siswa hanya dapat meminjam buku yang sesuai dengan level dari siswa.</li>
                        <li>Maksimal siswa dapat meminjam buku sebanyak 5 eksemplar.</li>
                        <li>Jika siswa ingin meminjam buku fisik, diharuskan langsung menuju ke perpustakaan dengan menunjukkan nama dan NISN.</li>
                        <li>Untuk buku virtual akan otomatis dikembalikan setelah seminggu peminjaman.</li>
                        <li>Sedangkan untuk buku pengembalian buku fisik siswa harus ke perpustakaan sebelum melewati seminggu durasi peminjaman.</li>
                    </ol><br />
                    <strong>2. Kewajiban dan Tanggung Jawab Peminjam</strong><br />
                    <strong>3. Sanksi</strong><br />
                    <strong>4. Ketentuan Khusus</strong><br />
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- /notice details -->

    <!-- footer -->
    <?php $this->load->view('footer');?>
    <!-- /footer -->

    <!-- jQuery -->
    <script src="<?php echo base_url('asset/') ?>plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('asset/') ?>plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="<?php echo base_url('asset/') ?>plugins/slick/slick.min.js"></script>
    <!-- aos -->
    <script src="<?php echo base_url('asset/') ?>plugins/aos/aos.js"></script>
    <!-- venobox popup -->
    <script src="<?php echo base_url('asset/') ?>plugins/venobox/venobox.min.js"></script>

    <!-- Main Script -->
    <script src="<?php echo base_url('asset/') ?>js/script.js"></script>

</body>

</html>