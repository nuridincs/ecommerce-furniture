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
														<th style="text-align: center;">Tgl Beli</th>
														<th style="text-align: center;">Status Konfirmasi</th>
														<th style="text-align: center;">Status Bayar</th>
														<th style="text-align: center;">Tgl Konfirmasi</th>
														<th style="text-align: center;">User Konfirmasi</th>
														<?php if ($this->session->userdata('level_adm')=='admin') { ?>
														<th style="text-align: center;">Aksi</th>
														<?php } ?>
													</tr>
												</thead>
												<tbody>
													<?php
														if($pesanan){
															foreach ($pesanan as $key) { ?>
														<tr class="center">
															<td><?php echo "$key->kd_transaksi" ?></td>
															<td><?php echo "$key->tgl_beli" ?></td>
															<td><?php if($key->status_konfirmasi == '0'){ ?>Belum di Konfirmasi
                                                        		<?php }else{ ?>
                                                        			Sudah di Konfirmasi
                                                        		<?php } ?>
                                                        	</td>
                                                        	<td><?php if($key->status_bayar == '0'){ ?>Belum di Bayar
                                                        		<?php }else{ ?>
                                                        			Sudah di Bayar
                                                        		<?php } ?>
                                                        	</td>
															<td><?php echo "$key->tgl_konfirmasi" ?></td>
															<td><?php echo "$key->user_konfirmasi" ?></td>
															<?php if ($this->session->userdata('level_adm')=='admin') { ?>
															<td colspan="2">
																<div class="hidden-sm hidden-xs action-buttons">
                                                        			<?php if($key->status_bayar == '1' && $key->status_konfirmasi == '0'){ ?><a href="<?php echo base_url('index.php/admin/konfirmasi/'. $key->kd_transaksi) ?>" >Konfirmasi |</a>
                                                        			<?php }else{ ?>
                                                        				<a href="<?php echo base_url('index.php/admin/detail/'. $key->kd_transaksi) ?>" >Detail |</a>
                                                        			<?php } ?>
																	<a class="red" href="<?php echo base_url('index.php/admin/hapus_pesanan/'. $key->kd_transaksi) ?>">
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
