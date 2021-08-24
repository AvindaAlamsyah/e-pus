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
                    <a href="<?php echo base_url("admin/dashboard") ?>">
                        <i class="fas fa-tachometer-alt"></i>Dasbor</a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/peminjaman") ?>">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>Peminjaman</a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/data_anggota") ?>">
                        <i class="fas fa-group"></i>Data Anggota</a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/data_guru") ?>">
                        <i class="fas fa-group"></i>Data Guru</a>
                </li>
                <?php
                if ($this->session->userdata('level') == 0) {
                ?>
                    <li>
                        <a href="<?php echo base_url("admin/data_admin") ?>">
                            <i class="fas fa-group"></i>Data Admin</a>
                    </li>
                <?php
                }
                ?>
                <li>
                    <a href="<?php echo base_url('admin/data_buku'); ?>">
                        <i class="fas fa-book"></i>Data Buku</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/laporan'); ?>">
                        <i class="far fa-file-text"></i>Laporan</a>
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
                <li>
                    <a href="<?php echo base_url("admin/dashboard") ?>">
                        <i class="fas fa-tachometer-alt"></i>Dasbor</a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/peminjaman") ?>">
                        <i class="fa fa-handshake-o" aria-hidden="true"></i>Peminjaman</a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/data_anggota") ?>">
                        <i class="fas fa-group"></i>Data Anggota</a>
                </li>
                <li>
                    <a href="<?php echo base_url("admin/data_guru") ?>">
                        <i class="fas fa-group"></i>Data Guru</a>
                </li>
                <?php
                if ($this->session->userdata('level') == 0) {
                ?>
                    <li>
                        <a href="<?php echo base_url("admin/data_admin") ?>">
                            <i class="fas fa-group"></i>Data Admin</a>
                    </li>
                <?php
                }
                ?>
                <li>
                    <a href="<?php echo base_url('admin/data_buku') ?>">
                        <i class="fas fa-book"></i>Data Buku</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/laporan'); ?>">
                        <i class="far fa-file-text"></i>Laporan</a>
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
                        <div class="noti-wrap">
                            <div class="noti__item js-item-menu">
                                <i class="zmdi zmdi-notifications"></i>
                                <span class="quantity">3</span>
                                <div class="notifi-dropdown js-dropdown">
                                    <div class="notifi__title">
                                        <p>You have 3 Notifications</p>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c1 img-cir img-40">
                                            <i class="zmdi zmdi-email-open"></i>
                                        </div>
                                        <div class="content">
                                            <p>You got a email notification</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c2 img-cir img-40">
                                            <i class="zmdi zmdi-account-box"></i>
                                        </div>
                                        <div class="content">
                                            <p>Your account has been blocked</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c3 img-cir img-40">
                                            <i class="zmdi zmdi-file-text"></i>
                                        </div>
                                        <div class="content">
                                            <p>You got a new file</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__footer">
                                        <a href="#">All notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Akun</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?php echo base_url("admin/login/logout"); ?>">
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