<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_mybus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
				$this->load->library('form_validation');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('level');
		if ($username == '2') {
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}
	}
	public function index(){
		$data['title'] = "List Admin";
		$data['admin'] = $this->db->query("SELECT * FROM tbl_admin_mybus")->result_array();
		// die(print_r($data));
		$this->load->view('backend/admin', $data);
	}
	public function tambahadmin(){
		$kode = $this->getkod_model->get_kodadm();
		$data = array(
			'kd_admin' => $kode,
			'nama_admin' => $this->input->post('nama'),
			'username_admin' => $this->input->post('username'),
			'email_admin' => $this->input->post('email'),
			'password_admin' => $this->input->post('username'),
			 );
		$this->db->insert('tbl_admin_mybus', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Admin Berhasil Ditambahkan", "success");');
		redirect('backend/admin_mybus');
	}

	public function deleteadmin($id=''){
		$sqlcek = $this->db->query("DELETE FROM tbl_admin_mybus WHERE kd_admin ='".$id."'");
	   	$this->session->set_flashdata('message', 'swal("Berhasil", "Data Admin Di Hapus", "success");');
	   	redirect('backend/admin_mybus');
   	}
}