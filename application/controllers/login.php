<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_admin');
	}
	function index(){	
		$this->load->view('admin/login');
	}

	function login(){
		$user_adm = $this->input->post('user_adm');
		$pass_adm = MD5($this->input->post('pass_adm'));
		$cek = $this->model_admin->cek_login($user_adm,$pass_adm);
	}

	function logout(){
		$this->session->sess_destroy();
		echo "<script>alert('Anda Berhasil Logout');window.location='".base_url()."login';</script>";
	}
}
