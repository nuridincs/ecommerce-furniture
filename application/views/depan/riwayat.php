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
  <form method="POST" action="#">
  <table style="background-color: #F4F4F4" class="table table-bordered">
    <thead class="thead-light">
      <tr >
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Kode Transaksi</th>
        <th style="text-align: center;">Konfirmasi</th>
        <th style="text-align: center;">Bayar</th>
        <th style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      if ($riwayat) {
        $i=1;
        $total = 0;
		$grandtotal = 0;
        foreach ($riwayat as $key) {
    ?>
      <tr>
        <td style="text-align: center;"><?php echo $i; ?></td>
        <td style="text-align: center;"><?php echo $key->kd_transaksi; ?></td>
        <td style="text-align: center;"><?php if($key->status_konfirmasi == '0'){ ?>
          Menunggu di Konfirmasi
          <?php }else{ ?>
            Sudah di Konfirmasi
          <?php } ?>    
        </td>
        <td style="text-align: center;">
        <div class="hidden-sm hidden-xs action-buttons">
  				<?php if($key->status_bayar == '0'){ ?>
  					<a href="<?php echo base_url('index.php/depan/bayar/'. $key->kd_transaksi) ?>" >Belum di Bayar</a>
          <?php }else{ ?>
            Sudah di Bayar
          <?php } ?>
			   </div>
        </td>
        <td style="text-align: center;">
          <?php if ($key->status_konfirmasi == '1' && $key->status_bayar == '1') { ?>
            <!-- <a href="<?php //echo base_url('index.php/depan/cetak_nota/'. $key->kd_transaksi) ?>">Nota |</a> -->
            <a href="<?php echo base_url('index.php/depan/detail/'. $key->kd_transaksi) ?>">Detail</a>
          <?php } ?>
        </td>
      </tr>
      <?php $i++;
        }
        ?>
     <?php }else{
      echo "<tr><td colspan='8'><center>Tidak ada Riwayat Pesanan</center></td></tr>";
     }
    ?>
      </tbody>
  </table>
  </form>
  </div>

</div>
</div>
</div>