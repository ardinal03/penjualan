<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Series_control extends CI_Controller {
	
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
|	Series View Admin
|--------------------------------------------------------
 */
	public function admin_series($index = NULL) {
		$key_series = NULL;

		if ( ! empty($index)) {
			$key_series 	= array('kategori.nama_kategori' => $index);
		}

		$data['session'] 	= $this->access->session_data();
		$data['series'] 	= $this->crud_model->_all_series($key_series);
		$data['kategori'] 	= $this->crud_model->_all_kategori();
		
		$this->access->pages_admin('series/admin', $data);
	}
/**
|--------------------------------------------------------
|	Series - Edit
|--------------------------------------------------------
 */
	public function edit_series($index) {
		$key_series	= array('series.kode_series' => $index);
		$key_file 	= array('file.referensi' => $index);

		$data['session'] 	= $this->access->session_data();
		$data['series'] 	= $this->crud_model->_select_series($key_series);
		$data['file']		= $this->crud_model->_all_file($key_file);
		$data['kategori'] 	= $this->crud_model->_all_kategori();
		
		$this->access->pages_admin('series/edit', $data);
	}
/**
|--------------------------------------------------------
|	Variabel series dari form
|--------------------------------------------------------
 */
	public function series_data() {
		$data 	= array(
			'kode_series' 	=> $this->input->post('kode_series', TRUE),
			'nama_series'	=> $this->input->post('nama_series', TRUE),
			'kode_kategori'	=> $this->input->post('kategori', TRUE),
			'warna'			=> $this->input->post('warna', TRUE), 
			'ditambahkan'	=> date('Y-m-d H:i:s')
		);

		if (empty($data['kode_series'])) {
			$data['kode_series'] = $this->crypto->gen_crypt(8);
		}

		return $data;
	}
/**
|--------------------------------------------------------
|	Ini untuk insert series baru
|--------------------------------------------------------
 */
	public function new_series() {
		$data 		= $this->series_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];
		$folder 	= array(
			'root'	=> 'file/series',
			'path' 	=> 'file/series/'.$data['nama_series']
		);

		$upload 	= $this->photo->serialize_photo($folder);

		if (! empty($upload)) {
			foreach($upload as $image) {		
				$file 	= array(
					'kode_file'		=> $this->crypto->gen_crypt(8),
					'referensi'		=> $data['kode_series'],
					'nama_file'		=> $image,
					'link_file'		=> base_url($folder['path'].'/'.$image),
					'ditambahkan'	=> date('Y-m-d H:i:s')
				);

				$insert_file = $this->crud_model->insert_data('file', $file);
			}
		}

		$insert_series = $this->crud_model->insert_data('series', $data);
		
		if ($insert_series == TRUE) {
			$alert = array(
				'type' 		=> 'success',
				'message' 	=> 'Series berhasil ditambahkan'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/', 'location', 303);
		}
		else {
			$alert = array(
				'type' 		=> 'danger',
				'message' 	=> 'Series gagal ditambahkan'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk update series
|--------------------------------------------------------
 */	
	public function update_series() {
		$data 		= $this->series_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];
		$folder 	= 'file/series/'.$data['nama_series'];
		
		$key_series = array('series.kode_series' => $data['kode_series']);
		$old_data	= $this->crud_model->_select_series($key_series);
		$old_path 	= 'file/series/'.$old_data['nama_series'];
		
		if ($old_path != $folder) {
			rename($old_path, $folder);
			
			$key_ref 	= array('file.referensi' => $data['kode_series']);
			$old_file 	= $this->crud_model->_all_file($key_ref);
			
			foreach ($old_file as $image) {
				$file 	= array(
					'link_file'		=> base_url($folder.'/'.$image['nama_file']),
				);
				$key_file 		= array('kode_file' => $image['kode_file']);
				$update_file 	= $this->crud_model->update_data('file', $file, $key_file);
			}
		}
		
		$update_series 	= $this->crud_model->update_data('series', $data, $key_series);
		
		if ($update_series == TRUE) {
			$alert = array(
				'type' 		=> 'success',
				'message' 	=> 'Series berhasil diubah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/edit/'.$data['kode_series'], 'location', 303);
		}
		else {
			$alert = array(
				'type' 		=> 'danger',
				'message' 	=> 'Series gagal diubah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/edit/'.$data['kode_series'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk upload gambar series
|--------------------------------------------------------
 */	
	public function upload_series() {
		$data 		= $this->series_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$folder = array (
			'root'		=> 'file/series',
			'path' 		=> 'file/series/'.$data['nama_series']
		);

		$upload 	= $this->photo->serialize_photo($folder);

		if (! empty($upload)) {
			foreach($upload as $image) {		
				$file 	= array(
					'kode_file'		=> $this->crypto->gen_crypt(8),
					'referensi'		=> $data['kode_series'],
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
			redirect($admin.'/series/edit/'.$data['kode_series'], 'location', 303);
		}
		else {
			$alert = array(
				'type' 		=> 'danger',
				'message' 	=> 'Gambar gagal diunggah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/edit/'.$data['kode_series'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk hapus series
|--------------------------------------------------------
 */
	public function delete_series_file($index) {
		$session 		= $this->access->session_data();
		$admin 			= $session['akses'];

		$key_file		= array('file.kode_file' => $index);
		$file 			= $this->crud_model->_select_file($key_file);

		$key_folder		= explode('/', $file['link_file']);
		$filepath 		= 'file/series/'.$key_folder[6];
		$target 		= $filepath.'/'.$file['nama_file'];

		$delete_file 	= $this->photo->delete_file_photo($target, $filepath, $key_file);

		if ($delete_file == TRUE) {
			$alert = array(
				'type' 		=> 'success',
				'message' 	=> 'Gambar berhasil dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/edit/'.$file['referensi'], 'location', 303);
		}
		else {
			$alert = array(
				'type' 		=> 'danger',
				'message' 	=> 'Gambar gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/edit/'.$file['referensi'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini untuk konfirmasi hapus series
|--------------------------------------------------------
 */	
	public function conf_series($index) {
		$key_series 		= array('series.kode_series' => $index);
		$data['series'] 	= $this->crud_model->_select_series($key_series);
		$data['session']	= $this->access->session_data();

		$this->access->pages_warning('errors/warning/series', $data);
	}
/**
|--------------------------------------------------------
|	Ini untuk hapus series
|--------------------------------------------------------
 */	
	public function delete_series($index, $accept = "") {
		$session 		= $this->access->session_data();
		$admin 			= $session['akses'];
		$key_produk		= array('produk.kode_series' => $index);
		$produk 		= $this->crud_model->_all_produk($key_produk);
		
		if (! empty($produk) && empty($accept)) {
			redirect('Series_control/conf_series/'.$index, 'location', 303);
		}
		elseif (empty($produk) && empty($accept)) {
			redirect('Series_control/delete_series/'.$index.'/ok', 'location', 303);
		}
		
		foreach ($produk as $dtp) {
			$delete_produk 	= $this->crud_model->delete_data('produk', $key_produk);
		}

		$key_series 	= array('series.kode_series' => $index);
		$series 		= $this->crud_model->_select_series($key_series);

		$key_file 		= array('file.referensi' => $index);
		$file 			= $this->crud_model->_all_file($key_file);
		$filepath		= 'file/series/'.$series['nama_series'];
			
		foreach($file as $image) {
			$target = $filepath.'/'.$image['nama_file'];
			$this->photo->delete_file_photo($target, $filepath, $key_file);
		}
		
		$delete_series = $this->crud_model->delete_data('series', $key_series);

		if ($delete_series == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'Series berhasil dihapus'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'Series gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/series/', 'location', 303);
		}
	}
}