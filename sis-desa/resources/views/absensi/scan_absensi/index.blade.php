@extends('layout.layout')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-xl-12">
                <div id="errList" class="text-capitalize"></div>
            </div>
            <div class="col-12" style="margin-top: 30px">
                <h2 class="content-header-title float-left mb-0">SCAN ABSENSI</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item ">Scan Absensi
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
                <div class="col-xl-12 col-md-8 col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-body" >
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('ss2.png') }}" style="max-width: 100%" alt="">
                            </div>
                        </div>
                        <hr class="invoice-spacing" style="padding: 0; margin: 0;"/>
                    </div>
                </div>

                <div class="col-xl-12 col-md-3 col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-body" >
                            <div class="d-flex justify-content-center">
                                <div id="reader" width="1800px"></div>
                            </div>
                        </div>
                        <hr class="invoice-spacing" style="padding: 0; margin: 0;"/>
                    </div>
                </div>
        </section>
    </div>
</div>
  
@endsection

@section('script')
{{-- <script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js"></script> --}}
<script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js" type="text/javascript"></script>
<script src="{{ asset('html5-qrcode.min.js') }}"></script>

<script>
    

    $(document).ready(function () {
        
    })

    function onScanSuccess(qrCodeMessage) {
        Swal.fire({
            text: 'SILAHKAN KLIK TOMBOL OK UNTUK ABSEN',
            icon: 'success',
            confirmButtonText: `Yes`,
            customClass: {
                confirmButton: 'order-2',
                denyButton: 'order-3',
            }
        }).then((result) => {
            
            if (result.isConfirmed) {
                $.ajax({
                url: "<?php echo url('mas_data_absensi/store/') ?>"+"/"+qrCodeMessage,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        if (data.success == "True") {
                            Swal.fire({
                                html: "Absen Sukses",
                                icon: 'success',
                                confirmButtonText: 'OK'
                            })
                        } else if (data.errors) {
                            Swal.fire({
                                html: data.errors,
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            })
                        }
                    },
                });
               // window.location.href = "{{ route('scan.absensi') }}";
            } else if (result.isDenied) {
                return false;
            }
        });
        
            
    }
    function onScanError(errorMessage) {
    //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
@endsection