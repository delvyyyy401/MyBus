<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rute_mybus extends CI_Controller {
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
		$data['title'] = "List Tujuan";
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan_mybus")->result_array();
		// die(print_r($data));
		$this->load->view('backend/tujuan', $data);
	}
	public function viewrute($id=''){
		$data['title'] = "List Tujuan";
		$data['rute'] = $this->db->query("SELECT * FROM tbl_tujuan_mybus WHERE kd_tujuan = '".$id."' ")->row_array();
		// die(print_r($data));
		$this->load->view('backend/view_rute', $data);
	}
	public function tambahtujuan(){
		$kode = $this->getkod_model->get_kodtuj();
		$data = array(
			'kota_tujuan' => $this->input->post('tujuan'),
			'kd_tujuan' => $kode,
			'nama_terminal_tujuan' => $this->input->post('nama_terminal_tujuan'),
			'terminal_tujuan' => $this->input->post('terminal_tujuan'),
			 );
		// die(print_r($data));
		$this->db->insert('tbl_tujuan_mybus', $data);
		// $this->session->set_flashdata('message', 'swal("Data Berhasil Di Tambah");');
		redirect('backend/rute_mybus');
	}

	public function deleterute($id=''){
		$sqlcek = $this->db->query("DELETE FROM tbl_tujuan_mybus WHERE kd_tujuan ='".$id."'");
	   	$this->session->set_flashdata('message', 'swal("Berhasil", "Data Jadwal Di Hapus", "success");');
	   	redirect('backend/rute_mybus');
   	}

   public function editrute($id=''){
	$kode = (trim(html_escape($this->input->post('kode'))));
	$where = array('kd_tujuan' => $kode );
	$update = array('nama_terminal_tujuan' =>  $this->input->post('nama_terminal_tujuan'));
	$update2 = array('terminal_tujuan' =>  $this->input->post('terminal_tujuan'));
	$this->db->update('tbl_tujuan_mybus', $update,$where);
	$this->db->update('tbl_tujuan_mybus', $update2,$where);
	$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
	redirect('backend/rute_mybus/');
}
}