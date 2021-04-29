<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Detail Buku | SMKN 1 GEGER</title>

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
  <link rel="shortcut icon" href="<?php echo base_url('asset/') ?>images/favicon.png" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url('asset/') ?>images/favicon.png" type="image/x-icon">

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
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="<?php echo base_url('buku'); ?>">Buku</a></li>
            <li class="list-inline-item text-white h4 font-secondary nasted"><?php echo $detail['judul_buku']; ?></li>
          </ul>
          <!-- <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p> -->
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- section -->
  <section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-4">
          <!-- course thumb -->
        </div>
      </div>
      <!-- course info -->
      <div class="row align-items-center mb-5">
        <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
          <h2>Detail Buku</h2>
        </div>
        <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
          <ul class="list-inline text-xl-center">
            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <i class="ti-pencil-alt text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">PENULIS</h6>
                  <p class="mb-0"><?php echo $detail['penulis']; ?></p>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <i class="ti-printer text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">PENERBIT</h6>
                  <p class="mb-0"><?php echo $detail['penerbit']; ?></p>
                </div>
              </div>
            </li>
            <li class="list-inline-item mr-4 mb-3 mb-sm-0">
              <div class="d-flex align-items-center">
                <i class="ti-time text-primary icon-md mr-2"></i>
                <div class="text-left">
                  <h6 class="mb-0">TAHUN</h6>
                  <p class="mb-0"><?php echo $detail['tahun_terbit']; ?></p>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <?php echo $link; ?>
        <!-- border -->
        <div class="col-12 mt-4 order-4">
          <div class="border-bottom border-primary"></div>
        </div>
      </div>
      <!-- course details -->
      <div class="row justify-content-center">
        <div class="col-12 mb-4">
          <?php echo $pdf; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /section -->

  <!-- footer -->
  <footer>
    <!-- copyright -->
    <div class="copyright py-4 bg-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 text-sm-left text-center">
            <p class="mb-0">Copyright
              <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
              </script>
              © Robotindo
            </p>
          </div>
          <div class="col-sm-5 text-sm-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-facebook text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-twitter-alt text-primary"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block p-2" href="#"><i class="ti-instagram text-primary"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
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
  <!-- filter -->
  <script src="<?php echo base_url('asset/') ?>plugins/filterizr/jquery.filterizr.min.js"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
  <script src="<?php echo base_url('asset/') ?>plugins/google-map/gmap.js"></script>

  <!-- Main Script -->
  <script src="<?php echo base_url('asset/') ?>js/script.js"></script>

</body>

</html>