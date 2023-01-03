<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Order_mybus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		if (empty($this->session->userdata('username_admin'))) {
			$this->session->sess_destroy();
			redirect('backend/login_mybus');
		}
	}
	public function index(){
		$data['title'] = "List Order Individu";
 		$data['order'] = $this->db->query("SELECT * FROM tbl_order_mybus WHERE nama_kursi_order != '' group by kd_order")->result_array();
		$this->load->view('backend/order', $data);
	}

	public function index2(){
		$data['title'] = "List Order Institusi";
		$data['order_institusi'] = $this->db->query("SELECT * FROM tbl_order_mybus WHERE nama_institusi != '' group by kd_order")->result_array();
		$this->load->view('backend/order_institusi', $data);
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

	public function inserttiket($value=''){
		include('assets/phpmailer/src/Exception.php');
		include('assets/phpmailer/src/PHPMailer.php');
		include('assets/phpmailer/src/SMTP.php');

		$id = $this->input->post('kd_order');
		$asal = $this->input->post('asal_beli');
		$tiket = $this->input->post('kd_tiket');
		$nama = $this->input->post('nama');
		$kursi = $this->input->post('no_kursi');
		$umur = $this->input->post('umur_kursi');
		$email = $this->input->post('email');
		$nama_institusi = $this->input->post('nama_institusi');
		$jumlah_kursi_institusi = $this->input->post('jumlah_kursi_institusi');
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

		if(empty($nama_institusi)){
			for ($i=0; $i < count($nama); $i++) { 
			if (empty($nama_institusi)) {
				$simpan = array(
					'kd_tiket' => $tiket[$i],
					'kd_order' => $id,
					'nama_tiket' => $nama[$i],
					'kursi_tiket' => $kursi[$i],
					'umur_tiket' => $umur[$i],
					'asal_beli_tiket' => $asal,
					'harga_tiket' => $harga,
					'status_tiket' => $status,
					'nama_institusi' => null,
					'jumlah_kursi_institusi' => null,
					'etiket_tiket' => $pdfFilePath,
					'create_tgl_tiket' => date('Y-m-d'),
					'create_admin_tiket' => $this->session->userdata('username_admin')
				);
			} else{
				$simpan = array(
				'kd_tiket' => $tiket[$i],
				'kd_order' => $id,
				'nama_tiket' => null,
				'kursi_tiket' => null,
				'umur_tiket' => null,
				'asal_beli_tiket' => $asal,
				'jumlah_kursi_institusi' => 19,
				'nama_institusi' => $nama_institusi,
				'harga_tiket' => $harga,
				'status_tiket' => $status,
				'etiket_tiket' => $pdfFilePath,
				'create_tgl_tiket' => date('Y-m-d'),
				'create_admin_tiket' => $this->session->userdata('username_admin')
				);
			}
			$this->db->insert('tbl_tiket_mybus', $simpan);

			if(($simpan)){
				$email_pengirim = 'deldelvy401@gmail.com';
				$nama_pengirim = 'My Bus';
				$email_penerima = $email[$i];
				$subject = 'e-Ticket My Bus';
				$body = 'Halo, '.$nama[$i].'.'.'
				
				Terima kasih telah melakukan pemesanan tiket bus My Bus.'.'
				Berikut detail pemesanan Anda :
				
				Kode Order : '.$id.'
				Kode Tiket : '.$tiket[$i].'
				Waktu Pesan : '.$tgl.'
				Nama Pemesan : '.$nama[$i].'
				Nomor Kursi	: '.$kursi[$i].'
				Jumlah Bayar : '.$harga.'
				Status : LUNAS
				
				Terima kasih telah mempercayakan My Bus sebagai teman perjalananmu.
				Have a good trip!';

				$mail = new PHPMailer;
				$mail->isSMTP();

				$mail->Host = 'smtp.gmail.com';
				$mail->Username = $email_pengirim;
				$mail->Password = 'sopssxxuwakilbhy';
				$mail->Port = 465;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'ssl';
				$mail->SMTPDebug = 2;
				
				$mail->setFrom($email_pengirim, $email_pengirim);
				$mail->addAddress($email_penerima);
				$mail->Subject = $subject;
				$mail->Body = $body;

				$send = $mail->send();

				if($send){
					echo "<h1> Email Berhasil dikirim</h1>";
				}else{
					echo "<h1> Email Gagal dikirim</h1>";
				}
				echo "<script>alert('Email Berhasil Dikirim')</script>";
			}
		}
	} else{
		for ($i=0; $i < count($nama_institusi); $i++) { 
			if (empty($nama_institusi)) {
				$simpan = array(
					'kd_tiket' => $tiket[$i],
					'kd_order' => $id,
					'nama_tiket' => $nama[$i],
					'kursi_tiket' => $kursi[$i],
					'umur_tiket' => $umur[$i],
					'asal_beli_tiket' => $asal,
					'harga_tiket' => $harga,
					'status_tiket' => $status,
					'nama_institusi' => null,
					'jumlah_kursi_institusi' => null,
					'etiket_tiket' => $pdfFilePath,
					'create_tgl_tiket' => date('Y-m-d'),
					'create_admin_tiket' => $this->session->userdata('username_admin')
				);
			} else{
				$simpan = array(
				'kd_tiket' => $tiket[$i],
				'kd_order' => $id,
				'nama_tiket' => null,
				'kursi_tiket' => null,
				'umur_tiket' => null,
				'asal_beli_tiket' => $asal,
				'jumlah_kursi_institusi' => 19,
				'nama_institusi' => $nama_institusi,
				'harga_tiket' => $harga,
				'status_tiket' => $status,
				'etiket_tiket' => $pdfFilePath,
				'create_tgl_tiket' => date('Y-m-d'),
				'create_admin_tiket' => $this->session->userdata('username_admin')
				);
			}
			$this->db->insert('tbl_tiket_mybus', $simpan);

			if(($simpan)){
				$email_pengirim = 'deldelvy401@gmail.com';
				$nama_pengirim = 'My Bus';
				$email_penerima = $email[$i];
				$subject = 'e-Ticket My Bus';
				$body = 'Halo, '.$nama[$i].'.'.'
				
				Terima kasih telah melakukan pemesanan tiket bus My Bus.'.'
				Berikut detail pemesanan Anda :
				
				Kode Order : '.$id.'
				Kode Tiket : '.$tiket[$i].'
				Waktu Pesan : '.$tgl.'
				Nama Pemesan : '.$nama[$i].'
				Nomor Kursi	: '.$kursi[$i].'
				Jumlah Bayar : '.$harga.'
				Status : LUNAS
				
				Terima kasih telah mempercayakan My Bus sebagai teman perjalananmu.
				Have a good trip!';

				$mail = new PHPMailer;
				$mail->isSMTP();

				$mail->Host = 'smtp.gmail.com';
				$mail->Username = $email_pengirim;
				$mail->Password = 'sopssxxuwakilbhy';
				$mail->Port = 465;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'ssl';
				$mail->SMTPDebug = 2;
				
				$mail->setFrom($email_pengirim, $email_pengirim);
				$mail->addAddress($email_penerima);
				$mail->Subject = $subject;
				$mail->Body = $body;

				$send = $mail->send();

				if($send){
					echo "<h1> Email Berhasil dikirim</h1>";
				}else{
					echo "<h1> Email Gagal dikirim</h1>";
				}
				echo "<script>alert('Email Berhasil Dikirim')</script>";
			}
		}
	}

	    $this->session->set_flashdata('message', 'swal("Berhasil", "Tiket Order Berhasil Di Proses", "success");');
		redirect('backend/order_mybus');
	}

}