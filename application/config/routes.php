<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['produk/(:any)']							= 'detail_control/produk/$1/';
$route['sparepart/(:any)']						= 'detail_control/sparepart/$1/';
$route['sparepart']								= 'detail_control/sparepart/';
$route['service']								= 'detail_control/service/';
$route['kontak']								= 'detail_control/kontak/';
$route['kategori/(:any)']						= 'detail_control/kategori/$1/';

$route['administrator/ulasan']					= 'ulasan_control/admin_ulasan/';

$route['administrator/pesan/(:any)']			= 'pesan_control/admin_pesan/$1/';
$route['administrator/pesan']					= 'pesan_control/admin_pesan/';

$route['administrator/service/edit/(:any)']		= 'service_control/edit_service/$1/';
$route['administrator/service']					= 'service_control/admin_service/';

$route['administrator/sparepart/edit/(:any)']	= 'sparepart_control/edit_sparepart/$1/';
$route['administrator/sparepart']				= 'sparepart_control/admin_sparepart/';

$route['administrator/produk/edit/(:any)']		= 'produk_control/edit_produk/$1/';
$route['administrator/produk/(:any)']			= 'produk_control/admin_produk/$1/';
$route['administrator/produk']					= 'produk_control/admin_produk/';

$route['administrator/series/edit/(:any)']		= 'series_control/edit_series/$1/';
$route['administrator/series/(:any)']			= 'series_control/admin_series/$1/';
$route['administrator/series']					= 'series_control/admin_series/';

$route['administrator/kategori/edit/(:any)'] 	= 'kategori_control/edit_kategori/$1/';
$route['administrator/kategori']				= 'kategori_control/admin_kategori/';

$route['administrator/kontak/edit/(:any)']		= 'kontak_control/edit_kontak/$1/';
$route['administrator/kontak']					= 'kontak_control/admin_kontak/';

$route['default_controller'] 					= 'home_control';
$route['404_override'] 							= '';
$route['translate_uri_dashes'] 					= FALSE;
