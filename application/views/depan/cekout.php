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
<div class="container">
<div class="row">
<div class="col-md-12">
<br>

  <div class="marginbottom5px">
  <table style="background-color: #F4F4F4" class="table table-bordered">
    <thead class="thead-light">
      <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Gambar</th>
        <th style="text-align: center;">Nama Barang</th>
        <th style="text-align: center;">Harga</th>
        <th style="text-align: center; width: 20%">Quantity</th>
        <th style="text-align: center;">Sub Total</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      if ($cekout) {
        $i=1;
        $total=0;
        $grandtotal=0;
        foreach ($cekout as $key) {
          $total = $key->harga_barang * $key->qty_pesan;
          $grandtotal = $grandtotal + $total;
          ?>
      <tr>
        <td style="text-align: center;"><?php echo $i; ?></td>
        <td style="text-align: center;"><img src="<?php echo base_url('assets/admin/gambar/'.$key->gambar_barang); ?>" width="150" height="50"></td>
        <td ><?php echo $key->nama_barang; ?></td>
        <td style="text-align: center;">Rp. <?php echo number_format($key->harga_barang,0,",","."); ?></td>
        <td style="text-align: center;">
        	<input type="hidden" value="<?=$key->kd_barang ?>" name="kd_barang">
          	<input style="width: 20%;text-align: center;" type="text" readonly="" value="<?=$key->qty_pesan  ?>" name="txtjumlah">
        </td>
        <td style="text-align: center;">Rp. <?php echo number_format($total,0,",","."); ?></td>
      </tr>
      <?php $i++;
        }
        ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><b>Grand Total :</b></td>
          <td colspan="4"><strong>Rp. <?php echo number_format($grandtotal,2,",","."); ?></strong></td>
        </tr>
     <?php }else{
      echo "<tr><td colspan='7'><center>Produk Belum Tersedia</center></td></tr>";
     } ?>
      </tbody>
      <tr><td colspan="6">&nbsp;</td></tr>
  </table>

  <form method="POST" class="form-horizontal" action="<?=base_url() ?>index.php/depan/proses_transaksi/">
    <table style="background-color: #F4F4F4" class="table table-bordered">
      <tr>
        <td colspan="3" bgcolor="#CCCCCC"><strong>LENGKAPI ALAMAT PENGIRIMAN</strong></td>
      </tr>
      <tr>
        <td width="24%"><b>Nama Penerima</b></td>
        <td width="1%"><b>:</b></td>
        <td width="75%"><input type="text" required="" name="atas_nama" size="65" maxlength="100" class="form-control"></td>
      </tr>
      <tr>
        <td><b>Alamat Tujuan</b></td>
        <td><b>:</b></td>
        <td><textarea name="alamat_kirim" required="" class="form-control"></textarea></td>
      </tr>
      <tr>
        <td><b>No. Telepon</b></td>
        <td><b>:</b></td>
        <td><input type="number" required="" name="no_hp" size="20" maxlength="20" class="form-control"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnsimpan" value="Simpan &amp; Lanjutkan Transaksi" class="btn btn-warning"></td>
      </tr>
    </table>
  </form>

</div>
</div>
</div>
</div>