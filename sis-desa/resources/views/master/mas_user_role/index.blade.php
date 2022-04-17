@extends('layout.layout')
    @section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    {{-- <h2 class="content-header-title float-left mb-0">Index Jabatan</h2> --}}
                    <div class="breadcrumb-wrapper col-12">
                    </div>
                </div>
                <div class="col-12" style="margin-top: 30px">
                    <h2 class="content-header-title float-left mb-0">Data User Role</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Kelola Data User Role
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
                                    <h4 class="card-title">Kelola User Role</h4>
                                    <button id="addRow"  class="btn btn-success btn-sm mb-2" onclick="window.location='{{ URL::route('mas_data_userrole_create'); }}'"><i data-feather="plus"></i>&nbsp; Add new row</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="indextable" class="datatables-basic table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Nama pegawai</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Nama pegawai</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
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
                ajax: '<?= url("mas_data_userrole/apiuserrole") ?>',
                columns: [
                    {data: 'DT_RowIndex',orderable: false,searchable: false},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'nama', name: 'nama'},
                    {data: 'role', name: 'role'},
                    {data: 'status', name: 'status'},
	                 {data: 'action', name: 'action', orderable: false, searchable: false},
	            ]
            });
        });

    </script>
@endsection
