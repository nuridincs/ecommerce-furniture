<?php
Class model_admin extends CI_Model{
	var $CI;
	function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
	}

	function cek_login($user_adm, $pass_adm){
		$this->db->where('user_adm',$user_adm);
		$this->db->where('pass_adm',$pass_adm);
		$query=$this->db->get('tb_admin');
		$cek=$query->num_rows();
		if($cek > 0){
			$data=$query->row();
			$level_adm=$data->level_adm;
			$data_session = array(
				'kd_adm' => $data->kd_adm,
				'nama_adm' => $data->nama_adm,
				'level_adm' => $data->level_adm,
				'status'  => "login");

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('sukses',"Selamat Datang ".$level_adm." ");
			redirect(site_url('admin'));
		}else{
			$this->session->set_flashdata('error',"Username atau Password Salah");
			redirect(site_url('login'));
		}
	}

	function get_barang(){
		$result=$this->db->get('tb_barang');
		return $result->result();
	}

	function kode_barang(){
		  $result = $this->db->select('RIGHT(tb_barang.kd_barang,2) as kd_barang', FALSE);
		  $result = $this->db->from('tb_barang');
		  $result = $this->db->order_by('kd_barang','DESC');    
		  $result = $this->db->limit(1);    
		  $result = $this->db->get('');    
		  if($result->num_rows() <> 0){        
			   $data = $result->row();      
			   $kode = intval($data->kd_barang) + 1; 
		  }
		  else{      
			   $kode = 1;
		  } 
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "BR".$batas;  //format kode
			  return $kodetampil;  
	}

	function fill_data($foto){
		$this->data = array(
			'kd_barang' => $this->input->post('kd_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'stok_barang' => $this->input->post('stok_barang'),
			'harga_barang' => $this->input->post('harga_barang'),
			'gambar_barang' => $foto
		);
	}

	function tambah_barang(){
		$data = $this->db->insert('tb_barang', $this->data);
		return $data;
	}

	function ambil_kd_barang($kd_barang){
		$this->db->where('kd_barang', $kd_barang);
		$query= $this->db->get('tb_barang');
		return $query->row();
	}

	function gambar($kd_barang){
     $this->db->where('kd_barang', $kd_barang);
     return $this->db->get('tb_barang')->row();
   }

   function edit_barang($kd_barang, $data) {
		$this->db->where('kd_barang', $kd_barang);
		$query=$this->db->update('tb_barang',$data);
		if($query){
		return TRUE;
		}else{
			return FALSE;
		}
	}

	function hapus_barang($kd_barang){
		$this->db->where('kd_barang', $kd_barang);
   		$this->db->delete('tb_barang');
	}

	function get_pelanggan(){
		$result = $this->db->get('tb_pelanggan');
		return $result->result();
	}

	function hapus_pelanggan($kd_pelanggan){
		$this->db->where('kd_pelanggan', $kd_pelanggan);
		$this->db->delete('tb_pelanggan');
	}

	function gambar_pelanggan($kd_pelanggan){
     $this->db->where('kd_pelanggan', $kd_pelanggan);
     return $this->db->get('tb_pelanggan')->row();
   }

   function get_pesanan(){
 $query = $this->db->query("SELECT * FROM tb_transaksi join tb_rinci, tb_barang WHERE tb_rinci.kd_transaksi = tb_transaksi.kd_transaksi AND tb_barang.kd_barang = tb_rinci.kd_barang GROUp BY tb_rinci.kd_transaksi");
      if ($query->num_rows() > 0) {
        return $query->result();
      }else{
        return FALSE;
      }
   }

   function hapus_pesanan($where){
   	$this->db->where($where);
   	$query=$this->db->delete('tb_transaksi');
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
   }

   function hapus_rinci($where){
   	$this->db->where($where);
   	$query=$this->db->delete('tb_rinci');
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
   }



   function konfirmasi($where, $tgl, $user){
	$data = array(
			'status_konfirmasi' => 1,
			'tgl_konfirmasi' => $tgl,
			'user_konfirmasi' => $user
			);
		$this->db->where($where);
		$query=$this->db->update('tb_transaksi', $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function get_periode($dari_tgl, $sampai_tgl){
	   	$query = $this->db->query("SELECT * FROM tb_transaksi JOIN tb_pelanggan, tb_rinci, tb_barang WHERE tb_transaksi.kd_pelanggan = tb_pelanggan.kd_pelanggan AND tb_transaksi.kd_transaksi = tb_rinci.kd_transaksi AND tb_rinci.kd_barang = tb_barang.kd_barang AND tb_transaksi.tgl_beli BETWEEN '$dari_tgl' AND '$sampai_tgl' ");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	function get_bayar(){
   	$result = $this->db->select('*');
   	$result = $this->db->from('tb_bayar');
   	$result = $this->db->join('tb_pelanggan','tb_bayar.kd_pelanggan = tb_pelanggan.kd_pelanggan');
   	$result = $this->db->join('tb_transaksi','tb_bayar.kd_transaksi = tb_transaksi.kd_transaksi');
   	$result = $this->db->join('tb_rinci', 'tb_bayar.kd_transaksi = tb_rinci.kd_transaksi');
   	$result = $this->db->join('tb_barang', 'tb_rinci.kd_barang = tb_barang.kd_barang');
   	$result = $this->db->get('');
   	return $result->result();
   }

   function hapus_bayar($kd_bayar){
   	$this->db->where($kd_bayar);
   	$query=$this->db->delete('tb_bayar');
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
   }

   	function gambar_bayar($kd_barang){
     $this->db->where('kd_bayar', $kd_bayar);
     return $this->db->get('tb_bayar')->row();
   }

   function get_detail($kd_transaksi){
   	$result = $this->db->select('*');
   	$result = $this->db->from('tb_rinci');
   	$result = $this->db->join('tb_barang', 'tb_rinci.kd_barang = tb_barang.kd_barang');
   	$result = $this->db->where('tb_rinci.kd_transaksi', $kd_transaksi);
   	$result = $this->db->get('');
   	return $result->result();
   }

}