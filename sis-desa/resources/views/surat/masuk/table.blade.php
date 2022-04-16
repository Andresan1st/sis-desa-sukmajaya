@extends('layout.layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-tree.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-file-manager.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-xl-12 col-12">
                    <div id="errList" class="text-capitalize" style="padding: 2%"></div>
                </div>
                <div class="col-12" style="margin-top: 30px">
                    <h2 class="content-header-title float-left mb-0">Surat Masuk</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Arsip surat dan dokumen penting
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" file-manager-application">
        <div class="content-body">
            <div class="content-area-wrapper container-xxl p-0">
                <div class="sidebar-left">
                    <div class="sidebar">
                        <div class="sidebar-file-manager">
                            <div class="sidebar-inner">
                                <!-- sidebar menu links starts -->
                                <!-- add file button -->
                                <div class="dropdown dropdown-actions">
                                    <button class="btn btn-primary add-file-btn text-center btn-block" type="button"
                                    data-toggle="modal" data-target="#modaladd">
                                        <span class="align-middle"><i data-feather="upload-cloud" class="mr-25"></i> Arsipkan Dokumen</span>
                                    </button>
                                </div>
                                <!-- add file button ends -->

                                <!-- sidebar list items starts  -->
                                <div class="sidebar-list">
                                    <!-- links for file manager sidebar -->
                                    <div class="list-group">
                                        <h6 class="section-label px-2 mb-1">Active menu</h6>
                                        <a href="surat_masuk" class="{{ (request()->is('surat_masuk')) ? 'active' : '' }} list-group-item list-group-item-action">
                                            <i data-feather="layers" class="mr-50 font-medium-3"></i>
                                            <span class="align-middle">Archives</span>
                                        </a>
                                        <a href="javascript:void(0)" class="{{ (request()->is('surat_masuk_table')) ? 'active' : '' }} list-group-item list-group-item-action">
                                            <i data-feather="list" class="mr-50 font-medium-3"></i>
                                            <span class="align-middle">Detail Doccument</span>
                                        </a>
                                    </div>
                                    <div class="list-group list-group-labels">
                                        <h6 class="section-label px-2 mb-1">File Info</h6>
                                        <small class=" px-2 mb-1">you can store all the type of these doccuments</small>
                                        <span class="list-group-item list-group-item-action">
                                            <i data-feather="file-text" class="mr-50 font-medium-3"></i>
                                            <span class="align-middle">Documents</span>
                                        </span>
                                        <span href="javascript:void(0)" class="list-group-item list-group-item-action">
                                            <i data-feather="image" class="mr-50 font-medium-3"></i>
                                            <span class="align-middle">Images</span>
                                        </span>
                                        <span href="javascript:void(0)" class="list-group-item list-group-item-action">
                                            <i data-feather="video" class="mr-50 font-medium-3"></i>
                                            <span class="align-middle">Videos</span>
                                        </span>
                                        <span href="javascript:void(0)" class="list-group-item list-group-item-action">
                                            <i data-feather="music" class="mr-50 font-medium-3"></i>
                                            <span class="align-middle">Audio</span>
                                        </span>
                                    </div>
                                    <!-- links for file manager sidebar ends -->

                                    <!-- storage status of file manager starts-->
                                    <div class="storage-status mb-1 px-2">
                                        <h6 class="section-label mb-1">Storage Status</h6>
                                        <div class="d-flex align-items-center cursor-pointer">
                                            <i data-feather="server" class="font-large-1"></i>
                                            <div class="file-manager-progress ml-1">
                                                <span> {{convertsizeHelper($total)}} used of 4GB</span>
                                                <div class="progress progress-bar-primary my-50" style="height: 6px">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                        aria-valuemin="0" aria-valuemax="100" style="width: {{$size_total}}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- storage status of file manager ends-->
                                </div>
                                <!-- side bar list items ends  -->
                                <!-- sidebar menu links ends -->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="content-right">
                    <div class="content-wrapper container-xxl p-0">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <!-- overlay container -->
                            <div class="body-content-overlay"></div>

                            <!-- file manager app content starts -->
                            <div class="file-manager-main-content">
                                <!-- search area start -->
                                <div class="file-manager-content-header d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                                            <i data-feather="menu" class="font-medium-5"></i>
                                        </div>
                                        <div class="input-group input-group-merge shadow-none m-0 flex-grow-1">
                                            <div class="input-group-prepend">
                                                <a href="/surat_masuk" class="input-group-text border-0">
                                                    <i data-feather="arrow-left"></i>
                                                </a>
                                            </div>
                                            <input type="text" class="form-control files-filter border-0 bg-transparent"
                                                placeholder="back to archives" readonly/>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="file-actions">
                                            <i data-feather="arrow-down-circle"
                                                class="font-medium-2 cursor-pointer d-sm-inline-block d-none mr-50"></i>
                                            <i data-feather="trash"
                                                class="font-medium-2 cursor-pointer d-sm-inline-block d-none mr-50"></i>
                                            <i data-feather="alert-circle"
                                                class="font-medium-2 cursor-pointer d-sm-inline-block d-none"
                                                data-toggle="modal" data-target="#app-file-manager-info-sidebar"></i>
                                            <div class="dropdown d-inline-block">
                                                <i class="font-medium-2 cursor-pointer" data-feather="more-vertical"
                                                    role="button" id="fileActions" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                </i>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="fileActions">
                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="move" class="cursor-pointer mr-50"></i>
                                                        <span class="align-middle">Open with</span>
                                                    </a>
                                                    <a class="dropdown-item d-sm-none d-block" href="javascript:void(0);"
                                                        data-toggle="modal" data-target="#app-file-manager-info-sidebar">
                                                        <i data-feather="alert-circle" class="cursor-pointer mr-50"></i>
                                                        <span class="align-middle">More Options</span>
                                                    </a>
                                                    <a class="dropdown-item d-sm-none d-block" href="javascript:void(0);">
                                                        <i data-feather="trash" class="cursor-pointer mr-50"></i>
                                                        <span class="align-middle">Delete</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="plus" class="cursor-pointer mr-50"></i>
                                                        <span class="align-middle">Add shortcut</span>
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="folder-plus" class="cursor-pointer mr-50"></i>
                                                        <span class="align-middle">Move to</span>
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="star" class="cursor-pointer mr-50"></i>
                                                        <span class="align-middle">Add to starred</span>
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="droplet" class="cursor-pointer mr-50"></i>
                                                        <span class="align-middle">Change color</span>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="download" class="cursor-pointer mr-50"></i>
                                                        <span class="align-middle">Download</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- search area ends here -->

                                <div class="file-manager-content-body">
                                    <!-- drives area starts-->
                                    <div class="drives">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="files-section-title mb-75">STATUS</h6>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="card shadow-none border cursor-pointer">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <img src="../../../app-assets/images/icons/icloud-1.png"
                                                                alt="icloud" height="38" class="p-25" />
                                                            {{-- <div class="dropdown-items-wrapper">
                                                                <span data-feather="more-vertical" id="dropdownMenuLink4"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-expanded="false"></span>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdownMenuLink4">
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="refresh-cw"
                                                                            class="mr-25"></i>
                                                                        <span class="align-middle">Refresh</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="settings"
                                                                            class="mr-25"></i>
                                                                        <span class="align-middle">Manage</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="trash" class="mr-25"></i>
                                                                        <span class="align-middle">Delete</span>
                                                                    </a>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <div class="my-1">
                                                            <h5>Online / Server Storage</h5>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-50">
                                                            <span class="text-truncate">{{convertsizeHelper($total)}} Used</span>
                                                            <small class="text-muted">4GB</small>
                                                        </div>
                                                        <div class="progress progress-bar-info progress-md mb-0"
                                                            style="height: 10px">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$size_total}}%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="card shadow-none border cursor-pointer">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <img src="../../../app-assets/images/icons/unknown.png"
                                                                alt="dropbox" height="38" />
                                                            {{-- <div class="dropdown-items-wrapper">
                                                                <i data-feather="more-vertical" id="dropdownMenuLink2"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-expanded="false"></i>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdownMenuLink2">
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="refresh-cw"
                                                                            class="mr-25"></i>
                                                                        <span class="align-middle">Refresh</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="settings"
                                                                            class="mr-25"></i>
                                                                        <span class="align-middle">Manage</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="trash" class="mr-25"></i>
                                                                        <span class="align-middle">Delete</span>
                                                                    </a>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <div class="my-1">
                                                            <h5>Dokumen Arsip</h5>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-50">
                                                            <span class="text-truncate">{{$total_docc}} file</span>
                                                            <small class="text-muted">{{convertsizeHelper($doccument)}} from 2GB</small>
                                                        </div>
                                                        <div class="progress progress-bar-success progress-md mb-0"
                                                            style="height: 10px">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$size_doccument}}%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-12">
                                                <div class="card shadow-none border cursor-pointer">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <img src="../../../app-assets/images/icons/unknown.png"
                                                                alt="icloud" height="38" class="p-25" />
                                                            {{-- <div class="dropdown-items-wrapper">
                                                                <i data-feather="more-vertical" id="dropdownMenuLink3"
                                                                    role="button" data-toggle="dropdown"
                                                                    aria-expanded="false"></i>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdownMenuLink3">
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="refresh-cw"
                                                                            class="mr-25"></i>
                                                                        <span class="align-middle">Refresh</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="settings"
                                                                            class="mr-25"></i>
                                                                        <span class="align-middle">Manage</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="javascript:void(0)">
                                                                        <i data-feather="trash" class="mr-25"></i>
                                                                        <span class="align-middle">Delete</span>
                                                                    </a>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <div class="my-1">
                                                            <h5>Dokumen Lampiran</h5>
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-50">
                                                            <span class="text-truncate">{{\App\Models\lampiransuratmasukModel::orderBy('desc')->count()}} file</span>
                                                            <small class="text-muted">{{convertsizeHelper($lampiran)}} from 2GB</small>
                                                        </div>
                                                        <div class="progress progress-bar-primary progress-md mb-0"
                                                            style="height: 10px">
                                                            <div class="progress-bar" id="lampiran_bar" role="progressbar"
                                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: {{$size_lampiran}}%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- drives area ends-->

                                    <!-- Folders Container Starts -->
                                    <div class="view-container" id="surat_masuk">
                                        <h6 class="files-section-title mt-25 mb-75">Dokumen / Arsip Surat</h6>

                                        <div class="card" style="width: 100%">
                                            <div class="card-header" style="background-color: cornflowerblue">
                                                
                                            </div>
                                            <div class="card-body">
                                                <div class="card-datatable table-responsive">
                                                    <table id="indextable" class="datatables-basic table">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>No. Surat</th>
                                                                <th>Perihal</th>
                                                                <th>Lampiran</th>
                                                                <th>Size</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                        
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>No. Surat</th>
                                                                <th>Perihal</th>
                                                                <th>Lampiran</th>
                                                                <th>Size</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                                            <i data-feather="alert-circle" class="mr-50"></i>
                                            No Results
                                        </div>
                                    </div>
                                    <!-- /Folders Container Ends -->
                                </div>
                            </div>
                            <!-- file manager app content ends -->

                            <!-- Create New Folder Modal Starts-->
                            <div class="modal fade" id="new-folder-modal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">New Folder</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control" value="New folder"
                                                placeholder="Untitled folder" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary mr-1"
                                                data-dismiss="modal">Create</button>
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Create New Folder Modal Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade text-left" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Arsipkan Surat Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formadd">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Surat Masuk</label>
                                    <input type="text" class="form-control" name="nomor_surat_masuk" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="tanggal"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Perihal Surat</label>
                                    <input type="text" class="form-control" name="perihal_surat" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>File Lampiran <i class="text-muted">"boleh kosong"</i></label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="lampiran[]" multiple>
                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>File Surat</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                                        text/plain, application/pdf" name="file" required>
                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btnadd" value="Arsipkan!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modaldel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red">
                    <h4 class="modal-title " style="color: white" id="myModalLabel17">Delete Doccument</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formdel">@csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" class="form-control">
                                    <code>Doccument ini akan dihapus dari dserver / direktori utama beserta dengan file lampirannya</code>
                                    <hr><p>Anda yakin tetap ingin menghapus doccument ini ?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" id="btndel" value="Ya Hapus!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modaldownload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(113, 139, 255)">
                    <h4 class="modal-title " style="color: white" id="myModalLabel17">Download Doccument</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <form id="formdownload">@csrf --}}
                    <form action="/surat_masuk_download" method="post" enctype="multipart/form-data"> @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" class="form-control">
                                    <hr><p>Download File Lampiran Doccument ini ?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btndownload" value="Download File!">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modaldownload2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(113, 139, 255)">
                    <h4 class="modal-title " style="color: white" id="myModalLabel17">Download Doccument</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <form id="formdownload">@csrf --}}
                    <form action="/surat_masuk_download2" method="post" enctype="multipart/form-data"> @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="errList" class="text-uppercase"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" class="form-control">
                                    <hr><p>Download File Doccument / Surat ini ?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="btndownload2" value="Download File!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('app-assets/js/scripts/pages/app-file-manager.js') }}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script>
        $(document).ready(function() {
          // $('#telats').css('width',5+'%');
        //   $('#lampiran_bar').css('width','10%');
        })
        
        $('#modaldel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
        $('#modaldownload').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
        $('#modaldownload2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

        $('#formdel').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "/surat_masuk_delete",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndel').attr('disabled', 'disabled');
                    $('#btndel').val('Proses Hapus');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaldel').modal('hide');
                        $("#formdel")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btndel').val('Ya Hapus!');
                        $('#btndel').attr('disabled', false);
                        toastr['warning']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btndel').val('Ya hapus!');
                        $('#btndel').attr('disabled', false);
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

        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('store.surat_masuk') }}",
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
        $('#formdownload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('download.surat_masuk') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#btndownload').attr('disabled', 'disabled');
                    $('#btndownload').val('Proses Download');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#modaldownload').modal('hide');
                        $("#formdownload")[0].reset();
                        var oTable = $('#indextable').dataTable();
                        oTable.fnDraw(false);
                        $('#btndownload').val('Ya Download!');
                        $('#btndownload').attr('disabled', false);
                        toastr['success']('👋'+ response.message, 'Success!', {
                        closeButton: true,
                        tapToDismiss: false,
                        });
                    } else {
                        $('#btndownload').val('Ya Download!');
                        $('#btndownload').attr('disabled', false);
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
    <script>
        $(document).ready(function() {
            var table = $('#indextable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('table.surat_masuk')}}",
                columns: [
                   {
                       "data" : "id",
                       render : function(data, type, row, meta){
                           return meta.row + meta.settings._iDisplayStart + 1;
                       }
                   },
                   {
                       data : 'nomor_surat_masuk',
                       name : 'nomor_surat_masuk'
                   },
                   {
                       data : 'perihal_surat',
                       name : 'perihal_surat'
                   },
                   {
                       data : 'lampiran',
                       name : 'lampiran'
                   },
                   {
                       data : 'size',
                       name : 'size'
                   },
                   {
                       data : 'action',
                       name : 'action'
                   }
	            ]
            });
        });
        
    </script>
@endsection
