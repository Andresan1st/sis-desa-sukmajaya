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
                        <li class="breadcrumb-item ">Buat Surat
                        </li>
                        <li class="breadcrumb-item active text-capitalize">{{$data->jenis_surat_name}}
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
                                    <u><h3 class="text-uppercase">SURAT KETERANGAN 
                                    @if ($data->formatsuratkeluarModel->count() > 1)
                                        </h3>
                                    @else
                                        {{$data->jenis_surat_name}}</h3>
                                        Nomor:<i id="head_nomor_surat"> {{$data->nomor}} / {{$urut}} / {{strtoupper($data->bagan)}} / {{$bulan}} / {{date('Y')}}</i>
                                    @endif    
                                    </u>
                                </div>
                                
                            <form method="POST" id="formadd">@csrf
                                
                                <input type="hidden" id="nomor_surat_keluar" name="nomor_surat_keluar">
                                <input type="hidden" value="{{$data->id}}" name="jenis_surat_id">
                                @if ($data->formatsuratkeluarModel->count() > 0 && $data->formatsuratkeluarModel->count() == 1)
                                    <?php $format = $data->formatsuratkeluarModel->first() ?>
                                    <input type="hidden" value="{{$format->id}}" name="format_surat_id">
                                    @foreach ($format->sectionformatsuratkeluarModel as $key=>$item)
                                        @if ($item->status == 'static')
                                            <div class="col-xl-12" style="padding-left: 10%;padding-right: 10%; font-size: 17px; text-align: justify">
                                                {{$item->staticsectionModel->value}}
                                            </div>
                                        @elseif ($item->status == 'subject' && $item->section_name == 'subject_1')
                                            <input type="hidden" name="section_format_subject_id[]" value="{{$item->id}}">
                                            <div class="col-xl-12" style="padding-left: 10%;padding-right: 10%; font-size: 17px;margin-bottom: 20px;text-align: right">
                                                <label>Check Subject</label>
                                                <input type="text" class="form-control" placeholder="CEK NIK APABILA SUDAH TERDATA PADA DATABASE">
                                            </div>
                                            {{-- <input type="text" name="masyarakat_id" value="{{$item->id}}"> --}}
                                            <div class="col-xl-12" style="padding-left: 17%;padding-top: 3%; font-size: 17px">
                                                <table>
                                                    <tr>
                                                        <td style="width: 25%">Nama</td>
                                                        <th style="width: 5%;text-align: center">:</th>
                                                        <th style="width: 50%">
                                                            <input type="text" name="nama[]" id="nama1" class="text-uppercase"  style="width: 70%; border: none" placeholder="....." required>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%">NIK</td>
                                                        <th style="width: 5%;text-align: center">:</th>
                                                        <th style="width: 50%">
                                                            <input type="number" name="nik[]" class="text-capitalize"  style="width: 70%; border: none" placeholder="....." required>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%">Tempat/ Tanggal Lahir</td>
                                                        <th style="width: 5%;text-align: center">:</th>
                                                        <th style="width: 50%">
                                                            <div class="row">
                                                                <div class="col-sm-4" style="margin: 0;"><input type="text" name="tempat_lahir[]" class="text-capitalize" style="border: none; width: 90%" placeholder="....." required></div>
                                                                <div class="col-sm-1" style="margin: 0;">,</div>
                                                                <div class="col-sm-5" style="margin: 0;"><input type="date" name="tgl_lahir[]" class="text-capitalize" style="border: none" value="{{date('1996-m-d')}}" id="" style="width: 91%" required></div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%">Kewarganegaraan</td>
                                                        <th style="width: 5%;text-align: center">:</th>
                                                        <th style="width: 50%">
                                                            <input type="text" name="kewarganegaraan[]" class="text-capitalize" style="width: 70%; border: none" placeholder="....." value="Indonesia" required>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%">Jenis Kelamin</td>
                                                        <th style="width: 5%;text-align: center">:</th>
                                                        <th style="width: 50%">
                                                            <select name="jenkel[]" id="" style="border: none" class="text-capitalize" required>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%">Agama</td>
                                                        <th style="width: 5%;text-align: center">:</th>
                                                        <th style="width: 50%">
                                                            <input type="text" name="agama[]" class="text-capitalize" style="width: 70%; border: none" placeholder="....." required>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%">Pekerjaan</td>
                                                        <th style="width: 5%;text-align: center">:</th>
                                                        <th style="width: 50%">
                                                            <input type="text" name="pekerjaan[]" class="text-capitalize" style="width: 70%; border: none" placeholder="....." required>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%">Status Perkawinan</td>
                                                        <th style="width: 5%;text-align: center">:</th>
                                                        <th style="width: 50%">
                                                            <input type="text" name="status_kawin[]" class="text-capitalize"  style="width: 70%; border: none" placeholder="....." required>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 25%; vertical-align: top">Alamat</td>
                                                        <th style="width: 5%;text-align: center;vertical-align: top">:</th>
                                                        <th style="width: 50%;">
                                                            <textarea name="alamat[]" class="text-capitalize" style="border: 0" id="" cols="30" rows="2" placeholder="....." required></textarea>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </div>
                                        @elseif($item->status == 'object')
                                            <input type="hidden" value="{{$item->id}}" name="section_format_id">
                                            <div class="col-xl-12" style="padding-left:10%;;padding-right:10%;font-size: 17px">
                                                <div class="form-group mb-2">
                                                    <label for="note" class="form-label font-weight-bold">Keterangan Object Secara Detail:</label>
                                                    <textarea class="form-control text-capitalize" name="object_value" rows="2" id="note" placeholder="....." style="border: none" required></textarea>
                                                </div>
                                            </div>
                                        @elseif($item->status == 'subject' && $item->section_name == 'subject_ttd_ybs_&_kepala')
                                        <div class="col-xl-12" style="padding-left:10%;;padding-right:10%;font-size: 17px;margin-top: 70px">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%"></th>
                                                    <td style="width: 30%"></td>
                                                    <td style="width: 30%; text-align: justify">Sukaraya,  {{\Carbon\Carbon::now()->format('d-M-Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 30%">Tanda Tangan Ybs</th>
                                                    <td style="width: 30%"></td>
                                                    <td style="width: 30%; text-align: justify">Kepala Desa Sukaraya</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%; height: 150px;"><input type="text" id="nama_pemohon" name="nama_pemohon" class="text-uppercase" style="border: none" placeholder="....." required></td>
                                                    <td style="width: 30%;height: 150px;"></td>
                                                    <td style="width: 30%; text-align: justify;height: 150px;">.....</td>
                                                </tr>
                                            </table>
                                        </div>
                                        @elseif($item->status == 'subject' && $item->section_name == 'subject_ttd_kepala')
                                        <div class="col-xl-12" style="padding-left:10%;;padding-right:10%;font-size: 17px;margin-top: 70px">
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th style="width: 30%"></th>
                                                    <td style="width: 30%"></td>
                                                    <td style="width: 30%; text-align: justify">Sukaraya,  {{\Carbon\Carbon::now()->format('d-M-Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 30%">Nama Pemohon</th>
                                                    <td style="width: 30%"></td>
                                                    <td style="width: 30%; text-align: justify">Kepala Desa Sukaraya</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%; height: 150px;"><input type="text" id="nama_pemohon" name="nama_pemohon" class="text-uppercase" style="border: none" placeholder="....." required></td>
                                                    <td style="width: 30%;height: 150px;"></td>
                                                    <td style="width: 30%; text-align: justify;height: 150px;">.....</td>
                                                </tr>
                                            </table>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
                                <hr class="invoice-spacing mt-0" />

                                <div class="row row-bill-to invoice-spacing">
                                    <div class="col-xl-12" style="padding-left:10%;;padding-right:10%;font-size: 17px;">
                                        <div class="form-group" style="text-align: right">
                                            <input type="submit" id="btnadd" value="Buat Surat!" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Invoice Add Left ends -->

                <div class="col-xl-3 col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-50">Choose : </p>
                            <select class="form-control text-uppercase" id="pilih_jenis_surat">
                                @foreach ($jenis as $item)
                                    <option value="{{$item->id}}" 
                                        @if ($item->id == $data->id)
                                            selected
                                        @endif
                                        >{{$item->jenis_surat_name}}</option>
                                @endforeach
                            </select>                            
                        </div>
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

    
@endsection

@section('script')
    <script src="{{asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/app-invoice.js')}}"></script>

    <script>
        $('#pilih_jenis_surat').change(function () {
            var val = this.value;
            window.location.href = '/surat_keluar/'+val;
        })
        $('#nama1').keyup(function () {
            var nama = this.value;
            $('#nama_pemohon').val(nama);
            console.log(nama);
        })
        $(document).ready(function() {
            var num = $('#head_nomor_surat').html();
            $('#nomor_surat_keluar').val(num);
        })

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.surat_keluar') }}",
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
    </script>
@endsection