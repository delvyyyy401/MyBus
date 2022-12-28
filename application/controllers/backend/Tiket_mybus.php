<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket_mybus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}
	}
	public function index(){
		$data['title'] = "List Tiket Individu";
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_tiket_mybus WHERE umur_tiket != '' group by kd_order")->result_array();
		$this->load->view('backend/tiket', $data);	
	}

	public function index2(){
		$data['title'] = "List Tiket Institusi";
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_tiket_mybus WHERE nama_institusi != '' group by kd_order")->result_array();
		$this->load->view('backend/tiket_institusi', $data);	
	}

	public function viewtiket($tiket){
		$data['title'] = "List Tiket";
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_tiket_mybus WHERE kd_tiket = '".$tiket."'")->row_array();
		if ($data['tiket']) {
			$this->load->view('backend/view_tiket', $data);
		}else{
			$this->session->set_flashdata('message', 'swal("Kosong", "Tiket Tidak Ada", "error");');
    		redirect('backend/tiket_mybus');
		}	
	}

}