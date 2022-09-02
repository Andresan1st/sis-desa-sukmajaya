<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SIS - Desa Sukaraya</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('assets1/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('assets1/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('assets1/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('assets1/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets1/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('assets1/css/demo.css')}}">

	<style>
		@media(min-width:801px)
		{
			#menu-inner{
				padding-left: 300px;
				padding-right: 300px;
			}
			
		}
		@media(max-width:800px)
		{
			#hidden-header{
				display: none;
			}
			.text-compress{
				font-size: 9px;
			}
		}
	</style>
</head>
<body>
	<div class="wrapper overlay-sidebar">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue2">
				
				<a href="#" class="logo">
					<!-- <img src="{{asset('assets1/img/desaku.png')}}" style="max-width: 60px;" alt="navbar brand" class="navbar-brand"> -->
					<!-- <h5 class="text-white fw-bold" style="padding-top: 10;padding-bottom: 0; margin-bottom: 0; font-size: 16px;margin-top: 10px;">Desa Sukaraya</h5>
					<h5 class="text-white op-7" style="font-size: 12px;">Sukatani, Sukamantri Bekasi</h5> -->
				</a>
				<!-- <div>
					<h2 class="text-white fw-bold" style="padding-bottom: 0; margin-bottom: 0;">Desa Sukaraya</h2>
					<h5 class="text-white op-7 mb-2">SIS - Administrai</h5>
				</div> -->
				<!-- <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button> -->
				<!-- <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button> -->
				<!-- <div class="nav-toggle">
					<button class="btn btn-toggle sidenav-overlay-toggler">
						<i class="icon-menu"></i>
					</button>
				</div> -->
				
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-sm" data-background-color="blue2">
				<!-- <div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown" style="right: 500px;">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="{{asset('assets1/img/profile2.jpg')}}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						
					</ul>	
				</div> -->
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('assets1/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="../demo1/index.html">
											<span class="sub-item">Dashboard 1</span>
										</a>
									</li>
									<li>
										<a href="../demo2/index.html">
											<span class="sub-item">Dashboard 2</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Base</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="components/avatars.html">
											<span class="sub-item">Avatars</span>
										</a>
									</li>
									<li>
										<a href="components/buttons.html">
											<span class="sub-item">Buttons</span>
										</a>
									</li>
									<li>
										<a href="components/gridsystem.html">
											<span class="sub-item">Grid System</span>
										</a>
									</li>
									<li>
										<a href="components/panels.html">
											<span class="sub-item">Panels</span>
										</a>
									</li>
									<li>
										<a href="components/notifications.html">
											<span class="sub-item">Notifications</span>
										</a>
									</li>
									<li>
										<a href="components/sweetalert.html">
											<span class="sub-item">Sweet Alert</span>
										</a>
									</li>
									<li>
										<a href="components/font-awesome-icons.html">
											<span class="sub-item">Font Awesome Icons</span>
										</a>
									</li>
									<li>
										<a href="components/simple-line-icons.html">
											<span class="sub-item">Simple Line Icons</span>
										</a>
									</li>
									<li>
										<a href="components/flaticons.html">
											<span class="sub-item">Flaticons</span>
										</a>
									</li>
									<li>
										<a href="components/typography.html">
											<span class="sub-item">Typography</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item active submenu">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Sidebar Layouts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="sidebar-style-1.html">
											<span class="sub-item">Sidebar Style 1</span>
										</a>
									</li>
									<li class="active">
										<a href="overlay-sidebar.html">
											<span class="sub-item">Overlay Sidebar</span>
										</a>
									</li>
									<li>
										<a href="compact-sidebar.html">
											<span class="sub-item">Compact Sidebar</span>
										</a>
									</li>
									<li>
										<a href="static-sidebar.html">
											<span class="sub-item">Static Sidebar</span>
										</a>
									</li>
									<li>
										<a href="icon-menu.html">
											<span class="sub-item">Icon Menu</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Forms</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="forms/forms.html">
											<span class="sub-item">Basic Form</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Tables</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="tables/tables.html">
											<span class="sub-item">Basic Table</span>
										</a>
									</li>
									<li>
										<a href="tables/datatables.html">
											<span class="sub-item">Datatables</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
								<i class="fas fa-map-marker-alt"></i>
								<p>Maps</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="maps/jqvmap.html">
											<span class="sub-item">JQVMap</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>Charts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="charts/charts.html">
											<span class="sub-item">Chart Js</span>
										</a>
									</li>
									<li>
										<a href="charts/sparkline.html">
											<span class="sub-item">Sparkline</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="widgets.html">
								<i class="fas fa-desktop"></i>
								<p>Widgets</p>
								<span class="badge badge-success">4</span>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Menu Levels</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#subnav1">
											<span class="sub-item">Level 1</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav1">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
					</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav2">
											<span class="sub-item">Level 1</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav2">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
					</ul>
										</div>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Level 1</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<ol class="nav-item dropdown hidden-caret" style="padding-right: 70px; padding-left: 0;">
									<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
										<h2 class="text-white fw-bold" style="padding-bottom: 0; margin-bottom: 0;">Pemerintah Kabupaten Bekasi</h2>
										<h5 class="text-white op-7 mb-2">SIS - Administrai Desa Sukaraya</h5>
									</a>
								</ol>
							</div>
						
							<div class="ml-md-auto py-2 py-md-0">
								<div class="collapse" id="search-nav">
									<form class="navbar-left navbar-form nav-search mr-md-3">
										<div class="input-group">
											<div class="input-group-prepend">
												<button type="submit" class="btn btn-search pr-1">
													<i class="fa fa-search search-icon"></i>
												</button>
											</div>
											<input type="text" placeholder="Search ..." class="form-control">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="page-inner" style="margin-top: -80px;" id="hidden-header">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row" style="padding-bottom: 20px; justify-content: center; justify-items: center; align-items: center;">
							<div style="padding-right: 50px;">
								<div class="avatar-sm float-left" style="margin-bottom: 27px;">
									<img src="{{asset('assets1/img/desaku.png')}}" style="width: 80px; height: auto;" alt="..." class="avatar-img">
								</div>
							</div>
							<div>
								<h2 class="text-white fw-bold" style="padding-bottom: 0; margin-bottom: 0;">DESA SUKARAYA</h2>
								<h5 class="text-white op-7 mb-2">Jl. Raya Pilar - Sukatani, Sukamantri Bekasi 17535</h5>
							</div>
						</div>
					</div>
				</div>
				
				<div class="page-inner mt--5" id="menu-inner">
					<div class="row row-card-no-pd" style="border-radius: 20px; padding-top: 30px; padding-left: 20px; padding-right: 20px;">
						<div class="col-sm-6 col-md-3 col-6">
							<div class="bg-primary-gradient" style="  border-radius: 15px; min-height: 155px;">
								<div class="card-body ">
									<div class="row">
										<div class="col-12" style="min-height: 80px;">
											<div class="icon-big text-center">
												<img src="{{asset('assets1/img/menu9.png')}}" style="max-width: 80px;" alt="">
											</div>
										</div>
										<div class="col-12" >
											<div class="numbers" style="text-align: center;">
												<p class="card-category fw-bold" style="color: white;">PROFILE</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a href="/dashboard" target="_blank" class="col-sm-6 col-md-3 col-6">
							<div class="bg-primary-gradient" style="  border-radius: 15px;min-height: 155px; margin-bottom: 20px;">
								<div class="card-body ">
									<div class="row">
										<div class="col-12" style="min-height: 80px;">
											<div class="icon-big text-center">
												<img src="{{asset('assets1/img/menu8.png')}}" style="max-width: 80px;" alt="">
											</div>
										</div>
										<div class="col-12" >
											<div class="numbers" style="text-align: center;">
												<p class="card-category fw-bold text-compress" style="color: white;">STATISTIK DESA</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
						<a href="{{route('page.surat_keluar')}}" target="_blank" class="col-sm-6 col-md-3 col-6">
							<div class="bg-primary-gradient" style="  border-radius: 15px;min-height: 155px; margin-bottom: 20px;">
								<div class="card-body ">
									<div class="row">
										<div class="col-12" style="min-height: 80px;">
											<div class="icon-big text-center">
												<img src="{{asset('assets1/img/menu7.png')}}" style="max-width: 60px;" alt="">
											</div>
										</div>
										<div class="col-12" >
											<div class="numbers" style="text-align: center;">
												<p class="card-category fw-bold" style="color: white;">SURAT</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
						<a href="/mas_data_organisasi" target="_blank" class="col-sm-6 col-md-3 col-6">
							<div class="bg-primary-gradient" style="  border-radius: 15px;min-height: 155px; margin-bottom: 20px;">
								<div class="card-body ">
									<div class="row">
										<div class="col-12" style="min-height: 80px;">
											<div class="icon-big text-center">
												<img src="{{asset('assets1/img/menu6.png')}}" style="max-width: 60px;" alt="">
											</div>
										</div>
										<div class="col-12" >
											<div class="numbers" style="text-align: center;">
												<p class="card-category fw-bold text-compress" style="color: white;">LEMBAGA DESA</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
						<a href="/mas_data_pegawai" target="_blank" class="col-sm-6 col-md-3 col-6">
							<div class="bg-primary-gradient" style="  border-radius: 15px;min-height: 155px; margin-bottom: 20px;">
								<div class="card-body ">
									<div class="row">
										<div class="col-12" style="min-height: 80px;">
											<div class="icon-big text-center">
												<img src="{{asset('assets1/img/menu5.png')}}" style="max-width: 60px;" alt="">
											</div>
										</div>
										<div class="col-12" >
											<div class="numbers" style="text-align: center;">
												<p class="card-category fw-bold text-compress" style="color: white;">KEPEGAWAIAN</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
						<a href="/surat_masuk_table" target="_blank" class="col-sm-6 col-md-3 col-6">
							<div class="bg-primary-gradient" style="  border-radius: 15px;min-height: 155px; margin-bottom: 20px;">
								<div class="card-body ">
									<div class="row"> 
										<div class="col-12" style="min-height: 80px;">
											<div class="icon-big text-center">
												<img src="{{asset('assets1/img/menu4.png')}}" style="max-width: 60px;" alt="">
											</div>
										</div>
										<div class="col-12" >
											<div class="numbers" style="text-align: center;">
												<p class="card-category fw-bold" style="color: white;">ARSIP</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
						<div class="col-sm-6 col-md-3 col-6">
							<div class="bg-primary-gradient" style="  border-radius: 15px;min-height: 155px; margin-bottom: 20px;">
								<div class="card-body ">
									<div class="row">
										<div class="col-12" style="min-height: 80px;">
											<div class="icon-big text-center">
												<img src="{{asset('assets1/img/menu3.png')}}" style="max-width: 60px;" alt="">
											</div>
										</div>
										<div class="col-12" >
											<div class="numbers" style="text-align: center;">
												<p class="card-category fw-bold" style="color: white;">KEUANGAN</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3 col-6">
							<div class="bg-primary-gradient" style="  border-radius: 15px;min-height: 155px; margin-bottom: 20px;">
								<div class="card-body ">
									<div class="row">
										<div class="col-12" style="min-height: 80px;">
											<div class="icon-big text-center">
												<img src="{{asset('assets1/img/menu2.png')}}" style="max-width: 60px;" alt="">
											</div>
										</div>
										<div class="col-12" >
											<div class="numbers" style="text-align: center;">
												<p class="card-category fw-bold text-compress" style="color: white;">SIAGA DESA</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
						2022, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">W3K Dreams</a>
					</div>				
				</div>
			</footer>
		</div>
		
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Color Pellet</div>
			<div class="custom-content">
				<div class="switcher">
					@if ($color == null)
						<form method="POST" action="{{route('submit.color')}}"> @csrf
							<div class="switch-block">
								<h4>Tema Color</h4>
								<div class="btnSwitch">
									<input type="color" id="warna_tema" value="" name="tema_color" class="form-control" required>
									<span id="tema_val"> </span><br>
								</div>
							</div>
							<div class="switch-block">
								<h4>Background Color</h4>
								<div class="btnSwitch">
									<input type="color" id="warna_bg" value="" name="bg_color" class="form-control" required>
									<span id="bg_val"> </span><br>
								</div>
							</div>
							<div class="switch-block">
								<button type="submit" class="btn btn-sm btn-primary"> Change Color</button>
							</div>
						</form>
					@else
						<form method="POST" action="{{route('submit.color')}}"> @csrf
							<div class="switch-block">
								<h4>Tema Color</h4>
								<div class="btnSwitch">
									<input type="color" id="warna_tema" value="{{$color->tema_color}}" name="tema_color" class="form-control" required>
									<span id="tema_val" style="color: {{$color->tema_color}}">{{$color->tema_color}}</span><br>
								</div>
							</div>
							<div class="switch-block">
								<h4>Background Color</h4>
								<div class="btnSwitch">
									<input type="color" id="warna_bg" value="{{$color->bg_color}}" name="bg_color" class="form-control" required>
									<span id="bg_val" style="color: {{$color->bg_color}}">{{$color->bg_color}}</span><br>
								</div>
							</div>
							<div class="switch-block">
								<button type="submit" class="btn btn-sm btn-primary"> Change Color</button>
							</div>
						</form>
					@endif
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('assets1/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('assets1/js/core/popper.min.js')}}"></script>
	<script src="{{asset('assets1/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{asset('assets1/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets1/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('assets1/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{asset('assets1/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('assets1/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{asset('assets1/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{asset('assets1/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{asset('assets1/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{asset('assets1/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('assets1/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{asset('assets1/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('assets1/js/atlantis.min.js')}}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset('assets1/js/setting-demo.js')}}"></script>
	<script src="{{asset('assets1/js/demo.js')}}"></script>
	@yield('script')
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#177dff',
			fillColor: 'rgba(23, 125, 255, 0.14)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#f3545d',
			fillColor: 'rgba(243, 84, 93, .14)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});

		$(document).ready(function() {
            
			var colorButton = document.getElementById("warna_tema");
			var colorDiv = document.getElementById("tema_val");
			var colorButton2 = document.getElementById("warna_bg");
			var colorDiv2 = document.getElementById("bg_val");
			colorButton.oninput = function() {
				colorDiv.innerHTML = colorButton.value;
				colorDiv.style.color = colorButton.value;
			}
			colorButton2.oninput = function() {
				colorDiv2.innerHTML = colorButton2.value;
				colorDiv2.style.color = colorButton2.value;
			}
		})

	</script>
</body>
</html>