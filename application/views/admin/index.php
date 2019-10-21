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
								<div class="alert alert-block alert-success">
									Selamat Datang
									<strong class="green">
										<?=$this->session->userdata('nama_adm')?>
									</strong>
								</div>
								<!-- PAGE CONTENT ENDS -->
