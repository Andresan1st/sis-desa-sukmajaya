@extends('layout.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-invoice.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
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
                        <li class="breadcrumb-item active">Format Surat
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper container-xxl p-0">
    
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
                                <p>Jl. Raya Pilar – Sukatani, Sukamantri Bekasi 17535</p>
                            </div>
                        </div>
                        <hr class="invoice-spacing" style="padding: 0; margin: 0;"/>

                        <!-- Address and Contact starts -->
                        <div class="card-body invoice-padding pt-0">
                            <div class="row row-bill-to invoice-spacing">
                                <div class="col-xl-12" style="text-align: center">
                                    <u><h3>FORMAT SURAT KETERANGAN</h3></u>
                                    <i>Manajemen Jenis dan Format surat keluar</i>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-xl-12" style="font-size: 17px">
                            <div class="card-body">
                                <button class="btn btn-info" data-toggle="modal" data-target="#modaladd" style="margin-bottom: 10px"> <i class="fa fa-plus"></i> Format Surat Baru..</button>
                                <div class="card-datatable table-responsive">
                                    <table id="indextable" class="datatables-basic table" style="font-size: 12px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>Format</th>
                                                <th>Struktur</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-uppercase">
                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>Format</th>
                                                <th>Struktur</th>
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
                                    <a href="{{route('page.jenis_surat')}}" class="btn btn-outline-primary btn-block mb-75" >Jenis</a>
                                </div>
                                <div class="col-md-6 col-6">
                                    <button href="#" class="btn btn-primary btn-block mb-75" disabled>Format</button>
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
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Format Surat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formadd">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Format Name</label>
                                    <input type="text" class="form-control text-uppercase" name="format_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <select class=" form-control text-uppercase" name="jenis_surat_keluar_id" required>
                                        <option></option>
                                        @foreach ($jenis as $item)
                                            <option value="{{$item->id}}">{{$item->jenis_surat_name}}</option>
                                        @endforeach
                                    </select>
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
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Struktur Surat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formedit">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="id" >
                            <div class="col-md-4 col-4">
                                <div class="form-group">
                                    <button type="button" id="btnstatic" class="btn btn-info" data-stat="static" data-toggle="modal" data-target="#modalstatic">STATIC FORMAT</button>
                                </div>
                            </div>
                            <div class="col-md-4 col-4">
                                <div class="form-group">
                                    <button type="button" id="btnsubject" class="btn btn-success" data-stat="subject" data-toggle="modal" data-target="#modalsubject">SUBJECT FORMAT</button>
                                </div>
                            </div>
                            <div class="col-md-4 col-4">
                                <div class="form-group">
                                    <button type="button" id="btnobject" class="btn btn-primary" data-stat="object" data-toggle="modal" data-target="#modalobject">OBJECT FORMAT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modalstatic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Static Format</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formstatic">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Static Format</label>
                                    <div class="add-list">
                                        <input type="hidden" id="id" class="form-control" name="format_surat_keluar_id">
                                        <select name="section_name" id="" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="pengantar">pengantar</option>
                                            <option value="keterangan">keterangan</option>
                                            <option value="penutup">penutup</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="add-list">
                                        <input type="hidden" id="status" class="form-control" value="static" name="status" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Value Static Format</label>
                                    <textarea name="value" class="form-control summernote" id="textstatic" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btnstaticf" value="Arsipkan!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modalstatic2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white" id="myModalLabel17">Static Format</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formstatic2">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Static Format</label>
                                    <div class="add-list">
                                        <input type="hidden" id="format_surat_keluar_id" class="form-control" name="format_surat_keluar_id" readonly>
                                        <input type="hidden" id="id_section" class="form-control" name="id" readonly>
                                        <input type="hidden" id="id_static" class="form-control" name="static_id" readonly>
                                        <select name="section_name" id="section_name" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="pengantar">pengantar</option>
                                            <option value="keterangan">keterangan</option>
                                            <option value="penutup">penutup</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="add-list">
                                        <input type="hidden" id="status" class="form-control" value="static" name="status" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Value Static Format</label>
                                    <textarea name="value" class="form-control summernote" id="value" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <code>Pastikan anda sudah melihat preview surat sebelum anda mengubah konten format surat yang ada!!!</code>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" id="btnhapusstatic2" data-toggle="modal" data-target="#modaldel_static2" type="button">Hapus</button>
                        <input type="submit" class="btn btn-primary" id="btnstaticf2" value="Arsipkan!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modaldel_static2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red">
                    <h4 class="modal-title " style="color: white" id="myModalLabel17">Delete Format</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formdel_static2">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id_section" class="form-control" name="id" readonly>
                                    <input type="hidden" id="id_static" class="form-control" name="static_id" readonly>
                                    <code>Format ini akan dihapus dari database</code>
                                    <hr><p>Anda yakin tetap ingin menghapus jenis doccument ini ?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" id="btndel_static2" value="Ya Hapus!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modalsubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Subject Format</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formsubject">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pilih Subject Format</label>
                                    <div class="add-list">
                                        <input type="hidden" id="id" class="form-control" name="format_surat_keluar_id">
                                        <select name="section_name" id="" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="subject_1">subject 1</option>
                                            <option value="subject_ttd_ybs_&_kepala">subject ttd ybs & kepala</option>
                                            <option value="subject_ttd_kepala">subject ttd kepala</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="add-list">
                                        <input type="hidden" id="status" class="form-control" value="subject" name="status" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btnsubjectf" value="Arsipkan!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modalsubject2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white" id="myModalLabel17">Update Subject Format</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formsubject2">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pilih Subject Format</label>
                                    <div class="add-list">
                                        <input type="hidden" id="format_surat_keluar_id" class="form-control" name="format_surat_keluar_id">
                                        <input type="hidden" id="id_section" class="form-control" name="id" readonly>
                                        <select name="section_name" id="section_name" class="form-control" required>
                                            <option value="">-</option>
                                            <option value="subject_1">subject 1</option>
                                            <option value="subject_ttd_ybs_&_kepala">subject ttd ybs & kepala</option>
                                            <option value="subject_ttd_kepala">subject ttd kepala</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="add-list">
                                        <input type="hidden" id="status" class="form-control" value="subject" name="status" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <code>Apabila surat ini sudah pernah diisi sebelumnya, buatlah satu format baru dan jangan ubah format subject ini. karena dapat menyebabkan error pada preview surat yang sudah pernah dibuat
                                    </code>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" id="btnhapussubject2" data-toggle="modal" data-target="#modaldel_subject2" type="button">Hapus</button>
                        <input type="submit" class="btn btn-primary" id="btnsubjectf2" value="Arsipkan!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modaldel_subject2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red">
                    <h4 class="modal-title " style="color: white" id="myModalLabel17">Delete Doccument</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formdel_subject2">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id_section" class="form-control" name="id" readonly>
                                    <code>Subject Format Ini Akan Dihapus Dari Database</code>
                                    <hr><p>Anda yakin tetap ingin menghapus jenis doccument ini ?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" id="btndel_subject2" value="Ya Hapus!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modalobject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Object Format</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formobject">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id" class="form-control" name="format_surat_keluar_id">
                                    <input type="hidden" name="section_name" value="object">
                                    <code>Object Format merupakan input manual yang diisikan berdasarkan keterangan subject</code>
                                    <br>
                                    <label>Object Format</label>
                                    <textarea name="" id="" cols="30" class="form-control" rows="2" readonly>Contoh : telah kehilangan Kartu Keluarga yang diperkirakan hilang tercecer di daerah kawasan tempat tinggalnya. </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="add-list">
                                        <input type="hidden" id="status" class="form-control" value="object" name="status" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btnobjectf" value="Arsipkan!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modaldel_object" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red">
                    <h4 class="modal-title " style="color: white" id="myModalLabel17">Delete Object Format</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formdel_object">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id_section" class="form-control" name="id" readonly>
                                    <code>Format ini akan dihapus dari database</code>
                                    <hr><p>Anda yakin tetap ingin menghapus jenis doccument ini ?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" id="btndel_object" value="Ya Hapus!">
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

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('.summernote').summernote({
                    placeholder: 'Isikan dengan Text Format Surat',
                    tabsize: 2,
                    height: 200
                });
            });
        });

        var id;
        var id_section;
        var id_static;
        $('#modaledit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            id = button.data('id')
            var jenis_surat_name = button.data('jenis_surat_name')
            var nomor = button.data('nomor')
            var bagan = button.data('bagan')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #jenis_surat_name').val(jenis_surat_name);
            modal.find('.modal-body #nomor').val(nomor);
            modal.find('.modal-body #bagan').val(bagan);
        })

        $('#btnstatic').on('click', function(){
            $('#modaledit').modal('hide');
        })
        
        $('#btnsubject').on('click', function(){
            $('#modaledit').modal('hide');
        })

        $('#btnobject').on('click', function(){
            $('#modaledit').modal('hide');
        })

        $('#btnhapusstatic2').on('click', function(){
            $('#modalstatic2').modal('hide');
        })

        $('#btnhapussubject2').on('click', function(){
            $('#modalsubject2').modal('hide');
        })

        $('#modalstatic').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var stat = button.data('stat')
            var modal = $(this)
            console.log(stat);
            console.log(id);
            modal.find('.modal-body #id').val(id);
        })

        $('#modalstatic2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            id_section = button.data('id_section')
            id_static = button.data('id_static')
            var status = button.data('status')
            var section_name = button.data('section_name')
            var format_surat_keluar_id = button.data('format_surat_keluar_id')
            var value = button.data('value')
            var modal = $(this)
            console.log(value);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #format_surat_keluar_id').val(format_surat_keluar_id);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #id_section').val(id_section);
            modal.find('.modal-body #id_static').val(id_static);
            modal.find('.modal-body #value').val(value);
            $('#value').summernote('code',value);
        })

        $('#modalsubject2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            id_section = button.data('id_section')
            var status = button.data('status')
            var section_name = button.data('section_name')
            var format_surat_keluar_id = button.data('format_surat_keluar_id')
            var value = button.data('value')
            var modal = $(this)
            console.log(value);
            modal.find('.modal-body #format_surat_keluar_id').val(format_surat_keluar_id);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #id_section').val(id_section);
        })

        $('#modaldel_static2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var modal = $(this) 
            modal.find('.modal-body #id_section').val(id_section);
            modal.find('.modal-body #id_static').val(id_static);
        })

        $('#modaldel_subject2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var modal = $(this) 
            modal.find('.modal-body #id_section').val(id_section);
        })

        $('#modaldel_object').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_section = button.data('id_section')
            var modal = $(this) 
            modal.find('.modal-body #id_section').val(id_section);
        })

        $('#modalsubject').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var stat = button.data('stat')
            var modal = $(this)
            console.log(stat);
            console.log(id);
            modal.find('.modal-body #id').val(id);
        })

        $('#modalobject').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var stat = button.data('stat')
            var modal = $(this)
            console.log(stat);
            console.log(id);
            modal.find('.modal-body #id').val(id);
        })

        $('#modaldel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })


        $('#modalstruktur').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var format_surat_keluar_id = button.data('format_surat_keluar_id')
            var id = button.data('id')
            var section_name = button.data('section_name')
            var modal = $(this)
            modal.find('.modal-body #format_surat_keluar_id').val(format_surat_keluar_id);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').html(section_name);
        })
        
        $(document).ready(function() {
            var table = $('#indextable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('page.format_surat')}}",
                columns: [
                   {
                       "data" : "id",
                       render : function(data, type, row, meta){
                           return meta.row + meta.settings._iDisplayStart + 1;
                       }
                   },
                   {
                        data : 'jenis',
                        name : 'jenissuratkeluarModel.jenis_surat_name'
                   },
                   {
                        data : 'format_name',
                        name : 'format_name'
                   },
                   {
                        data : 'section',
                        name : 'section'
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
                url: "{{ route('store.format_surat') }}",
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

        $('#formstatic').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.struktur_surat') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnstaticf').attr('disabled', 'disabled');
                    $('#btnstaticf').val('Proses Arsip');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modalstatic').modal('hide');
                        $("#formstatic")[0].reset();
                        $('#textstatic').summernote('code',"");
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btnstaticf').val('Arsipkan!');
                        $('#btnstaticf').attr('disabled', false);
                        toastr['success']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnstaticf').val('Arsipkan!');
                        $('#btnstaticf').attr('disabled', false);
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

        $('#formstatic2').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.struktur_surat') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnstaticf2').attr('disabled', 'disabled');
                    $('#btnstaticf2').val('Proses Arsip');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modalstatic2').modal('hide');
                        $("#formstatic2")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btnstaticf2').val('Arsipkan!');
                        $('#btnstaticf2').attr('disabled', false);
                        toastr['success']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnstaticf2').val('Arsipkan!');
                        $('#btnstaticf2').attr('disabled', false);
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

        $('#formsubject').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.struktur_surat') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnsubjectf').attr('disabled', 'disabled');
                    $('#btnsubjectf').val('Proses Arsip');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modalsubject').modal('hide');
                        $("#formsubject")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btnsubjectf').val('Arsipkan!');
                        $('#btnsubjectf').attr('disabled', false);
                        toastr['success']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnsubjectf').val('Arsipkan!');
                        $('#btnsubjectf').attr('disabled', false);
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

        $('#formsubject2').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.struktur_surat') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnsubjectf2').attr('disabled', 'disabled');
                    $('#btnsubjectf2').val('Proses Arsip');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modalsubject2').modal('hide');
                        $("#formsubject2")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btnsubjectf2').val('Arsipkan!');
                        $('#btnsubjectf2').attr('disabled', false);
                        toastr['success']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnsubjectf2').val('Arsipkan!');
                        $('#btnsubjectf2').attr('disabled', false);
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

        $('#formobject').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.struktur_surat') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnobjectf').attr('disabled', 'disabled');
                    $('#btnobjectf').val('Proses Arsip');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modalobject').modal('hide');
                        $("#formobject")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btnobjectf').val('Arsipkan!');
                        $('#btnobjectf').attr('disabled', false);
                        toastr['success']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnobjectf').val('Arsipkan!');
                        $('#btnobjectf').attr('disabled', false);
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

        $('#formstruktur').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.struktur_surat') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btnstruktur').attr('disabled', 'disabled');
                    $('#btnstruktur').val('Proses Arsip');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modalstruktur').modal('hide');
                        $("#formstruktur")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btnstruktur').val('Arsipkan!');
                        $('#btnstruktur').attr('disabled', false);
                        toastr['success']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btnstruktur').val('Arsipkan!');
                        $('#btnstruktur').attr('disabled', false);
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

        $('#formdel').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{route('dell.format_surat')}}",
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
                        toastr['warning']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btndel').val('Ya hapus!');
                        $('#btndel').attr('disabled', false);
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

        $('#formdel_static2').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{route('dell.struktur_surat')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel_static2').attr('disabled', 'disabled');
                    $('#btndel_static2').val('Proses Hapus');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaldel_static2').modal('hide');
                        $("#formdel_static2")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btndel_static2').val('Ya Hapus!');
                        $('#btndel_static2').attr('disabled', false);
                        toastr['warning']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btndel_static2').val('Ya hapus!');
                        $('#btndel_static2').attr('disabled', false);
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

        $('#formdel_subject2').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{route('dell.struktur_surat')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel_subject2').attr('disabled', 'disabled');
                    $('#btndel_subject2').val('Proses Hapus');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaldel_subject2').modal('hide');
                        $("#formdel_subject2")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btndel_subject2').val('Ya Hapus!');
                        $('#btndel_subject2').attr('disabled', false);
                        toastr['warning']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btndel_subject2').val('Ya hapus!');
                        $('#btndel_subject2').attr('disabled', false);
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

        $('#formdel_object').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{route('dell.struktur_surat')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel_object').attr('disabled', 'disabled');
                    $('#btndel_object').val('Proses Hapus');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaldel_object').modal('hide');
                        $("#formdel_object")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btndel_object').val('Ya Hapus!');
                        $('#btndel_object').attr('disabled', false);
                        toastr['warning']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btndel_object').val('Ya hapus!');
                        $('#btndel_object').attr('disabled', false);
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