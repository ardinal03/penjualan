<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_control extends CI_Controller {
	
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
|	Kategori View Admin
|--------------------------------------------------------
 */
	public function admin_kategori() {
		$data['session'] 	= $this->access->session_data();
		$data['kategori'] 	= $this->crud_model->_all_kategori();
		
		$this->access->pages_admin('kategori/admin', $data);
	}
/**
|--------------------------------------------------------
|	Kategori - Edit
|--------------------------------------------------------
 */
	public function edit_kategori($index) {
		$key_kategori 	= array('kategori.kode_kategori' => $index);

		$data['session'] 	= $this->access->session_data();
		$data['kategori'] 	= $this->crud_model->_select_kategori($key_kategori);
		
		$this->access->pages_admin('kategori/edit', $data);
	}
/**
|--------------------------------------------------------
|	Variabel kategori dari form
|--------------------------------------------------------
 */
	public function kategori_data() {
		$data 	= array(
			'kode_kategori' 	=> $this->input->post('kode_kategori', TRUE),
			'nama_kategori'		=> $this->input->post('nama_kategori', TRUE),
			'ditambahkan'		=> date('Y-m-d H:i:s')
		);

		if (empty($data['kode_kategori'])) {
			$data['kode_kategori'] = $this->crypto->gen_crypt(8);
		}

		return $data;
	}
/**
|--------------------------------------------------------
|	Ini untuk insert kategori baru
|--------------------------------------------------------
 */	
	public function new_kategori() {
		$data 		= $this->kategori_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];
		
		$folder = array(
			'root'		=> 'file/kategori',
			'path' 		=> 'file/kategori/'.$data['nama_kategori']
		);

		$upload 	= $this->photo->serialize_photo($folder);

		if (! empty($upload)) {
			foreach($upload as $image) {
				$file 	= array(
					'kode_file'		=> $this->crypto->gen_crypt(8),
					'referensi'		=> $data['kode_kategori'],
					'nama_file'		=> $image,
					'link_file'		=> base_url($folder['path'].'/'.$image),
					'ditambahkan'	=> date('Y-m-d H:i:s')
				);

				$insert_file 	= $this->crud_model->insert_data('file', $file);
			}
		}

		$insert_kategori = $this->crud_model->insert_data('kategori', $data);

		if ($insert_kategori == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'kategori berhasil ditambahkan'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/kategori/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message'	=> 'kategori gagal ditambahkan'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/kategori/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk update kategori
|--------------------------------------------------------
 */	
	public function update_kategori() {
		$data 		= $this->kategori_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$folder = array(
			'root'	=> 'file/kategori',
			'path' 	=> 'file/kategori/'.$data['nama_kategori']
		);

		$key_kategori 	= array('kategori.kode_kategori' => $data['kode_kategori']);
		$old_data		= $this->crud_model->_select_kategori($key_kategori);
		$old_path 		= 'file/kategori/'.$old_data['nama_kategori'];
		$old_prim		= $old_data['kode_file'];
		$old_photo 		= $old_data['nama_file'];

		$upload 		= $this->photo->serialize_photo($folder, $old_photo);
		$key_file 		= array('file.kode_file' => $old_prim);

		if ($old_path != $folder['path']) {
			rename($old_path, $folder['path']);
		}
		
		if (! empty($upload) && $upload != $old_photo) {
			foreach($upload as $image) {
				$file 	= array(
					'nama_file'		=> $image,
					'link_file'		=> base_url($folder['path'].'/'.$image),
					'ditambahkan'	=> date('Y-m-d H:i:s')
				);

				$update_file 	= $this->crud_model->update_data('file', $file, $key_file);

				$target 		= $old_path.'/'.$old_photo;
				$this->photo->delete_file_photo($target, $old_path);
			}
		}
		else {
			$file = array(
				'link_file'		=> base_url($folder['path'].'/'.$old_photo),
				'ditambahkan' 	=> date('Y-m-d H:i:s')
			);

			$update_file 	= $this->crud_model->update_data('file', $file, $key_file);
		}

		$update_kategori 	= $this->crud_model->update_data('kategori', $data, $key_kategori);

		if ($update_kategori == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'kategori berhasil diubah'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/kategori/edit/'.$data['kode_kategori'], 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message'	=> 'kategori gagal diubah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/kategori/edit/'.$data['kode_kategori'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk konfirmasi hapus kategori
|--------------------------------------------------------
 */	
	public function conf_kategori($index) {
		$key_kategori 		= array('kategori.kode_kategori' => $index);
		$key_series			= array('series.kode_kategori' => $index);

		$data['kategori'] 	= $this->crud_model->_select_kategori($key_kategori);
		$data['series'] 	= $this->crud_model->_all_series($key_series);
		$data['session'] 	= $this->access->session_data();

		$this->access->pages_warning('errors/warning/kategori', $data);
	}
/**
|--------------------------------------------------------
|	Ini untuk hapus kategori
|--------------------------------------------------------
 */	
	public function delete_kategori($index, $accept = "") {
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$key_series	= array('series.kode_kategori' => $index);
		$series 	= $this->crud_model->_all_series($key_series);

		if ( ! empty($series) && empty($accept)) {
			redirect('kategori_control/conf_kategori/'.$index, 'location', 303);
		}
		elseif (empty($series) && empty($accept)) {
			redirect('kategori_control/delete_kategori/'.$index.'/ok', 'location', 303);
		}
	
		foreach ($series as $dts) {
			$key_produk 	= array('produk.kode_series' => $dts['kode_series']);
			$delete_produk 	= $this->crud_model->delete_data('produk', $key_produk);
			
			$key_file 		= array('file.referensi' => $dts['kode_series']);
			$filedata		= $this->crud_model->_all_file($key_file);
			$filepath		= 'file/series/'.$dts['nama_series'];
			
			foreach($filedata as $file) {
				$target 		= $filepath.'/'.$file['nama_file'];
				$delete_file 	= $this->photo->delete_file_photo($target, $filepath, $key_file);
			}

			$delete_series 	= $this->crud_model->delete_data('series', $key_series);
		}

		$key_kategori		= array('kategori.kode_kategori' => $index);
		$kategori 			= $this->crud_model->_select_kategori($key_kategori);
		$key_file 			= array('file.referensi' => $kategori['kode_kategori']);
		$filepath 			= 'file/kategori/'.$kategori['nama_kategori'];
		$target 			= $filepath.'/'.$kategori['nama_file'];
		$delete_file 		= $this->photo->delete_file_photo($target, $filepath, $key_file);
		$delete_kategori	= $this->crud_model->delete_data('kategori', $key_kategori);
		
		if ($delete_kategori == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'kategori berhasil dihapus'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/kategori/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'kategori gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/kategori/', 'location', 303);
		}
	}
}