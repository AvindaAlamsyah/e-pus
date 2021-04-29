<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Daftar Buku | SMKN 1 Geger</title>

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
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="<?php echo base_url('buku') ?>">Bacalah Buku</a></li>
            <li class="list-inline-item text-white h3 font-secondary "></li>
          </ul>
          <p class="text-lighten">"Buku adalah pembawa peradaban. Tanpa buku, sejarah itu sunyi, sastra itu bodoh, sains lumpuh, pemikiran dan spekulasi terhenti. Buku adalah mesin perubahan, jendela di dunia, mercusuar yang didirikan di lautan waktu." - Barbara W. Tuchman</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- courses -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex align-items-center section-title justify-content-between">
            <h2 class="mb-0 text-nowrap mr-3">Daftar Buku</h2>
            <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          </div>
        </div>
      </div>
      <!-- course list -->
      <div class="row justify-content-center">
        <?php foreach ($buku as $buku) { ?>
          <!-- course item -->
          <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card p-0 border-primary rounded-0 hover-shadow">
              <div class="card-body">
                <ul class="list-inline mb-2">
                  <li class="list-inline-item"><i class="ti-star mr-1 text-color"></i>Level <?php echo $buku->level_buku; ?></li>
                  <li class="list-inline-item"><i class="ti-tag mr-1 text-color"></i><?php if ($buku->tipe_buku == 0) {
                                                                                        echo "E-Book";
                                                                                      } else {
                                                                                        echo "Link";
                                                                                      }; ?></li>
                </ul>
                <a href="course-single.html">
                  <h4 class="card-title">Judul</h4>
                </a>
                <p class="card-text mb-4"><?php echo $buku->judul_buku; ?></p>
                <a href="<?php echo base_url('buku/detail_buku/' . $buku->id_buku) ?>" class="btn btn-primary btn-sm">Baca buku</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <!-- /course list -->
    </div>
  </section>
  <!-- /courses -->

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