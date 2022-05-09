@extends('layout.layout')
@section('content')
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
                                        <input type="text" id="id" value="{{$datapegawai->id}}" class="form-control" name="id" hidden placeholder="Nama Jabatan" />
                                        <div class="row" style="margin-top: 10px">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label for="font-weight-bolder">Nama Pegawai<span
                                                            class="required">*</span></label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input diasbled type="text" id="nama" class="form-control" value="{{$datapegawai->nama}}" name="nama" placeholder="Nama Pegawai" />
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label for="font-weight-bolder">Alamat<span
                                                            class="required">*</span></label></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <textarea diasbled class="form-control" id="alamat"  name="alamat"  rows="3" placeholder="Alamat">{{$datapegawai->alamat}}</textarea>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label for="font-weight-bolder">No Telpon<span
                                                            class="required">*</span></label></label>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">ID (+62)</span>
                                                            </div>
                                                            <input diasbled type="text" class="form-control phone-number-mask" name="no_telp" value="{{$datapegawai->no_telp}}"  placeholder="62 877 982 577 86" id="no_telp" />
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Jenis Kelamin<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <select diasbled class="select2 form-control" id="jenkel"  name="jenkel" readonly required>
                                                            <option selected="" value="Pria">Pria</option>
                                                            <option value="Wanita">Wanita</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Jabatan<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <select diasbled class="select2 form-control" id="id_jabatan"  name="id_jabatan"  required>
                                                            <option selected="" value="">Pilih Jabatan ...</option>
                                                            @foreach ($jabatan as $data)
                                                            <option @if($data->id == $datapegawai->id_jabatan) selected @endif value="{{ $data->id }}">{{$data->nama_jabatan}}</option>
                                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Organisasi</label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <select class="select2 form-control" id="id_organisasi"  name="id_organisasi"  required>
                                                            <option selected="" value="">Pilih Organisasi ...</option>
                                                            @foreach ($organisasi as $data)
                                                                {{-- <option value="{{ $data->id }}">{{$data->nama_organisasi}}</option> --}}
                                                                <option @if($data->id == $datapegawai->id_organisasi) selected @endif value="{{ $data->id }}">{{$data->nama_organisasi}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <label class="font-weight-bolder">Status<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col-md-4 controls">
                                                        <select diasbled  class="select2 form-control" id="status"  name="status" aria-readonly="true">
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
                                    {{-- <button type="submit" id="btnDatasave" class="btn btn-primary">Save</button>
                                    &nbsp;
                                    <button type="reset" id="ResetForm" class="btn btn-outline-secondary">Reset</button>
                                    &nbsp; --}}
                                    <a href="{{ url('mas_data_jabatan') }}" class="btn btn-danger">Kembali</a>
                                 
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
            var dataupdate = {!! json_encode($datapegawai) !!};
            $("#status select").val(dataupdate.status);
            $("#jenkel select").val(dataupdate.jenkel);
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
                url: "<?php echo url('/mas_data_pegawai/update');?>"+"/"+$("#id").val(),
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
                                window.location.href = "{{ route('mas_data_pegawai') }}";
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
                    }
                },
            });
        }
    </script>
@endsection
