
<div class="container">
<div class="row">
<div class="col-md-12">
<br>

  <div class="marginbottom5px">
  <form method="POST" action="<?=base_url() ?>index.php/depan/ubahjml">
  <table style="background-color: #F4F4F4" class="table table-bordered">
    <thead class="thead-light">
      <tr >
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Gambar</th>
        <th style="text-align: center;">Nama Barang</th>
        <th style="text-align: center;">Harga</th>
        <th style="text-align: center; width: 20%">Quantity</th>
        <th style="text-align: center;">Sub Total</th>
        <th style="text-align: center;">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      if ($keranjang) {
        $i=1;
        $total=0;
        $grandtotal=0;
        foreach ($keranjang as $key) {
          $total = $key->harga_barang * $key->qty_pesan;
          $grandtotal = $grandtotal + $total;
          ?>
      <tr>
        <td style="text-align: center;"><?php echo $i; ?></td>
        <td style="text-align: center;"><img src="<?php echo base_url('assets/admin/gambar/'.$key->gambar_barang); ?>" width="150" height="50"></td>
        <td ><?php echo $key->nama_barang; ?></td>
        <td style="text-align: center;">Rp. <?php echo number_format($key->harga_barang,0,",","."); ?></td>
        <td style="text-align: center;">
        	<input type="hidden" value="<?=$key->kd_barang ?>" name="txtKodeH[]">
          <input style="width: 20%" type="number" value="<?=$key->qty_pesan  ?>" name="txtJum[]">
        </td>
        <td style="text-align: center;">Rp. <?php echo number_format($total,0,",","."); ?></td>
        <td><center><a class="btn btn-danger" href="<?=base_url() ?>index.php/depan/batal_keranjang/<?=$key->kd_barang?>">Batal</a></center></td>
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
        <tr>
        	<td colspan="7">
        		<center>
	        		<button class="btn btn-primary" type="submit" name="btnSave">Ubah QTY</button>
	        		&nbsp;
	        		<a href="<?=base_url() ?>index.php/depan/cekout"><button class="btn btn-primary" type="button">Cek Out</button></a>
        		</center>
        	</td>
        </tr>
     <?php }else{
      echo "<tr><td colspan='7'><center>Keranjang Kosong</center></td></tr>";
     }
    ?>
      </tbody>
  </table>
  </form>
  </div>

</div>
</div>
</div>