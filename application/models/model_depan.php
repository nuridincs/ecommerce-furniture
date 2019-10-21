<?php
Class model_depan extends CI_Model{
	var $CI;
	function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
	}

	function cek_login($email_pelanggan,$pass_pelanggan){
		$this->db->where('email_pelanggan',$email_pelanggan);
		$this->db->where('pass_pelanggan',$pass_pelanggan);
		$query=$this->db->get('tb_pelanggan');
		$cek=$query->num_rows();
		if($cek > 0){
			$data=$query->row();
			$nama_pelanggan=$data->nama_pelanggan;
			$data_session = array(
				'kd_pelanggan' => $data->kd_pelanggan,
				'nama_pelanggan' => $data->nama_pelanggan,
				'foto_pelanggan' => $data->foto_pelanggan,
				'alamat_pelanggan' => $data->alamat_pelanggan,
				'status'  => "login");

			$this->session->set_userdata($data_session);
			//$this->session->set_userdata("pelanggan",$data_session);
			//$this->session->userdata('pelanggan')['kd_pelanggan'];
			$this->session->set_flashdata('sukses',"Selamat Datang ".$nama_pelanggan."");
			redirect(site_url('depan'));
		}else{
			$this->session->set_flashdata('error',"Email atau Password Salah");
			redirect(site_url('depan'));
		}
	}

	function cek_email($email_pelanggan){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_pelanggan');
		$result = $this->db->where('email_pelanggan', $email_pelanggan);
		$result = $this->db->get('');
		return $result->result();
	}

	function kode_pelanggan(){
		  $result = $this->db->select('RIGHT(tb_pelanggan.kd_pelanggan,2) as kd_pelanggan', FALSE);
		  $result = $this->db->from('tb_pelanggan');
		  $result = $this->db->order_by('kd_pelanggan','DESC');    
		  $result = $this->db->limit(1);    
		  $result = $this->db->get('');    
		  if($result->num_rows() <> 0){        
			   $data = $result->row();      
			   $kode = intval($data->kd_pelanggan) + 1; 
		  }
		  else{      
			   $kode = 1;
		  } 
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "PG".$batas;  //format kode
			  return $kodetampil;  
		 }

	function daftar($data){
		$query=$this->db->insert('tb_pelanggan',$data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function get_barang_kasur(){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_barang');
		$result = $this->db->where('jenis_barang','Kasur');
		$result = $this->db->order_by('kd_barang', 'DESC');
		$result = $this->db->get('');
		return $result->result();
	}

	function get_barang_kursi(){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_barang');
		$result = $this->db->where('jenis_barang','Kursi');
		$result = $this->db->order_by('kd_barang', 'DESC');
		$result = $this->db->get('');
		return $result->result();
	}

	function get_barang_lemari(){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_barang');
		$result = $this->db->where('jenis_barang','Lemari');
		$result = $this->db->order_by('kd_barang', 'DESC');
		$result = $this->db->get('');
		return $result->result();
	}

	function get_barang_tv(){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_barang');
		$result = $this->db->where('jenis_barang','LED TV');
		$result = $this->db->order_by('kd_barang', 'DESC');
		$result = $this->db->get('');
		return $result->result();
	}

	function get_barang_kasur4(){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_barang');
		$result = $this->db->where('jenis_barang','Kasur');
		$result = $this->db->order_by('kd_barang', 'DESC');
		$result = $this->db->limit(4);
		$result = $this->db->get('');
		return $result->result();
	}

	function get_barang_kursi4(){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_barang');
		$result = $this->db->where('jenis_barang','Kursi');
		$result = $this->db->order_by('kd_barang', 'DESC');
		$result = $this->db->limit(4);
		$result = $this->db->get('');
		return $result->result();
	}

	function get_barang_lemari4(){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_barang');
		$result = $this->db->where('jenis_barang','Lemari');
		$result = $this->db->order_by('kd_barang', 'DESC');
		$result = $this->db->limit(4);
		$result = $this->db->get('');
		return $result->result();
	}

	function get_barang_tv4(){
		$result = $this->db->select('*');
		$result = $this->db->from('tb_barang');
		$result = $this->db->where('jenis_barang','LED TV');
		$result = $this->db->order_by('kd_barang', 'DESC');
		$result = $this->db->limit(4);
		$result = $this->db->get('');
		return $result->result();
	}

	function get_transaksi($kd_barang){
	  $data = array();
	  $options = array('kd_barang' => $kd_barang);
	  $Q = $this->db->get_where('tb_barang',$options,1);
	    if ($Q->num_rows() > 0){
	      $data = $Q->row_array();
	    }
	  $Q->free_result();
	  return $data;
	}


	function add_barang($id){
		$this->db->where('kd_barang', $id);
		$query = $this->db->get('tb_barang');
		if ($query) {
			return $query->row();
		}else{
			return FALSE;
		}
	}

	function add_tmp($id){
		$this->db->where('kd_barang', $id);
		$query = $this->db->get('tmp_pesan');
		if ($query) {
			return $query->row();
		}else{
			return FALSE;
		}
	}

	function cek_keranjang($idbarang){
		$result = $this->db->select('*');
		$result = $this->db->from('tmp_pesan');
		$result = $this->db->where('kd_barang', $idbarang);
		$result = $this->db->get('');
		return $result->result();
	}

	function fill_cek($ttl_qty){
    $this->data = array(
      'qty_pesan' => $ttl_qty
    );
  }

  	function update_cek($idbarang, $ttl_qty){
		$data = array(
               'qty_pesan' => $ttl_qty
            );
		$this->db->where('kd_barang', $idbarang);
		$this->db->update('tmp_pesan', $data); 
	}

	function fill_data($harga,$idbarang,$idpelanggan,$qty){
    $this->data = array(
      'tgl_pesan' => date('Y-m-d'),
      'kd_pelanggan' => $idpelanggan,
      'kd_barang' => $idbarang,
      'qty_pesan' => $qty,
      'harga_pesan' => $harga
    );
  }

  function insert_data(){
    $insert = $this->db->insert('tmp_pesan', $this->data);
    return $insert;
  }

  function get_keranjang($kd_pelanggan){
    $query = $this->db->query("SELECT tmp_pesan.*, tb_barang.* FROM tmp_pesan, tb_barang WHERE tmp_pesan.kd_barang=tb_barang.kd_barang AND tmp_pesan.kd_pelanggan='$kd_pelanggan'");
      if ($query->num_rows() > 0) {
        return $query->result();
      }else{
        return FALSE;
      }
  }

  function batal_beli($kd_barang){
		$this->db->where('kd_barang', $kd_barang);
		$this->db->where('kd_pelanggan', $this->session->userdata('kd_pelanggan'));
		$delete = $this->db->delete('tmp_pesan');
		if ($delete) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function ubah(){
	    $arrData = count($_POST['txtJum']);
		
		for ($i=0; $i < $arrData ; $i++) { 
			# melewati agar tidak minus atau 0
			if ($_POST['txtJum'][$i] < 1) {
				$qty = 1;
			}else{
				$qty = $_POST['txtJum'][$i];
			}
			# simpan perubahan
			$kodebrg = $_POST['txtKodeH'][$i];
			$tanggal = date('Y-m-d');

			$this->data2 = array(
					'tgl_pesan' 	=> $tanggal ,
					'kd_pelanggan' 	=> $this->session->userdata('kd_pelanggan'),
					'kd_barang' 	=> $kodebrg,
					'qty_pesan' 	=> $qty
				);
				$this->db->where('kd_barang', $kodebrg);
				$this->db->where('kd_pelanggan', $this->session->userdata('kd_pelanggan'));
				$insert = $this->db->update('tmp_pesan', $this->data2);
		}
		return $insert;
	}

	function kode_transaksi(){
		  $result = $this->db->select('RIGHT(tb_transaksi.kd_transaksi,2) as kd_transaksi', FALSE);
		  $result = $this->db->from('tb_transaksi');
		  $result = $this->db->order_by('kd_transaksi','DESC');    
		  $result = $this->db->limit(1);    
		  $result = $this->db->get('');    
		  if($result->num_rows() <> 0){        
			   $data = $result->row();      
			   $kode = intval($data->kd_transaksi) + 1; 
		  }
		  else{      
			   $kode = 1;
		  }
		  		$tgl=date('Ymd');
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "TR-".$tgl.'-'.$batas;  //format kode
			  return $kodetampil;  
	}

	function getbarang($kd_barang){
    $this->db->where('kd_barang',$kd_barang);
    $query=$this->db->get('tb_barang');
    return $query->row();
  }

	function fill_cok($kode){
      $this->datapemesan = array(
        'kd_transaksi'	=> $kode,
        'kd_pelanggan' 	=> $this->session->userdata('kd_pelanggan'),
        'tgl_beli' 		=> date('Y-m-d'),
        'alamat_kirim' 	=> $this->input->post('alamat_kirim'),
        'no_hp' 		=> $this->input->post('no_hp'),
        'atas_nama' 	=> $this->input->post('atas_nama'),
        'status_konfirmasi' => '0',
        'status_bayar' => '0'
      );
    }


    function insert_co($kode){
      $this->db->trans_start();
      $kd_pelanggan=$this->session->userdata('kd_pelanggan');
      $insert = $this->db->insert('tb_transaksi', $this->datapemesan);
      if($insert){
        $ambil=$this->get_keranjang($kd_pelanggan);
        foreach ($ambil as $row) {
        	$qty=$row->qty_pesan;
        	$harga=$row->harga_pesan;
        	$ttl=$qty * $harga;
          $datarinci=array(
            'kd_transaksi' 	=> $kode,
            'kd_barang'		=>$row->kd_barang,
            'qty_rinci'		=>$row->qty_pesan,
            'harga_rinci'	=>$row->harga_pesan,
            'total_rinci'	=>$ttl
          );
          $insert = $this->db->insert('tb_rinci', $datarinci);
          $kd_barang = $row->kd_barang;
          $stok=$this->getbarang($kd_barang);
          $stok_lama = $stok->stok_barang;
          $stok_baru = $stok_lama - $row->qty_pesan;
          $this->stok_barang=array('stok_barang' => $stok_baru);
          $updatestok = $this->db->where('kd_barang',$kd_barang)->update('tb_barang',$this->stok_barang);
        }
        $this->db->where('kd_pelanggan', $kd_pelanggan);
        $delete = $this->db->delete('tmp_pesan');
      }
      $this->db->trans_complete();
      return $this->db->trans_status();
    }

    function riwayat($kd_pelanggan){
    $query = $this->db->query("SELECT * FROM tb_transaksi join tb_rinci, tb_barang WHERE tb_rinci.kd_transaksi = tb_transaksi.kd_transaksi AND tb_barang.kd_barang = tb_rinci.kd_barang AND kd_pelanggan='$kd_pelanggan' GROUp BY tb_rinci.kd_transaksi");
      if ($query->num_rows() > 0) {
        return $query->result();
      }else{
        return FALSE;
      }
    }


    function kode_bayar(){
		  $result = $this->db->select('RIGHT(tb_bayar.kd_bayar,2) as kd_bayar', FALSE);
		  $result = $this->db->from('tb_bayar');
		  $result = $this->db->order_by('kd_bayar','DESC');    
		  $result = $this->db->limit(1);    
		  $result = $this->db->get('');    
		  if($result->num_rows() <> 0){        
			   $data = $result->row();      
			   $kode = intval($data->kd_bayar) + 1; 
		  }
		  else{      
			   $kode = 1;
		  }
		  		$tgl=date('Ymd');
			  $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
			  $kodetampil = "BY-".$tgl.'-'.$batas;  //format kode
			  return $kodetampil;  
	}

    function get_bayar($kd_pelanggan, $id){
    	$query = $this->db->query("SELECT * FROM tb_transaksi INNER JOIN tb_rinci ON  tb_rinci.kd_transaksi = tb_transaksi.kd_transaksi INNER JOIN tb_barang ON tb_barang.kd_barang = tb_rinci.kd_barang WHERE kd_pelanggan='$kd_pelanggan' AND tb_rinci.kd_transaksi='$id'  ");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
    }

    function fill_bayar($foto, $kd_tr){
		$this->data = array(
			'kd_bayar' 		=> $this->input->post('kd_bayar'),
			'kd_transaksi'	=> $kd_tr,
			'kd_pelanggan' 	=> $this->session->userdata('kd_pelanggan'),
			'nama_bank' 	=> $this->input->post('nama_bank'),
			'jml_bayar' 	=> $this->input->post('jml_bayar'),
			'bukti_bayar' 	=> $foto
		);
	}

	function tambah_bayar(){
		$data = $this->db->insert('tb_bayar', $this->data);
		return $data;
	}

	function update_bayar($kd_tr){
		$data = array(
               'status_bayar' => 1
            );
		$this->db->where('kd_transaksi', $kd_tr);
		$this->db->update('tb_transaksi', $data); 
	}

    function profil($kd_pelanggan){
    	$this->db->where('kd_pelanggan',$kd_pelanggan);
	    $query=$this->db->get('tb_pelanggan');
	    return $query->row();
    }

	function gambar_pelanggan($kd_pelanggan){
     $this->db->where('kd_pelanggan', $kd_pelanggan);
     return $this->db->get('tb_pelanggan')->row();
   }

     function edit_profil($kd_pelanggan, $data) {
		$this->db->where('kd_pelanggan', $kd_pelanggan);
		$query=$this->db->update('tb_pelanggan',$data);
		if($query){
		return TRUE;
		}else{
			return FALSE;
		}
	}

	function update_pass($data,$where){
		try{
       		$this->db->where($where)->update('tb_pelanggan', $data);
       		return true;
    	}catch(Exception $e){}
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