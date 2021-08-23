<header class="fixed-top header">
    <!-- navbar -->
    <div class="navigation w-100">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('asset/') ?>images/logo-putih-full.png" alt="logo-digital-library-smkn1-geger"></a>
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
                                <a class="dropdown-item" href="<?php echo base_url('akun'); ?>">Akun</a>
                                <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>