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
								<div class="row">
									<div class="col-xs-12">
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th style="text-align: center;">Kode</th>
														<th style="text-align: center;">Gambar</th>
														<th style="text-align: center;">Nama Bank</th>
														<th style="text-align: center;">Jumlah Bayar</th>
														<th style="text-align: center;">Bukti Bayar</th>
														<th style="text-align: center;">Status Bayar</th>
														<?php if ($this->session->userdata('level_adm')=='admin') { ?>
														<th style="text-align: center;">Aksi</th>
														<?php } ?>
													</tr>
												</thead>
												<tbody>
													<?php
														if($bayar){
															foreach ($bayar as $key) { ?>
														<tr class="center">
															<td><?php echo "$key->kd_bayar" ?></td>		
															<td><img style="width: 80px; height: 25px" src="<?php echo base_url('assets/admin/gambar/'.$key->gambar_barang) ?>"></td>
															<td><?php echo "$key->nama_bank" ?></td>
															<td><?php echo "$key->jml_bayar" ?></td>
															<td><img style="width: 80px; height: 25px" src="<?php echo base_url('assets/admin/gambar/bayar/'.$key->bukti_bayar) ?>"></td>
															<td><?php if($key->status_bayar == '1'){ ?>Sudah di Bayar
                                                        		<?php }else{ ?>
                                                        		Belum di Bayar
                                                        		<?php } ?>
                                                        	</td>
                                                        	<?php if ($this->session->userdata('level_adm')=='admin') { ?>
															<td colspan="2">
																	<a class="red" href="<?php echo base_url('index.php/admin/hapus_bayar/'. $key->kd_bayar) ?>">
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
