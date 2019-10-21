<!-- banner -->
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
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Harga <span>Terjangkau</span></h3>
						<p>Spesial Piala Dunia</p>
						<a class="hvr-outline-out button2" href="#">Belanja Sekarang </a>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Koleksi <span>Terbaik</span></h3>
						<p>Menuju 17 Agustus</p>
						<a class="hvr-outline-out button2" href="#">Belanja Sekarang </a>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Aman dan <span>Terpercaya</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="#">Belanja Sekarang </a>
					</div>
				</div>
			</div>
			<div class="item item4"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Free <span>Ongkir</span></h3>
						<p>Untuk daerah JABODETABEK</p>
						<a class="hvr-outline-out button2" href="#">Belanja Sekarang </a>
					</div>
				</div>
			</div>
			<div class="item item5"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Selamat Sampai <span>Tujuan</span></h3>
						<p>Pengiriman Cepat dan Tepat</p>
						<a class="hvr-outline-out button2" href="#">Belanja Sekarang </a>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div> 

<!-- /new_arrivals --> 
	<div class="new_arrivals_agile_w3ls_info"> 
		<div class="container">
		    <h3 class="wthree_text_info">New <span>Produk</span></h3>		
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li> Kasur</li>
							<li> Kursi</li>
							<li> Lemari</li>
							<li> LED TV</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					
						<div class="tab1">
							<?php foreach ($kasur4 as $row ) { ?>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img style="width: 255px; height: 291px" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang)?>" alt="" class="pro-image-front">
										<img style="width: 255px; height: 291px" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang)?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo site_url('depan/transaksi/'.$row->kd_barang)?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><a href="single.html"><?php echo $row->nama_barang ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">Rp. <?php echo number_format($row->harga_barang,0,',','.') ?></span>
											
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											<a href="<?php echo base_url('index.php/depan/tambah_keranjang/' .$row->kd_barang) ?>"><input type="submit" name="submit" value="Add to cart" class="button" /></a>
										</div>									
									</div>
								</div>
								
							</div>
							<?php
								}
							?>
							<div class="clearfix"></div>
						</div>
						<div class="tab2">
							<?php foreach ($kursi4 as $row ) { ?>
							 <div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img style="width: 255px; height: 291px" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang) ?>" alt="" class="pro-image-front">
										<img style="width: 255px; height: 291px" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang) ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo site_url('depan/transaksi/'.$row->kd_barang)?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><a href="single.html"><?php echo $row->nama_barang ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">Rp. <?php echo number_format($row->harga_barang,0,',','.') ?></span>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											<a href="<?php echo base_url('index.php/depan/tambah_keranjang/' .$row->kd_barang) ?>"><input type="submit" name="submit" value="Add to cart" class="button" /></a>
										</div>								
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="clearfix"></div>
						</div>
					
					 <!--//tab_two-->
						<div class="tab3">	
						<?php foreach ($lemari4 as $row ) { ?>		
						<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img style="width: 255px; height: 291px" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang) ?>" alt="" class="pro-image-front">
										<img style="width: 255px; height: 291px" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang) ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo site_url('depan/transaksi/'.$row->kd_barang)?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><a href="single.html"><?php echo $row->nama_barang ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">Rp. <?php echo number_format($row->harga_barang,0,',','.') ?></span>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											<a href="<?php echo base_url('index.php/depan/tambah_keranjang/' .$row->kd_barang) ?>"><input type="submit" name="submit" value="Add to cart" class="button" /></a>
										</div>								
									</div>
								</div>
							</div>
						<?php } ?>
							<div class="clearfix"></div>
						</div>
						<div class="tab4">
							<?php foreach ($tv4 as $row ) { ?>	
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img style="width: 255px; height: 291px" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang) ?>" alt="" class="pro-image-front">
										<img style="width: 255px; height: 291px" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang) ?>" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo site_url('depan/transaksi/'.$row->kd_barang)?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											<span class="product-new-top">New</span>
											
									</div>
									<div class="item-info-product ">
										<h4><a href="single.html"><?php echo $row->nama_barang ?></a></h4>
										<div class="info-product-price">
											<span class="item_price">Rp. <?php echo number_format($row->harga_barang,0,',','.') ?></span>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											<a href="<?php echo base_url('index.php/depan/tambah_keranjang/' .$row->kd_barang) ?>"><input type="submit" name="submit" value="Add to cart" class="button" /></a>
										</div>								
									</div>
								</div>
							</div>
						<?php } ?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	<!-- //new_arrivals --> 
	<!-- /we-offer -->
		<div class="sale-w3ls">
			<div class="container">
				<h6>Special Lebaran <span>50%</span> Diskon</h6>
 
				<a class="hvr-outline-out button2" href="#">Belanja Sekarang </a>
			</div>
		</div>
	<!-- //we-offer -->

