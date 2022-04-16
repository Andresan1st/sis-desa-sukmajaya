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
                <div class="col-xl-12">
                    <div id="errList" class="text-capitalize"></div>
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
                                        <a href="javascript:void(0)" class="{{ (request()->is('surat_masuk')) ? 'active' : '' }} list-group-item list-group-item-action">
                                            <i data-feather="layers" class="mr-50 font-medium-3"></i>
                                            <span class="align-middle">Archives</span>
                                        </a>
                                        <a href="surat_masuk_table" class="{{ (request()->is('surat_masuk_table')) ? 'active' : '' }} list-group-item list-group-item-action">
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
                                                <span class="input-group-text border-0">
                                                    <i data-feather="search"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control files-filter border-0 bg-transparent"
                                                placeholder="Search" />
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
                                        <div class="btn-group btn-group-toggle view-toggle ml-50" data-toggle="buttons">
                                            <label class="btn btn-outline-primary p-50 btn-sm active">
                                                <input type="radio" name="view-btn-radio" data-view="grid" checked />
                                                <i data-feather="grid"></i>
                                            </label>
                                            <label class="btn btn-outline-primary p-50 btn-sm">
                                                <input type="radio" name="view-btn-radio" data-view="list" />
                                                <i data-feather="list"></i>
                                            </label>
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
                                                            <small class="text-muted">{{convertsizeHelper($lampirans)}} from 2GB</small>
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
                                        <div class="files-header">
                                            <h6 class="font-weight-bold mb-0">Filename</h6>
                                            <div>
                                                <h6 class="font-weight-bold file-item-size d-inline-block mb-0">Size</h6>
                                                <h6 class="font-weight-bold file-last-modified d-inline-block mb-0">Last
                                                    modified</h6>
                                                <h6 class="font-weight-bold d-inline-block mr-1 mb-0">Actions</h6>
                                            </div>
                                        </div>
                                        <div class="card file-manager-item folder level-up">
                                            <div class="card-img-top file-logo-wrapper">
                                                <div class="d-flex align-items-center justify-content-center w-100">
                                                    <i data-feather="arrow-up"></i>
                                                </div>
                                            </div>
                                            <div class="card-body pl-2 pt-0 pb-1">
                                                <div class="content-wrapper">
                                                    <p class="card-text file-name mb-0">...</p>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach ($surat_masuk as $key=> $item)
                                        {{-- <tr> --}}
                                            <div class="card file-manager-item folder">
                                                <div class="card-img-top file-logo-wrapper">
                                                    <div class="dropdown float-right">
                                                        <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                                                    </div>
                                                    <!-- File Dropdown Starts-->
                                                    <div class="dropdown-menu dropdown-menu-right file-dropdown">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="download" class="align-middle mr-50"></i>
                                                            <span class="align-middle">download</span>
                                                        </a>
                                                        
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="align-middle mr-50"></i>
                                                            <span class="align-middle">Delete</span>
                                                        </a>
                                                    </div>
                                                    <!-- /File Dropdown Ends -->
                                                    <div class="d-flex align-items-center justify-content-center w-100">
                                                        <i data-feather="folder"></i>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="content-wrapper">
                                                        <p class="card-text file-name mb-0">{{$item->perihal_surat}}</p>
                                                        <p class="card-text file-size mb-0">{{convertsizeHelper($item->file_size)}}</p>
                                                        <p class="card-text file-date">{{$item->created_at}}</p>
                                                    </div>
                                                    <small class="file-accessed text-muted">{{$item->nomor_surat_masuk}} : {{$item->created_at->diffForHumans()}}</small>
                                                </div>
                                            </div>
                                        {{-- </tr> --}}
                                        
                                        @endforeach
                                        <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                                            <i data-feather="alert-circle" class="mr-50"></i>
                                            No Results
                                        </div>
                                    </div>
                                    <!-- /Folders Container Ends -->

                                    <!-- Files Container Starts -->
                                    <div class="view-container">
                                        <h6 class="files-section-title mt-2 mb-75">File Lampiran Terbaru</h6>
                                        @foreach ($lampiran as $item)
                                        <div class="card file-manager-item file">
                                            <div class="card-img-top file-logo-wrapper">
                                                <div class="dropdown float-right">
                                                    <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center w-100">
                                                    {{-- <img src="travel/{{ $photo->thumbnail_path or 'path/to/default.jpg'}}" > --}}
                                                    <img 
                                                        src="{{asset('app-assets/images/icons/'.$item->file_ekstensi.'.png')}}"
                                                        alt="file-icon"
                                                        height="35" />
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="content-wrapper">
                                                    <p class="card-text file-name mb-0">{{$item->file_name}}</p>
                                                    <p class="card-text file-size mb-0">82kb</p>
                                                    <p class="card-text file-date">25 may 2019</p>
                                                </div>
                                                <small class="file-accessed text-muted">Last accessed: 23 minutes
                                                    ago</small>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                                            <i data-feather="alert-circle" class="mr-50"></i>
                                            No Results
                                        </div>
                                    </div>
                                    <!-- /Files Container Ends -->
                                </div>
                            </div>
                            <!-- file manager app content ends -->

                            <!-- File Info Sidebar Starts-->
                            <div class="modal modal-slide-in fade show" id="app-file-manager-info-sidebar">
                                <div class="modal-dialog sidebar-lg">
                                    <div class="modal-content p-0">
                                        <div
                                            class="modal-header d-flex align-items-center justify-content-between mb-1 p-2">
                                            <h5 class="modal-title">menu.js</h5>
                                            <div>
                                                <i data-feather="trash" class="cursor-pointer mr-50"
                                                    data-dismiss="modal"></i>
                                                <i data-feather="x" class="cursor-pointer" data-dismiss="modal"></i>
                                            </div>
                                        </div>
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-1">
                                            <ul class="nav nav-tabs tabs-line" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#details-tab"
                                                        role="tab" aria-controls="details-tab" aria-selected="true">
                                                        <i data-feather="file"></i>
                                                        <span class="align-middle ml-25">Details</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#activity-tab"
                                                        role="tab" aria-controls="activity-tab" aria-selected="true">
                                                        <i data-feather="activity"></i>
                                                        <span class="align-middle ml-25">Activity</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="details-tab" role="tabpanel"
                                                    aria-labelledby="details-tab">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center py-5">
                                                        <img src="../../../app-assets/images/icons/js.png" alt="file-icon"
                                                            height="64" />
                                                        <p class="mb-0 mt-1">54kb</p>
                                                    </div>
                                                    <h6 class="file-manager-title my-2">Settings</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="d-flex justify-content-between align-items-center mb-1">
                                                            <span>File Sharing</span>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="sharing" />
                                                                <label class="custom-control-label" for="sharing"></label>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex justify-content-between align-items-center mb-1">
                                                            <span>Synchronization</span>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" checked
                                                                    id="sync" />
                                                                <label class="custom-control-label" for="sync"></label>
                                                            </div>
                                                        </li>
                                                        <li class="d-flex justify-content-between align-items-center mb-1">
                                                            <span>Backup</span>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="backup" />
                                                                <label class="custom-control-label" for="backup"></label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <hr class="my-2" />
                                                    <h6 class="file-manager-title my-2">Info</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="d-flex justify-content-between align-items-center">
                                                            <p>Type</p>
                                                            <p class="font-weight-bold">JS</p>
                                                        </li>
                                                        <li class="d-flex justify-content-between align-items-center">
                                                            <p>Size</p>
                                                            <p class="font-weight-bold">54kb</p>
                                                        </li>
                                                        <li class="d-flex justify-content-between align-items-center">
                                                            <p>Location</p>
                                                            <p class="font-weight-bold">Files > Documents</p>
                                                        </li>
                                                        <li class="d-flex justify-content-between align-items-center">
                                                            <p>Owner</p>
                                                            <p class="font-weight-bold">Sheldon Cooper</p>
                                                        </li>
                                                        <li class="d-flex justify-content-between align-items-center">
                                                            <p>Modified</p>
                                                            <p class="font-weight-bold">12th Aug, 2020</p>
                                                        </li>

                                                        <li class="d-flex justify-content-between align-items-center">
                                                            <p>Created</p>
                                                            <p class="font-weight-bold">01 Oct, 2019</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="activity-tab" role="tabpanel"
                                                    aria-labelledby="activity-tab">
                                                    <h6 class="file-manager-title my-2">Today</h6>
                                                    <div class="media align-items-center mb-2">
                                                        <div class="avatar avatar-sm mr-50">
                                                            <img src="../../../app-assets/images/avatars/5-small.png"
                                                                alt="avatar" width="28" />
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mb-0">
                                                                <span class="font-weight-bold">Mae</span>
                                                                shared the file with
                                                                <span class="font-weight-bold">Howard</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="media align-items-center">
                                                        <div class="avatar avatar-sm bg-light-primary mr-50">
                                                            <span class="avatar-content">SC</span>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mb-0">
                                                                <span class="font-weight-bold">Sheldon</span>
                                                                updated the file
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h6 class="file-manager-title mt-3 mb-2">Yesterday</h6>
                                                    <div class="media align-items-center mb-2">
                                                        <div class="avatar avatar-sm bg-light-success mr-50">
                                                            <span class="avatar-content">LH</span>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mb-0">
                                                                <span class="font-weight-bold">Leonard</span>
                                                                renamed this file to
                                                                <span class="font-weight-bold">menu.js</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="media align-items-center">
                                                        <div class="avatar avatar-sm mr-50">
                                                            <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg"
                                                                alt="Avatar" width="28" />
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mb-0">
                                                                <span class="font-weight-bold">You</span>
                                                                shared this file with Leonard
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h6 class="file-manager-title mt-3 mb-2">3 days ago</h6>
                                                    <div class="media">
                                                        <div class="avatar avatar-sm mr-50">
                                                            <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg"
                                                                alt="Avatar" width="28" />
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mb-50">
                                                                <span class="font-weight-bold">You</span>
                                                                uploaded this file
                                                            </p>
                                                            <img src="../../../app-assets/images/icons/js.png" alt="Avatar"
                                                                class="mr-50" height="24" />
                                                            <span class="font-weight-bold">app.js</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- File Info Sidebar Ends -->

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
@endsection

@section('script')
    <script src="{{ asset('app-assets/js/scripts/pages/app-file-manager.js') }}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script>
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
                        // var oTable = $('#example').dataTable();
                        // oTable.fnDraw(false);

                        console.log(response.data);
                        $("#surat_masuk").prepend(
                            '<h6 class="files-section-title mt-25 mb-75">Dokumen Terbaru</h6>'
                            +'<div class="card file-manager-item folder">'
                                +'<div class="card-img-top file-logo-wrapper">'
                                    +'<div class="dropdown float-right">'
                                        +'<i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>'
                                    +'</div>'
                                    +'<div class="d-flex align-items-center justify-content-center w-100">'
                                        +'<p data-feather="folder">NEW</p>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="card-body">'
                                    +'<div class="content-wrapper">'
                                        +'<p class="card-text file-name mb-0">'+response.data.perihal_surat+'</p>'
                                        +'<p class="card-text file-size mb-0">'+response.data.file_size+' b</p>'
                                    +'</div>'
                                    +'<small class="file-accessed text-muted">'+response.data.nomor_surat_masuk+' : '+response.data.tanggal+'</small>'
                                +'</div>'
                            +'</div>'
                        );

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
