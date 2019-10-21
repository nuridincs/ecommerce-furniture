
	<section id="cart_items">
		<div class="container">

			<?php 
				$data=$this->session->flashdata('sukses');
		        if($data!=""){ ?>
		        	<div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
		    <?php } ?>

		    <?php 
		        $data2=$this->session->flashdata('error');
		        if($data2!=""){ ?>
		        	<div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
		    <?php } ?>
		    
               	<div style="margin-left: 30% " class="col-sm-8 col-sm-offset-2">
               	<form method="POST" enctype="multipart/form-data" action="<?php echo site_url('depan/aksi_edit_profil/'.$kode)?>">
	               	<table style="margin-top: 20px" >
					  <tr>
					    <td width="400" style="text-align: center; "><img src="<?=base_url('assets/admin/gambar/pelanggan/'.$profil->foto_pelanggan)?>" width="200" height="200">
					    	<input style="width: 65%; margin-left: 17%" type="file"  name="userfile"  class="form-control">
					    </td>
					    <input class="form-control" required="" type="hidden" name="kd_pelanggan" value="<?=$profil->kd_pelanggan?>">
					  </tr>
					  <td><br></td>
					</table>
					<br>
					<table>
					  <tr>
					    <th width="130">Nama</th>
					    <th width="10">:</th>
					    <td><input class="form-control" required="" type="text" name="nama_pelanggan" value="<?=$profil->nama_pelanggan?>"></td>
					  </tr>
					  <td><br></td>
					  <tr>
					    <th>Alamat</th>
					    <th>:</th>
					    <td colspan="3"><textarea class="form-control" required=""  name="alamat_pelanggan"><?=$profil->alamat_pelanggan?></textarea></td>
					  </tr>
					  <td><br></td>
					  <tr>
					    <th>Email</th>
					    <th>:</th>
					    <td colspan="3"><input class="form-control" required="" type="Email" name="email_pelanggan" value="<?=$profil->email_pelanggan?>"></td>
					  </tr>
					  <td><br></td>
					  <tr>
					    <td></td>
					    <td></td>
					    <td><input class="btn btn-sm btn-primary" type="submit" name="" value="Simpan">
						</td> 
					  </tr>
					  <td><br></td>
					</table>
				</form>
				</div>
		</div>
	</section>
