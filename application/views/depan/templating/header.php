<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
<title>WW Furniture</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link rel="stylesheet" href="<?php echo base_url('assets/depan/css/flexslider.css')?>" type="text/css" media="screen" />
<link href="<?php echo base_url('assets/depan/css/bootstrap.css')?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('assets/depan/css/style.css')?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('assets/depan/css/font-awesome.css')?>" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/depan/css/jquery-ui.css')?>">
<link href="<?php echo base_url('assets/depan/css/easy-responsive-tabs.css')?>" rel='stylesheet' type='text/css'/>
		<style type="text/css">
			#notifikasi {
			    cursor: pointer;
			    position: fixed;
			    right: 0px;
			    z-index: 9999;
			    top: 0px;
			    margin-top: 25px;
			    margin-right: 20px;
			    min-width: 300px; 
			    max-width: 800px;  
			}
		</style>
</head>
<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		<?php if ($this->session->userdata('kd_pelanggan')){?>
			<li><a href="<?php echo site_url('depan/profil')?>"><i class="glyphicon glyphicon-user" aria-hidden="true"></i> Selamat Datang <?=$this->session->userdata('nama_pelanggan')?></a></li>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">ww.furniture@gmail.com</a></li>
			<li><i class="glyphicon glyphicon-off" aria-hidden="true"></i><a href="<?php echo site_url('depan/logout')?>">Logout</a></li>
		<?php }else{ ?>
			<li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
			<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">ww.furniture@gmail.com</a></li>
		<?php } ?>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<!-- header-bot -->
		<div class="col-md-2 logo_agile">
			<h1><a href="#"><span>ww</span>
				<!-- w Furniture  -->
				<!-- <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i> -->
			</a></h1>
		</div>
		<div class="col-md-4 header-middle">
			<form action="<?= base_url('depan/search') ?>" method="post">
					<input type="search" name="search" placeholder="Search here..." required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				<?php if ($this->session->userdata('kd_pelanggan')){?>	
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="<?php echo site_url('depan')?>">Home <span class="sr-only">(current)</span></a></li>

					<li class="menu__item dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Produk <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="<?php echo site_url('depan/produk_tv')?>">LED TV</a></li>
									<li><a href="<?php echo site_url('depan/produk_kasur')?>">Kasur</a></li>
									<li><a href="<?php echo site_url('depan/produk_lemari')?>">Lemari</a></li>
									<li><a href="<?php echo site_url('depan/produk_kursi')?>">Kursi</a></li>
								</ul>

					</li>
					<li class=" menu__item"><a class="menu__link" href="<?php echo site_url('depan/Riwayat')?>">Riwayat</a></li>
					<!-- <li class=" menu__item"><a class="menu__link" href="<?php //echo site_url('depan/about')?>">About</a></li> -->
					<li class=" menu__item"><a class="menu__link" href="<?php echo site_url('depan/kontak')?>">Contact</a></li>
				  </ul>
				<?php }else{ ?>
					<ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="<?php echo site_url('depan')?>">Home <span class="sr-only">(current)</span></a></li>

					<li class="menu__item dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Produk <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="<?php echo site_url('depan/produk_tv')?>">LED TV</a></li>
									<li><a href="<?php echo site_url('depan/produk_kasur')?>">Kasur</a></li>
									<li><a href="<?php echo site_url('depan/produk_lemari')?>">Lemari</a></li>
									<li><a href="<?php echo site_url('depan/produk_kursi')?>">Kursi</a></li>
								</ul>

					</li>
					<!-- <li class=" menu__item"><a class="menu__link" href="<?php //echo site_url('depan/about')?>">About</a></li> -->
					<li class=" menu__item"><a class="menu__link" href="<?php echo site_url('depan/kontak')?>">Contact</a></li>
				  </ul>
				<?php } ?>
				</div>
			  </div>
			</nav>	
		</div>
		<?php if ($this->session->userdata('kd_pelanggan')){?>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1"> 
					<a href="<?php echo site_url('depan/tampil_keranjang')?>"><button class="w3view-cart" type="button" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
			</div>
		</div>
		<?php } ?>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
						<form action="<?php echo site_url('depan/login')?>" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="email" name="email_pelanggan" required="">
								<label>Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="pass_pelanggan" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<input type="submit" value="Sign In">
						</form>
						  <!-- <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul> -->
														<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<!-- <img style="height: 430px" src="<?php //echo base_url('assets/kopi.jpg')?>" alt=" "/> -->
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->
<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
						 <form action="<?php echo site_url('depan/daftar')?>" method="post">
						 	<input type="hidden" name="kd_pelanggan" readonly="" required="" value="<?php echo $kode_pelanggan ?>">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="nama_pelanggan" required="">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="email_pelanggan" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="pass_pelanggan" minlength="8" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="pass_2" minlength="8" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<input type="submit" value="Sign Up">
						</form>
<!-- 						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul> -->
														<div class="clearfix"></div>
														<p><a href="#">By clicking register, I agree to your terms</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<!-- <img style="height: 430px" src="<?php //echo base_url('assets/kopi.jpg')?>" alt=" "/> -->
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>