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
    <title>Data Buku</title>

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
                                <h2 class="title-1">Data Buku</h2>
                                <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#modal_tambah">
                                    <i class="zmdi zmdi-plus"></i>tambah data</button>
                            </div>
                            <div class="au-card">
                                <table id="tabel_buku" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Tahun Terbit</th>
                                            <th>Level</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_buku">
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

    <!-- Modal Tambah -->
    <div id="modal_tambah" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Buku</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form name="form_tambah" id="form_tambah" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tambah_judul">Judul</label>
                            <div class="controls">
                                <input name="tambah_judul" id="tambah_judul" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_penulis">Penulis</label>
                            <div class="controls">
                                <input name="tambah_penulis" id="tambah_penulis" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_penerbit">Penerbit</label>
                            <div class="controls">
                                <input name="tambah_penerbit" id="tambah_penerbit" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_tahun">Tahun Terbit</label>
                            <div class="controls">
                                <input name="tambah_tahun" id="tambah_tahun" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_level">Level</label>
                            <div class="controls">
                                <select name="tambah_level" id="tambah_level" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_file">File</label>
                            <div class="controls">
                                <input type="file" id="tambah_file" name="tambah_file" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-simpan">Simpan</button>
                        <button type="reset" data-dismiss="modal" class="btn btn-inverse btn-batal">Batal</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END Modal Tambah -->

    <!-- Modal Edit -->
    <div id="modal_edit" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Buku</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form name="form_edit" id="form_edit" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_judul">Judul</label>
                            <div class="controls">
                                <input name="edit_judul" id="edit_judul" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_penulis">Penulis</label>
                            <div class="controls">
                                <input name="edit_penulis" id="edit_penulis" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_penerbit">Penerbit</label>
                            <div class="controls">
                                <input name="edit_penerbit" id="edit_penerbit" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_tahun">Tahun Terbit</label>
                            <div class="controls">
                                <input name="edit_tahun" id="edit_tahun" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_level">Level</label>
                            <div class="controls">
                                <select name="edit_level" id="edit_level" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-simpan">Simpan</button>
                        <button type="reset" data-dismiss="modal" class="btn btn-inverse btn-batal">Batal</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END Modal Edit -->

    <!-- Modal Hapus -->
    <div class="modal fade" id="modal_hapus" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_hapus" name="form_hapus" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label><strong>Apakah anda yakin akan menghapus data buku yang dipilih?</strong></label>
                        <input type="text" name="hapus_id" id="hapus_id" class="form-control" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_hapus" class="btn btn-warning">Hapus</button>
                        <button type="reset" data-dismiss="modal" class="btn btn-inverse">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal Hapus -->

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
            $('#tabel_buku').DataTable();
        });

        $('#tabel_buku').DataTable({
            'ajax': {
                'url': "<?php echo base_url('admin/data_buku/ambil_semua') ?>",
                'method': "GET"
            },
            'columns': [{
                    'data': "judul_buku"
                },
                {
                    'data': "tahun_terbit"
                },
                {
                    'data': "level_buku"
                },
                {
                    'data': "id_buku",
                    render: function(data, type, row) {
                        return '<div class="btn-group dropleft">' +
                            '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  ' +
                            '<i class="icons-Pencil"></i>' +
                            '</button>' +
                            '<div style="background-color:aquamarine;" class="dropdown-menu">' +
                            '<a class="dropdown-item item_edit" href="javascript:void(0)" data-item="' + row.id_buku + '">Edit</a>' +
                            '<a class="dropdown-item item_hapus" href="javascript:void(0)" data-item="' + row.id_buku + '">Hapus</a>' +
                            '</div>' +
                            '</div>';
                    },
                    'width': "5%",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            responsive: true
        });

        $('form[name="form_tambah"]').validate({
            rules: {
                tambah_judul: {
                    required: true,
                    maxlength: 255
                },
                tambah_penulis: {
                    required: true,
                    maxlength: 155
                },
                tambah_penerbit: {
                    required: true,
                    maxlength: 155
                },
                tambah_tahun: {
                    required: true,
                    maxlength: 4,
                    digits: true
                },
                tambah_level: {
                    required: true
                },
                tambah_file: {
                    required: true
                }
            },
            lang: "id",
            submitHandler: function(form) {
                $('#modal_loading').modal('show');
                var fd = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url('admin/data_buku/tambah_buku') ?>",
                    type: "POST",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    data: fd,
                    success: function(response) {
                        if (response.status == 1) {
                            $("#modal_tambah").modal("hide");
                            $("#form_tambah").trigger("reset");
                            $('#modal_loading').modal('hide');
                            $('#tabel_buku').DataTable().ajax.reload();
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
                        } else {
                            $('#modal_loading').modal('hide');
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
            }
        })

        //ambil data untuk diedit
        $('#data_buku').on('click', '.item_edit', function() {
            $("#modal_loading").modal("show");
            $.ajax({
                url: "<?php echo base_url('admin/data_anggota/tampil_edit'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    edit_nisn: $(this).data('item')
                },
                success: function(data) {
                    $('#modal_loading').modal('hide');

                    $('#edit_nisn').val(data.nisn);
                    $('#edit_nama').val(data.nama_lengkap);
                    $('#edit_level').val(data.level);
                    $('#edit_jurusan').val(data.jurusan);
                    $('#edit_kelas').val(data.kelas);

                    $('#modal_edit').modal('show');
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
            })
        })

        //simpan edit data barang
        $('form[name="form_edit"]').validate({
            rules: {
                edit_nisn: {
                    required: true
                },
                edit_nama: {
                    required: true
                }
            },
            lang: "id",
            submitHandler: function(form) {
                $('#modal_loading').modal('show');
                $.ajax({
                    url: "<?php echo base_url('admin/data_anggota/simpan_edit') ?>",
                    type: "POST",
                    dataType: "JSON",
                    data: $(form).serialize(),
                    success: function(response) {

                        if (response.status == 1) {
                            $("#modal_tambah").modal("hide");
                            $("#form_tambah").trigger("reset");
                            $('#modal_loading').modal('hide');
                            $('#tabel_buku').DataTable().ajax.reload();
                            $.toast({
                                heading: "Sukses",
                                text: response.pesan,
                                position: 'bottom-left',
                                loader: true,
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3500,
                                stack: 6
                            });
                        } else {
                            Swal.fire({
                                title: "Yoyyysss",
                                text: response.pesan,
                                type: "error",
                                footer: "Harap hubungi developer untuk penanganan error."
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
            }
        })

        $('#data_buku').on('click', '.item_hapus', function() {
            let id = $(this).data('item');
            $('#hapus_id').val(id);
            $('#modal_hapus').modal('show');
        })

        $('#btn_hapus').on('click', function() {
            $('#modal_loading').modal('show');
            $.ajax({
                url: "<?php echo base_url('admin/data_buku/hapus_buku') ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    hapus_id: document.getElementById("hapus_id").value
                },
                success: function(response) {
                    if (response.status == 1) {
                        $("#modal_hapus").modal("hide");
                        $('#modal_loading').modal('hide');
                        $('#tabel_buku').DataTable().ajax.reload();
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
                    } else {
                        $('#modal_loading').modal('hide');
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