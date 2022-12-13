<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pending_mybus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		if (empty($this->session->userdata('email_admin'))) {
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}
	}
	public function index(){
		$data['title'] = "List Pending";
 		$data['order'] = $this->db->query("SELECT * FROM tbl_order_mybus  WHERE status_order ='1' group by kd_order")->result_array();
		$this->load->view('backend/order', $data);
	}
	
	public function vieworder($id=''){
		$cek = $this->input->get('order').$id;
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_order_mybus LEFT JOIN tbl_jadwal_mybus on tbl_order_mybus.kd_jadwal = tbl_jadwal_mybus.kd_jadwal WHERE kd_order ='".$cek."'")->result_array();
	 	if ($sqlcek) {
	 		$data['tiket'] = $sqlcek;
			$data['title'] = "View Order";
			$this->load->view('backend/view_order',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Kosong", "Order Tidak Ada", "error");');
    		redirect('backend/tiket_mybus');
	 	}
	}

	public function vieworder_instansi($id=''){
		$cek = $this->input->get('order').$id;
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_order_mybus LEFT JOIN tbl_jadwal_mybus on tbl_order_mybus.kd_jadwal = tbl_jadwal_mybus.kd_jadwal WHERE tbl_order_mybus.jumlah_kursi_instansi > 4  AND kd_order ='".$cek."'")->result_array();
	 	if ($sqlcek) {
	 		$data['tiket'] = $sqlcek;
			$data['title'] = "View Order";
			$this->load->view('backend/view_order',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Kosong", "Order Tidak Ada", "error");');
    		redirect('backend/tiket_mybus');
	 	}
	}
	
	public function inserttiket($value=''){
		$id = $this->input->post('kd_order');
		$asal = $this->input->post('asal_beli');
		$tiket = $this->input->post('kd_tiket');
		$nama = $this->input->post('nama');
		$kursi = $this->input->post('no_kursi');
		$umur = $this->input->post('umur_kursi');
		$harga = $this->input->post('harga');
		$tgl = $this->input->post('tgl_beli');
		$status = $this->input->post('status');
		$where = array('kd_order' => $id );
		$update = array('status_order' => $status );
		$this->db->update('tbl_order_mybus', $update,$where);
		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan_mybus WHERE kd_tujuan ='".$asal."'")->row_array();
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order_mybus LEFT JOIN tbl_jadwal_mybus on tbl_order_mybus.kd_jadwal = tbl_jadwal_mybus.kd_jadwal LEFT JOIN tbl_tujuan_mybus on tbl_jadwal_mybus.kd_tujuan = tbl_tujuan_mybus.kd_tujuan WHERE kd_order ='".$id."'")->result_array();
		$pelanggan = $this->db->query("SELECT email_pelanggan FROM tbl_pelanggan_mybus WHERE kd_pelanggan ='".$data['cetak'][0]['kd_pelanggan']."'")->row_array();
		$pdfFilePath = "assets/backend/upload/etiket/".$id.".pdf";
		$html = $this->load->view('frontend/cetaktiket', $data, TRUE);
	    $this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath);
		for ($i=0; $i < count($nama) ; $i++) { 
			$simpan = array(
				'kd_tiket' => $tiket[$i],
				'kd_order' => $id,
				'nama_tiket' => $nama[$i],
				'kursi_tiket' => $kursi[$i],
				'umur_tiket' => $umur[$i],
				'asal_beli_tiket' => $asal,
				'harga_tiket' => $harga,
				'status_tiket' => $status,
				'etiket_tiket' => $pdfFilePath,
				'create_tgl_tiket' => date('Y-m-d'),
				'create_admin_tiket' => $this->session->userdata('email_admin')
			);
		// die(print_r($simpan));
		$this->db->insert('tbl_tiket_mybus', $simpan);
		}
	    $this->session->set_flashdata('message', 'swal("Berhasil", "Tiket Order Berhasil Di Proses", "success");');
		redirect('backend/order_mybus');
	}

}