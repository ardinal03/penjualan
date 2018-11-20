<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crypto {	

	protected $cr;

	public function __construct() {
		$this->cr =& get_instance();
	}

	protected function crypto_rand_secure($min, $max) {

		$range = $max - $min;

		if ($range < 1) return $min;

		$log	= ceil(log($range, 2));
		$bytes 	= (int) ($log / 8) + 1;
		$bits 	= (int) $log + 1;
		$filter = (int) (1 << $bits) - 1;
		
		do {
			$rnd 	= hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
			$rnd 	= $rnd & $filter;
		} 

		while ($rnd > $range);
		
		return $min + $rnd;
	}

	public function gen_crypt($length) {

		$token 			= "";
		$codeAlphabet 	= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet	.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet 	.= "0123456789";

		$max 			= strlen($codeAlphabet);
		
		for ($i=0; $i<$length; $i++) {

			$token 		.= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
		}

		return $token;
	}
}