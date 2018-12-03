<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan_control extends CI_Controller {
	
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
|	Ulasan View Admin
|--------------------------------------------------------
 */
	public function admin_ulasan() {
		$data['session'] 	= $this->access->session_data();
		$data['ulasan'] 	= $this->crud_model->_all_ulasan();

		$this->access->pages_admin('pesan/ulasan', $data);
	}
/**
|--------------------------------------------------------
|	Variabel Ulasan dari Form
|--------------------------------------------------------
 */
	public function ulasan_data() {
		$data = array(
			'kode_ulasan'	=> $this->input->post('kode_pesan', TRUE),
			'nama'			=> $this->input->post('nama', TRUE),
			'email'			=> $this->input->post('email', TRUE),
			'id_kontak'		=> $this->input->post('cp', TRUE),
			'rating'		=> $this->input->post('rating', TRUE),
			'deskripsi'		=> $this->input->post('deskripsi', TRUE),
			'ditambahkan'	=> date('Y-m-d H:i:s')
		);
		
		if (empty($data['kode_ulasan'])) {
			$data['kode_ulasan'] = $this->crypto->gen_crypt(8);
		}

		return $data;
	}

/**
|--------------------------------------------------------
|	Ini Untuk Insert Ulasan Baru
|--------------------------------------------------------
 */
	public function new_ulasan() {
		$data 			= $this->ulasan_data();
		$insert_ulasan	= $this->crud_model->insert_data('ulasan', $data);
		
		if ($insert_ulasan == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'Ulasan anda berhasil dikirimkan'
			);
		
			$this->alert->gen_alert($alert);
			redirect('kontak/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'Ulasan anda gagal dikirimkan'
			);
			$this->alert->gen_alert($alert);
			redirect('kontak/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini Untuk Hapus Data Ulasan
|--------------------------------------------------------
 */
	public function delete_ulasan($index) {
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$key_ulasan 	= array('ulasan.kode_ulasan' => $index);
		$delete_ulasan 	= $this->crud_model->delete_data('ulasan', $key_ulasan);

		if ($delete_ulasan == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'pesan berhasil dihapus'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/ulasan/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'pesan gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/ulasan/', 'location', 303);
		}
	}
}