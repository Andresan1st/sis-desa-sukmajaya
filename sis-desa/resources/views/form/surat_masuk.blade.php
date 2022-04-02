@extends('layout.layout')

@section('style')
    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Surat Masuk</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Surat Masuk
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row match-height">
        <!-- Avg Sessions Chart Card starts -->
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div
                            class="col-sm-6 col-12 d-flex justify-content-between flex-column order-sm-1 order-2 mt-1 mt-sm-0">
                            <div class="mb-1 mb-sm-0">
                                <h2 class="font-weight-bolder mb-25">2.7K</h2>
                                <p class="card-text font-weight-bold mb-2">Avg Sessions</p>
                                <div class="font-medium-2">
                                    <span class="text-success mr-25">+5.2%</span>
                                    <span>vs last 7 days</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-6"><button type="button" class="btn btn-primary"
                                        style="width: 150px" data-toggle="modal" data-target="#large">Arsipkan</button>
                                </div>
                                <div class="col-sm-6 col-6"><button type="button" class="btn btn-info"
                                        style="width: 150px">Detail Arsip</button></div>
                            </div>
                        </div>
                        <div
                            class="col-sm-6 col-12 d-flex justify-content-between flex-column text-right order-sm-2 order-1">
                            <div class="dropdown chart-dropdown">
                                <button class="btn btn-sm border-0 dropdown-toggle p-50" type="button" id="dropdownItem5"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Last 7 Days
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem5">
                                    <a class="dropdown-item" href="javascript:void(0);">Seminggu</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Sebulan</a>
                                </div>
                            </div>
                            <div id="avg-sessions-chart"></div>
                        </div>
                    </div>
                    <hr />
                    <div class="row avg-sessions pt-50">
                        <div class="col-12 mb-2">
                            <p class="mb-50">FILE : 20kb</p>
                            <p class="mb-50">FREE : 1.8GB From 2GB</p>
                            <div class="progress progress-bar-primary" style="height: 6px">
                                <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="50"
                                    aria-valuemax="100" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="card card-user-timeline">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <i data-feather="list" class="user-timeline-title-icon"></i>
                        <h4 class="card-title">Surat Masuk Terakhir</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="timeline ml-50">
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <h6>12 Agustus 2020</h6>
                                <p>Perihal Surat</p>
                                <div class="media align-items-center">
                                    <img class="mr-1" src="../../../app-assets/images/icons/json.png"
                                        alt="data.json" height="23" />
                                    <h6 class="media-body mb-0">data.json</h6>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <h6>12 Agustus 2020</h6>
                                <p>Perihal Surat</p>
                                <div class="media align-items-center">
                                    <img class="mr-1" src="../../../app-assets/images/icons/json.png"
                                        alt="data.json" height="23" />
                                    <h6 class="media-body mb-0">data.json</h6>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <h6>12 Agustus 2020</h6>
                                <p>Perihal Surat</p>
                                <div class="media align-items-center">
                                    <img class="mr-1" src="../../../app-assets/images/icons/json.png"
                                        alt="data.json" height="23" />
                                    <h6 class="media-body mb-0">data.json</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Responsive Datatable</h4>
                    </div>
                    <div class="card-datatable">
                        <table class="dt-responsive table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Post</th>
                                    <th>City</th>
                                    <th>Date</th>
                                    <th>Salary</th>
                                    <th>Age</th>
                                    <th>Experience</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Post</th>
                                    <th>City</th>
                                    <th>Date</th>
                                    <th>Salary</th>
                                    <th>Age</th>
                                    <th>Experience</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Arsipkan Surat Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formadd">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Surat Masuk</label>
                                    <input type="text" class="form-control" name="nomor_surat_masuk" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="tanggal"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Perihal Surat</label>
                                    <input type="text" class="form-control" name="perihal_surat" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>File Lampiran <i class="text-muted">"boleh kosong"</i></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="lampiran[]" multiple>
                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>File Surat</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                        text/plain, application/pdf" name="file" required>
                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btnadd" value="Arsipkan!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/table-datatables-advanced.js') }}"></script>

    <script>
        $(window).on('load', function() {
            'use strict';

            var $avgSessionStrokeColor2 = '#ebf0f7';
            var $textHeadingColor = '#5e5873';
            var $white = '#fff';
            var $strokeColor = '#ebe9f1';

            var $avgSessionsChart = document.querySelector('#avg-sessions-chart');

            var avgSessionsChartOptions;

            var avgSessionsChart;

            var isRtl = $('html').attr('data-textdirection') === 'rtl';

            // Average Session Chart
            // ----------------------------------
            avgSessionsChartOptions = {
                chart: {
                    type: 'bar',
                    height: 200,
                    sparkline: {
                        enabled: true
                    },
                    toolbar: {
                        show: false
                    }
                },
                states: {
                    hover: {
                        filter: 'none'
                    }
                },
                colors: [
                    $avgSessionStrokeColor2,
                    $avgSessionStrokeColor2,
                    window.colors.solid.primary,
                    $avgSessionStrokeColor2,
                    $avgSessionStrokeColor2,
                    $avgSessionStrokeColor2
                ],
                series: [{
                    name: 'Sessions',
                    data: [75, 125, 225, 175, 125, 75, 25]
                }],
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true,
                        endingShape: 'rounded'
                    }
                },
                tooltip: {
                    x: {
                        show: false
                    }
                },
                xaxis: {
                    type: 'numeric'
                }
            };
            avgSessionsChart = new ApexCharts($avgSessionsChart, avgSessionsChartOptions);
            avgSessionsChart.render();
        });
    </script>

    {{-- store surat --}}
    <script>
        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('surat_masuk.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnadd').attr('disabled', 'disabled');
                    $('#btnadd').val('Proses Arsip');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#large').modal('hide');
                        $("#formadd")[0].reset();
                        // var oTable = $('#example').dataTable();
                        // oTable.fnDraw(false);
                        $('#btnadd').val('Arsipkan!');
                        $('#btnadd').attr('disabled', false);
                        toastr['success']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnadd').val('Arsipkan!');
                        $('#btnadd').attr('disabled', false);
                        toastr['error']('👋'+ response.message, 'Error!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                        $('#errList').html("");
                        $('#errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#errList').append('<div>' + err_values + '</div>');
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
