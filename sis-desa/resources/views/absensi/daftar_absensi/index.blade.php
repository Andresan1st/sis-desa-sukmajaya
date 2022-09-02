@extends('layout.layout')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-xl-12">
                <div id="errList" class="text-capitalize"></div>
            </div>
            <div class="col-12" style="margin-top: 30px">
                <h2 class="content-header-title float-left mb-0">Daftar Absensi</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item ">Daftar Absensi
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section class="invoice-add-wrapper">
            <div class="row invoice-add">
                <!-- Invoice Add Left starts -->
                <div class="col-xl-8 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-body" >
                            <img src="{{ asset('ss2.png') }}" style="max-width: 100%" alt="">
                        </div>
                        <hr class="invoice-spacing" style="padding: 0; margin: 0;"/>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="card card-congratulation-medal">
                        <div class="card-body">
                            <h5>Congratulations 🎉</h5>
                            <p class="card-text font-small-3">Pegawai teladan hari ini</p>
                            <h3 class="mb-75 mt-2 pt-50">
                                <a href="javascript:void(0);">_</a>
                            </h3>
                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light btn-sm">View Detail</button><br>
                            <button type="button" style="margin-top: 20px" class="btn btn-primary waves-effect waves-float waves-light btn-sm">Laporan Absensi Keseluruhan</button>
                            <img src="{{ asset('app-assets/images/illustration/badge.svg') }}" class="congratulation-medal" alt="Medal Pic">
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card invoice-preview-card">
                        <div class="table-responsive" style="padding: 5px">
                            <table id="indextable" class="datatables-basic table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Pegawai</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Pegawai</th>
                                        <th>Masuk</th>
                                        <th>Pulang</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
        </section>
    </div>
</div>
@endsection

@section('script')
<script>
        $(document).ready(function() {
            var table = $('#indextable').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: "/mas_data_absensi/list_absensi",
                columns: [{
                        "width":10,
                        "data": null,
                        "sortable": false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jam_masuk',
                        name: 'jam_masuk'
                    },
                    {
                        data: 'jam_keluar',
                        name: 'jam_keluar'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
</script>
@endsection