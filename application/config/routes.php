<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['administrator/kategori']	= 'admin_control/kategori/';
$route['administrator/produk']		= 'admin_control/produk/';
$route['administrator/sparepart']	= 'admin_control/sparepart/';
$route['administrator']		 		= 'admin_control/index/';
$route['default_controller'] 		= 'home_control';
$route['404_override'] 				= '';
$route['translate_uri_dashes'] = FALSE;
?>
