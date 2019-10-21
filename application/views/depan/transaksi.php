<?php 
          $data=$this->session->flashdata('sukses');
          if($data!=""){ ?>
            <div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?=$data;?></div>
        <?php } ?>

        <?php 
          $data2=$this->session->flashdata('error');
          if($data2!=""){ ?>
            <div id="notifikasi" class="alert alert-danger"><strong> Error ! </strong> <?=$data2;?></div>
        <?php } ?>

<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<?php { ?>
			<h3><?php echo $barang['jenis_barang'] ?></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo site_url('depan')?>">Home</a><i>|</i></li>
								<li><?php echo $barang['jenis_barang'] ?></li>
							</ul>
						 </div>
				</div>
			<?php } ?>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<?php { ?>
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="<?php echo base_url('assets/admin/gambar/'.$barang['gambar_barang'])?>">
							<div class="thumb-image"> <img style="width: 397px; height: 467px;" src="<?php echo base_url('assets/admin/gambar/'.$barang['gambar_barang'])?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="<?php echo base_url('assets/admin/gambar/'.$barang['gambar_barang'])?>">
							<div class="thumb-image"> <img style="width: 397px; height: 467px;" src="<?php echo base_url('assets/admin/gambar/'.$barang['gambar_barang'])?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="<?php echo base_url('assets/admin/gambar/'.$barang['gambar_barang'])?>">
							<div class="thumb-image"> <img style="width: 397px; height: 467px;" src="<?php echo base_url('assets/admin/gambar/'.$barang['gambar_barang'])?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3><?php echo $barang['nama_barang'] ?></h3>
					<p><span class="item_price">Rp. <?php echo number_format($barang['harga_barang'],0,',','.')  ?></span></p>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Deskripsi</li>
							<li>Informasi</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							  <h6>Lorem ipsum dolor sit amet</h6>
							   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
							</div>
						</div>
						<!--//tab_one-->
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>Big Wing Sneakers (Navy)</h6>
							   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
				</div>	
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
						<a href="<?php echo base_url('index.php/depan/tambah_keranjang/' .$barang['kd_barang']) ?>"><input type="submit" name="submit" value="Add to cart" class="button" /></a>									
					</div>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">Share On : </li>
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
														</ul>
					
		      </div>
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	
	<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
		     <?php } ?>
	        </div>
 </div>
</div>
