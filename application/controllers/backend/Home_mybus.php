<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_mybus extends CI_Controller {
	
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$data['title'] = "Dashboard";
		$data['pending_individu'] = $this->db->query("SELECT count(kd_order) FROM tbl_order_mybus WHERE nama_kursi_order != '' AND status_order = '1'")->result_array();
		$data['pending_institusi'] = $this->db->query("SELECT count(kd_order) FROM tbl_order_mybus WHERE nama_institusi != '' AND status_order = '1'")->result_array();
		$data['konfirmasi_individu'] = $this->db->query("SELECT count(kd_konfirmasi) FROM tbl_konfirmasi_mybus WHERE total_konfirmasi < 1000000")->result_array();
		$data['konfirmasi_institusi'] = $this->db->query("SELECT count(kd_konfirmasi) FROM tbl_konfirmasi_mybus WHERE total_konfirmasi > 1000000")->result_array();
		$data['bus_disewa'] = $this->db->query("SELECT count(kd_tiket) FROM tbl_tiket_mybus WHERE nama_institusi != ''")->result_array();
		$data['tiket_terjual'] = $this->db->query("SELECT count(kd_tiket) FROM tbl_tiket_mybus WHERE umur_tiket != ''")->result_array();
		$data['total'] = $this->db->query("SELECT sum(total_konfirmasi) FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND o.status_order = 2 ")->result_array();
		$this->load->view('backend/home', $data);
	}

	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}
	}
}