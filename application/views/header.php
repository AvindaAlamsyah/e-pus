<header class="fixed-top header">
    <!-- top header -->
    <div class="top-header py-2 bg-white">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4 text-center text-lg-left">
                    <a class="text-color mr-3" href="callto:0351366099"><strong>TELP. </strong> (0351) 366 099</a>
                </div>
                <div class="col-lg-8 text-center text-lg-right">
                    <ul class="list-inline d-inline">
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="mailto:smkn1geger.kab.madiun@gmail.com"><i class="ti-email"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://smkn1geger.sch.id/" target="_blank"><i class="ti-world"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://www.facebook.com/smknsatugeger.smknsatugeger" target="_blank"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://www.youtube.com/channel/UCOmTnY_lzvhl1OWi4sU_oqw" target="_blank"><i class="ti-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar -->
    <div class="navigation w-100">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('asset/') ?>images/logo.png" alt="logo-digital-library-smk1-geger"></a>
                <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item @@about">
                            <a class="nav-link" href="<?php echo base_url('buku') ?>">Buku</a>
                        </li>
                        <li class="nav-item @@contact">
                            <a class="nav-link" href="<?php echo base_url('peraturan') ?>">Peraturan</a>
                        </li>
                        <li class="nav-item dropdown view">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hai, <?php echo $this->session->userdata('nama'); ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Akun</a>
                                <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>