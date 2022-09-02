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
                        <div class="card-body" >
                            <img src="{{ asset('ss2.png') }}" style="max-width: 100%" alt="">
                        </div>
                        <hr class="invoice-spacing" style="padding: 0; margin: 0;"/>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-12">
                    <center>
                    <div class="card invoice-preview-card">
                        <div class="card-body row">
                            <div style="width: 100%" id="qrsini">
                               
                            </div>
                        </div>
                        <hr class="invoice-spacing" style="padding: 0; margin: 0;"/>
                    </div>
                    </center>
                    
                </div>

                <div class="col-xl-9 col-md-9 col-12">
                    <div class="card invoice-preview-card">
                      
                    </div>
                </div>
        </section>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        setInterval(function(){
            $.ajax({
                url:  "/mas_data_absensi/Qrcode",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var image = data.data;
                    console.log(image);
                    if (data.success == "True") {                        
                        var newSvg =document.getElementById('qrsini');
                        newSvg.innerHTML =atob(image);
                    } else if (data.errors) {
                        alert('error');
                    }
                },
            });
        }, 10000);
        
    });        


</script>
@endsection