<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_control extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function produk($index) {
		$nama_series 	= str_replace('-', ' ', $index);

		$key_series 	= array('series.nama_series' => $nama_series);
		$data['series']	= $this->crud_model->_select_series($key_series);
		
		$kode_series 	= $data['series']['kode_series'];
		$key_file 		= array('file.referensi' => $kode_series);
		$key_produk 	= array('produk.kode_series' => $kode_series);

		$data['produk']	= $this->crud_model->_all_produk($key_produk);
		$data['file']	= $this->crud_model->_all_file($key_file);

		$this->access->pages_normal('pages/produk', $data);
	}

	public function sparepart($index = NULL) {
		$key_sparepart = NULL;
		if ( ! empty($index)) {
			$key_sparepart 	= array('suku_cadang.kode_sc' => $index);
			$key_file 		= array('file.referensi' => $index);
			
			$data['sparepart'] 	= $this->crud_model->_select_sparepart($key_sparepart);
			$data['file']		= $this->crud_model->_all_file($key_file);
			$this->access->pages_normal('sparepart/detail', $data);
		}
		else {
			$data['sparepart'] = $this->crud_model->_all_sparepart($key_sparepart);
			$this->access->pages_normal('pages/sparepart', $data);
		}
	}

	public function service() {
		$data['service'] = $this->crud_model->_all_service();
		$this->access->pages_normal('pages/service', $data);
	}

	public function kontak() {
		$data['kontak'] = $this->crud_model->_all_kontak();
		$data['ulasan'] = $this->crud_model->_all_ulasan();
		$this->access->pages_normal('pages/kontak', $data);
	}

	public function kategori($index) {
		$key_series			= array('kategori.nama_kategori' => $index);
		$data['kategori']	= $index;
		$data['series'] 	= $this->crud_model->_all_series($key_series);
		$this->access->pages_normal('pages/kategori', $data);
	}
}