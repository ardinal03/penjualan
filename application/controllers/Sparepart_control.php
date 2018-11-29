<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sparepart_control extends CI_Controller {
	
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
|	Sparepart View Admin
|--------------------------------------------------------
 */
	public function admin_sparepart() {
		$data['sparepart'] 	= $this->crud_model->_all_sparepart();
		$data['session'] 	= $this->access->session_data();

		$this->access->pages_admin('sparepart/admin', $data);
	}
/**
|--------------------------------------------------------
|	Sparepart - Edit
|--------------------------------------------------------
 */
	public function edit_sparepart($index) {
		$key_sparepart 	= array('suku_cadang.kode_sc' => $index);
		$key_file 		= array('file.referensi' => $index);

		$data['session'] 	= $this->access->session_data();
		$data['sparepart'] 	= $this->crud_model->_select_sparepart($key_sparepart);
		$data['file'] 		= $this->crud_model->_all_file($key_file);

		$this->access->pages_admin('sparepart/edit', $data);	
	}
/**
|--------------------------------------------------------
|	Variabel sparepart dari form
|--------------------------------------------------------
 */
	public function sparepart_data() {
		$data 	= array(
			'kode_sc'	 	=> $this->input->post('kode_sc', TRUE),
			'nama_sc'		=> $this->input->post('nama_sc', TRUE),
			'harga'			=> $this->input->post('harga', TRUE),
			'keterangan'	=> $this->input->post('keterangan', TRUE),
			'ditambahkan'	=> date('Y-m-d H:i:s')
		);
		
		if ( empty($data['kode_sc'])) {
			$data['kode_sc'] = $this->crypto->gen_crypt(8);
		}

		return $data;
	}
/**
|--------------------------------------------------------
|	Ini untuk insert sparepart baru
|--------------------------------------------------------
 */
	public function new_sparepart() {
		$data 		= $this->sparepart_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$folder = array (
			'root'		=> 'file/sparepart',
			'path' 		=> 'file/sparepart/'.$data['nama_sc']
		);

		$upload 	= $this->photo->serialize_photo($folder);

		if (! empty($upload)) {
			foreach($upload as $image) {
				$file 	= array(
					'kode_file'		=> $this->crypto->gen_crypt(8),
					'referensi'		=> $data['kode_sc'],
					'nama_file'		=> $image,
					'link_file'		=> base_url($folder['path'].'/'.$image),
					'ditambahkan'	=> date('Y-m-d H:i:s')
				);

				$insert_file 	= $this->crud_model->insert_data('file', $file);
			}
		}

		$insert_sparepart = $this->crud_model->insert_data('suku_cadang', $data);
		
		if ($insert_sparepart == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'suku cadang berhasil ditambahkan'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'suku cadang gagal ditambahkan'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk update data sparepart
|--------------------------------------------------------
 */
	public function update_sparepart() {
		$data 			= $this->sparepart_data();
		$session 		= $this->access->session_data();
		$admin 			= $session['akses'];
		$folder			= 'file/sparepart/'.$data['nama_sc'];

		$key_sparepart 	= array('suku_cadang.kode_sc' => $data['kode_sc']);
		$old_data		= $this->crud_model->_select_sparepart($key_sparepart);
		$old_path 		= 'file/sparepart/'.$old_data['nama_sc'];

		if ($old_path != $folder) {
			rename($old_path, $folder);
			$key_ref	= array('file.referensi' => $data['kode_sc']);
			$old_file 	= $this->crud_model->_all_file($key_ref);

			foreach ($old_file as $image) {
				$file 	= array(
					'link_file'		=> base_url($folder.'/'.$image['nama_file']),
				);
				$key_file 		= array('kode_file' => $image['kode_file']);
				$update_file 	= $this->crud_model->update_data('file', $file, $key_file);
			}
		}

		$update_sparepart 	= $this->crud_model->update_data('suku_cadang', $data, $key_sparepart);
		
		if ($update_sparepart == TRUE) {
			$alert = array(
				'type' 		=> 'success',
				'message' 	=> 'Suku cadang berhasil diubah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/edit/'.$data['kode_sc'], 'location', 303);
		}
		else {
			$alert = array(
				'type' 		=> 'danger',
				'message' 	=> 'Suku cadang gagal diubah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/edit/'.$data['kode_sc'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk upload gambar series
|--------------------------------------------------------
 */	
	public function upload_sparepart() {
		$data 			= $this->sparepart_data();
		$session 		= $this->access->session_data();
		$admin 			= $session['akses'];

		$folder = array(
			'root'		=> 'file/sparepart',
			'path' 		=> 'file/sparepart/'.$data['nama_sc']
		);

		$upload 	= $this->photo->serialize_photo($folder);

		if (! empty($upload)) {
			foreach($upload as $image) {		
				$file 	= array(
					'kode_file'		=> $this->crypto->gen_crypt(8),
					'referensi'		=> $data['kode_sc'],
					'nama_file'		=> $image,
					'link_file'		=> base_url($folder['path'].'/'.$image),
					'ditambahkan'	=> date('Y-m-d H:i:s')
				);

				$insert_file 	= $this->crud_model->insert_data('file', $file);
			}
		}

		if ($insert_file == TRUE) {
			$alert = array(
				'type' 		=> 'success',
				'message' 	=> 'Gambar berhasil diunggah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/edit/'.$data['kode_sc'], 'location', 303);
		}
		else {
			$alert = array(
				'type' 		=> 'danger',
				'message' 	=> 'Gambar gagal diunggah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/edit/'.$data['kode_sc'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk hapus gambar sparepat
|--------------------------------------------------------
 */
	public function delete_sparepart_file($index) {
		$session 		= $this->access->session_data();
		$admin 			= $session['akses'];

		$key_file 		= array('file.kode_file' => $index);
		$file 			= $this->crud_model->_select_file($key_file);

		$key_folder		= explode('/', $file['link_file']);
		$filepath		= 'file/sparepart/'.$key_folder[6];
		$target 		= $filepath.'/'.$file['nama_file'];

		$delete_file 	= $this->photo->delete_file_photo($target, $filepath, $key_file);

		if ($delete_file == TRUE) {
			$alert = array(
				'type' 		=> 'success',
				'message' 	=> 'Gambar berhasil dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/edit/'.$file['referensi'], 'location', 303);
		}
		else {
			$alert = array(
				'type' 		=> 'danger',
				'message' 	=> 'Gambar gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/edit/'.$file['referensi'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk hapus sparepart
|--------------------------------------------------------
 */		
	public function delete_sparepart($index) {
		$session 		= $this->access->session_data();
		$admin 			= $session['akses'];

		$key_sparepart	= array('suku_cadang.kode_sc' => $index);
		$sparepart 		= $this->crud_model->_select_sparepart($key_sparepart);
		
		$key_file 		= array('file.referensi' => $index);
		$file 			= $this->crud_model->_all_file($key_file);
		$filepath		= 'file/sparepart/'.$sparepart['nama_sc'];

		foreach($file as $image) {
			$target = $filepath.'/'.$image['nama_file'];
			$this->photo->delete_file_photo($target, $filepath, $key_file);
		}
		
		$delete_sparepart = $this->crud_model->delete_data('suku_cadang', $key_sparepart);

		if ($delete_sparepart == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'Suku cadang berhasil dihapus'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/sparepart/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'Suku cadang dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin['akses'].'/sparepart/', 'location', 303);
		}
	}
}
