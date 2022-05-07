@extends('layout.layout')
@section('content')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/laporanpurchaseorder.css') }}">
@endsection
<style>
    *{
        font-family: 'Times New Roman', Times, serif;
    }
</style>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12" style="margin-top: 30px">
                    <h2 class="content-header-title float-left mb-0">Data Pegawai</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Kelola Data Pegawai
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
                                <form class="form form-horizontal" id="formreport" novalidate>
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="form-body">
                                            <div class="row" style="margin-top: 10px">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <label class="font-weight-bolder">Date From<span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-md-4 controls">
                                                            <input type="text" id="date_from" class="flatpickr-basic form-control bg-white" name="date_from"  autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <label class="font-weight-bolder">Date To<span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-md-4 controls">
                                                            <input type="text" id="date_to" class="flatpickr-basic form-control bg-white" name="date_to"  autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-2">
                                                            <label class="font-weight-bolder">Type<span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-md-4 controls">
                                                            <select class="select2 form-control" id="type"  name="type" required>
                                                                <option selected="" value="">Pilih type ...</option>
                                                                <option value="surat_masuk">Surat Masuk</option>
                                                                <option value="surat_keluar">Surat Keluar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" id="btnData" class="btn btn-success">Search</button>
                                    &nbsp;
                                </div>
                                <div class="default-collapse collapse-bordered">
                                    <div class="card collapse-header">
                                        <div id="headingCollapse1" class="card-header" data-toggle="collapse"
                                            role="button" data-target="#collapse1" aria-expanded="false"
                                            aria-controls="collapse1">
                                            <span class="lead collapse-title">
                                                REPORT TABLE
                                            </span>
                                        </div>
                                        <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1"
                                            class="collapse">
                                            <a  id="excell" style="visibility:hidden" class="btn btn-relief-success mr-1 mb-1 waves-effect waves-light">PRINT EXCEL</a>
                                            &nbsp;
                                            <div class="card-content">
                                                <div class="card-body">
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
                            
                                                    <div class="table-responsive">
                                                        <table id="indextable2" class="table">
                                                            <thead>
                                                                <tr id="header2">
                                                                    <th class="judul" colspan="2" style="color:black">NO</th>
                                                                    <th id="nosurat" class="judul" colspan="2" style="color:black">Nomor Surat</th>
                                                                    <th class="judul" colspan="2" style="color:black">Perihal Surat</th>
                                                                    <th class="judul" colspan="4" style="color:black">Tanggal Surat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="row-body">
                                                            </tbody>
                                                        </table>
                                                        <table id="indextable3" class="table" style="visibility:hidden">
                                                            <thead>
                                                                <tr id="header3">
                                                                    <th class="judul" colspan="2" style="color:black">NO</th>
                                                                    <th id="nosurat" class="judul" colspan="2" style="color:black">Nomor Surat</th>
                                                                    <th id="nosurat" class="judul" colspan="2" style="color:black">Nama Pemohon</th>
                                                                    <th class="judul" colspan="2" style="color:black">Perihal Surat</th>
                                                                    <th class="judul" colspan="4" style="color:black">Tanggal Surat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="row-body3">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Add rows table -->
    </div>
    <div class="modal fade" id="showloading" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark white">
                    <h6 class="modal-title">LOADING</h4>
                </div>
                <div class="modal-body">
                    <div id='loader' style="text-align: center;">
                        <img src="../../../asset/loading-buffering.gif" width='32px' height='32px'>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            var today = year + "-" + month + "-" + day;   
            //$("#status").select2({disabled:'readonly'});
            $('#date_from').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,     
            });
            $('#date_to').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
            });
        });
       
       
       
        $('#btnData').click(function(e) {
            e.preventDefault();
            // Code goes here
            search(); // your onclick function call here

        });
        $('#ResetForm').click(function(e) {
            e.preventDefault();
            // Code goes here
            $('#formdata').trigger("reset");

        });
       
        function search() {
                $("#collapse1").collapse('hide');
              
                var dataarray = $('#formreport').serialize();
                var url = "";
                savemethod = "add"
                $.ajax({
                    url: "<?php echo url('rep_surat/apisurat'); ?>",
                    type: "POST",
                    data: dataarray,
                    dataType: "JSON",
                    beforeSend: function() {
                        $('#showloading').modal("show");
                    },
                    success: function(data) {
                        var trbody = '';
                        // $("#row-body2 tr").remove();
                        var datareport = data.data;
                        if(data.succes=="success"){
                         
                            if($("#type").val()=="surat_masuk"){
                                document.getElementById("indextable3").style.visibility='hidden';
                                document.getElementById("indextable2").style.visibility='visible';
                                console.log("masuksukses")
                                var no=0;
                                for(var k=0;k<datareport.length;k++){
                                    $("#row-body tr").remove();
                                    no++
                                    trbody += '<tr>';
                                    trbody += '<td  class="tb1td"  colspan="2"  style="width: 20%">' +  no + '</td>';
                                    trbody += '<td  class="tb1td"  colspan="2"  style="width: 20%">' +  datareport[k].nomor_surat_masuk + '</td>';
                                    trbody += '<td  class="tb1td"  colspan="2"  style="width: 20%">' + datareport[k].perihal_surat + '</td>';
                                    trbody += '<td  class="tb1td" colspan="4"   style="width: 20%">' + datareport[k].tanggal + '</td>';
                                    trbody += '</tr>';
                                 
                                }
                                console.log(trbody)
                                $("#row-body").append(trbody);
                                setTimeout(function() {
                                        $("#collapse1").collapse('toggle');
                                        $('#showloading').modal("hide");
                                        document.getElementById("excell").style.visibility='visible';
                                        var b = document.getElementById('excell'); //or grab it by tagname etc
                                        var params = $("#date_from").val()+"_"+$("#date_to").val()+"_"+$("#type").val()+"_"+$("#status").val();
                                        b.href = "/pcin_rep_purchase_order/apiexcell/"+params
                                }, 1000);
                            }else{
                                document.getElementById("indextable3").style.visibility='visible';
                                document.getElementById("indextable2").style.visibility='hidden';
                                var no=0;
                                for(var k=0;k<datareport.length;k++){
                                    $("#row-body3 tr").remove();
                                    no++
                                    trbody += '<tr>';
                                    trbody += '<td  class="tb1td"  colspan="2"  style="width: 20%">' +  no + '</td>';
                                    trbody += '<td  class="tb1td"  colspan="2"  style="width: 20%">' +  datareport[k].nomor_surat_keluar + '</td>';
                                    trbody += '<td  class="tb1td"  colspan="2"  style="width: 20%">' +  datareport[k].nama_pemohon + '</td>';
                                    trbody += '<td  class="tb1td"  colspan="2"  style="width: 20%">' + datareport[k].jenis_surat_name + '</td>';
                                    trbody += '<td  class="tb1td" colspan="4"   style="width: 20%">' + datareport[k].tanggal + '</td>';
                                    trbody += '</tr>';
                                    $("#row-body3").append(trbody);
                                    setTimeout(function() {
                                        $("#collapse1").collapse('toggle');
                                        $('#showloading').modal("hide");
                                        document.getElementById("excell").style.visibility='visible';
                                        var b = document.getElementById('excell'); //or grab it by tagname etc
                                        var params = $("#date_from").val()+"_"+$("#date_to").val()+"_"+$("#type").val()+"_"+$("#status").val();
                                        b.href = "/pcin_rep_purchase_order/apiexcell/"+params
                                    }, 1000);
                                }
                            }
                        }else if(data.errors){
                            $('#showloading').modal("hide");
                            var values = '';
                            for(var i=0;i<data.errors.length;i++){
                                var replace = data.errors[i].replaceAll(" diisi !!!!"," diisi !!!! <br>");
                                data.errors[i] = replace;
                            }

                            Swal.fire({
                                html: data.errors,
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            })
                        }

                    

                    }
                })
        }
    </script>
@endsection
