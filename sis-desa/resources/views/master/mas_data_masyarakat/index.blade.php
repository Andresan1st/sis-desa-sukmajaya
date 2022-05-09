@extends('layout.layout')
    @section('content')
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    @endsection
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    {{-- <h2 class="content-header-title float-left mb-0">Index Jabatan</h2> --}}
                    <div class="breadcrumb-wrapper col-12">
                    </div>
                </div>
                <div class="col-12" style="margin-top: 30px">
                    <h2 class="content-header-title float-left mb-0">Data Masyarakat</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Kelola Data Masyarakat
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Add rows table -->
        <section id="add-row">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Kelola Masyarakat</h4>
                                    <button id="addRow"  class="btn btn-success btn-sm mb-2" onclick="window.location='{{ URL::route('mas_data_masyarakat_create'); }}'"><i data-feather="plus"></i>&nbsp; Add new row</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="indextable" class="datatables-ajax table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="10%">NIK</th>
                                                <th width="10%">Nama</th>
                                                <th width="10%">Tempat Lahir</th>
                                                <th width="10%">Tanggal Lahir</th>
                                                <th width="10%">Alamat</th>
                                                <th width="10%">Agama</th>
                                                <th width="10%">Kewarganegaraan</th>
                                                <th width="10%">Pekerjaan</th>
                                                <th width="10%">Status Kawin</th>
                                                <th width="10%">Nomor KK</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="10%">NIK</th>
                                                <th width="10%">Nama</th>
                                                <th width="10%">Tempat Lahir</th>
                                                <th width="10%">Tanggal Lahir</th>
                                                <th width="10%">Alamat</th>
                                                <th width="10%">Agama</th>
                                                <th width="10%">Kewarganegaraan</th>
                                                <th width="10%">Pekerjaan</th>
                                                <th width="10%">Status Kawin</th>
                                                <th width="10%">Nomor KK</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!--/ Add rows table -->
    </div>
@endsection

@section("script")          
    <script>
        $(document).ready(function() {
            console.log("ciok");
            var table = $('#indextable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '<?= url("mas_data_masyarakat/apimasyarakat") ?>',
                columns: [
                    {data: 'DT_RowIndex',orderable: false,searchable: false},
                    {data: 'nik', name: 'nik'},
                    {data: 'nama', name: 'nama'},
                    {data: 'tempat_lahir', name: 'tempat_lahir'},
                    {data: 'tgl_lahir', name: 'tgl_lahir'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'agama', name: 'agama'},
                    {data: 'kewarganegaraan', name: 'kewarganegaraan'},
                    {data: 'pekerjaan', name: 'pekerjaan'},
                    {data: 'status_kawin', name: 'status_kawin'},
                    {data: 'no_kk', name: 'no_kk'},
	                 {data: 'action', name: 'action', orderable: false, searchable: false},
                     
	            ]
            });
        });

    </script>
@endsection
