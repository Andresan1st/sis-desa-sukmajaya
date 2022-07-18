@extends('layout.layout')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12" style="margin-top: 30px">
                <h2 class="content-header-title float-left mb-0">Data Bantuan</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Kelola Data Bantuan
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form id="formdata" class="form form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <input type="text" id="id" class="form-control" name="id" value={{$datams->id}} placeholder="Nama Jabatan" hidden />
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2 col-form-label">
                                                    <label class="font-weight-bolder">Nama Masyarakat</label></label>
                                                </div>
                                                <div class="col-md-4 controls">
                                                    <select class="select2 form-control" id="id_masyarakat"  name="id_masyarakat"  required>
                                                        <option selected="" value="">Pilih Masyarakat ...</option>
                                                        @foreach ($masyarakat as $data)
                                                            <option value="{{ $data->id }}">{{$data->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 col-form-label">
                                                    <label class="font-weight-bolder">Tanggal</label></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="tanggal" value="{{$datams->tanggal}}" class="form-control" name="tanggal" placeholder="tanggal" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2 col-form-label">
                                                    <label class="font-weight-bolder">Keterangan</label></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <textarea class="form-control" id="keterangan"  name="keterangan" rows="3" placeholder="keterangan">{{$datams->keterangan}}</textarea>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="font-weight-bolder">Status</label>
                                                </div>
                                                <div class="col-md-4 controls">
                                                    <select  class="select form-control" id="status"  name="status" aria-readonly="true">
                                                        <option selected="" value="ACTIVE">ACTIVE</option>
                                                        <option value="INACTIVE">INACTIVE</option>
                                                    
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                    
                                    </div>
                                
                                </div>
                            </form>
                        
                            <br>
                            <br>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" id="btnDatasave" class="btn btn-primary">Save</button>
                                &nbsp;
                                <button type="reset" id="ResetForm" class="btn btn-outline-secondary">Reset</button>
                                &nbsp;
                                <a href="{{ url('mas_data_bantuan') }}" class="btn btn-danger">Kembali</a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- // Basic Floating Label Form section end -->
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var dataupdate = {!! json_encode($datams) !!};
            $("#status").val(dataupdate.status).change();;
            $("#id_masyarakat").val(dataupdate.id_masyarakat).change();
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            var today = year + "-" + month + "-" + day;   
            //$("#status").select2({disabled:'readonly'});
        });
       
       
       
        $('#btnDatasave').click(function(e) {
            e.preventDefault();
            // Code goes here
            save(); // your onclick function call here

        });
        $('#ResetForm').click(function(e) {
            e.preventDefault();
            // Code goes here
            $('#formdata').trigger("reset");

        });
       
        //save data
        function save() {
            //deklarasi data
            var dataarray = $('#formdata').serialize({
                // checkboxesAsBools: true
            });
            var url = "";
            savemethod = "add"

            //console.log(pcin_tra_permintaan_pembelian);
            $.ajax({
                url: "<?php echo url('/mas_data_bantuan/update');?>"+"/"+$("#id").val(),
                type: "POST",
                data: dataarray,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == "True") {
                        Swal.fire({
                            text: 'Berhasil Simpan',
                            icon: 'success',
                            confirmButtonText: `Yes`,
                            customClass: {
                                confirmButton: 'order-2',
                                denyButton: 'order-3',
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('mas_data_masyarakat') }}";
                            } else if (result.isDenied) {
                                return false;
                            }
                        });
                    } else if (data.errors) {
                        var values = '';
                        for (var i = 0; i < data.errors.length; i++) {
                            var replace = data.errors[i].replaceAll(" diisi", " diisi !!!! <br>");
                            data.errors[i] = replace;
                        }
                        Swal.fire({
                            html: data.errors,
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                    } else if (data.errors2) {
                        Swal.fire({
                            html: data.message,
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        })
                    }
                },
            });
        }
    </script>
@endsection
