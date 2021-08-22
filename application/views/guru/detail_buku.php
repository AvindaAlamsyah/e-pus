<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>Data Buku | Digital Library</title>

	<!-- Fontfaces CSS-->
	<link href="<?php echo base_url('asset/admin/'); ?>css/font-face.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('asset/admin/'); ?>vendor/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
	<link type="text/css" href="<?php echo base_url(); ?>asset/admin/vendor/toast-master/css/jquery.toast.css" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url(); ?>asset/admin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

	<!-- Main CSS-->
	<link href="<?php echo base_url('asset/admin/'); ?>css/theme.css" rel="stylesheet" media="all">

	<!--Favicon-->
	<link rel="shortcut icon" href="<?php echo base_url('asset/') ?>images/favicon.png" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url('asset/') ?>images/favicon.png" type="image/x-icon">
	<?php
	if ($tipe_buku == 1 || $tipe_buku == 5 || $tipe_buku == 6) {
		$this->load->view('guru/detail_buku/pdf-head');
	}
	if ($tipe_buku == 3 || $tipe_buku == 6) {
		$this->load->view('guru/detail_buku/audio-head');
	}
	if ($tipe_buku == 4) {
		$this->load->view('guru/detail_buku/video-head');
	}
	?>
</head>

<body class="animsition">
	<div class="page-wrapper">
		<!-- Header -->
		<!-- HEADER MOBILE-->
		<?php $this->load->view('guru/header');
		 ?>

			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap m-b-35">
									<h2 class="title-1"><?php printx('Detail buku') ?></h2>
								</div>
								<div class="au-card">
									<div class="au-card-inner">
										<h2 class="title-2"><?php printx($judul_buku) ?></h2>
										<p>Penulis: <?php printx($penulis) ?></p>
										<p>Penerbit: <?php printx($penerbit) ?></p>
										<p>Tahun: <?php printx($tahun_terbit) ?></p>
										<hr />
										<p>Kategori: <?php printx($kategori) ?></p>
										<p>Level: <?php printx($level_buku) ?></p>
										<p>Tipe: <?php if ($tipe_buku == 1) {
														printx('E-book');
													}
													if ($tipe_buku == 2) {
														printx('Link');
													}
													if ($tipe_buku == 3) {
														printx('Audio');
													}
													if ($tipe_buku == 4) {
														printx('Video');
													}
													if ($tipe_buku == 5) {
														printx('Buku');
													}
													if ($tipe_buku == 6) {
														printx('E-book & audio');
													}
													?></p>
										<hr />
										<?php if ($tipe_buku == 1 || $tipe_buku == 5 || $tipe_buku == 6) {
											$this->load->view('guru/detail_buku/pdf');
										}
										if ($tipe_buku == 2) {
											$this->load->view('guru/detail_buku/link');
										}
										if ($tipe_buku == 3 || $tipe_buku == 6) {
											$this->load->view('guru/detail_buku/audio');
										}
										if ($tipe_buku == 4) {
											$this->load->view('guru/detail_buku/video');
										}
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="copyright">
									<p>Copyright © 2021 Robotindo. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT-->
			<!-- END PAGE CONTAINER-->
		</div>


	</div>
	<?php if ($tipe_buku == 1 || $tipe_buku == 5 || $tipe_buku == 6) { ?>
		<!-- Modal List -->
		<div id="modal_fullscreen" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-body">
						<canvas style="width: 100%;" id="pdf_renderer2" tabindex="1"></canvas>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- END Modal List -->						
	<?php } ?>
	<!-- Jquery JS-->
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS       -->
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/slick/slick.min.js">
	</script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/wow/wow.min.js"></script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/animsition/animsition.min.js"></script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
	</script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/counter-up/jquery.counterup.min.js">
	</script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/circle-progress/circle-progress.min.js"></script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/select2/select2.min.js">
	</script>
	<script src="<?php echo base_url('asset/admin/'); ?>vendor/datatables/datatables.min.js">
	</script>
	<script src="<?php echo base_url(); ?>asset/admin/vendor/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/vendor/jquery-validation-1.19.1/dist/localization/messages_id.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/admin/vendor/toast-master/js/jquery.toast.js"></script>

	<!-- Main JS-->
	<script src="<?php echo base_url('asset/admin/'); ?>js/main.js"></script>

	<?php
	if ($tipe_buku == 1 || $tipe_buku == 5 || $tipe_buku == 6) {
		$this->load->view('guru/detail_buku/pdf-script');
	}
	if ($tipe_buku == 3 || $tipe_buku == 6) {
		$this->load->view('guru/detail_buku/audio-script');
	}
	if ($tipe_buku == 4) {
		$this->load->view('guru/detail_buku/video-script');
	}
	?>
</body>

</html>
<!-- end document-->
