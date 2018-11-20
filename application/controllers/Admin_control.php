<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_control extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('resource/basic');
		$this->load->view('resource/header');
		$this->load->view('resource/admin');
		$this->load->view('admin/dashboard');
		$this->load->view('resource/footer');
	}

	public function kategori() {
		$data['kategori'] 	= $this->crud_model->get_all_kategori();

		$this->load->view('resource/basic');
		$this->load->view('resource/header');
		$this->load->view('resource/admin');
		$this->load->view('admin/kategori', $data);
		$this->load->view('resource/footer');	
	}

	public function produk() {
		$this->load->view('resource/basic');
		$this->load->view('resource/header');
		$this->load->view('resource/admin');
		$this->load->view('admin/produk');
		$this->load->view('resource/footer');	
	}

	public function sparepart() {
		$this->load->view('resource/basic');
		$this->load->view('resource/header');
		$this->load->view('resource/admin');
		$this->load->view('admin/sparepart');
		$this->load->view('resource/footer');	
	}
}

