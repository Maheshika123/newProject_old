<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>
<script src="<?=asset_url() ?>js/config.js"></script>
<link href="<?=asset_url() ?>dashboard/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=asset_url() ?>dashboard/css/datepicker3.css" rel="stylesheet">
<link href="<?=asset_url() ?>dashboard/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?=asset_url() ?>dashboard/js/lumino.glyphs.js"></script>


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #8bc34a;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span style="color: black;">Savoury</span>Restuarent</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Administrator <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?= $pageid==1?'active':''?>"><a href="<?=base_url()?>dashboard/index"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="<?= $pageid==2?'active':''?>"><a href="<?=base_url()?>dashboard/orders"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Orders</a></li>
			<li class="<?= $pageid==3?'active':''?>"><a href="<?=base_url()?>dashboard/categories"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Categories</a></li>
			<li class="<?= $pageid==4?'active':''?>"><a href="<?=base_url()?>dashboard/items"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Items</a></li>
			<li class="<?= $pageid==5?'active':''?>"><a href="<?=base_url()?>dashboard/branches"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Branches</a></li>
			<li class="<?= $pageid==6?'active':''?>"><a href="<?=base_url()?>dashboard/users"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Users</a></li>
			<li><a href="<?=base_url()?>dashboard/index"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?=base_url()?>dashboard/index"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?= $pagename?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?= $pagename?></h1>
			</div>
		</div><!--/.row-->