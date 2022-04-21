@extends('layout.layout')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12" style="margin-top: 30px">
                    <h2 class="content-header-title float-left mb-0">Dashboard Statistic</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard Statistic
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Statistics card section -->
        <section id="statistics-card">
            <!-- Miscellaneous Charts -->
            <div class="row match-height">
                <!-- Bar Chart -Orders -->
                <!--/ Line Chart -->
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title">Statistics</h4>
                            <div class="d-flex align-items-center">
                                <p class="card-text mr-25 mb-0"> Perbulan</p>
                            </div>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i class="fa fa-solid  fa-inbox-in"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">230k</h4>
                                            <p class="card-text font-small-3 mb-0">SURAT MASUK</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                    <div class="media">
                                        <div class="avatar bg-light-info mr-2">
                                            <div class="avatar-content">
                                                <i class="fa fa-solid  fa-inbox-out"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">8.549k</h4>
                                            <p class="card-text font-small-3 mb-0">SURAT KELUAR</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <i class="fa fa-solid  fa-users-cog"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">1.423k</h4>
                                            <p class="card-text font-small-3 mb-0">Pegawai</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="media">
                                        <div class="avatar bg-light-success mr-2">
                                            <div class="avatar-content">
                                                <i class="fa fa-solid  fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">$9745</h4>
                                            <p class="card-text font-small-3 mb-0">Masyarakat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                url: "<?php echo url('/mas_data_pegawai/store'); ?>",
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
