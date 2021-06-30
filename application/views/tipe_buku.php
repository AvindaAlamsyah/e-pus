<!DOCTYPE html>
<html lang="id">

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
    <link rel="shortcut icon" href="<?php echo base_url('asset/') ?>images/icon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('asset/') ?>images/icon.png" type="image/x-icon">

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
    <section class="section" style="padding-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- teacher category list -->
                    <h5>Tipe Buku</h5>
                    <ul class="nav nav-pills mb-1">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('buku'); ?>">Semua</a>
                        </li>
                        <?php foreach ($tipe as $tipe) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?php 
                            if ($this->uri->segment(3) == $tipe->id_book_type) {
                                echo "active";
                            } ?>" href="<?php echo base_url('buku/tipe/').$tipe->id_book_type; ?>"><?php echo $tipe->book_type_name; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                    <h5>Kategori Buku</h5>
                    <ul class="nav nav-pills mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('buku'); ?>">Semua</a>
                        </li>
                        <?php foreach ($kategori as $kategori) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('buku/kategori/').$kategori->id_kategori; ?>"><?php echo $kategori->nama_kategori; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center section-title justify-content-between">
                        <h2 class="mb-0 text-nowrap mr-3">Daftar Buku</h2>
                        <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-12">
                    <form action="<?php echo base_url('buku/tipe/').$this->uri->segment(3); ?>" name="form_edit" id="form_edit" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="text" name="search_buku" class="form-control" placeholder="Cari judul buku" autocomplete="off">
                            <div class="input-group-append">
                                <input class="btn btn-outline-secondary" value="cari" type="submit" name="submit">
                            </div>
                        </div>
                    </form>
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
                                <li class="list-inline-item"><i class="ti-star mr-1 text-color"></i>Lv. <?php echo $buku->level_buku; ?></li>
                                <li class="list-inline-item"><i class="ti-tag mr-1 text-color"></i><?php echo $buku->tipe_buku; ?></li>
                                <li class="list-inline-item"><i class="ti-archive mr-1 text-color"> Stok <?php echo $buku->stok; ?></i></li>
                            </ul>
                            <h5 class="card-title" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;"><?php echo $buku->judul_buku; ?></h5>
                            <buttton onclick="baca(<?php echo $buku->id_buku; ?>)" class="btn btn-primary btn-sm">Baca buku</buttton>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- /course list -->
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </section>
    <!-- /courses -->

    <!-- Modal List -->
    <div id="modal_list" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Kembalikan Buku</h4>
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

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>

</body>

</html>