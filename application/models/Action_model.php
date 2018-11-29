<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function check_login($user, $pass) {
		$this->db->select('*');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);

		$query 	= $this->db->get('kontak');
		$row 	= $query->num_rows();
		
		if ($row > 0) {
			return $query->row_array();
		}
		else {
			return FALSE;
		}
	}
}