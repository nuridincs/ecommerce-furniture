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
				<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fa fa-plus"></i>Tambah Barang</button>
			    <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Tambah Barang</h4>
                        </div>
                        <div class="modal-body">
                          <form  method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" action="<?php echo site_url('admin/tambah_barang') ?>" >
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="kd_barang" readonly="" value="<?php echo $kode; ?>"    class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="nama_barang" required="" class="form-control">
                              </div>
                            </div> 
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="form-field-1"> Deskripsi Barang  </label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="deskripsi" class="form-control" />
                                </textarea> 
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Barang</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file" name="userfile" required="" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Barang</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="col-md-4 col-sm-9 col-xs-12 " required="" name="jenis_barang" style=" text-align: center;">
                                <option value="">Pilih</option>
                                <option value="Kursi">Kursi</option>
                                <option value="Lemari">Lemari</option>
                                <option value="Kasur">Kasur</option>
                                <option value="LED TV">LED TV</option>
                              </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Stok Barang</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="stok_barang" required="" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="harga_barang" required="" class="form-control">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                              <button type="submit" name="simpan" value="Lanjut" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
								<div class="row">
									<div class="col-xs-12">
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th style="text-align: center;">Kode</th>
                            <th style="text-align: center;">Nama</th>
														<th style="text-align: center;">Deskripsi</th>
														<th style="text-align: center;">Gambar</th>
                            <th style="text-align: center;">Jenis</th>
														<th style="text-align: center;">Stok</th>
														<th style="text-align: center;">Harga</th>
                            <?php if ($this->session->userdata('level_adm')=='admin') { ?>
														<th style="text-align: center;">Aksi</th>
                            <?php } ?>
													</tr>
												</thead>
												<tbody>
													<?php
														if($barang){
															foreach ($barang as $key) { ?>
														<tr class="center">
															<td><?php echo "$key->kd_barang" ?></td>
                              <td><?php echo "$key->nama_barang" ?></td>      
															<td><?php echo "$key->deskripsi" ?></td>			
															<td><img style="width: 80px; height: 25px" sizes="" src="<?php echo base_url('assets/admin/gambar/'.$key->gambar_barang) ?>"></td>
                              <td><?php echo "$key->jenis_barang" ?></td>
															<td><?php echo "$key->stok_barang" ?></td>
															<td><?php echo "$key->harga_barang" ?></td>
                              <?php if ($this->session->userdata('level_adm')=='admin') { ?>
															<td>
																<div class="hidden-sm hidden-xs action-buttons">
																	<a class="green" href="<?php echo site_url('admin/kd_edit_barang/'.$key->kd_barang) ?>">
																		<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>
																	<a class="red" href="<?php echo site_url('admin/hapus_barang/' .$key->kd_barang) ?>">
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
