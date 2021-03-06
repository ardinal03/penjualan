<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_control extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['kategori'] 	= $this->crud_model->_all_kategori();

		$this->access->pages_normal('home', $data);
	}

	public function login() {
		$this->load->view('resource/basic');
		$this->load->view('pages/login');
		$this->load->view('resource/footer');
	}

	public function login_action() {
		$username	= $this->input->post('username', true);
		$password	= $this->input->post('password', true);

		$login 		= $this->action_model->check_login($username, $password);

		if (! empty($login)) {
			$this->access->start_session($login);
			$session = $this->access->session_data();

			if($session['akses'] == 'administrator') {
				redirect(base_url(), 'location', 303);
			}
		}
		else {
			$alert = array(
				'type' 		=> 'danger',
				'message'	=> 'username atau password salah, silahkan ulangi kembali.'
			);

			$this->alert->gen_alert($alert);
			redirect('home_control/login', 'location', 303);
		}
	}

	public function logout() {
		$this->access->end_session();
		redirect(base_url(), 'location', 303);
	}
}
