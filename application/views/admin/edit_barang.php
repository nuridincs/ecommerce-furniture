						<div class="page-header">
							<h1>
								Edit Barang
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Common form elements and layouts
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="<?php echo base_url().'index.php/admin/edit_barang' ?>" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Barang  </label>
										<div class="col-sm-9">
											<input type="text" name="kd_barang" value="<?=$data->kd_barang?>"  readonly="" class="col-xs-10 col-sm-5"  />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Barang  </label>
										<div class="col-sm-9">
											<input type="text" name="nama_barang" required="" value="<?=$data->nama_barang?>"  class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Gambar Barang  </label>
										<div class="col-sm-9">
											<img style="width: 40%; height: 20%" class="img-responsive" src="<?php echo base_url('assets/admin/gambar/'.$data->gambar_barang) ?>"  widht="50px" height="50px"/>
											<input type="file" name="userfile" class="col-xs-10 col-sm-5"  />
										</div>
									</div>
									<div class="form-group">
		                              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Barang  </label>
		                              <div class="col-md-9 col-sm-9 col-xs-12">
		                                <select class="col-md-4 col-sm-9 col-xs-12 " required="" name="jenis_barang" value="<?=$data->jenis_barang?>" style=" text-align: center;">
		                                <option value="">Pilih</option>
		                                <option value="Kursi">Kursi</option>
		                                <option value="Lemari">Lemari</option>
		                                <option value="Kasur">Kasur</option>
		                                <option value="LED TV">LED TV</option>
		                              </select>
		                              </div>
		                            </div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stok Barang  </label>
										<div class="col-sm-9">
											<input type="text" required="" name="stok_barang" value="<?=$data->stok_barang?>"  class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Harga Barang  </label>
										<div class="col-sm-9">
											<input type="text" required="" name="harga_barang" value="<?=$data->harga_barang?>"  class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
									<div class="hr hr-24"></div>
								</form>
							</div>
						</div>
