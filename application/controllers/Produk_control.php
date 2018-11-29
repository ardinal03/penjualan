<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_control extends CI_Controller {
	
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
|	Produk View Admin
|--------------------------------------------------------
 */
	public function admin_produk($index = NULL) {
		$key_series = NULL;
		if (! empty($index)) {
			$key_series	= array('series.kode_series' => $index);
		}

		$data['series'] 	= $this->crud_model->_all_series($key_series);
		$data['session'] 	= $this->access->session_data();

		$this->access->pages_admin('produk/admin', $data);
	}
/**
|--------------------------------------------------------
|	Produk - Edit
|--------------------------------------------------------
 */
	public function edit_produk($index) {
		$key_produk = NULL;
		if (! empty($index)) {
			$key_produk	= array('produk.kode_produk' => $index);
		}

		$data['produk'] = $this->crud_model->_select_produk($key_produk);
		$data['series'] = $this->crud_model->_all_series();

		$this->access->pages_admin('produk/edit', $data);
	}
/**
|--------------------------------------------------------
|	Variabel produk dari form
|--------------------------------------------------------
 */
	public function produk_data() {
		$data 	= array(
			'kode_produk' 	=> $this->input->post('kode_produk', TRUE),
			'nama_produk'	=> $this->input->post('nama_produk', TRUE),
			'kode_series'	=> $this->input->post('series', TRUE),
			'transmisi'		=> $this->input->post('transmisi', TRUE),
			'harga'			=> $this->input->post('harga', TRUE),
			'keterangan'	=> $this->input->post('keterangan', TRUE),
			'ditambahkan'	=> date('Y-m-d H:i:s')
		);

		if (empty($data['kode_produk'])) {
			$data['kode_produk'] = $this->crypto->gen_crypt(8);
		}

		return $data;
	}
/**
|--------------------------------------------------------
|	Ini untuk insert produk baru
|--------------------------------------------------------
 */
	public function new_produk() {
		$data 		= $this->produk_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$insert_produk 	= $this->crud_model->insert_data('produk', $data);
		
		if ($insert_produk == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'produk berhasil ditambahkan'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/produk/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message'	=> 'produk gagal ditambahkan'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/produk/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk update data produk
|--------------------------------------------------------
 */
	public function update_produk() {
		$data 		= $this->produk_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$key_produk		= array('produk.kode_produk' => $data['kode_produk']);
		$update_produk 	= $this->crud_model->update_data('produk', $data, $key_produk);
		
		if ($update_produk == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'produk berhasil diubah'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/produk/edit/'.$data['kode_produk'], 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message'	=> 'produk gagal diubah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/produk/edit/'.$data['kode_produk'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk hapus data produk
|--------------------------------------------------------
 */
	public function delete_produk($index) {
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$key_produk 	= array('produk.kode_produk' => $index);
		$delete_produk 	= $this->crud_model->delete_data('produk', $key_produk);

		if ($delete_produk == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'produk berhasil dihapus'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/produk/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'kontak gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/produk/', 'location', 303);
		}
	}
}
