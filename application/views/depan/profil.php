
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
	               	<table style="margin-top: 20px">
					  <tr>
					    <td width="400" style="text-align: center; "><img style="border-radius: 20px" src="<?=base_url('assets/admin/gambar/pelanggan/'.$profil->foto_pelanggan)?>" width="200" height="200"></td>
					  </tr>
					  <td><br></td>
					</table>
					<br>
					<table>
					  <tr>
					    <th width="130">Nama</th>
					    <th width="10">:</th>
					    <td><?=$profil->nama_pelanggan?></td>
					  </tr>
					  <td><br></td>
					  <tr>
					    <th>Alamat</th>
					    <th>:</th>
					    <td colspan="3"><?=$profil->alamat_pelanggan?></td>
					  </tr>
					  <td><br></td>
					  <tr>
					    <th>Email</th>
					    <th>:</th>
					    <td colspan="3"><?=$profil->email_pelanggan?></td>
					  </tr>
					  <td><br></td>
					  <tr>
					    <td></td>
					    <td></td>
					    <td><a href="<?=site_url('depan/edit_pass/'.$profil->kd_pelanggan)?>" class="btn btn-sm btn-primary">Edit Password</a>
					    <a href="<?=site_url('depan/edit_profil/'.$profil->kd_pelanggan)?>" class="btn btn-sm btn-primary">Edit Profil</a>
						</td> 
					  </tr>
					  <td><br></td>
					</table>
				</div>
		</div>
	</section>