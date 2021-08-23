<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Profile Akun | SMKN 1 Geger</title>

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
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
            <li class="list-inline-item text-white h3 font-secondary nasted"><?php echo $this->session->userdata('nama'); ?></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- teacher details -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled">
            <li class="mb-3"><a class="text-color" href="<?php echo base_url('akun'); ?>"><i class="ti-user mr-2"></i>Profile</a></li>
            <li class="mb-3"><a class="text-color" href="<?php echo base_url('akun/pengaturan'); ?>"><i class="ti-settings mr-2"></i>Pengaturan Akun</a></li>
          </ul>
        </div>
        <div class="col-md-6 mb-5">
          <div class="row">
            <div class="col-sm-4">
              <ul class="list-unstyled">
                <li class="mb-3">Nama Lengkap</li>
                <li class="mb-3">Kelas</li>
                <li class="mb-3">Jurusan</li>
                <li class="mb-3">Tanda Tangan</li>
              </ul>
            </div>
            <div class="col-sm-1">
              <ul class="list-unstyled">
                <li class="mb-3">:</li>
                <li class="mb-3">:</li>
                <li class="mb-3">:</li>
                <li class="mb-3">:</li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="list-unstyled">
                <li class="mb-3"><?php echo $nama_lengkap; ?></li>
                <li class="mb-3"><?php echo $kelas; ?></li>
                <li class="mb-3"><?php echo $jurusan; ?></li>
                <li class="mb-3"><img class="img-fluid w-100" src="<?php echo base_url('asset/admin/ttd/') . $ttd; ?>" alt=""></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /teacher details -->

  <!-- footer -->
  <?php $this->load->view('footer'); ?>
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