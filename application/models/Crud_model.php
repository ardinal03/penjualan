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

	public function get_all_kategori() {
		$this->db->select('*');
		$query = $this->db->get('kategori');

		if ($query) {
			return $query->result_array();
		}
		else {
			return FALSE;
		}
	}
}