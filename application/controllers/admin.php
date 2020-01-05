<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status')!='login'){
			redirect('login');
		}
		$this->load->model('model_admin');
		$this->load->library('FPDF');
		$this->load->library('email'); 
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
	}

	function index(){
		$data['isi']='admin/index';
		$this->load->view('templating/templating', $data);
	}

	function barang(){
		$data['isi']='admin/barang';
		$data['kode']=$this->model_admin->kode_barang();
		$data['barang']=$this->model_admin->get_barang();
		$this->load->view('templating/templating', $data);
	}

	function laporan_barang(){
		$data['laporan']=$this->model_admin->get_barang();
		$this->load->view('admin/laporan_barang', $data);
	}

	function tambah_barang(){
		$kd_barang = $this->input->post('kd_barang');
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi');
        $jenis_barang = $this->input->post('jenis_barang');
		$stok_barang = $this->input->post('stok_barang');
		$harga_barang = $this->input->post('harga_barang');

		$kode = 0;
        $tgl = date("Ymd-");
        $batas = str_pad($kode, 3, "0");    
		$kodetampil = $tgl.$batas;

		$config['upload_path'] = './assets/admin/gambar/';
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
			$this->model_admin->fill_data($foto);
			if($this->model_admin->tambah_barang())
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect(site_url('admin/barang'));
		}
	}

	function kd_edit_barang($kd_barang){
		$data['isi']='admin/edit_barang';
		$data['data'] = $this->model_admin->ambil_kd_barang($kd_barang);
		$this->load->view('templating/templating', $data);
	}

	function edit_barang(){
		$kd_barang = $this->input->post('kd_barang');
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi');
        $jenis_barang = $this->input->post('jenis_barang');
		$stok_barang = $this->input->post('stok_barang');
		$harga_barang = $this->input->post('harga_barang');
		$gambar = $this->model_admin->gambar($kd_barang);


		$kode = 1;
        $tgl = date("Ymd-");
        $batas = str_pad($kode, 3, "0");    
		$kodetampil = $tgl.$batas;


		if ($_FILES AND $_FILES['userfile']['name']) {
			$config['upload_path'] = 'assets/admin/gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '2048';
			$config['max_width'] = '1288';
			$config['max_height'] = '1288';
			$config['file_name'] = $kodetampil;

			$this->upload->initialize($config);
			if (! $this->upload->do_upload('userfile')){
				$a=$this->upload->display_errors();
				echo $a;
			}else{
				$gbr = $this->upload->data();
				$foto=$gbr['file_name'];
				$kd_barang=$this->input->post('kd_barang');
				unlink('assets/admin/gambar/'.$gambar->gambar_barang);
				$data = array(
					'nama_barang' => $nama_barang,
					'stok_barang' => $stok_barang,
					'jenis_barang' => $jenis_barang,
					'harga_barang' => $harga_barang,
					'gambar_barang' => $foto
				);
				if($this->model_admin->edit_barang($kd_barang, $data)){
					$this->session->set_flashdata('sukses',"Barang Berhasil di Edit");
					redirect(site_url('admin/barang'));
				}	
			}
		}else{
			$kd_barang=$this->input->post('kd_barang');
			$data = array(
				'nama_barang' => $nama_barang,
				'deskripsi' => $deskripsi,
				'stok_barang' => $stok_barang,
				'jenis_barang' => $jenis_barang,
				'harga_barang' => $harga_barang
			);
			if($this->model_admin->edit_barang($kd_barang, $data)){
				$this->session->set_flashdata('sukses',"Barang Berhasil di Edit");
				redirect(site_url('admin/barang'));
			}	
		}
	}

	function hapus_barang($kd_barang){
		$gambar = $this->model_admin->gambar($kd_barang);
	 	unlink('assets/admin/gambar/'.$gambar->gambar_barang);
	  	$this->model_admin->hapus_barang($kd_barang);
	  	$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect(site_url('admin/barang'));
	}

	function pelanggan(){
		$data['isi']='admin/pelanggan';
		$data['pelanggan']=$this->model_admin->get_pelanggan();
		$this->load->view('templating/templating', $data);
	}

	function laporan_pelanggan(){
		$data['laporan']=$this->model_admin->get_pelanggan();
		$this->load->view('admin/laporan_pelanggan', $data);
	}

	function hapus_pelanggan($kd_pelanggan){
		$gambar=$this->model_admin->gambar_pelanggan($kd_pelanggan);
		unlink('assets/admin/gambar/'.$gambar->gambar_pelanggan);
		$this->model_admin->hapus_pelanggan($kd_pelanggan);
		$this->session->set_flashdata('sukses',"Pelanggan Berhasil Dihapus");
		redirect(site_url('admin/pelanggan'));
	}

	function pesanan(){
		$data['isi']='admin/pesanan';
		$data['pesanan']=$this->model_admin->get_pesanan();
		$this->load->view('templating/templating',$data);
	}

	function hapus_pesanan($kd_transaksi){
		$where = array(
			'kd_transaksi' => $kd_transaksi);
		$hapus=$this->model_admin->hapus_pesanan($where);
		$hapus1=$this->model_admin->hapus_rinci($where);
		if($hapus && $hapus1){
			$this->session->set_flashdata('sukses',"Pesanan Berhasil Dihapus");
			redirect(site_url('admin/pesanan'));
		}
	}

	function konfirmasi($kd_transaksi){
		$user=$this->session->userdata('level_adm');
		$tgl=date('Y-m-d');
		$where=array(
			'kd_transaksi' =>$kd_transaksi
		);
		$this->model_admin->konfirmasi($where, $tgl, $user);
		$this->getDtlTrx($kd_transaksi);
		$this->session->set_flashdata('sukses',"Pesanan Berhasil di Konfirmasi");
			redirect(site_url('admin/pesanan'));
	}

	function laporan_periode(){
		$dari=$this->input->post('dari');
		$sampai=$this->input->post('sampai');
		$dari_tgl = date('Y-m-d', strtotime($dari));
		$sampai_tgl = date('Y-m-d', strtotime($sampai));
		$data['laporan']=$this->model_admin->get_periode($dari_tgl, $sampai_tgl);
		$this->load->view('admin/laporan_periode', $data);
	}

	function bayar(){
		$data['isi']='admin/bayar';
		$data['bayar']=$this->model_admin->get_bayar();
		$this->load->view('templating/templating',$data);
	}

	function hapus_bayar($kd_bayar){
		$gambar = $this->model_admin->gambar_bayar($kd_bayar);
	 	unlink('assets/admin/gambar/bayar/'.$gambar->bukti_bayar);
		$hapus=$this->model_admin->hapus_bayar($kd_bayar);
		if($hapus){
			$this->session->set_flashdata('sukses',"Pembayaran Berhasil Dihapus");
			redirect(site_url('admin/bayar'));
		}
	}

	 function laporan(){
	 	$data['isi']='admin/laporan';
	 	$this->load->view('templating/templating', $data);
	 }


	function detail($kd_transaksi){
		$data['isi']='admin/detail';
		$data['detail']=$this->model_admin->get_detail($kd_transaksi);
		$this->load->view('templating/templating',$data);
	}

	public function sendEmail($data){
		$emailUser = $data->email_pelanggan;
		$subject = "Konfirmasi Pembayaran Berhasil";
		$msg = $this->load->view('admin/konfirmasi_pembayaran', $data, TRUE);
		$ci = get_instance();
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "projekdevelopment@gmail.com";
		$config['smtp_pass'] = "d3veL0pm3nt";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('noreply@wwfurniture.com', 'WW Furniture');
		$ci->email->to($emailUser);
		$ci->email->subject($subject);
		$ci->email->message($msg);
		$this->email->send();
		// if ($this->email->send()) {
		// 	echo 'Email sent.';
		// } else {
		// 	show_error($this->email->print_debugger());
		// }
	}

	public function konfirmasiPembayaran($dataTRX) {
		$this->load->view('admin/konfirmasi_pembayaran', $dataTRX);
	}

	public function getDtlTrx($id_trx) {
		$dataTrx = $this->model_admin->getDetailTrx($id_trx);
		$this->sendEmail($dataTrx);
		// $this->konfirmasiPembayaran($dataTrx);
	}
}
