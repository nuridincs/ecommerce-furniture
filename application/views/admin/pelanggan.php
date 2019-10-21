<div class="page-header">
							<h1>
								Tables
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Static &amp; Dynamic Tables
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
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
								<div class="row">
									<div class="col-xs-12">
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th style="text-align: center;">Kode</th>
														<th style="text-align: center;">Nama</th>
														<th style="text-align: center;">Gambar</th>
														<th style="text-align: center;">Email</th>
														<th style="text-align: center;">Alamat</th>
														<?php if ($this->session->userdata('level_adm')=='admin') { ?>
														<th style="text-align: center;">Aksi</th>
													<?php } ?>
													</tr>
												</thead>
												<tbody>
													<?php
														if($pelanggan){
															foreach ($pelanggan as $key) { ?>
														<tr class="center">
															<td><?php echo "$key->kd_pelanggan" ?></td>
															<td><?php echo "$key->nama_pelanggan" ?></td>			
															<td><img style="width: 80px; height: 25px" src="<?php echo base_url('assets/admin/gambar/pelanggan/'.$key->foto_pelanggan) ?>"></td>
															<td><?php echo "$key->email_pelanggan" ?></td>
															<td><?php echo "$key->alamat_pelanggan" ?></td>
															<?php if ($this->session->userdata('level_adm')=='admin') { ?>
															<td>
																<div class="hidden-sm hidden-xs action-buttons">
																	<a class="red" href="<?php echo base_url('admin/hapus_pelanggan/' .$key->kd_pelanggan) ?>">
																		<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	</a>
																</div>
															</td>
														<?php } ?>
														</tr>
														<?php ; }
															}
														?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
