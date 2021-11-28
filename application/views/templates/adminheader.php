<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | DataTables</title>

<!--	<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>-->
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!--	<script src="--><?php //echo base_url(); ?><!--assets/adminlte/plugins/jquery/jquery.min.js"></script>-->


	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script src="https://momentjs.com/downloads/moment.js"></script>

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>

	<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="<?php echo base_url(); ?>home/" class="nav-link">Home</a>
			</li>
			<!--<li class="nav-item d-none d-sm-inline-block">
				<a href="#" class="nav-link">Contact</a>
			</li>-->
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Navbar Search -->
			<li class="nav-item">
				<a class="nav-link" data-widget="navbar-search" href="#" role="button">
					<i class="fas fa-search"></i>
				</a>
				<div class="navbar-search-block">
					<form class="form-inline">
						<div class="input-group input-group-sm">
							<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
							<div class="input-group-append">
								<button class="btn btn-navbar" type="submit">
									<i class="fas fa-search"></i>
								</button>
								<button class="btn btn-navbar" type="button" data-widget="navbar-search">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
					<i class="fas fa-expand-arrows-alt"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
					<i class="fas fa-th-large"></i>
				</a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="<?php echo base_url(); ?>home/" class="brand-link p-4">
			<img src="<?php echo base_url(); ?>assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light">Admin</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">

			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->

					<li class="nav-item">
						<a href="<?php echo base_url(); ?>admins/" class="nav-link">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="nav-header">INFORMATION</li>		
								
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>resident/" class="nav-link ">
							<i class="nav-icon fas fa-user"></i>
							<p>
								Residents Information
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>staff/" class="nav-link ">
							<i class="nav-icon fas fa-user-md"></i>
							<p>
								Staff Information
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>staff/role" class="nav-link ">
							<i class="nav-icon fas fa-wrench"></i>
							<p>
								Staff Role Settings
							</p>
						</a>
					</li>
					<li class="nav-header">OPERATIONS</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>pregnancy/" class="nav-link ">
							<i class="nav-icon fas fa-female"></i>
							<p>
								OB/GYN Check-up
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>staff/" class="nav-link ">
							<i class="nav-icon fas fa-baby"></i>
							<p>
								Pediatrician Check-up
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>staff/" class="nav-link ">
							<i class="nav-icon fas fa-user-injured"></i>
							<p>
								Normal Check-up
							</p>
						</a>
					</li>
					<li class="nav-header">MEDICINE</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>staff/" class="nav-link ">
							<i class="nav-icon fas fa-capsules"></i>
							<p>
								Medicine Information
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>staff/" class="nav-link ">
							<i class="nav-icon fas fa-plus"></i>
							<p>
								Received Medicine
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>staff/" class="nav-link ">
							<i class="nav-icon fas fa-minus"></i>
							<p>
								Released Medicine
							</p>
						</a>
					</li>
					
					<li class="nav-header">REPORTS</li>
			
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>


