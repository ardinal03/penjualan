<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_control extends CI_Controller {
	
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
|	Kontak View Admin
|--------------------------------------------------------
 */
	public function admin_kontak() {
		$data['session'] 	= $this->access->session_data();
		$data['kontak'] 	= $this->crud_model->_all_kontak();

		$this->access->pages_admin('kontak/admin', $data);
	}
/**
|--------------------------------------------------------
|	Kontak - Edit
|--------------------------------------------------------
 */
	public function edit_kontak($index) {
		$key_kontak 	= array('kontak.id_kontak' => $index);

		$data['session']	= $this->access->session_data();
		$data['kontak'] 	= $this->crud_model->_select_kontak($key_kontak);

		$this->access->pages_admin('kontak/edit', $data);
	}	
/**
|--------------------------------------------------------
|	Variabel Kontak dari Form
|--------------------------------------------------------
 */
	public function kontak_data() {
		$data = array(
			'id_kontak'	 	=> $this->input->post('id_kontak', TRUE),
			'nama_kontak'	=> $this->input->post('nama_kontak', TRUE),
			'username'		=> $this->input->post('username', TRUE),
			'password'		=> $this->input->post('password', TRUE),
			'no_telp'		=> $this->input->post('no_telp', TRUE),
			'email'			=> $this->input->post('email', TRUE),
			'akses'			=> $this->input->post('akses', TRUE),
			'jabatan'		=> $this->input->post('jabatan', TRUE),
			'ditambahkan'	=> date('Y-m-d H:i:s')
		);
		
		if (empty($data['id_kontak'])) {
			$data['id_kontak'] = $this->crypto->gen_crypt(8);
		}

		if (empty($data['password'])) {
			$data['password'] = $this->input->post('current_pass', TRUE);
		}

		return $data;
	}
/**
|--------------------------------------------------------
|	Ini Untuk Insert Kontak Baru
|--------------------------------------------------------
 */
	public function new_kontak() {
		$data 		= $this->kontak_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];
		
		$folder 	= array(
			'root'	=> 'file/kontak',
			'path' 	=> 'file/kontak/'.$data['nama_kontak']
		);
		
		$upload 	= $this->photo->serialize_photo($folder);

		if (! empty($upload)) {
			foreach($upload as $image) {
				$file 	= array(
					'kode_file'		=> $this->crypto->gen_crypt(8),
					'referensi'		=> $data['id_kontak'],
					'nama_file'		=> $image,
					'link_file'		=> base_url($folder['path'].'/'.$image),
					'ditambahkan'	=> date('Y-m-d H:i:s')
				);

				$insert_file 	= $this->crud_model->insert_data('file', $file);
			}
		}

		$insert_kontak	= $this->crud_model->insert_data('kontak', $data);
		
		if ($insert_kontak == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'kontak berhasil ditambahkan'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/kontak/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'kontak gagal ditambahkan'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/kontak/', 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini Untuk Update Data Kontak
|--------------------------------------------------------
 */
	public function update_kontak() {
		$data 		= $this->kontak_data();
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];

		$folder 	= array(
			'root'	=> 'file/kontak',
			'path' 	=> 'file/kontak/'.$data['nama_kontak']
		);

		$key_kontak	= array('kontak.id_kontak' => $data['id_kontak']);
		$old_data	= $this->crud_model->_select_kontak($key_kontak);
		$old_path 	= 'file/kontak/'.$old_data['nama_kontak'];
		
		$old_prim	= $old_data['kode_file'];
		$old_photo	= $old_data['nama_file'];

		$upload 	= $this->photo->serialize_photo($folder, $old_photo);
		$key_file 	= array('file.kode_file' => $old_prim);
		
		if ($old_path != $folder['path']) {
			rename($old_path, $folder['path']);
		}
		
		if (! empty($upload) && $upload != $old_photo) {
			foreach($upload as $image) {
				$file = array(
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
		
		$update_kontak 	= $this->crud_model->update_data('kontak', $data, $key_kontak);
		
		if ($update_kontak == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'kontak berhasil diubah'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/kontak/edit/'.$data['id_kontak'], 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'kontak gagal diubah'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/kontak/edit/'.$data['id_kontak'], 'location', 303);
		}
	}
/**
|--------------------------------------------------------
|	Ini Untuk Hapus Data Kontak
|--------------------------------------------------------
 */
	public function delete_kontak($index) {
		$session 	= $this->access->session_data();
		$admin 		= $session['akses'];
		
		$key_kontak = array('kontak.id_kontak' => $index);
		$key_file 	= array('file.referensi' => $index);
		$kontak 	= $this->crud_model->_select_kontak($key_kontak);
		$file_path 	= 'file/kontak/'.$kontak['nama_kontak'];
		$target 	= $file_path.'/'.$kontak['nama_file'];
		
		$delete_file 	= $this->photo->delete_file_photo($target, $file_path, $key_file);
		$delete_kontak 	= $this->crud_model->delete_data('kontak', $key_kontak);
		
		if ($delete_kontak == TRUE) {
			$alert = array(
				'type'		=> 'success',
				'message' 	=> 'kontak berhasil dihapus'
			);
		
			$this->alert->gen_alert($alert);
			redirect($admin.'/kontak/', 'location', 303);
		}
		else {
			$alert = array(
				'type'		=> 'danger',
				'message' 	=> 'kontak gagal dihapus'
			);
			$this->alert->gen_alert($alert);
			redirect($admin.'/kontak/', 'location', 303);
		}		
	}
}
