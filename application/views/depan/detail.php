    <style>
        #image-holder {
            margin-top: 8px;
        }
        
        #image-holder img {
            border: 8px solid #DDD;
            max-width:30%;
        }
    </style>
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md-8">
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Detail</strong> Pesanan Barang</h3>
                                     <table class="table table-condensed">
                                      <?php
                                        foreach ($detail as $key ) :
                                      ?>
                                        <tr>
                                          <td>1.</td>
                                          <td>Nama Barang</td>
                                          <td><?= $key->nama_barang ?></td>
                                        </tr>
                                        <tr>
                                          <td>2.</td>
                                          <td></td>
                                          <td><div id="image-holder">
                                            <img src="<?=base_url('assets/admin/gambar/'.$key->gambar_barang) ?>" alt="">
                                          </div></td>
                                        </tr>
                                        <tr>
                                          <td>3.</td>
                                          <td>Quantity</td>
                                          <td><?= $key->qty_rinci ?></td>
                                        </tr>
                                        <tr>
                                          <td>4.</td>
                                          <td>Harga</td>
                                          <td>Rp. <?= number_format($key->harga_rinci) ?></td>
                                        </tr>
                                        <tr>
                                          <td>5.</td>
                                          <td>Total</td>
                                          <td>Rp. <?php echo number_format($key->total_rinci) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                                <div class="panel-body">
                                    
                                </div>
                                <div class="panel-footer">
                                    <a type="submit" class="btn btn-warning" href="<?php echo site_url('depan/riwayat')?>">Kembali</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>                    
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->    