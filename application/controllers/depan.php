<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class depan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_depan');
	}


	function login(){
		$email_pelanggan = $this->input->post('email_pelanggan');
		$pass_pelanggan = MD5($this->input->post('pass_pelanggan'));
		$cek = $this->model_depan->cek_login($email_pelanggan,$pass_pelanggan);
	}

	function logout(){
		$this->session->sess_destroy();
		echo "<script>alert('Anda Berhasil Logout');window.location='".site_url()."depan';</script>";
	}

	function daftar(){
		$kd_pelanggan = $this->input->post('kd_pelanggan');
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$email_pelanggan = $this->input->post('email_pelanggan');
		$pass_pelanggan = MD5($this->input->post('pass_pelanggan'));
		$pass_2 = MD5($this->input->post('pass_2'));
		$data = array(
			'kd_pelanggan' => $kd_pelanggan,
			'nama_pelanggan'	=> $nama_pelanggan,
			'email_pelanggan' => $email_pelanggan,
			'pass_pelanggan' => $pass_pelanggan
			);
		if ($pass_2 != $pass_pelanggan) {
			$this->session->set_flashdata('error',"Password Tidak Cocok !");
			redirect('depan');	
		}else{
			$data = array(
				'pass_pelanggan' => MD5($pass_pelanggan),
				 );
			$where = array(
				'kd_pelanggan' => $kd_pelanggan,
				 );
		if ($this->model_depan->cek_email($email_pelanggan)) {
			$this->session->set_flashdata('error',"Email Sudah ada");
			redirect(site_url('depan'));
		}else{
			$this->model_depan->daftar($data);
			$this->session->set_flashdata('sukses',"Anda Berhasil Daftar Silahkan Login");
			redirect(site_url('depan'));
			}
		}
	}
	

	function index(){
		$data['isi']='depan/index';
		$data['kode_pelanggan']=$this->model_depan->kode_pelanggan();
		$data['kasur']=$this->model_depan->get_barang_kasur();
		$data['kursi']=$this->model_depan->get_barang_kursi();
		$data['lemari']=$this->model_depan->get_barang_lemari();
		$data['tv']=$this->model_depan->get_barang_tv();

		$data['kasur4']=$this->model_depan->get_barang_kasur4();
		$data['kursi4']=$this->model_depan->get_barang_kursi4();
		$data['lemari4']=$this->model_depan->get_barang_lemari4();
		$data['tv4']=$this->model_depan->get_barang_tv4();
		$this->load->view('depan/templating/templating', $data);
	}

	function produk_tv(){
		$data['kode_pelanggan']=$this->model_depan->kode_pelanggan();
		$data['isi']='depan/produk_tv';
		$data['slide']=$this->model_depan->get_barang_tv4();
		$data['produk']=$this->model_depan->get_barang_tv();
		$this->load->view('depan/templating/templating', $data);
	}

	function produk_kursi(){
		$data['kode_pelanggan']=$this->model_depan->kode_pelanggan();
		$data['isi']='depan/produk_kursi';
		$data['slide']=$this->model_depan->get_barang_kursi4();
		$data['produk']=$this->model_depan->get_barang_kursi();
		$this->load->view('depan/templating/templating', $data);
	}

	function produk_lemari(){
		$data['kode_pelanggan']=$this->model_depan->kode_pelanggan();
		$data['isi']='depan/produk_lemari';
		$data['slide']=$this->model_depan->get_barang_lemari4();
		$data['produk']=$this->model_depan->get_barang_lemari();
		$this->load->view('depan/templating/templating', $data);
	}

	function produk_kasur(){
		$data['kode_pelanggan']=$this->model_depan->kode_pelanggan();
		$data['isi']='depan/produk_kasur';
		$data['slide']=$this->model_depan->get_barang_kasur4();
		$data['produk']=$this->model_depan->get_barang_kasur();
		$this->load->view('depan/templating/templating', $data);
	}

	function about(){
		$data['isi']='depan/about';
		$this->load->view('depan/templating/templating', $data);
	}

	function kontak(){
		$data['kode_pelanggan']=$this->model_depan->kode_pelanggan();
		$data['isi']='depan/kontak';
		$this->load->view('depan/templating/templating', $data);
	}

	function transaksi(){
		$data['isi']='depan/transaksi';
		$data['barang']=$this->model_depan->get_transaksi($this->uri->segment(3));
		$this->load->view('depan/templating/templating', $data);
	}

	function tambah_keranjang(){
		if($this->session->userdata('status')!='login'){
			$this->session->set_flashdata('error',"Silahkan Login Terlebih Dahulu");
			redirect(site_url('depan'));
		}
		$id=$this->uri->segment(3);
	    $getHarga = $this->model_depan->add_barang($id);
	    $get_tmp = $this->model_depan->add_tmp($id);
	    $qty_pesan=$get_tmp->qty_pesan;
	    $nama_barang=$getHarga->nama_barang;
	    $harga=$getHarga->harga_barang;
	    $idbarang=$id;
	    $idpelanggan=$this->session->userdata('kd_pelanggan');
	    $qty=1;
	    $ttl_qty=$qty_pesan + $qty;
	    if ($this->model_depan->cek_keranjang($idbarang)){
	    	$this->model_depan->fill_cek($ttl_qty);
	    	$this->model_depan->update_cek($idbarang, $ttl_qty);
	    	$this->session->set_flashdata('sukses',"".$nama_barang." Berhasil Ditambahkan");
			redirect(site_url('depan'));
			}else{
	    	$this->model_depan->fill_data($harga,$idbarang,$idpelanggan,$qty);
	    	$this->model_depan->insert_data();
			$this->session->set_flashdata('sukses',"".$nama_barang." Berhasil Ditambahkan");
			redirect(site_url('depan'));
	    }
	}

	function tampil_keranjang(){
		if($this->session->userdata('status')!='login'){
			$this->session->set_flashdata('error',"Silahkan Login Terlebih Dahulu");
			redirect(site_url('depan'));
		}
		$kd_pelanggan = $this->session->userdata('kd_pelanggan');
		$data['keranjang']=$this->model_depan->get_keranjang($kd_pelanggan);
		$data['isi']='depan/keranjang';
		$this->load->view('depan/templating/templating', $data);
	}

	function batal_keranjang($kd_barang){
		if ($this->model_depan->batal_beli($kd_barang)) {
			$this->session->set_flashdata('sukses'," Barang Berhasil di Batalkan");
			redirect(site_url('depan/tampil_keranjang'));
		}
	}

	function ubahjml(){
    	if($this->model_depan->ubah()){
      	$this->session->set_flashdata('sukses',"Qty Berhasil di Ubah");
			redirect(site_url('depan/tampil_keranjang'));
    	}
  	}

	 function cekout(){
	 	if($this->session->userdata('status')!='login'){
			$this->session->set_flashdata('error',"Silahkan Login Terlebih Dahulu");
			redirect(site_url('depan'));
		}
	    $kd_pelanggan=$this->session->userdata('kd_pelanggan');
	    $data['cekout']=$this->model_depan->get_keranjang($kd_pelanggan);
	    $data['isi']='depan/cekout';
	    $this->load->view('depan/templating/templating', $data);
	 }

	 function proses_transaksi(){
	 	$kode=$this->model_depan->kode_transaksi();
	    $this->model_depan->fill_cok($kode);
	    if($this->model_depan->insert_co($kode)){
	      $this->session->set_flashdata('sukses',"Transaksi Berhasil");
			redirect(site_url('depan'));
	    }else{
	    	$this->session->set_flashdata('error',"Transaksi Gagal");
			redirect(site_url('depan/cekout'));
	    }
	}

	function riwayat(){
		if($this->session->userdata('status')!='login'){
			$this->session->set_flashdata('error',"Silahkan Login Terlebih Dahulu");
			redirect(site_url('depan'));
		}
		$kd_pelanggan=$this->session->userdata('kd_pelanggan');
		$data['isi']='depan/riwayat';
		$data['riwayat']=$this->model_depan->riwayat($kd_pelanggan);
		$this->load->view('depan/templating/templating', $data);
	}


	function bayar(){
		if($this->session->userdata('status')!='login'){
			$this->session->set_flashdata('error',"Silahkan Login Terlebih Dahulu");
			redirect(site_url('depan'));
		}
		$id=$this->uri->segment(3);
		$data['kode_bayar']=$this->model_depan->kode_bayar();
		$kd_pelanggan=$this->session->userdata('kd_pelanggan');
		$data['isi']='depan/bayar';
		$data['bayar']=$this->model_depan->get_bayar($kd_pelanggan, $id);
		$this->load->view('depan/templating/templating', $data);
	}

	function proses_bayar(){
        $kd_tr 		= $this->input->post('kd_transaksi');

		$kode = 0;
        $tgl = date("Ymd-");
        $batas = str_pad($kode, 2, "0");    
		$kodetampil = "BY".$tgl.$batas;

		$config['upload_path'] = './assets/admin/gambar/bayar';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|PNG';
		$config['max_size'] = '2048';
		$config['max_width'] = '1288';
		$config['max_height'] = '1288';
		$config['file_name'] = $kodetampil;

		$this->upload->initialize($config);
		if (! $this->upload->do_upload())
		{
			$a=$this->upload->display_errors();
			echo $a;
		}else{
			$gbr = $this->upload->data();
			$foto=$gbr['file_name'];
			$this->model_depan->fill_bayar($foto, $kd_tr);
			$this->model_depan->update_bayar($kd_tr);
			if($this->model_depan->tambah_bayar())
				$this->session->set_flashdata('sukses',"Barang Berhasil di Bayar");
			redirect(site_url('depan/riwayat'));
		}
	}

	function profil(){
		if($this->session->userdata('status')!='login'){
			$this->session->set_flashdata('error',"Silahkan Login Terlebih Dahulu");
			redirect(site_url('depan'));
		}
		$kd_pelanggan=$this->session->userdata('kd_pelanggan');
		$data['isi']='depan/profil';
		$data['profil']=$this->model_depan->profil($kd_pelanggan);
		$this->load->view('depan/templating/templating', $data);
	}

	function edit_profil($kd_pelanggan){
		if($this->session->userdata('status')!='login'){
			$this->session->set_flashdata('error',"Silahkan Login Terlebih Dahulu");
			redirect(site_url('depan'));
		}
		$kd_pelanggan=$this->session->userdata('kd_pelanggan');
		$data['isi']='depan/edit_profil';
		$data['kode']=$kd_pelanggan;
		$data['profil']=$this->model_depan->profil($kd_pelanggan);
		$this->load->view('depan/templating/templating', $data);
	}

	function aksi_edit_profil($kode){
		$kd_pelanggan = $this->input->post('kd_pelanggan');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $alamat_pelanggan = $this->input->post('alamat_pelanggan');
		$email_pelanggan = $this->input->post('email_pelanggan');
		$gambar = $this->model_depan->gambar_pelanggan($kd_pelanggan);

		$kode = 1;
        $tgl = date("Ymd-");
        $batas = str_pad($kode, 3, "0");    
		$kodetampil = $tgl.$batas;


		if ($_FILES AND $_FILES['userfile']['name']) {
		$config['upload_path'] = 'assets/admin/gambar/pelanggan/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['file_name'] = $kodetampil;
		$this->upload->initialize($config);
		if (! $this->upload->do_upload('userfile')){
			$a=$this->upload->display_errors();
			echo $a;
		}else{
			$gbr = $this->upload->data();
			$foto=$gbr['file_name'];
			$kd_pelanggan=$this->input->post('kd_pelanggan');
			unlink('assets/admin/gambar/pelanggan/'.$gambar->foto_pelanggan);
			$data = array(
				'nama_pelanggan' => $nama_pelanggan,
				'alamat_pelanggan' => $alamat_pelanggan,
				'email_pelanggan' => $email_pelanggan,
				'foto_pelanggan' => $foto
			);
			if($this->model_depan->edit_profil($kd_pelanggan, $data)){
			$this->session->set_flashdata('sukses',"Profil Berhasil di Edit");
			redirect(site_url('depan/profil'));
			}	
		}
	}else{
			$kd_pelanggan=$this->input->post('kd_pelanggan');
			$data = array(
				'nama_pelanggan' => $nama_pelanggan,
				'alamat_pelanggan' => $alamat_pelanggan,
				'email_pelanggan' => $email_pelanggan
			);
			if($this->model_depan->edit_profil($kd_pelanggan, $data)){
			$this->session->set_flashdata('sukses',"Profil Berhasil di Edit");
			redirect(site_url('depan/profil'));
			}	
	}
	}

	function edit_pass(){
		if($this->session->userdata('status')!='login'){
			$this->session->set_flashdata('error',"Silahkan Login Terlebih Dahulu");
			redirect(site_url('depan'));
		}
		$kd_pelanggan=$this->session->userdata('kd_pelanggan');
		$data['isi']='depan/edit_pass';
		$this->load->view('depan/templating/templating', $data);
	}

	function aksi_edit_pass(){
		$pass1=$this->input->post('pass1');
		$pass2=$this->input->post('pass2');
		$kd_pelanggan=$this->session->userdata('kd_pelanggan');

		if ($pass2 != $pass1) {
			$this->session->set_flashdata('error',"Password Tidak Cocok !");
			redirect('depan/edit_pass');	
		}else{
			$data = array(
				'pass_pelanggan' => MD5($pass1),
				 );
			$where = array(
				'kd_pelanggan' => $kd_pelanggan,
				 );
			$rubahpass=$this->model_depan->update_pass($data,$where);
			if ($rubahpass) {
				$this->session->set_flashdata('sukses',"Password Berhasil dirubah !");
				redirect('depan/profil');
			}else{
				$this->session->set_flashdata('error',"Password Tidak Cocok !");
				redirect('depan/edit_pass');
			}
		}
	}

	function detail($kd_transaksi){
		$data['isi']='depan/detail';
		$data['detail']=$this->model_depan->get_detail($kd_transaksi);
		$this->load->view('depan/templating/templating',$data);
	}

}
