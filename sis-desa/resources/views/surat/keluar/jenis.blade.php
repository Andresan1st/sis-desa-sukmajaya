@extends('layout.layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-invoice.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">

{{-- summernote --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<style>
    *{
        font-family: 'Times New Roman', Times, serif;
    }
</style>
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-xl-12">
                <div id="errList" class="text-capitalize"></div>
            </div>
            <div class="col-12" style="margin-top: 30px">
                <h2 class="content-header-title float-left mb-0">SURAT KELUAR</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Jenis Surat
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
                <div class="col-xl-9 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        
                        <!-- Header ends -->
                        <div class="card-body row" >
                            <div class="logo-wrapper col-md-2" style="padding: 0; margin: 0; ">
                                <img src="{{asset('logo-desa.png')}}" style="margin-top: 10px; width: 170px" alt="">
                            </div>
                            <div class="col-md-9" style="padding: 0;margin: 0; text-align: center; margin-top: 20px;">
                                <h2 style="font-size: 36px; margin-bottom: 0; font-family: 'Times New Roman', Times, serif">PEMERINTAH KABUPATEN BEKASI</h2>
                                <h2 style="font-size: 36px; margin-bottom: 0; font-family: 'Times New Roman', Times, serif">KECAMATAN KARANGBAHAGIA</h2>
                                <h1 style="font-size: 38px; font-weight: 900;font-family: 'Times New Roman', Times, serif; margin-bottom: 0;">DESA SUKARAYA</h1>
                                <p>Jl. Raya Pilar ??? Sukatani, Sukamantri Bekasi 17535</p>
                            </div>
                        </div>
                        <hr class="invoice-spacing" style="padding: 0; margin: 0;"/>

                        <!-- Address and Contact starts -->
                        <div class="card-body invoice-padding pt-0">
                            <div class="row row-bill-to invoice-spacing">
                                <div class="col-xl-12" style="text-align: center">
                                    <u><h3>JENIS SURAT KETERANGAN</h3></u>
                                    <i>Manajemen Jenis dan Format surat keluar</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12" style="font-size: 17px">
                            <div class="card-body">
                                <button class="btn btn-info" data-toggle="modal" data-target="#modaladd" style="margin-bottom: 10px"> <i class="fa fa-plus"></i> Jenis Surat Baru..</button>
                                <div class="card-datatable table-responsive">
                                    <table id="indextable" class="datatables-basic table" style="font-size: 12px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>No. Surat</th>
                                                <th>Bagan</th>
                                                <th>Format</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-uppercase">
                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>No. Surat</th>
                                                <th>Bagan</th>
                                                <th>Format</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        

                        <hr class="invoice-spacing mt-0" />
                    </div>
                </div>
                <!-- Invoice Add Left ends -->

                <!-- Invoice Add Right starts -->
                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <a href="{{route('page.surat_keluar')}}"  class="btn btn-outline-primary btn-block mb-75">BUAT SURAT</a>
                            <a href="{{route('database.surat_keluar')}}" class="btn btn-outline-primary btn-block mb-75">DATABASE SURAT</a>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div style="text-align: justify; ">
                                <code style="text-primary">Manajemen Jenis & Format Surat Keluar</code>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <button href="#" class="btn btn-primary btn-block mb-75" disabled>Jenis</button>
                                </div>
                                <div class="col-md-6 col-6">
                                    <a href="{{route('page.format_surat')}}" class="btn btn-outline-primary btn-block mb-75">Format</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice Add Right ends -->
            </div>
            <!-- /Add New Customer Sidebar -->
        </section>
    </div>
</div>
{{-- modal --}}
<div class="modal fade text-left" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Jenis Surat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formadd">@csrf
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <input type="text" class="form-control text-uppercase" name="jenis_surat_name" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nomor Surat</label>
                                    <input type="text" class="form-control" name="nomor" placeholder="474.2" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bagan Surat</label>
                                    <input type="text" class="form-control text-uppercase" name="bagan" placeholder="KESRA" required>
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

    <div class="modal fade text-left" id="modaldel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red">
                    <h4 class="modal-title " style="color: white" id="myModalLabel17">Delete Doccument</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formdel">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" class="form-control">
                                    <code>Doccument ini akan dihapus dari dserver / direktori utama beserta dengan isi seluruh surat keluar yang ada didalamnya</code>
                                    <hr><p>Anda yakin tetap ingin menghapus jenis doccument ini ?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" id="btndel" value="Ya Hapus!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Jenis Surat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formedit">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <input type="text" class="form-control" id="jenis_surat_name" name="jenis_surat_name" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nomor Surat</label>
                                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="474.2" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bagan Surat</label>
                                    <input type="text" class="form-control" id="bagan" name="bagan" placeholder="KESRA" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btnedit" value="Arsipkan!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script> --}}
    <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeatercontent.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/app-invoice.js')}}"></script>

    <script>
        
        $('#modaldel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

        $('#modaledit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var jenis_surat_name = button.data('jenis_surat_name')
            var nomor = button.data('nomor')
            var bagan = button.data('bagan')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #jenis_surat_name').val(jenis_surat_name);
            modal.find('.modal-body #nomor').val(nomor);
            modal.find('.modal-body #bagan').val(bagan);
        })
        $(document).ready(function() {
            var table = $('#indextable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('page.jenis_surat')}}",
                columns: [
                   {
                       "data" : "id",
                       render : function(data, type, row, meta){
                           return meta.row + meta.settings._iDisplayStart + 1;
                       }
                   },
                   {
                       data : 'jenis_surat_name',
                       name : 'jenis_surat_name'
                   },
                   {
                       data : 'nomor',
                       name : 'nomor'
                   },
                   {
                       data : 'bagan',
                       name : 'bagan'
                   },
                   {
                       data : 'format',
                       name : 'format'
                   },
                   {
                       data : 'action',
                       name : 'action'
                   }
	            ]
            });
        });

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.jenis_surat') }}",
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
                        $('#modaladd').modal('hide');
                        $("#formadd")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btnadd').val('Arsipkan!');
                        $('#btnadd').attr('disabled', false);
                        toastr['success']('????'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnadd').val('Arsipkan!');
                        $('#btnadd').attr('disabled', false);
                        toastr['error']('????'+ response.message, 'Error!', {
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

        $('#formedit').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.jenis_surat') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnedit').attr('disabled', 'disabled');
                    $('#btnedit').val('Proses Arsip');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaledit').modal('hide');
                        $("#formedit")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btnedit').val('Arsipkan!');
                        $('#btnedit').attr('disabled', false);
                        toastr['success']('????'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnedit').val('Arsipkan!');
                        $('#btnedit').attr('disabled', false);
                        toastr['error']('????'+ response.message, 'Error!', {
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

        $('#formdel').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{route('dell.jenis_surat')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel').attr('disabled', 'disabled');
                    $('#btndel').val('Proses Hapus');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaldel').modal('hide');
                        $("#formdel")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btndel').val('Ya Hapus!');
                        $('#btndel').attr('disabled', false);
                        toastr['warning']('????'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btndel').val('Ya hapus!');
                        $('#btndel').attr('disabled', false);
                        toastr['error']('????'+ response.message, 'Error!', {
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