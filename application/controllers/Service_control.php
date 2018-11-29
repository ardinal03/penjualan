<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_control extends CI_Controller {
	
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
|	Service View Admin
|--------------------------------------------------------
 */
	public function admin_service() {
		$data['service'] 	= $this->crud_model->_all_service();
		$data['session'] 	= $this->access->session_data();

		$this->access->pages_admin('service/admin', $data);
	}
/**
|--------------------------------------------------------
|	Service - Edit
|--------------------------------------------------------
 */
	public function edit_service($index) {
		$key_service 		= array('bengkel.kode_bengkel' => $index);
		
		$data['service'] 	= $this->crud_model->_select_service($key_service);
		$data['session'] 	= $this->access->session_data();

		$this->access->pages_admin('service/edit', $data);
	}
/**
|--------------------------------------------------------
|	Variabel service dari form
|--------------------------------------------------------
 */
	public function service_data() {
		$data 	= array(
			'kode_bengkel'	 	=> $this->input->post('kode_bengkel'),
			'nama_bengkel'		=> $this->input->post('nama_bengkel'),
			'alamat'			=> $this->input->post('alamat'),
			'no_telp'			=> $this->input->post('no_telp'),
			'ditambahkan'		=> date('Y-m-d H:i:s')			
		);

		if (empty($data['kode_bengkel'])) {
			$data['kode_bengkel'] = $this->crypto->gen_crypt(8);
		}

		return $data;
	}
/**
|--------------------------------------------------------
|	Ini Untuk Insert Service Baru
|--------------------------------------------------------
 */
	public function new_service() {
		$data 		= $this->service_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$insert_service = $this->crud_model->insert_data('bengkel', $data);
		
		if ($insert_service == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'bengkel berhasil ditambahkan'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/service/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'bengkel gagal ditambahkan'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/service/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini Untuk Update Data Service
|--------------------------------------------------------
 */
	public function update_service() {
		$data 		= $this->service_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$key_service = array('bengkel.kode_bengkel' => $data['kode_bengkel']);

		$update_service = $this->crud_model->update_data('bengkel', $data, $key_service);
		
		if ($update_service == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'bengkel berhasil diubah'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/service/edit/'.$data['kode_bengkel'], 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'bengkel gagal diubah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/service/edit/'.$data['kode_bengkel'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini Untuk Hapus Data Service
|--------------------------------------------------------
 */
	public function delete_service($index) {
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$key_service 	= array('bengkel.kode_bengkel' => $index);
		$delete_service = $this->crud_model->delete_data('bengkel', $key_service);

		if ($delete_service == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'bengkel berhasil dihapus'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/service/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'bengkel gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/service/', 'location', 303);
		}
	}
}
