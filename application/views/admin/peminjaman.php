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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- Header -->
        <?php $this->load->view('admin/header'); ?>
        <!-- End Header -->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap m-b-35">
                                <h2 class="title-1">Data Peminjaman Buku</h2>
                                <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" onclick="tampilFile()" data-target="#modal_tambah">
                                    <i class="zmdi zmdi-plus"></i>tambah data</button>
                            </div>
                            <div class="au-card">
                                <table id="tabel_peminjaman" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Judul</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Batas Kembali</th>
                                            <th>Metode</th>
                                            <th>Telat</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_peminjaman">
                                    </tbody>
                                </table>
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

    <!-- Modal pinjam -->
    <div class="modal fade" id="modal_pinjam" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pinjamkan Buku Fisik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_pinjam" name="form_pinjam" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label><strong>Apakah anda yakin akan meminjamkan buku yang dipilih?</strong></label>
                        <input type="text" name="pinjam_id" id="pinjam_id" class="form-control" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_pinjam" class="btn btn-warning">Ya</button>
                        <button type="reset" data-dismiss="modal" class="btn btn-inverse">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal pinjam -->

    <!-- Modal kembali -->
    <div class="modal fade" id="modal_kembali" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kembalikan Buku Fisik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_kembali" name="form_kembali" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label><strong>Apakah anda yakin akan mengembalikan buku yang dipilih?</strong></label>
                        <input type="text" name="kembali_id" id="kembali_id" class="form-control" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_kembali" class="btn btn-warning">Ya</button>
                        <button type="reset" data-dismiss="modal" class="btn btn-inverse">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal kembali -->

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

    </div>

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

    <script>
        $(document).ready(function() {
            $('#tabel_peminjaman').DataTable();
        });

        $('#tabel_peminjaman').DataTable({
            'ajax': {
                'url': "<?php echo base_url('admin/peminjaman/ambil_semua') ?>",
                'method': "GET"
            },
            'columns': [
                {
                    'data': "nama_lengkap"
                },
                {
                    'data': "kelas"
                },
                {
                    'data': "judul_buku"
                },
                {
                    'data': "tanggal_pinjam"
                },
                {
                    'data': "batas_tanggal_kembali"
                },
                {
                    'data': "metode"
                },
                {
                    'data': "telat",
                    'render': function(data, type, row) {
                        if(row.telat == 'tidak') {
                            return '<span class="badge badge-sm badge-info " href="javascript:void(0)">tidak</span>'
                        }
                        return '<span class="badge badge-sm badge-danger " href="javascript:void(0)">'+row.telat+'</span>'
                    }
                },
                {
                    'data': "id_peminjaman",
                    'render': function(data, type, row) {
                        
                        if(row.metode == 'online') {
                            return '<a class="btn btn-sm btn-warning item_pinjam" href="javascript:void(0)" data-item="' + row.id_peminjaman + '">Pinjam</a>'
                        } else if (row.metode == 'offline') {
                            return '<a class="btn btn-sm btn-success item_kembali" href="javascript:void(0)" data-item="' + row.id_peminjaman + '">Kembali</a>'
                        }
                        
                    },
                    'width': "5%",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            responsive: true
        });

        $('#data_peminjaman').on('click', '.item_pinjam', function() {
            let id = $(this).data('item');
            $('#pinjam_id').val(id);
            $('#modal_pinjam').modal('show');
        })

        $('#btn_pinjam').on('click', function() {
            $('#modal_loading').modal('show');
            
            $.ajax({
                url: "<?php echo base_url('admin/peminjaman/pinjam') ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    id_peminjaman: document.getElementById("pinjam_id").value
                },
                success: function(response) {
                    $('#modal_loading').modal('hide');
                    if (response.status == 1) {
                        $('#tabel_peminjaman').DataTable().ajax.reload();
                        $.toast({
                            heading: "Sukses",
                            text: response.pesan,
                            position: 'top-right',
                            loader: true,
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                        $('#modal_pinjam').modal('hide');

                    } else {
                        Swal.fire({
                            title: "Hmmmm.....",
                            text: response.pesan,
                            type: "error"
                        });
                    }

                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    $('#modal_loading').modal("hide");
                    Swal.fire({
                        title: "Oops...",
                        text: errorMessage,
                        type: "error",
                        footer: "Harap hubungi developer untuk penanganan error."
                    });
                }
            });
        })

        

        $('#data_peminjaman').on('click', '.item_kembali', function() {
            let id = $(this).data('item');
            $('#kembali_id').val(id);
            $('#modal_kembali').modal('show');
        })

        $('#btn_kembali').on('click', function() {
            $('#modal_loading').modal('show');
            
            $.ajax({
                url: "<?php echo base_url('admin/peminjaman/kembali') ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    id_peminjaman: document.getElementById("kembali_id").value
                },
                success: function(response) {
                    $('#modal_loading').modal('hide');
                    if (response.status == 1) {
                        $('#tabel_peminjaman').DataTable().ajax.reload();
                        $.toast({
                            heading: "Sukses",
                            text: response.pesan,
                            position: 'top-right',
                            loader: true,
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 3500,
                            stack: 6
                        });
                        $('#modal_kembali').modal('hide');
                    } else {
                        Swal.fire({
                            title: "Hmmmm.....",
                            text: response.pesan,
                            type: "error"
                        });
                    }

                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    $('#modal_loading').modal("hide");
                    Swal.fire({
                        title: "Oops...",
                        text: errorMessage,
                        type: "error",
                        footer: "Harap hubungi developer untuk penanganan error."
                    });
                }
            });
        })
    </script>

</body>

</html>
<!-- end document-->