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
    <title>Data Anggota | Digital Library</title>

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
                                <h2 class="title-1">Data Anggota</h2>
                                <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#modal_tambah">
                                    <i class="zmdi zmdi-plus"></i>tambah data</button>
                            </div>
                            <div class="au-card">
                                <table id="tabel_anggota" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_anggota">
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
                    <h4 class="modal-title" id="myModalLabel">Tambah Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form name="form_tambah" id="form_tambah" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tambah_barang">NISN</label>
                            <div class="controls">
                                <input name="tambah_nisn" id="tambah_nisn" type="text" class="form-control" placeholder="Nomor Induk Siswa Nasional">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_password">Password</label>
                            <div class="controls">
                                <input name="tambah_password" id="tambah_password" type="password" class="form-control">
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
                            <label for="tambah_nama">Nama Lengkap</label>
                            <div class="controls">
                                <input name="tambah_nama" id="tambah_nama" type="text" class="form-control" placeholder="Nama Lengkap Siswa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_kelas">Kelas</label>
                            <div class="controls">
                                <select name="tambah_kelas" id="tambah_kelas" class="form-control">
                                    <option>X</option>
                                    <option>XI</option>
                                    <option>XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_jurusan">Jurusan</label>
                            <div class="controls">
                                <select name="tambah_jurusan" id="tambah_jurusan" class="form-control">
                                    <option>Adm. Perkantoran</option>
                                    <option>Akuntansi</option>
                                    <option>Perbankan Syariah</option>
                                    <option>Teknik Komputer Jaringan</option>
                                    <option>Teknik Sepeda Motor</option>
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
    <!-- END Modal Tambah -->

    <!-- Modal Edit -->
    <div id="modal_edit" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form name="form_edit" id="form_edit" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <div class="controls">
                                <select name="edit_status" id="edit_status" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_barang">NISN</label>
                            <div class="controls">
                                <input name="edit_nisn" id="edit_nisn" type="text" class="form-control" placeholder="Nomor Induk Siswa Nasional">
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
                        <div class="form-group">
                            <label for="edit_nama">Nama Lengkap</label>
                            <div class="controls">
                                <input name="edit_nama" id="edit_nama" type="text" class="form-control" placeholder="Nama Lengkap Siswa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_kelas">Kelas</label>
                            <div class="controls">
                                <select name="edit_kelas" id="edit_kelas" class="form-control">
                                    <option>X</option>
                                    <option>XI</option>
                                    <option>XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_jurusan">Jurusan</label>
                            <div class="controls">
                                <select name="edit_jurusan" id="edit_jurusan" class="form-control">
                                    <option>Adm. Perkantoran</option>
                                    <option>Akuntansi</option>
                                    <option>Perbankan Syariah</option>
                                    <option>Teknik Komputer Jaringan</option>
                                    <option>Teknik Sepeda Motor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group file">
                            <label for="edit_ttd">Tanda Tangan</label>
                            <div class="controls">
                                <label class="switch switch-3d switch-success mr-3">
                                    <input id="ttd_status" name="ttd_status" type="checkbox" class="switch-input">
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                                <input type="file" id="edit_ttd" name="edit_ttd" class="form-control-file">
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_hapus" name="form_hapus" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label><strong>Apakah anda yakin akan menghapus data anggota yang dipilih?</strong></label>
                        <input type="text" name="hapus_nisn" id="hapus_nisn" class="form-control" hidden>
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

    <!-- Modal Reset Pass -->
    <div class="modal fade" id="modal_reset" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_reset" name="form_reset" type="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label><strong>Apakah anda yakin akan me-reset password dari anggota yang dipilih?</strong></label>
                        <input type="text" name="reset_id" id="reset_id" class="form-control" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_reset" class="btn btn-warning">Reset</button>
                        <button type="reset" data-dismiss="modal" class="btn btn-inverse">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Modal Reset Pass -->

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
        $('#edit_ttd').hide();
        document.getElementById('ttd_status').addEventListener('change', (e) => {
            if (e.target.checked) {
                $('#edit_ttd').show();
            } else {
                $('#edit_ttd').hide();
            }
        })

        $(document).ready(function() {
            $('#tabel_anggota').DataTable();
        });

        $('#tabel_anggota').DataTable({
            'ajax': {
                'url': "<?php echo base_url('admin/data_anggota/ambil_semua_anggota') ?>",
                'method': "GET"
            },
            'columns': [{
                    'data': "nisn"
                },
                {
                    'data': "nama_lengkap"
                },
                {
                    'data': "level"
                },
                {
                    'data': "status",
                    render: function(data, type, row) {
                        if (row.status == 1) {
                            return 'Aktif';
                        } else {
                            return 'Tidak Aktif';
                        }
                    }
                },
                {
                    'data': "nisn",
                    render: function(data, type, row) {
                        return '<div class="btn-group dropleft">' +
                            '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  ' +
                            '<i class="icons-Pencil"></i>' +
                            '</button>' +
                            '<div style="background-color:aquamarine;" class="dropdown-menu">' +
                            '<a class="dropdown-item item_detail" href="<?php echo base_url() ?>/admin/data_anggota/detail_anggota/' + row.nisn + '">Detail</a>' +
                            '<a class="dropdown-item item_edit" href="javascript:void(0)" data-item="' + row.nisn + '">Edit</a>' +
                            '<a class="dropdown-item item_reset" href="javascript:void(0)" data-item="' + row.nisn + '">Reset Password</a>' +
                            '<a class="dropdown-item item_hapus" href="javascript:void(0)" data-item="' + row.nisn + '">Hapus</a>' +
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
                tambah_nisn: {
                    required: true,
                    maxlength: 10,
                    minlength: 10
                },
                tambah_password: {
                    required: true
                },
                tambah_nama: {
                    required: true,
                    maxlength: 155
                },
                tambah_kelas: {
                    required: true
                },
                tambah_jurusan: {
                    required: true
                },
                tambah_level: {
                    required: true
                }
            },
            lang: "id",
            submitHandler: function(form) {
                $('#modal_loading').modal('show');
                $.ajax({
                    url: "<?php echo base_url('admin/data_anggota/tambah_anggota') ?>",
                    type: "POST",
                    dataType: "JSON",
                    data: $(form).serialize(),
                    success: function(response) {
                        $('#modal_loading').modal('hide');
                        if (response.status == 1) {
                            $("#modal_tambah").modal("hide");
                            $("#form_tambah").trigger("reset");
                            $('#tabel_anggota').DataTable().ajax.reload();
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
                            Swal.fire({
                                title: "Hmmm.....",
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

        $('#data_anggota').on('click', '.item_edit', function() {
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
                    $('#edit_status').val(data.status);

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

        $('form[name="form_edit"]').validate({
            rules: {
                edit_nisn: {
                    required: true,
                    maxlength: 10,
                    minlength: 10
                },
                edit_nama: {
                    required: true,
                    maxlength: 155
                },
                edit_kelas: {
                    required: true
                },
                edit_jurusan: {
                    required: true
                },
                edit_level: {
                    required: true
                },
                edit_status: {
                    required: true
                },
                edit_ttd: {
                    required: {
                        depends: function(element) {
                            return $("#ttd_status").is(":checked");
                        }
                    }
                }
            },
            lang: "id",
            submitHandler: function(form) {
                $('#modal_loading').modal('show');
                $.ajax({
                    url: "<?php echo base_url('admin/data_anggota/simpan_edit') ?>",
                    type: "POST",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    data: new FormData(form),
                    success: function(response) {
                        $('#modal_loading').modal('hide');
                        $('#form_edit').trigger('reset');
                        $('#edit_ttd').hide();
                        if (response.status == 1) {
                            $("#modal_edit").modal("hide");
                            $('#tabel_anggota').DataTable().ajax.reload();
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
                            Swal.fire({
                                title: "Hmmm.....",
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

        $('#data_anggota').on('click', '.item_hapus', function() {
            let id = $(this).data('item');
            $('#hapus_nisn').val(id);
            $('#modal_hapus').modal('show');
        })

        $('#btn_hapus').on('click', function() {
            $('#modal_loading').modal('show');
            $.ajax({
                url: "<?php echo base_url('admin/data_anggota/hapus_anggota') ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    hapus_nisn: document.getElementById("hapus_nisn").value
                },
                success: function(response) {
                    $('#modal_loading').modal('hide');
                    if (response.status == 1) {
                        $("#modal_hapus").modal("hide");
                        $('#tabel_anggota').DataTable().ajax.reload();
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

        $('#data_anggota').on('click', '.item_reset', function() {
            let id = $(this).data('item');
            $('#reset_id').val(id);
            $('#modal_reset').modal('show');
        })

        $('#btn_reset').on('click', function() {
            $('#modal_loading').modal('show');
            $.ajax({
                url: "<?php echo base_url('admin/data_anggota/reset_password') ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    reset_id: document.getElementById("reset_id").value
                },
                success: function(response) {
                    $('#modal_loading').modal('hide');
                    if (response.status == 1) {
                        $("#modal_reset").modal("hide");
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