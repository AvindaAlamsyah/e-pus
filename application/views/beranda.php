<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Digital Library | SMK 1 Geger</title>

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

  <!-- hero slider -->
  <section class="hero-section overlay bg-cover" data-background="<?php echo base_url('asset/') ?>images/banner/banner-1.jpg">
    <div class="container">
      <div class="hero-slider">
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Jangan Membaca Sampai Koma, Tapi Bacalah Sampai Titik.</h1>
              <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Sapiente odit blanditiis nulla. Quas blanditiis non aliquid quod ratione est. Iste ducimus similique dolor nesciunt quia. Quibusdam ut aut corrupti est tempore. Esse sequi et qui nulla dolores nemo quidem doloribus odit.</p>
              <a href="<?php echo base_url('buku'); ?>" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Lihat buku</a>
            </div>
          </div>
        </div>
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Pentingnya Membaca Buku Untuk Ilmu.</h1>
              <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">Jangan sekali-kali kamu berhenti membaca hingga akhirnya kamu mengerti sejarah dunia.</p>
              <a href="<?php echo base_url('buku'); ?>" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Lihat buku</a>
            </div>
          </div>
        </div>
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Jarimu Terlalu Sibuk Mengetik, Sementara Matamu Terlalu Malas Membaca.</h1>
              <p class="text-muted mb-4" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor
                incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
              <a href="<?php echo base_url('buku'); ?>" class="btn btn-primary" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">Lihat buku</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /hero slider -->

  <!-- banner-feature -->
  <section class="bg-gray overflow-md-hidden">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-xl-4 col-lg-5 align-self-end">
          <img class="img-fluid w-100" src="<?php echo base_url('asset/'); ?>images/banner/banner-feature.png" alt="banner-feature">
        </div>
        <div class="col-xl-8 col-lg-7">
          <div class="row feature-blocks bg-gray justify-content-between">
            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
              <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
              <h3 class="mb-xl-4 mb-lg-3 mb-4">Scholorship News</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad</p>
            </div>
            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
              <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
              <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Notice Board</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad</p>
            </div>
            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
              <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
              <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Achievements</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad</p>
            </div>
            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
              <i class="ti-write mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
              <h3 class="mb-xl-4 mb-lg-3 mb-4">Admission Now</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /banner-feature -->

  <!-- courses -->
  <section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex align-items-center section-title justify-content-between">
            <h2 class="mb-0 text-nowrap mr-3">Katalog Buku</h2>
            <div class="border-top w-100 border-primary d-none d-sm-block"></div>
            <div>
              <a href="<?php echo base_url('buku'); ?>" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">Lihat lainnya</a>
            </div>
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
                <a href="<?php echo base_url('buku/detail_buku/' . $buku->id_buku); ?>" class="btn btn-primary btn-sm">Baca buku</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <!-- /course list -->
      <!-- mobile see all button -->
      <div class="row">
        <div class="col-12 text-center">
          <a href="<?php echo base_url('buku'); ?>" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">Lihat lainnya</a>
        </div>
      </div>
    </div>
  </section>
  <!-- /courses -->

  <!-- cta -->
  <section class="section bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h6 class="text-white font-secondary mb-0">Penasaran dengan buku lainnya</h6>
          <h2 class="section-title text-white">Yuk cari lebih banyak buku lagi</h2>
          <a href="<?php echo base_url('buku'); ?>" class="btn btn-secondary">Lihat buku</a>
        </div>
      </div>
    </div>
  </section>
  <!-- /cta -->

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