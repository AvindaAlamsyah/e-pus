<!DOCTYPE html>
<html lang="id">

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
                            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">
                                Jangan Membaca Sampai Koma, Tapi Bacalah Sampai Titik.
                            </h1>
                            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">
                                Membaca itu ibarat menabung. Semakin dalam, semakin banyak hal berharga yang didapatkan.
                            </p>
                            <a href="<?php echo base_url('buku'); ?>" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Lihat buku</a>
                        </div>
                    </div>
                </div>
                <!-- slider item -->
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">
                                Pentingnya Membaca Buku Untuk Ilmu.
                            </h1>
                            <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".4">
                                Jangan sekali-kali kamu berhenti membaca hingga akhirnya kamu mengerti sejarah dunia.
                            </p>
                            <a href="<?php echo base_url('buku'); ?>" class="btn btn-primary" data-animation-out="fadeOutUp" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".7">Lihat buku</a>
                        </div>
                    </div>
                </div>
                <!-- slider item -->
                <div class="hero-slider-item">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="text-white" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">
                                Jarimu Terlalu Sibuk Mengetik, Sementara Matamu Terlalu Malas Membaca.
                            </h1>
                            <p class="text-muted mb-4" data-animation-out="fadeOutDown" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".4">
                                Orang yang rajin membaca bagaikan sedang melihat masa lalu dan masa depan. Hadir disetiap sejarah, dan hadir disetiap imajinasi orang-orang hebat.
                            </p>
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
                            <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"> <?php echo $tipe[0]->total; ?></i>
                            <h3 class="mb-xl-4 mb-lg-3 mb-4">E-Book</h3>
                            <p>
                                Buku yang tersedia dalam bentuk digital, terdiri dari teks, gambar atau keduanya, yang dapat dibaca pada layar komputer atau perangkat elektronik lainnya.
                            </p>
                        </div>
                        <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                            <i class="ti-microphone mb-xl-4 mb-lg-3 mb-4 feature-icon"> <?php echo $tipe[2]->total; ?></i>
                            <h3 class="mb-xl-4 mb-lg-3 mb-4">Audiobook</h3>
                            <p>
                                Rekaman dari teks buku atau bahan tertulis lainnya yang dibacakan oleh seseorang atau sekelompok orang.
                            </p>
                        </div>
                        <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                            <i class="ti-video-camera mb-xl-4 mb-lg-3 mb-4 feature-icon"> <?php echo $tipe[3]->total; ?></i>
                            <h3 class="mb-xl-4 mb-lg-3 mb-4">Videobook</h3>
                            <p>
                                Rekaman dari tiap kalimat ataupun versi singkat dari buku yang dapat dilihat dan didengar tanpa harus membaca tulisan dari sebuah buku yang dipublikasikan.
                            </p>
                        </div>
                        <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                            <i class="ti-link mb-xl-4 mb-lg-3 mb-4 feature-icon"> <?php echo $tipe[1]->total; ?></i>
                            <h3 class="mb-xl-4 mb-lg-3 mb-4">External Link</h3>
                            <p>
                                Sebuah tautan yang mengarah langsung ke website lainnya berisi e-book, jurnal, artikel atau materi pembelajaran apapun.
                            </p>
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
                        <img style="object-fit: contain; height: 300px;" class="card-img-top rounded-0" src="<?php echo base_url('asset/admin/buku/'.$buku->cover) ?>" alt="cover tidak ada">
                        <div class="card-body">
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item"><i class="ti-star mr-1 text-color"></i>Level <?php echo $buku->level_buku; ?></li>
                                <li class="list-inline-item"><i class="ti-tag mr-1 text-color"></i><?php echo $buku->tipe_buku; ?></li>
                            </ul>
                            <a href="course-single.html">
                                <h4 class="card-title">Judul</h4>
                            </a>
                            <p class="card-text mb-4" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;"><?php echo $buku->judul_buku; ?></p>
                            <buttton onclick="baca(<?php echo $buku->id_buku; ?>)" class="btn btn-primary btn-sm">Baca buku</buttton>
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
                    <h6 class="text-white font-secondary mb-0">Penasaran dengan buku lainnya?</h6>
                    <h2 class="section-title text-white">Yuk cari lebih banyak buku lagi</h2>
                    <a href="<?php echo base_url('buku'); ?>" class="btn btn-secondary">Lihat buku</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /cta -->

    <!-- Modal List -->
    <div id="modal_list" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>
                        Anda telah mencapai batas peminjaman buku, mohon kembalikan salah satu buku yang anda pinjam.
                    </p>
                    <table class="table">
                        <thead class="thead-light" style="text-align: center;">
                            <tr>
                                <th> Judul Buku</th>
                                <th> # </th>
                            </tr>
                        </thead>
                        <tbody id="list-buku">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END Modal List -->
    <!-- modal loading -->
    <div id="modal_loading" data-backdrop="static" data-keyboard="false" class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center"> <strong>Tunggu sebentar yaaa....</strong>
                    <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END modal loading -->

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
    <!-- filter -->
    <script src="<?php echo base_url('asset/') ?>plugins/filterizr/jquery.filterizr.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script src="<?php echo base_url('asset/') ?>plugins/google-map/gmap.js"></script>

    <!-- Main Script -->
    <script src="<?php echo base_url('asset/') ?>js/script.js"></script>

    <script>
    function baca(id) {
        $('#modal_loading').modal('show');
        $.ajax({
            url: "<?php echo base_url('buku/pinjam'); ?>",
            type: "post",
            dataType: "json",
            data: {
                id_buku: id
            },
            success: function(data) {
                $('#modal_loading').modal('hide');
                if (data.status == 1) {
                    window.location.href = data.data;
                } else if (data.status == 2) {
                    alert(data.data);
                } else {
                    var html = "";
                    $("#list-buku").empty();
                    for (let index = 0; index < data.data.length; index++) {
                        html += "<tr>" +
                            "<td>" + data.data[index].judul_buku + "</td>" +
                            "<td><button type='button' class='btn-warning' onclick='kembalikan(" + data.data[index].id_peminjaman + "," + id + ")'>Kembalikan</button></td>";

                    }
                    document.getElementById("list-buku").innerHTML += html;
                    $('#modal_list').modal('show');
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                $('#modal_loading').modal("hide");
                alert(errorMessage);
            }
        });
    }

    function kembalikan(id, buku_baru) {
        $('modal_loading').modal('show');
        $.ajax({
            url: "<?php echo base_url('buku/kembali'); ?>",
            type: "post",
            dataType: "json",
            data: {
                id_peminjaman: id,
                id_buku: buku_baru
            },
            success: function(data) {
                $('#modal_loading').modal('hide');
                $('#modal_list').modal('hide');
                if (data.status) {
                    window.location.href = data.data;
                } else {
                    alert(data.data);
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                $('#modal_loading').modal("hide");
                alert(errorMessage);
            }
        })
    }
    </script>

</body>

</html>