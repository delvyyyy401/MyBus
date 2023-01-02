<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan_mybus extends CI_Controller {
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
		$data['title'] = 'Laporan';
		$data['bulan'] = $this->db->query("SELECT DISTINCT DATE_FORMAT(create_tgl_tiket,'%M %Y') AS bulan FROM tbl_tiket_mybus")->result_array();
		$this->load->view('backend/laporan', $data);
	}
	public function laportanggal($value=''){
		$data['mulai'] = $this->input->post('mulai');
		$data['sampai'] = $this->input->post('sampai');
		$data['laporan'] = $this->db->query("SELECT * FROM tbl_tiket_mybus WHERE (create_tgl_tiket BETWEEN '".$data['mulai']."' AND '".$data['sampai']."')")->result_array();
		$this->load->view('backend/laporan/laporan_pertanggal', $data);		
	}

	public function laporbulan($value=''){
		$data['bulan'] = $this->input->post('bulan');
		// $data['laporan'] = $this->db->query("SELECT * FROM tbl_tiket_mybus WHERE month(create_tgl_tiket, '%M') = (SELECT STR_TO_DATE('".$data['bulan']."', '%M'))")->result_array();
		$data['laporan'] = $this->db->query("SELECT * FROM tbl_tiket_mybus WHERE month(create_tgl_tiket) = (SELECT month(STR_TO_DATE('".$data['bulan']."', '%M %d %Y')))")->result_array();
	
		$this->load->view('backend/laporan/laporan_perbulan', $data);		
	}
}
