<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
	<div class="header-mobile__bar">
		<div class="container-fluid">
			<div class="header-mobile-inner">
				<a class="logo" href="#">
					<img src="<?php echo base_url('asset/admin'); ?>/images/icon/logo-black.png" alt="Digital Library" />
				</a>
				<button class="hamburger hamburger--slider" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<nav class="navbar-mobile">
		<div class="container-fluid">
			<ul class="navbar-mobile__list list-unstyled">
				<li>
					<a href="<?php echo base_url("guru/beranda") ?>"" class=" active">
						<i class="fas fa-tachometer-alt"></i>Dasbor</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
	<div class="logo">
		<a href="#">
			<img src="<?php echo base_url("asset/admin/") ?>images/icon/logo-black.png" alt="Cool Admin" />
		</a>
	</div>
	<div class="menu-sidebar__content js-scrollbar1">
		<nav class="navbar-sidebar">
			<ul class="list-unstyled navbar__list">
				<li class="active">
					<a href="<?php echo base_url("guru/beranda") ?>">
						<i class="fas fa-tachometer-alt"></i>Dasbor</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
<!-- END MENU SIDEBAR-->
<!-- PAGE CONTAINER-->
<div class="page-container">
	<!-- HEADER DESKTOP-->
	<header class="header-desktop">
		<div class="section__content section_content--p30">
			<div class="container-fluid">
				<div class="header-wrap">
					<form class="form-header" action="" method="POST">
					</form>
					<div class="header-button">
						<div class="account-wrap">
							<div class="account-item clearfix js-item-menu">
								<div class="image">
									<i class="fas fa-user fa-2x"></i>
								</div>
								<div class="content">
									<a class="js-acc-btn" href="#"><?php echo $this->session->userdata('nama'); ?></a>
								</div>
								<div class="account-dropdown js-dropdown">
									<div class="info clearfix">
										<div class="image">
											<a href="#">
												<i class="fas fa-user fa-3x"></i>
											</a>
										</div>
										<div class="content">
											<h5 class="name">
												<a href="#"><?php echo $this->session->userdata('nama'); ?></a>
											</h5>
											<span class="email"><?php echo $this->session->userdata('username'); ?></span>
										</div>
									</div>
									<div class="account-dropdown__footer">
										<a href="<?php echo base_url("guru/login/logout"); ?>">
											<i class="zmdi zmdi-power"></i>Logout</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- HEADER DESKTOP-->
	<!-- End Header -->