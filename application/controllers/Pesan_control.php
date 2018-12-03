<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_control extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library(array('crypto','photo'));

		$session = $this->access->session_data();
		if (empty($session['name'])) {
			redirect('home_control/login/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	View
|	Kotak Masuk View Admin
|--------------------------------------------------------
 */
	public function admin_pesan($index = NULL) {
		$data['session'] 	= $this->access->session_data();
		
		if (!empty($index)) {
			$key_pesan 			= array('pesan.kode_pesan' => $index);
			$data['pesan'] 		= $this->crud_model->_select_pesan($key_pesan);
			$this->access->pages_admin('pesan/detail', $data);
		}
		else {
			$data['pesan'] 		= $this->crud_model->_all_pesan();
			$this->access->pages_admin('pesan/admin', $data);
		}
	}
/**
|--------------------------------------------------------
|	Variabel Pesam dari Form
|--------------------------------------------------------
 */
	public function pesan_data() {
		$data = array(
			'kode_pesan'	=> $this->input->post('kode_pesan', TRUE),
			'nama'			=> $this->input->post('nama', TRUE),
			'no_telp'		=> $this->input->post('no_telp', TRUE),
			'email'			=> $this->input->post('email', TRUE),
			'isi'			=> $this->input->post('pesan', TRUE),
			'ditambahkan'	=> date('Y-m-d H:i:s')
		);
		
		if (empty($data['kode_pesan'])) {
			$data['kode_pesan'] = $this->crypto->gen_crypt(8);
		}

		return $data;
	}
/**
|--------------------------------------------------------
|	Ini Untuk Insert Pesan Baru
|--------------------------------------------------------
 */
	public function new_pesan() {
		$data 		= $this->pesan_data();
		$insert_pesan	= $this->crud_model->insert_data('pesan', $data);
		
		if ($insert_pesan == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'Pesan anda berhasil dikirimkan'
			);
		
			$this->alert->gen_alert($alert);
			redirect('kontak/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'Pesan anda gagal dikirimkan'
			);
			$this->alert->gen_alert($alert);
			redirect('kontak/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini Untuk Hapus Data Pesan
|--------------------------------------------------------
 */
	public function delete_pesan($index) {
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$key_pesan 	= array('pesan.kode_pesan' => $index);
		$delete_pesan = $this->crud_model->delete_data('pesan', $key_pesan);

		if ($delete_pesan == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'pesan berhasil dihapus'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/pesan/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'pesan gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/pesan/', 'location', 303);
		}
	}
}