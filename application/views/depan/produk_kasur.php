
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>KASUR</h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="<?php echo site_url('depan')?>">Home</a><i>|</i></li>
								<li>KASUR</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-12 products-right">
			<h5>Product <span>Compare(0)</span></h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option>
						<option value="null">Name(A - Z)</option> 
						<option value="null">Name(Z - A)</option>
						<option value="null">Price(High - Low)</option>
						<option value="null">Price(Low - High)</option>	
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>					
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-top">
				
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<?php foreach ($slide as $row ) { ?>
						<li>
							<img style="width: 1200px; height: 500px" class="img-responsive" src="<?php echo base_url('assets/admin/gambar/'.$row->gambar_barang)?>" alt=" "/>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-bottom">
				<div class="col-sm-4 men-wear-left">
					<img class="img-responsive" src="<?php echo base_url('assets/depan/images/bb2.jpg')?>" alt=" " />
				</div>
				<div class="col-sm-8 men-wear-right">
					<h4>Kasur <span>Collections</span></h4>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
					accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae 
					ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
					explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
					odit aut fugit. </p>
				</div>
				<div class="clearfix"></div>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
		<div class="single-pro">
			<?php foreach ($produk as $row ) { ?>
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
			<?php } ?>
							<div class="clearfix"></div>
		</div>
	</div>
</div>	