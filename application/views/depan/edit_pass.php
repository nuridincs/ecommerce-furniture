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
    
		    		  <form method="POST" class="form-horizontal col-md-6" action="<?=base_url() ?>index.php/depan/aksi_edit_pass/">
					    <table  class="table" style="margin-left: 50%; margin-top: 10px">
					      <tr>
					        <td style="text-align: center; font-size: 20px" colspan="2" bgcolor="#CCCCCC"><strong>Edit Password</strong></td>
					      </tr>
					      <tr>
					        <td><b>New Password</b></td>
					        <td><input type="Password" name="pass1" required="" class="form-control"></td>
					      </tr>
					      <tr>
					        <td><b>Confirm Password</b></td>
					        <td><input type="Password" required="" name="pass2" class="form-control"></td>
					      </tr>
					      <tr>
					        <td>&nbsp;</td>
					        <td><input type="submit" name="btnsimpan" value="Simpan" class="btn btn-warning"></td>
					      </tr>
					    </table>
					  </form>
		</div>
	</section>