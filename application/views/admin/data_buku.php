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
                                <h2 class="title-1">Data Buku</h2>
                                <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" onclick="tampilFile()" data-target="#modal_tambah">
                                    <i class="zmdi zmdi-plus"></i>tambah data</button>
                            </div>
                            <div class="au-card">
                                <div class="table-responsive">
                                    <table id="tabel_buku" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Judul</th>
                                                <th>Tipe</th>
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
                            <label for="tambah_stok">Stok</label>
                            <div class="controls">
                                <input name="tambah_stok" id="tambah_stok" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_cover">Cover (.jpg/.jpeg/.png)</label>
                            <div class="controls">
                                <input name="tambah_cover" id="tambah_cover" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tambah_tipe">Tipe</label>
                            <div class="controls">
                                <select name="tambah_tipe" id="tambah_tipe" class="form-control">
                                    <option value="5">Buku</option>
                                    <option value="1">E-Book/PDF</option>
                                    <option value="6">E-Book&Audio</option>
                                    <option value="3">Audio</option>
                                    <option value="4">Video</option>
                                    <option value="2">Link</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group file" id="div-file-1">
                            <label for="tambah_file" id="label_tambah_file">File</label>
                            <div class="controls">
                                <input type="file" id="tambah_file" name="tambah_file" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group file" id="div-file-2">
                            <label for="tambah_file_2" id="label_tambah_file_2">File</label>
                            <div class="controls">
                                <input type="file" id="tambah_file_2" name="tambah_file_2" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group url">
                            <label for="tambah_link">URL</label>
                            <div class="controls">
                                <input type="url" id="tambah_link" name="tambah_link" class="form-control">
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
                        <input type="text" name="edit_id" id="edit_id" class="form-control" hidden>
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
                        <div class="form-group">
                            <label for="edit_stok">Stok</label>
                            <div class="controls">
                                <input name="edit_stok" id="edit_stok" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_cover">Cover (.jpg/.jpeg/.png)</label>
                            <div class="controls">
                                <input name="edit_cover" id="edit_cover" type="file" class="form-control">
                                <a id="edit_lihat_cover" href="#" class="btn">Lihat Cover</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_tipe">Tipe</label>
                            <div class="controls">
                                <select name="edit_tipe" id="edit_tipe" class="form-control">
                                    <option value="5">Buku</option>
                                    <option value="1">E-Book/PDF</option>
                                    <option value="6">E-Book&Audio</option>
                                    <option value="3">Audio</option>
                                    <option value="4">Video</option>
                                    <option value="2">Link</option>
                                </select>
                                <a id="edit_lihat_file" href="#" class="btn">Lihat File</a>
                                <a id="edit_lihat_file_2" href="#" class="btn" >Lihat File</a>
                            </div>
                        </div>
                        <div class="form-group file" id="div-e-file-1">
                            <label for="edit_file" id="label_edit_file">File</label>
                            <div class="controls">
                                <input type="file" id="edit_file" name="edit_file" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group file" id="div-e-file-2">
                            <label for="edit_file_2" id="label_edit_file_2">File</label>
                            <div class="controls">
                                <input type="file" id="edit_file_2" name="edit_file_2" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group url">
                            <label for="edit_link">URL</label>
                            <div class="controls">
                                <input type="url" id="edit_link" name="edit_link" class="form-control">
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
        var tipe_edit;
        $(document).ready(function() {
            $('#tabel_buku').DataTable();
        });

        function tampilFile() {
            let tipe = document.getElementById("tambah_tipe").value;
            let label = document.getElementById("label_tambah_file");
            let label2 = document.getElementById("label_tambah_file_2");
            
            if (tipe == 1) {
                $('#div-file-1').show();
                $('#div-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File E-book (.pdf)";
            } else if (tipe == 2){
                $('.url').show()
                $('.file').hide();
            } else if (tipe == 3) {
                $('#div-file-1').show();
                $('#div-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Audio (.mp3)";
            } else if (tipe == 4) {
                $('#div-file-1').show();
                $('#div-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Video (.mp4)";
            } else if (tipe == 5) {
                $('#div-file-1').show();
                $('#div-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Buku (.pdf)";
            } else if (tipe == 6) {
                $('#div-file-1').show();
                $('#div-file-2').show();
                $('.url').hide();
                label.innerHTML = "File E-book (.pdf)";
                label2.innerHTML = "File Audio (.mp3)";
            } 
        }

        
        $('#tabel_buku').DataTable({
            'ajax': {
                'url': "<?php echo base_url('admin/data_buku/ambil_semua2') ?>",
                'method': "GET"
            },
            'columns': [{
                    'data': "judul_buku"
                },
                {
                    'data': "tipe_buku"
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

        $('.url').hide();
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
                tambah_stok: {
                    required: true
                },
                tambah_cover: {
                    required: true
                },
                tambah_tipe: {
                    required: true
                },
                tambah_file: {
                    required: true
                }
            },
            lang: "id",
            submitHandler: function(form) {
                $('#modal_loading').modal('show');
                let fd = new FormData(form);
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

        $('#tambah_tipe').change(function() {
            let tipe = document.getElementById("tambah_tipe").value;
            let label = document.getElementById("label_tambah_file");
            let label2 = document.getElementById("label_tambah_file_2");
            
            if (tipe == 1) {
                $('#div-file-1').show();
                $('#div-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File E-book (.pdf)";
                $('#tambah_link').rules('remove');
                $('#tambah_file').rules('add', {
                    required: true
                });
            } else if (tipe == 2){
                $('.url').show()
                $('.file').hide();
                $('#tambah_file').rules('remove');
                $('#tambah_link').rules('add', {
                    required: true
                });
            } else if (tipe == 3) {
                $('#div-file-1').show();
                $('#div-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Audio (.mp3)";
                $('#tambah_link').rules('remove');
                $('#tambah_file').rules('add', {
                    required: true
                });
            } else if (tipe == 4) {
                $('#div-file-1').show();
                $('#div-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Video (.mp4)";
                $('#tambah_link').rules('remove');
                $('#tambah_file').rules('add', {
                    required: true
                });
            } else if (tipe == 5) {
                $('#div-file-1').show();
                $('#div-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Buku (.pdf)";
                $('#tambah_link').rules('remove');
                $('#tambah_file').rules('add', {
                    required: true
                });
            } else if (tipe == 6) {
                $('#div-file-1').show();
                $('#div-file-2').show();
                $('.url').hide();
                label.innerHTML = "File E-book (.pdf)";
                label2.innerHTML = "File Audio (.mp3)";
                $('#tambah_link').rules('remove');
                $('#tambah_file').rules('add', {
                    required: true
                });
                $('#tambah_file_2').rules('add', {
                    required: true
                });
            }
        })

        function tampilFileEdit(tipe, resource) {
            let label = document.getElementById("label_edit_file");
            let label2 = document.getElementById("label_edit_file_2");
            let labellihat = document.getElementById("edit_lihat_file");
            let labellihat2 = document.getElementById("edit_lihat_file_2");
            
            $('#edit_lihat_file').unbind('click');
            $('#edit_lihat_file_2').unbind('click');

            if (tipe == 1) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').hide();
                $('#edit_lihat_file').show();
                $('.url').hide();
                label.innerHTML = "File E-book (.pdf)";
                labellihat.innerHTML = "Lihat File E-book (.pdf)";
                $('#edit_lihat_file_2').hide();
                $('#edit_lihat_file').click(function(){
                    window.open('<?= base_url('asset/admin/buku/')?>'+resource[0].source, '_blank', 'fullscreen=yes'); 
                    return false;
                });
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
            } else if (tipe == 2){
                $('.url').show()
                $('.file').hide();
                $('#edit_lihat_file').hide();
                $('#edit_lihat_file_2').hide();
                $('#edit_link').val(resource[0].source);
                $('#edit_file').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_link').rules('add', {
                    required: true
                });
            } else if (tipe == 3) {
                $('#div-e-file-1').show();
                $('#div-file-2').hide();
                $('#edit_lihat_file').show();
                $('.url').hide();
                label.innerHTML = "File Audio (.mp3)";
                labellihat.innerHTML = "Lihat File Audio (.mp3)";
                $('#edit_lihat_file_2').hide();
                $('#edit_lihat_file').click(function(){
                    window.open('<?= base_url('asset/admin/buku/')?>'+resource[0].source, '_blank', 'fullscreen=yes'); 
                    return false;
                });
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
            } else if (tipe == 4) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').hide();
                $('#edit_lihat_file').show();
                $('.url').hide();
                label.innerHTML = "File Video (.mp4)";
                labellihat.innerHTML = "Lihat File Video (.mp4)";
                $('#edit_lihat_file_2').hide();
                $('#edit_lihat_file').click(function(){
                    window.open('<?= base_url('asset/admin/buku/')?>'+resource[0].source, '_blank', 'fullscreen=yes'); 
                    return false;
                });
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
            } else if (tipe == 5) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').hide();
                $('#edit_lihat_file').show();
                $('.url').hide();
                label.innerHTML = "File Buku (.pdf)";
                labellihat.innerHTML = "Lihat File Buku (.pdf)";
                $('#edit_lihat_file_2').hide();
                $('#edit_lihat_file').click(function(){
                    window.open('<?= base_url('asset/admin/buku/')?>'+resource[0].source, '_blank', 'fullscreen=yes'); 
                    return false;
                });
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
            } else if (tipe == 6) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').show();
                $('#edit_lihat_file').show();
                $('#edit_lihat_file_2').show();
                $('.url').hide();
                label.innerHTML = "File E-book (.pdf)";
                labellihat.innerHTML = "Lihat File E-book (.pdf)";
                label2.innerHTML = "File Audio (.mp3)";
                labellihat2.innerHTML = "Lihat File Audio (.mp3)";
                let res1 = (resource[0].resource_id_tipe == 1) ? resource[0].source: resource[1].source;
                let res2 = (resource[1].resource_id_tipe == 3) ? resource[1].source: resource[0].source;
                $('#edit_lihat_file').click(function(){
                    window.open('<?= base_url('asset/admin/buku/')?>'+res1, '_blank', 'fullscreen=yes'); 
                    return false;
                });
                $('#edit_lihat_file_2').click(function(){
                    window.open('<?= base_url('asset/admin/buku/')?>'+res2, '_blank', 'fullscreen=yes'); 
                    return false;
                });
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('add', {
                    required: true
                });
                $('#edit_file').rules('add', {
                    required: true
                });
            } 

            if (tipe_edit == 6) {
                $('#edit_file').rules('remove');
                $('#edit_file_2').rules('remove');
            } else if (tipe_edit == 1 || tipe_edit == 3 || tipe_edit == 4 || tipe_edit == 5) {
                $('#edit_file').rules('remove');
            }
        }

        $('#edit_tipe').change(function() {
            let tipe = document.getElementById("edit_tipe").value;
            let label = document.getElementById("label_edit_file");
            let label2 = document.getElementById("label_edit_file_2");
            
            if (tipe == 1) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File E-book (.pdf)";
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
            } else if (tipe == 2){
                $('.url').show()
                $('.file').hide();
                $('#edit_file').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_link').rules('add', {
                    required: true
                });
            } else if (tipe == 3) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Audio (.mp3)";
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
            } else if (tipe == 4) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Video (.mp4)";
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
            } else if (tipe == 5) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').hide();
                $('.url').hide();
                label.innerHTML = "File Buku (.pdf)";
                $('#edit_link').rules('remove');
                $('#edit_file_2').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
            } else if (tipe == 6) {
                $('#div-e-file-1').show();
                $('#div-e-file-2').show();
                $('.url').hide();
                label.innerHTML = "File E-book (.pdf)";
                label2.innerHTML = "File Audio (.mp3)";
                $('#edit_link').rules('remove');
                $('#edit_file').rules('add', {
                    required: true
                });
                $('#edit_file_2').rules('add', {
                    required: true
                });
            }
            
            if (tipe_edit == 6) {
                $('#edit_file').rules('remove');
                $('#edit_file_2').rules('remove');
            } else if (tipe_edit == 1 || tipe_edit == 3 || tipe_edit == 4 || tipe_edit == 5 && tipe_edit == tipe) {
                $('#edit_file').rules('remove');
            }
        })

        $('#data_buku').on('click', '.item_edit', function() {
            $("#modal_loading").modal("show");
            $.ajax({
                url: "<?php echo base_url('admin/data_buku/tampil_edit'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    edit_id: $(this).data('item')
                },
                success: function(data) {
                    $('#modal_loading').modal('hide');
                    let cover = data.cover;
                    tipe_edit = data.tipe;
                    
                    $('#edit_judul').val(data.judul_buku);
                    $('#edit_penerbit').val(data.penerbit);
                    $('#edit_tahun').val(data.tahun_terbit);
                    $('#edit_level').val(data.level_buku);
                    $('#edit_penulis').val(data.penulis);
                    $('#edit_id').val(data.id_buku);
                    $('#edit_stok').val(data.stok);
                    $('#edit_tipe').val(data.tipe);
                    $('#edit_lihat_cover').unbind('click');
                    $('#edit_lihat_cover').click(function(){
                        window.open('<?= base_url('asset/admin/buku/')?>'+cover, '_blank', 'fullscreen=yes'); 
                        return false;
                    });
                    tampilFileEdit(data.tipe, data.resource);
                    
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
                edit_id: {
                    required: true
                },
                edit_judul: {
                    required: true,
                    maxlength: 255
                },
                edit_penulis: {
                    required: true,
                    maxlength: 155
                },
                edit_penerbit: {
                    required: true,
                    maxlength: 155
                },
                edit_tahun: {
                    required: true,
                    maxlength: 4,
                    digits: true
                },
                edit_level: {
                    required: true
                },
                edit_tipe: {
                    required: true
                }
            },
            lang: "id",
            submitHandler: function(form) {
                $('#modal_loading').modal('show');
                let fd = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url('admin/data_buku/simpan_edit') ?>",
                    type: "POST",
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    data: fd,
                    success: function(response) {
                        
                        if (response.status == 1) {
                            $("#modal_edit").modal("hide");
                            $("#form_edit").trigger("reset");
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
                            Swal.fire({
                                title: "Hmmm.....",
                                text: response.pesan,
                                type: "error"
                            });
                            $('#modal_loading').modal('hide');
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