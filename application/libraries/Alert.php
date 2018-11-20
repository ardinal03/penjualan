<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert {

	protected $al;
	public $type = '';
	public $message = '';

	public function __construct() {
		$this->al =& get_instance();
	}

	public function gen_alert(array $config = array()) {
		$type		= $config['type'];
		$message 	= $config['message'];
		
		$this->alert_message($type, $message);
	}

	public function alert_message($type, $message) {
		$this->al->session->set_flashdata(
			'msg', 
			'<div class="alert bg-'.$type.' alert-dismissible fade show" role="alert">
				<div class="container">
					<span class="text-white" style="font-size: 14px; text-transform: capitalize; ">'.$message.'</span> 
					<button type="button" class="close" style="color:#fff!important" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button><br/>
				</div>
			</div>'
		);
	}
}