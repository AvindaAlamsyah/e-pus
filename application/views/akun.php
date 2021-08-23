<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Pengaturan Akun | SMKN 1 Geger</title>

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
            <div class="col-lg-12 mb-lg-0">
              <?php if (isset($pesan)) {
                echo $pesan;
              } ?>
              <form action="<?php echo base_url('akun/ganti_password'); ?>" method="POST">
                <input type="password" class="form-control mb-3" id="old-password" name="old-password" placeholder="Password Lama">
                <input type="password" class="form-control mb-3" id="new-password" name="new-password" placeholder="Password Baru">
                <input type="password" class="form-control mb-3" id="confirm-password" name="confirm-password" placeholder="Konfirmasi Password Baru">
                <button type="submit" value="send" class="btn btn-primary">Ganti Password</button>
              </form>
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
  <script>
    var password = document.getElementById("new-password"),
      confirm_password = document.getElementById("confirm-password");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Tidak Cocok");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>

</body>

</html>