@extends('layout.layout')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12" style="margin-top: 30px">
                    <h2 class="content-header-title float-left mb-0">Dashboard Statistic</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard Statistic
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Statistics card section -->
        <section id="statistics-card">
            <!-- Miscellaneous Charts -->
            <div class="row match-height">
                <!-- Bar Chart -Orders -->
                <!--/ Line Chart -->
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Statistics</h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text mr-25 mb-0"> Perbulan</p>
                            </div>
                        </div>
                        <div class="card-body statistics-body ">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i class="fa fa-solid  fa-inbox-in"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 id="surat_masuk" class="font-weight-bolder mb-0"></h4>
                                            <p class="card-text font-small-3 mb-0">SURAT MASUK</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i class="fa fa-solid  fa-inbox-out"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 id="surat_keluar" class="font-weight-bolder mb-0"></h4>
                                            <p class="card-text font-small-3 mb-0">SURAT KELUAR</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i class="fa fa-solid fa-money-bill"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 id="total_keuangan" class="font-weight-bolder mb-0"></h4>
                                            <p class="card-text font-small-3 mb-0">TOTAL KEUANGAN</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div
                                            class="card-header d-flex justify-content-center align-items-end bg-primary" style="text-align:center">
                                            <h4 class="card-title" style="color: #ecf0f1"
                                                style="margin-bottom: 70px; ">GRAFIK PENDUDUK</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pb-0">
                                                <canvas id="bar-multichart" height="250"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div
                                            class="card-header d-flex justify-content-center align-items-end bg-primary" style="text-align:center">
                                            <h4 class="card-title" style="color: #ecf0f1"
                                                style="margin-bottom: 70px; ">GRAFIK  SUARA</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pb-0">
                                                <canvas id="bar-multichart2" height="250"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div
                                            class="card-header d-flex justify-content-center align-items-end bg-primary" style="text-align:center">
                                            <h4 class="card-title" style="color: #ecf0f1"
                                                style="margin-bottom: 70px; ">GRAFIK DANA BANTUAN</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pb-0">
                                                <canvas id="bar-multichart3" height="250"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            var today = year + "-" + month + "-" + day;   
            //$("#status").select2({disabled:'readonly'});

            getdatadashboard();

            var multibarchart=[];
            $.ajax({
                url:  "<?php echo url('dashboard/statistikpenduduk') ?>",
                type: "get",
                dataType: "JSON",
                success: function (data) {
                    var ctxmultichart = document.getElementById('bar-multichart').getContext('2d');
                    var label =[];
                    var total=[];
                    var masyarakat = data.chart
                    for(var i in masyarakat){
                        total.push(masyarakat[i].total);
                        label.push(masyarakat[i].jenkel);
                    }
                    var data = {
                        labels: label,
                        datasets: [
                            {
                                label:  'STATISTIK',
                                data:total,
                                backgroundColor:'#74b9ff',
                                borderWidth: 1
                            }
                        ]
                    };

                    var myBarChart = new Chart(ctxmultichart, {
                        type: 'bar',
                        data: data,
                        options: {
                            barValueSpacing: 20,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                    }
                                }]
                            }
                        }
                    });
                   
                    refreshIntervalId = setInterval(function() {
                        statistik_penduduk()
                     
                    }, 60000); //request every x seconds
                }
            });
             
            $.ajax({
                url:  "<?php echo url('dashboard/statistiksuara') ?>",
                type: "get",
                dataType: "JSON",
                success: function (data) {
                    var ctxmultichart2 = document.getElementById('bar-multichart2').getContext('2d');
                    var label2 =[];
                    var total2=[];
                    var suara = data.chart
                    for(var i in suara){
                        total2.push(suara[i].total);
                        label2.push("TOTAL SUARA");
                    }
                    //console.log(total2,label2)
                    var data2 = {
                        labels: label2,
                        datasets: [
                            {
                                label:  'STATISTIK',
                                data:total2,
                                backgroundColor:'#00b894',
                                borderWidth: 1
                            }
                        ]
                    };

                    var myBarChart = new Chart(ctxmultichart2, {
                        type: 'bar',
                        data: data2,
                        options: {
                            barValueSpacing: 20,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                    }
                                }]
                            }
                        }
                    });
                    refreshIntervalId = setInterval(function() {
                        statistik_suara()
                    }, 60000); //request every x seconds
                }
            });

            $.ajax({
                url:  "<?php echo url('dashboard/statistikdanabantuan') ?>",
                type: "get",
                dataType: "JSON",
                success: function (data) {
                    var ctxmultichart3 = document.getElementById('bar-multichart3').getContext('2d');
                    var label3 =[];
                    var total3=[];
                    var danabantuan = data.danabantuan
                    for(var i in danabantuan){
                        console.log(danabantuan[i].total,"co");
                        total3.push(danabantuan[i].total);
                        label3.push("TOTAL DANA");
                    }
                    var data3 = {
                        labels: label3,
                        datasets: [
                            {
                                label:  'STATISTIK',
                                data:total3,
                                backgroundColor:'#74b9ff',
                                borderWidth: 1
                            }
                        ]
                    };

                    var myBarChart3 = new Chart(ctxmultichart3, {
                        type: 'bar',
                        data: data3,
                        options: {
                            barValueSpacing: 20,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                    }
                                }]
                            }
                        }
                    });
                   
                    refreshIntervalId = setInterval(function() {
                        statistik_dana()
                     
                    }, 60000); //request every x seconds
                }
            });
            
            setInterval(function() {
                getdatadashboard();
            }, 10000);   
        });
       

        function getdatadashboard(){
            $.ajax({
                url: "<?php echo url('dashboard/getdatadashboard'); ?>",
                type: "GET",
                dataType: "JSON",
                success: function(response) {
                        
                    var datadashboard = response.data;
                    $("#surat_masuk").text(response.totalsuratmasuk);
                     $("#surat_keluar").text(response.totalsuratkeluar);
                    $("#pegawai").text(response.totalpegawai);
                    $("#masyarakat").text(response.totalmasyarakat);
                    $("#total_keuangan").text(response.totalkeuangan);
                }
                    
            });
        }
       function statistik_penduduk(){
        var multibarchart=[];
            $.ajax({
                url:  "<?php echo url('dashboard/statistikpenduduk') ?>",
                type: "get",
                dataType: "JSON",
                success: function (data) {
                    console.log("masuk statistik penduduk")
                    $('#bar-multichart').replaceWith($('<canvas id="bar-multichart" height="250"></canvas>'));
                    var newctxmultichart = document.getElementById('bar-multichart').getContext('2d');
                    var label =[];
                    var total=[];
                    var masyarakat = data.chart
                    for(var i in masyarakat){
                        total.push(masyarakat[i].total);
                        label.push(masyarakat[i].jenkel);
                    }
                    console.log(total,label);
                    var data = {
                        labels: label,
                        datasets: [
                            {
                                label:  'STATISTIK',
                                data:total,
                                backgroundColor:'#74b9ff',
                                borderWidth: 1
                            }
                        ]
                    };
                   
                    var myBarChart = new Chart(newctxmultichart, {
                        type: 'bar',
                        data: data,
                        options: {
                            barValueSpacing: 20,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                    }
                                }]
                            }
                        }
                    });
                    console.log(myBarChart);
                }
            });
       }
       function statistik_suara(){
        var multibarchart=[];
            $.ajax({
                url:  "<?php echo url('dashboard/statistiksuara') ?>",
                type: "get",
                dataType: "JSON",
                success: function (data) {
                    $('#bar-multichart2').replaceWith($('<canvas id="bar-multichart2" height="250"></canvas>'));
                    var ctxmultichart2 = document.getElementById('bar-multichart2').getContext('2d');
                    var label2 =[];
                    var total2=[];
                    var suara = data.chart
                    for(var i in suara){
                        total2.push(suara[i].total);
                        label2.push("TOTAL SUARA");
                    }
                    //console.log(total2,label2)
                    var data2 = {
                        labels: label2,
                        datasets: [
                            {
                                label:  'STATISTIK',
                                data:total2,
                                backgroundColor:'#00b894',
                                borderWidth: 1
                            }
                        ]
                    };

                    var myBarChart2 = new Chart(ctxmultichart2, {
                        type: 'bar',
                        data: data2,
                        options: {
                            barValueSpacing: 20,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                    }
                                }]
                            }
                        }
                    });
                }
            });
       }

       function statistik_dana(){
        var multibarchart=[];
            $.ajax({
                url:  "<?php echo url('dashboard/statistikdana') ?>",
                type: "get",
                dataType: "JSON",
                success: function (data) {
                    $('#bar-multichart3').replaceWith($('<canvas id="bar-multichart3" height="250"></canvas>'));
                    var ctxmultichart3 = document.getElementById('bar-multichart3').getContext('2d');
                    var label3 =[];
                    var total3=[];
                    var danabantuan = data.danabantuan
                    for(var i in danabantuan){
                        total3.push(danabantuan[i].total);
                        label3.push("TOTAL SUARA");
                    }
                    //console.log(total2,label2)
                    var data3 = {
                        labels: label3,
                        datasets: [
                            {
                                label:  'STATISTIK',
                                data:total3,
                                backgroundColor:'#00b894',
                                borderWidth: 1
                            }
                        ]
                    };

                    var myBarChart3 = new Chart(ctxmultichart3, {
                        type: 'bar',
                        data: data3,
                        options: {
                            barValueSpacing: 20,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        min: 0,
                                    }
                                }]
                            }
                        }
                    });
                }
            });
       }
    </script>
@endsection
