@extends('layout.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-invoice.css')}}">

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
                        <li class="breadcrumb-item active">Buat Surat
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
                        <!-- Header starts -->
                        {{-- <div class="card-body invoice-padding">
                            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                
                            </div>
                        </div> --}}
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
                                <div class="col-xl-12" style="text-align: center; margin-bottom: 20px">
                                    <u><h3>SURAT KETERANGAN</h3></u>
                                    <i>Nomor: .... / .... / .... / .... / ....</i>
                                </div>
                                
                                <div class="col-xl-12" style="padding-left: 10%;padding-right: 10%; font-size: 17px;margin-bottom: 20px;">
                                   <label>Start</label><br>
                                   <button class="btn btn-info" data-toggle="modal" data-target="#modaljenis"> BUAT SURAT</button>
                                </div>
                                
                            </div>
                        </div>
                        

                        <hr class="invoice-spacing mt-0" style="margin-bottom: 7px"/>

                    </div>
                </div>
                <!-- Invoice Add Left ends -->

                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card">
                        @if ($jenis->count() > 0)
                            <div class="card-body">
                                <p class="mb-50">Choose : </p>
                                <select class="form-control text-uppercase" id="pilih_jenis_surat1">
                                    <option value=""></option>
                                    @foreach ($jenis as $item)
                                        <option value="{{$item->id}}">{{$item->jenis_surat_name}}</option>
                                    @endforeach
                                </select>                            
                            </div>
                        @else
                            <div class="card-body mb-50">
                                <code>Belum ada jenis surat yang tersedia. Silahkan Buat Jenis dan Format Surat terlebih dahulu</code>
                            </div>
                        @endif
                        
                        <hr>
                        <div class="card-body">
                            <button class="btn btn-primary btn-block mb-75" disabled>BUAT SURAT</button>
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
                                    <a href="{{route('page.format_surat')}}" class="btn btn-outline-primary btn-block mb-75">Format</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice Add Right ends -->
            </div>

            <!-- Add New Customer Sidebar -->
            <div class="modal modal-slide-in fade" id="add-new-customer-sidebar" aria-hidden="true">
                <div class="modal-dialog sidebar-lg">
                    <div class="modal-content p-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">
                                <span class="align-middle">Add Customer</span>
                            </h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <form>
                                <div class="form-group">
                                    <label for="customer-name" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" id="customer-name" placeholder="John Doe" />
                                </div>
                                <div class="form-group">
                                    <label for="customer-email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="customer-email" placeholder="example@domain.com" />
                                </div>
                                <div class="form-group">
                                    <label for="customer-address" class="form-label">Customer Address</label>
                                    <textarea class="form-control" id="customer-address" cols="2" rows="2" placeholder="1307 Lady Bug Drive New York"></textarea>
                                </div>
                                <div class="form-group position-relative">
                                    <label for="customer-country" class="form-label">Country</label>
                                    <select class="form-control" id="customer-country" name="customer-country">
                                        <option label="select country"></option>
                                        <option value="Australia">Australia</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="customer-contact" class="form-label">Contact</label>
                                    <input type="number" class="form-control" id="customer-contact" placeholder="763-242-9206" />
                                </div>
                                <div class="form-group d-flex flex-wrap mt-2">
                                    <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Add</button>
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add New Customer Sidebar -->
        </section>
    </div>
</div>

    <div class="modal fade text-left" id="modaljenis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Pilih Jenis Surat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formchange">@csrf
                    @if ($jenis->count() > 0)
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                Pilih Jenis Surat
                                <select name="pilih_jenis_surat" id="pilih_jenis_surat" class="form-control text-uppercase" required>
                                    <option value="">-</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{$item->id}}">{{$item->jenis_surat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="modal-body">
                            <code>Belum ada Jenis surat yang tersedia. Silahkan buat Jenis dan Format Surat terlebih dahulu</code>
                        </div>
                    @endif
                    @if ($jenis->count() > 0)
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" id="btnadd" value="Ok!">
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

    <script src="{{asset('app-assets/js/scripts/pages/app-invoice.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#modaljenis').modal('show');
        })
        
        $('#pilih_jenis_surat1').change(function () {
            var val = this.value;
            window.location.href = '/surat_keluar/'+val;
        })

        $('#formchange').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $link = $('#pilih_jenis_surat').val();
            window.location.href = '/surat_keluar/'+$link;
        });
    </script>
@endsection