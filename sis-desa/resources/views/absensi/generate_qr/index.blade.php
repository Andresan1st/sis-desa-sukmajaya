@extends('layout.layout')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-xl-12">
                <div id="errList" class="text-capitalize"></div>
            </div>
            <div class="col-12" style="margin-top: 30px">
                <h2 class="content-header-title float-left mb-0">GENERATE QR ABSENSI</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item ">Generate QR Code
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
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-body row" >
                            <div style="max-width: 100%">
                                <img src="data:image/png;base64,{!!  $qrcode  !!}"/>
                            </div>
                        </div>
                        <hr class="invoice-spacing" style="padding: 0; margin: 0;"/>
                    </div>
                </div>

                <div class="col-xl-9 col-md-9 col-12">
                    <div class="card invoice-preview-card">
                        {!! $qrcode !!}
                    </div>
                </div>
        </section>
    </div>
</div>
@endsection

@section('script')
<script>
    $.ajax({
        url: "/mas_data_absensi/Qrcode",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            if (data.success == "True") {                        
                // document.getElementById("qr_code").src = 'data:image/png;base64,'+data.data+'';
            } else if (data.errors) {
                
            }
        },
    });
</script>
@endsection