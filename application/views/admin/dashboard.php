
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Title Page-->
    <title>Dasbor | Digital Library</title>

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
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="totalAnggotaAktif">99999</h2>
                                                <span>anggota aktif</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="anggotaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-collection-bookmark"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="totalBuku">99999</h2>
                                                <span>buku</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="bukuChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="totalPeminjamanAktif">99999</h2>
                                                <span>peminjaman aktif</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="peminjamanAktifChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2 id="totalPeminjaman">99999</h2>
                                                <span>total peminjaman</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="totalPeminjamanChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">Grafik Peminjaman</h3>
                                        <div class="recent-report__chart">
                                            <canvas id="grafikPeminjamanchart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">Grafik Persentase (%)</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-12">
                                                <div class="percent-chart">
                                                    <canvas id="percentPeminjamanchart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Peminjaman Terbaru</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Judul</th>
                                            <th class="text-right">Tanggal Pinjam</th>
                                            <th class="text-right">Batas Kembali</th>
                                            <th class="text-right">Metode</th>
                                        </tr>
                                        </thead>
                                        <tbody id="peminjaman_terakhir_tabel_body">
                                            <tr>
                                                <td colspan="6" class="text-center">No Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <h2 class="title-1 m-b-25">Top peminjam</h2>
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody id="top_peminjam_tabel_body">
                                                    <tr>
                                                        <td class="text-center">No Data</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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

    <!-- Main JS-->
    <script src="<?php echo base_url('asset/admin/'); ?>js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            try {
                getAnggotaStats();
                getBukuStats();
                getPeminjamanAktifStats();
                getTotalPeminjamanStats();
                getGrafikPeminjamanStats();
                getPersentasePeminjamanStats();
                get_peminjaman_terakhir();
                get_top_peminjam();
            } catch (error) {
                console.log(error);
            }
        });
        //AnggotaChart
        function getAnggotaStats() {
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/stats_anggota');?>",
                dataType:'json',
                method: "GET",
                success: function(response) {
                    if (!response.status) return; 
                    if (!response.data.jumlah.length) return;

                    document.getElementById("totalAnggotaAktif").innerHTML=response.total;
                    let ctx = document.getElementById("anggotaChart");
                    if (ctx) {
                        ctx.height = 130;
                        let myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: response.data.kelas,
                                type: 'bar',
                                datasets: [{
                                    data: response.data.jumlah,
                                    label: 'jumlah',
                                    backgroundColor: 'rgba(255,255,255,.1)',
                                    borderColor: 'rgba(255,255,255,.55)',
                                },]
                            },
                            options: {
                                maintainAspectRatio: false,
                                legend: {
                                    display: false
                                },
                                layout: {
                                    padding: {
                                    left: 0,
                                    right: 0,
                                    top: 0,
                                    bottom: 0
                                    }
                                },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        gridLines: {
                                            color: 'transparent',
                                            zeroLineColor: 'transparent'
                                        },
                                        ticks: {
                                            fontSize: 2,
                                            fontColor: 'transparent'
                                        }
                                    }],
                                    yAxes: [{
                                        display: false,
                                        ticks: {
                                            display: false,
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                title: {
                                    display: false,
                                }
                            }
                        });
                    }
                }
            })
        }

        //BukuChart
        function getBukuStats() {
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/stats_buku');?>",
                dataType:'json',
                method: "GET",
                success: function(response) {
                    if (!response.status) return; 
                    if (!response.data.jumlah.length) return;
                    
                    document.getElementById("totalBuku").innerHTML=response.total;
                    let ctx = document.getElementById("bukuChart");
                    if (ctx) {
                        ctx.height = 130;
                        let myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: response.data.tipe_name,
                                type: 'bar',
                                datasets: [{
                                    data: response.data.jumlah,
                                    label: 'jumlah',
                                    backgroundColor: 'rgba(255,255,255,.1)',
                                    borderColor: 'rgba(255,255,255,.55)',
                                },]
                            },
                            options: {
                                maintainAspectRatio: false,
                                legend: {
                                    display: false
                                },
                                layout: {
                                    padding: {
                                    left: 0,
                                    right: 0,
                                    top: 0,
                                    bottom: 0
                                    }
                                },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        gridLines: {
                                            color: 'transparent',
                                            zeroLineColor: 'transparent'
                                        },
                                        ticks: {
                                            fontSize: 2,
                                            fontColor: 'transparent'
                                        }
                                    }],
                                    yAxes: [{
                                        display: false,
                                        ticks: {
                                            display: false,
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                title: {
                                    display: false,
                                }
                            }
                        });
                    }
                }
            })
        }

        //PeminjamanAktifChart
        function getPeminjamanAktifStats() {
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/stats_peminjaman_aktif');?>",
                dataType:'json',
                method: "GET",
                success: function(response) {
                    if (!response.status) return; 
                    if (!response.data.jumlah.length) return;

                    document.getElementById("totalPeminjamanAktif").innerHTML=response.total;
                    let ctx = document.getElementById("peminjamanAktifChart");
                    if (ctx) {
                        ctx.height = 130;
                        let myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: response.data.tipe_name,
                                type: 'bar',
                                datasets: [{
                                    data: response.data.jumlah,
                                    label: 'jumlah',
                                    backgroundColor: 'rgba(255,255,255,.1)',
                                    borderColor: 'rgba(255,255,255,.55)',
                                },]
                            },
                            options: {
                                maintainAspectRatio: false,
                                legend: {
                                    display: false
                                },
                                layout: {
                                    padding: {
                                    left: 0,
                                    right: 0,
                                    top: 0,
                                    bottom: 0
                                    }
                                },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        gridLines: {
                                            color: 'transparent',
                                            zeroLineColor: 'transparent'
                                        },
                                        ticks: {
                                            fontSize: 2,
                                            fontColor: 'transparent'
                                        }
                                    }],
                                    yAxes: [{
                                        display: false,
                                        ticks: {
                                            display: false,
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                title: {
                                    display: false,
                                }
                            }
                        });
                    }
                }
            })
        }

        //TotalPeminjamanChart
        function getTotalPeminjamanStats() {
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/stats_seluruh_peminjaman');?>",
                dataType:'json',
                method: "GET",
                success: function(response) {
                    if (!response.status) return; 
                    if (!response.data.jumlah.length) return;
                    
                    document.getElementById("totalPeminjaman").innerHTML=response.total;
                    let ctx = document.getElementById("totalPeminjamanChart");
                    if (ctx) {
                        ctx.height = 130;
                        let myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: response.data.tanggal,
                                type: 'line',
                                datasets: [{
                                    data: response.data.jumlah,
                                    label: 'Jumlah',
                                    backgroundColor: 'transparent',
                                    borderColor: 'rgba(255,255,255,.55)',
                                },]
                            },
                            options: {
                                maintainAspectRatio: false,
                                legend: {
                                    display: false
                                },
                                responsive: true,
                                tooltips: {
                                    mode: 'index',
                                    titleFontSize: 12,
                                    titleFontColor: '#000',
                                    bodyFontColor: '#000',
                                    backgroundColor: '#fff',
                                    titleFontFamily: 'Montserrat',
                                    bodyFontFamily: 'Montserrat',
                                    cornerRadius: 3,
                                    intersect: false,
                                },
                                scales: {
                                    xAxes: [{
                                        gridLines: {
                                            color: 'transparent',
                                            zeroLineColor: 'transparent'
                                        },
                                        ticks: {
                                            fontSize: 2,
                                            fontColor: 'transparent'
                                        }
                                    }],
                                    yAxes: [{
                                        display: false,
                                        ticks: {
                                            display: false,
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                title: {
                                    display: false,
                                },
                                elements: {
                                    line: {
                                        borderWidth: 1
                                    },
                                    point: {
                                        radius: 4,
                                        hitRadius: 10,
                                        hoverRadius: 4
                                    }
                                }
                            }
                        });
                    }
                }
            })
        }

        //GrafikPeminjamanChart
        function getGrafikPeminjamanStats() {
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/stats_peminjaman_by_tipe');?>",
                dataType:'json',
                method: "GET",
                success: function(response) {
                    if (!response.status) return; 
                    if (!response.data.tanggal.length) return;
                    
                    const brand = [
                        'rgba(185, 102, 3, 0.5)',
                        'rgba(184, 208, 8, 0.7)',
                        'rgba(79, 248, 148, 0.6)',
                        'rgba(207, 8, 72, 0.8)',
                        'rgba(164, 251, 81, 0.9)',
                        'rgba(30, 6, 118, 0.9)',
                    ]

                    var elements = response.data.tanggal.lenght
                    data = Object.entries(response.data)
                    data.shift()
                    dataset = []
                    max = 0
                    
                    for (let i = 0; i < data.length; i++) {
                        dataset[i] = {
                            label: data[i][0],
                            backgroundColor: brand[i],
                            pointColor: brand[i],
                            StrokeColor: brand[i],
                            borderColor: 'transparent',
                            pointHoverBackgroundColor: brand[i],
                            borderWidth: 0,
                            data: data[i][1]
                        };
                        max = (max < Math.max( ...data[i][1] )) ?  Math.max( ...data[i][1] ) : max
                    }
                    
                    var ctx = document.getElementById("grafikPeminjamanchart");
                    if (ctx) {
                        ctx.height = 329;
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                            labels: response.data.tanggal,
                            datasets: dataset
                            },
                            options: {
                                maintainAspectRatio: true,
                                legend: {
                                    display: true
                                },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        gridLines: {
                                            drawOnChartArea: true,
                                            color: '#f2f2f2'
                                        },
                                        ticks: {
                                            fontFamily: "Poppins",
                                            fontSize: 12
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            maxTicksLimit: 5,
                                            stepSize: 50,
                                            max: max,
                                            fontFamily: "Poppins",
                                            fontSize: 12
                                        },
                                        gridLines: {
                                            display: true,
                                            color: '#f2f2f2'

                                        }
                                    }]
                                },
                                tooltips: {
                                    mode: 'index'
                                },
                                elements: {
                                    point: {
                                        radius: 0,
                                        hitRadius: 20,
                                        hoverRadius: 4,
                                        hoverBorderWidth: 3
                                    }
                                }

                            }
                        });
                    }
                }
            })
        }

        //PersentasePeminjamanChart
        function getPersentasePeminjamanStats() {
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/stats_persentase_seluruh_peminjaman');?>",
                dataType:'json',
                method: "GET",
                success: function(response) {
                    if (!response.status) return; 
                    if (!response.data.jumlah.length) return;
                    
                    // Percent Chart
                    var ctx = document.getElementById("percentPeminjamanchart");
                    if (ctx) {
                        ctx.height = 280;
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                datasets: [
                                    {
                                    label: "My First dataset",
                                    data: response.data.jumlah,
                                    backgroundColor: [
                                        'rgba(185, 102, 3, 0.5)',
                                        'rgba(184, 208, 8, 0.7)',
                                        'rgba(79, 248, 148, 0.6)',
                                        'rgba(207, 8, 72, 0.8)',
                                        'rgba(164, 251, 81, 0.9)',
                                        'rgba(30, 6, 118, 0.9)'
                                    ],
                                    hoverBackgroundColor: [
                                        'rgba(185, 102, 3, 0.5)',
                                        'rgba(184, 208, 8, 0.7)',
                                        'rgba(79, 248, 148, 0.6)',
                                        'rgba(207, 8, 72, 0.8)',
                                        'rgba(164, 251, 81, 0.9)',
                                        'rgba(30, 6, 118, 0.9)'
                                    ],
                                    borderWidth: [
                                        0, 0, 0, 0, 0, 0
                                    ],
                                    hoverBorderColor: [
                                        'transparent',
                                        'transparent',
                                        'transparent',
                                        'transparent',
                                        'transparent',
                                        'transparent'
                                    ]
                                    }
                                ],
                                labels: response.data.tipe_name
                            },
                            options: {
                                maintainAspectRatio: false,
                                responsive: true,
                                cutoutPercentage: 55,
                                animation: {
                                    animateScale: true,
                                    animateRotate: true
                                },
                                legend: {
                                    display: false
                                },
                                tooltips: {
                                    titleFontFamily: "Poppins",
                                    xPadding: 15,
                                    yPadding: 10,
                                    caretPadding: 0,
                                    bodyFontSize: 16
                                }
                            }
                        });
                    }
                }
            })
        }

        function get_peminjaman_terakhir() {
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/peminjaman_terakhir/8');?>",
                dataType:'json',
                method: "GET",
                success: function(response) {
                    if (!response.status) return;
                    if (!response.data.length) return;
                    const node = document.getElementById("peminjaman_terakhir_tabel_body");
                    while (node.hasChildNodes()) {
                        node.removeChild(node.lastChild);
                    }
                    let rowBody = ''
                    for (let i = 0; i < response.data.length; i++) {
                        rowBody += `
                            <tr>
                                <td>${response.data[i].nama}</td>
                                <td>${response.data[i].kelas}</td>
                                <td>${response.data[i].judul}</td>
                                <td class="text-right">${response.data[i].tanggal_pinjam}</td>
                                <td class="text-right">${response.data[i].batas_kembali}</td>
                                <td class="text-right">${response.data[i].metode.toUpperCase()}</td>
                            </tr>
                        `
                    }
                    node.innerHTML = rowBody
                }
            })
        }

        function get_top_peminjam() {
            $.ajax({
                url: "<?php echo base_url('admin/dashboard/top_peminjam/8');?>",
                dataType:'json',
                method: "GET",
                success: function(response) {
                    if (!response.status) return;
                    if (!response.data.length) return;
                    const node = document.getElementById("top_peminjam_tabel_body");
                    while (node.hasChildNodes()) {
                        node.removeChild(node.lastChild);
                    }
                    let rowBody = ''
                    for (let i = 0; i < response.data.length; i++) {
                        rowBody += `
                            <tr>
                                <td>${response.data[i].nama}</td>
                                <td class="text-right">${response.data[i].jumlah}</td>
                            </tr>
                        `
                    }
                    node.innerHTML = rowBody
                }
            })
        }
    </script>
</body>

</html>
<!-- end document-->
