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

	public function new_kategori() {
		$group 		= $this->input->post('nama_kategori', TRUE);
		$upload 	= $this->photo->serialize_photo($group);
		$session 	= $this->access->session_data();

		if (! empty($upload)) {
			foreach($upload as $up) {
				$data 	= array(
					'kode_kategori' 	=> $this->crypto->gen_crypt(8),
					'nama_kategori'		=> $group,
					'gambar_kategori'	=> $up,
					'ditambahkan'		=> date('Y-m-d H:i:s')
				);
			}
		}
		else {
			$data 	= array(
				'kode_kategori' 	=> $this->crypto->gen_crypt(8),
				'nama_kategori'		=> $group,
				'ditambahkan'		=> date('Y-m-d H:i:s')
			);
		}

		$insert_db = $this->crud_model->insert_data('kategori', $data);

		if ($insert_db == TRUE) {
			$alert = array(
				'type'	=> 'success',
				'message' => 'kategori berhasil ditambahkan'
			);
		
			$this->alert->gen_alert($alert);
			redirect($session['akses'].'/kategori/', 'location', 303);
		}
		else {
			$alert = array(
				'type'	=> 'danger',
				'message' => 'kategori gagal ditambahkan'
			);
			$this->alert->gen_alert($alert);
			redirect($session['akses'].'/kategori/', 'location', 303);
		}
	}
}
	