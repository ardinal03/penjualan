<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access {	

	protected $ac;

	public function __construct() {
		$this->ac =& get_instance();
	}

	public function start_session(array $config = array()) {
		$this->ac->session->set_userdata('username', $config['username']);
		$this->ac->session->set_userdata('akses', $config['akses']);
	}

	public function session_data() {
		$data = array(
			'name' 	=> $this->ac->session->userdata('username'),
			'akses' => $this->ac->session->userdata('akses')
		);

		if (empty($data['name'])) {
			return FALSE;
		}
		else {
			return $data;
		}
	}

	public function end_session() {
		$this->ac->session->unset_userdata('username');
		$this->ac->session->unset_userdata('akses');
		$this->ac->session->sess_destroy();
	}
}