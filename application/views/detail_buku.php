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
    <link rel="shortcut icon" href="<?php echo base_url('asset/') ?>images/icon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('asset/') ?>images/icon.png" type="image/x-icon">
    <?php
      if ($tipe_buku == 1 || $tipe_buku == 5 || $tipe_buku == 6) {
        $this->load->view('detail_buku/pdf-head');
      }
      if ($tipe_buku == 3 || $tipe_buku == 6) {
        $this->load->view('detail_buku/audio-head');
      }
      if ($tipe_buku == 4) {
        $this->load->view('detail_buku/video-head');
      }
      ?>

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
                        <li class="list-inline-item text-white h4 font-secondary nasted"><?php echo $judul_buku; ?></li>
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
                <div class="col-lg-9">
                    <ul class="list-inline">
                        <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <i class="ti-pencil-alt icon-md mr-2"></i>
                                <div class="text-left">
                                    <h6 class="mb-0">PENULIS</h6>
                                    <p class="mb-0"><?php echo $penulis; ?></p>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <i class="ti-printer icon-md mr-2"></i>
                                <div class="text-left">
                                    <h6 class="mb-0">PENERBIT</h6>
                                    <p class="mb-0"><?php echo $penerbit; ?></p>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <i class="ti-time icon-md mr-2"></i>
                                <div class="text-left">
                                    <h6 class="mb-0">TAHUN</h6>
                                    <p class="mb-0"><?php echo $tahun_terbit; ?></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- border -->
                <div class="col-12 mt-4 order-4">
                    <div class="border-bottom border-primary"></div>
                </div>
            </div>
            <?php
      if ($tipe_buku == 1 || $tipe_buku == 5 || $tipe_buku == 6) {
        $this->load->view('detail_buku/pdf');
      }
      if ($tipe_buku == 2) {
        $this->load->view('detail_buku/link');
      }
      if ($tipe_buku == 3 || $tipe_buku == 6) {
        $this->load->view('detail_buku/audio');
      }
      if ($tipe_buku == 4) {
        $this->load->view('detail_buku/video');
      }
      ?>
            <!-- course details -->

        </div>
    </section>
    <!-- /section -->

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

    <?php
      if ($tipe_buku == 1 || $tipe_buku == 5 || $tipe_buku == 6) {
        $this->load->view('detail_buku/pdf-script');
      }
      if ($tipe_buku == 3 || $tipe_buku == 6) {
        $this->load->view('detail_buku/audio-script');
      }
      if ($tipe_buku == 4) {
        $this->load->view('detail_buku/video-script');
      }
      ?>
</body>

</html>