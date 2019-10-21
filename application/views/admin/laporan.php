<div class="page-content-wrap">                
  <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">                                
            <h3 class="panel-title"><strong>Data Laporan</strong></h3>                     
          </div>
        <div class="panel-body">
                                <div class="panel-body">
                                                                                                          
                                        <div class="form-group">                                        
                                            <div class="col-md-4">
                                                <a href="<?php echo site_url('admin/laporan_barang')?>"><button class="btn-lg btn-info btn-block">Laporan Barang</button></a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" data-toggle="modal" data-target="#cetak-transaksi"><button class="btn-lg btn-info btn-block">Laporan Periode</button></a>
                                            </div>              
                                            <div class="col-md-4"><a href="<?php echo site_url('admin/laporan_pelanggan')?>"><button class="btn-lg btn-info btn-block">Laporan Pelanggan</button></a></div>    
                                        </div>                                       
                                </div>                            
                            </div>
                            <!-- END BLOCK BUTTONS -->

                      <div id="cetak-transaksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form action="<?php echo site_url('admin/laporan_periode'); ?>" method="post" role="form" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Cetak Data Pembelian</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group row">
                              <label class="col-md-2">Dari Tanggal</label>
                              <div class="col-md-10"><input type="date" name="dari" class="form-control" required></div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2">Sampai Tanggal</label>
                              <div class="col-md-10"><input type="date" name="sampai" required class="form-control"></div>
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</button>
                            </div>
                          </div>
                          </form>
                      </div>
                    </div>
        </div>
      </div>
    </div>
  </div>                               
</div>