@extends('layout.layout')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12" style="margin-top: 30px">
                    <h2 class="content-header-title float-left mb-0">Data Masyarakat</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Kelola Data Masyarakat
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
                                                        <label class="font-weight-bolder">NIK</label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input readonly type="number"  id="nik"  value={{$datams->nik}} class="form-control" name="nik" placeholder="NIK" />
                                                    </div>
                                                    <div class="col-md-2 col-form-label">
                                                        <label class="font-weight-bolder">Agama</label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" id="agama"  value={{$datams->agama}} class="form-control" name="agama" placeholder="Agama" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label class="font-weight-bolder">Nama</label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" id="nama"  value={{$datams->nama}} class="form-control" name="nama" placeholder="Nama" />
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Status Kawin</label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <select  class="select form-control" id="status_kawin"  name="status_kawin" aria-readonly="true">
                                                            <option selected="" value="BELUM MENIKAH">BELUM MENIKAH</option>
                                                            <option value="SUDAH MENIKAH">SUDAH MENIKAH</option>
                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label class="font-weight-bolder">Tempat Lahir</label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" id="tempat_lahir"  value={{$datams->tempat_lahir}} class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" />
                                                    </div>
                                                    <div class="col-md-2 col-form-label">
                                                        <label class="font-weight-bolder">NO KK</label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" id="no_kk"  value={{$datams->no_kk}} class="form-control" name="no_kk" placeholder="NO KK" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label class="font-weight-bolder">Tanggal Lahir</label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" id="tgl_lahir"  value={{$datams->tgl_lahir}} name="tgl_lahir" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                                    </div>
                                                   
                                                    <div class="col-md-2">
                                                            <label class="font-weight-bolder">Status<span
                                                                    class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                            <select  class="select2 form-control" id="status"  name="status" aria-readonly="true">
                                                                <option selected="" value="ACTIVE">ACTIVE</option>
                                                                <option value="INACTIVE">INACTIVE</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label class="font-weight-bolder">Jenis Kelamin</label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="select form-control" id="jenkel"  name="jenkel" required>
                                                            <option selected="" value="Pria">Pria</option>
                                                            <option value="Wanita">Wanita</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label class="font-weight-bolder">Alamat</label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <textarea class="form-control" id="alamat"  name="alamat" rows="3" placeholder="Alamat"> {{$datams->alamat}}</textarea>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label class="font-weight-bolder">RT RW</label></label>
                                                    </div>
                                                    <div class="col-2">
                                                        <input type="text" id="rt" class="form-control" name="rt"  placeholder="RT" />
                                                    </div>
                                                    <div class="col-2">  <input type="text" id="rw" class="form-control" name="rw" placeholder="RW" />
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
                                    <a href="{{ url('mas_data_masyarakat') }}" class="btn btn-danger">Kembali</a>
                                 
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
            console.log(dataupdate.status_kawin);    
            $("#status").val(dataupdate.status).change();;
            $("#jenkel").val(dataupdate.jenkel).change();;
            $("#status_kawin").val(dataupdate.status_kawin).change();;
            var rt_rw = dataupdate.rt_rw.split("/");
            $("#rt").val(rt_rw[0]);
            $("#rw").val(rt_rw[1]);
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
                url: "<?php echo url('/mas_data_masyarakat/update');?>"+"/"+$("#id").val(),
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
