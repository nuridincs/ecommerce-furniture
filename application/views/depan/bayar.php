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
      if ($bayar) {
        $i=1;
        $total=0;
        $grandtotal=0;
        foreach ($bayar as $key) {
          $total = $key->harga_rinci * $key->qty_rinci;
          $grandtotal = $grandtotal + $total;
          ?>
      <tr>
        <td style="text-align: center;"><?php echo $i; ?></td>
        <td style="text-align: center;"><img src="<?php echo base_url('assets/admin/gambar/'.$key->gambar_barang); ?>" width="150" height="50"></td>
        <td ><?php echo $key->nama_barang; ?></td>
        <td style="text-align: center;">Rp. <?php echo number_format($key->harga_rinci,0,",","."); ?></td>
        <td style="text-align: center;">
        	   <input type="hidden" value="<?=$key->kd_transaksi ?>" name="kd_transaksi">
             <input type="hidden" value="<?=$key->kd_barang ?>" name="kd_barang">
          	 <input style="width: 20%;text-align: center;" type="text" readonly="" value="<?=$key->qty_rinci?>" name="qty_rinci">
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

  <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="<?=base_url() ?>depan/proses_bayar/">
    <table style="background-color: #F4F4F4" class="table table-bordered">
      <tr>
        <td colspan="3" bgcolor="#CCCCCC"><strong>Pembayaran</strong></td>
        <input type="hidden" value="<?=$key->kd_transaksi ?>" name="kd_transaksi">
      </tr>
      <tr>
        <td width="24%"><b>No Bayar</b></td>
        <td width="1%"><b>:</b></td>
        <td width="75%"><input style="width: 25%" type="text" readonly="" value="<?php echo $kode_bayar ?>" name="kd_bayar"  class="form-control"></td>
      </tr>
      <tr>
        <td width="24%"><b>Nama Bank</b></td>
        <td width="1%"><b>:</b></td>
        <td width="75%">
          <select style="width: 25%" name="nama_bank" class="form-control" required="">
            <option value="">Pilih No Rekening</option>
            <option value="BRI(034 101 000 743 303)">BRI (034 101 000 743 303)</option>
              <option value="BCA(731 025 2527)">BCA (731 025 2527)</option>
              <option value="Mandiri(0700 000 899 992)">Mandiri (0700 000 899 992)</option>
              <option value="BNI(023 827 2088)">BNI (023 827 2088)</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><b>Jumlah Bayar</b></td>
        <td><b>:</b></td>
        <td><input style="width: 25%" name="jml_bayar" readonly="" class="form-control" value="<?php echo number_format($grandtotal,2,",","."); ?>"></td>
      </tr>
      <tr>
        <td><b>Bukti Bayar</b></td>
        <td><b>:</b></td>
        <td><input style="height: 10%; width: 25%" type="file" required="" name="userfile"  class="form-control"></td>
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