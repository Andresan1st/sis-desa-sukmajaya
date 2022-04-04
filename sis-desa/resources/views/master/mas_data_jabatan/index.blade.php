@extends('layout.layout')
    @section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Index Jabatan</h2>
                    <div class="breadcrumb-wrapper col-12">
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
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Data Jabatan</h4>
                            <button id="addRow"  class="btn btn-success btn-sm mb-2"><i data-feather="plus"></i>&nbsp; Add new row</button>
                        </div>
                        <div class="card-datatable">
                            <table id="indextable" class="datatables-ajax table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
            // var table = $('#indextable').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: '<?= url("mas_data_jabatan/apijabatan") ?>',
            //     columns: [
            //         {data: 'DT_RowIndex',orderable: false,searchable: false},
            //         {data: 'OP_Number', name: 'OP_Number'},
            //         {data: 'supplier.Sup_Name', name: 'supplier.Sup_Name'},
            //         {data: 'OP_Date', name: 'OP_Date'},
            //         {data: 'OP_Note', name: 'OP_Note'},
	        //          {data: 'action', name: 'action', orderable: false, searchable: false},
	        //     ]
            // });
        });

    </script>
@endsection
