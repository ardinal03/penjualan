<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function insert_data($table, $data) {
		if ($this->db->insert($table, $data, TRUE)) {
			return TRUE;
		}
	}

	public function update_data($table, $data, $where) {
		if ($this->db->update($table, $data, $where)) {
			return TRUE;
		}
	}

	public function delete_data($table, $where) {
		if ($this->db->delete($table, $where)) {
			return TRUE;
		}
	}

	protected function _result_array($query) {
		if (! empty($query)) {
			return $query->result_array();
		}
		else {
			return FALSE;
		}
	}

	protected function _row_array($query) {
		if (! empty($query)) {
			return $query->row_array();
		}
		else {
			return FALSE;
		}
	}
/**
|--------------------------------------------------------
|	FILE / GAMBAR
|	Semua Data Gambar / File
|--------------------------------------------------------
 */
	public function _all_file($index) {
		$this->db->select('*');
		$this->db->where($index);

		$query = $this->db->get('file');
		return $this->_result_array($query);
	}
/**
|--------------------------------------------------------
|	Pilih Satu Data Gambar / File
|--------------------------------------------------------
 */
	public function _select_file($index) {
		$this->db->select('*');
		$this->db->where($index);

		$query = $this->db->get('file');
		return $this->_row_array($query);
	}
/**
|--------------------------------------------------------
|	KONTAK
|	Semua Data Kontak
|--------------------------------------------------------
 */
	public function _all_kontak() {
		$this->db->select('*');
		$this->db->join('file', 'kontak.id_kontak = file.referensi', 'LEFT');
		
		$query 	= $this->db->get('kontak');
		return $this->_result_array($query);
	}
/**
|--------------------------------------------------------
|	Pilih Satu Data Kontak
|--------------------------------------------------------
 */
	public function _select_kontak($index) {
		$this->db->select('*');
		$this->db->where($index);
		$this->db->join('file', 'kontak.id_kontak = file.referensi', 'LEFT');

		$query 	= $this->db->get('kontak');
		return $this->_row_array($query);
	}
/**
|--------------------------------------------------------
|	KATEGORI
|	Semua Data Kategori
|--------------------------------------------------------
 */
	public function _all_kategori() {
		$this->db->select('*');
		$this->db->join('file', 'kategori.kode_kategori = file.referensi', 'LEFT');
		$this->db->order_by('kategori.nama_kategori', 'ASC');
		
		$query = $this->db->get('kategori');
		return $this->_result_array($query);
	}
/**
|--------------------------------------------------------
|	Pilih Satu Data Kategori
|--------------------------------------------------------
 */
	public function _select_kategori($index) {
		$this->db->select('*');
		$this->db->where($index);
		$this->db->join('file', 'kategori.kode_kategori = file.referensi', 'LEFT');

		$query = $this->db->get('kategori');
		return $this->_row_array($query);	
	}
/**
|--------------------------------------------------------
|	SERIES
|	Semua Data Series
|--------------------------------------------------------
 */
	public function _all_series($index = NULL) {
		$this->db->select('*');
		$this->db->join('kategori', 'series.kode_kategori = kategori.kode_kategori', 'LEFT');
		$this->db->join('file', 'series.kode_series = file.referensi', 'LEFT');
		$this->db->group_by('series.kode_series');
		$this->db->order_by('series.nama_series', 'ASC');
		
		if (! empty($index)) {
			$this->db->where($index);
		}

		$query = $this->db->get('series');
		return $this->_result_array($query);
	}
/**
|--------------------------------------------------------
|	Pilih Satu Data Series
|--------------------------------------------------------
 */
	public function _select_series($index) {
		$this->db->select('*');
		$this->db->join('kategori', 'series.kode_kategori = kategori.kode_kategori');
		$this->db->where($index);
		
		$query = $this->db->get('series');
		return $this->_row_array($query);	
	}
/**
|--------------------------------------------------------
|	PRODUK
|	Semua Data Produk
|--------------------------------------------------------
 */
	public function _all_produk($index = NULL) {
		$this->db->select('*');
		$this->db->join('series', 'produk.kode_series = series.kode_series', 'LEFT');

		if (! empty($index)) {
			$this->db->where($index);
		}
		
		$query = $this->db->get('produk');
		return $this->_result_array($query);
	}
/**
|--------------------------------------------------------
|	Pilih Satu Data Produk
|--------------------------------------------------------
 */	
	public function _select_produk($index) {
		$this->db->select('*');
		$this->db->join('series', 'produk.kode_series = series.kode_series', 'LEFT');
		$this->db->where($index);

		$query = $this->db->get('produk');
		return $this->_row_array($query);	
	}
/**
|--------------------------------------------------------
|	SPAREPART
|	Semua Data Sparepart
|--------------------------------------------------------
 */
	public function _all_sparepart($index = NULL) {
		$this->db->select('*');
		$this->db->join('file', 'suku_cadang.kode_sc = file.referensi', 'LEFT');
		$this->db->group_by('kode_sc');

		if (! empty($index)) {
			$this->db->where($index);
		}

		$query = $this->db->get('suku_cadang');
		return $this->_result_array($query);
	}
/**
|--------------------------------------------------------
|	Pilih Satu Data Sparepart
|--------------------------------------------------------
 */	
	public function _select_sparepart($index) {
		$this->db->select('*');
		$this->db->where($index);

		$query = $this->db->get('suku_cadang');
		return $this->_row_array($query);	
	}
/**
|--------------------------------------------------------
|	SERVICE
|	Semua Data Service
|--------------------------------------------------------
 */
	public function _all_service() {
		$this->db->select('*');

		$query 	= $this->db->get('bengkel');
		return $this->_result_array($query);
	}
/**
|--------------------------------------------------------
|	Pilih Satu Data Service
|--------------------------------------------------------
 */
	public function _select_service($index) {
		$this->db->select('*');
		$this->db->where($index);

		$query = $this->db->get('bengkel');
		return $this->_row_array($query);	
	}
}