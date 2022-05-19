<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin']['get']        = 'AdminController';
$route['admin/login']['get']  = 'LoginController';
$route['admin/login']['post'] = 'LoginController/adminAuth';

$route['admin/kategori']['get']               = 'KategoriController';
$route['admin/kategori/tambah']['get']        = 'KategoriController/create';
$route['admin/kategori/tambah']['post']       = 'KategoriController/store';
$route['admin/kategori/edit/(:num)']['get']   = 'KategoriController/edit/$1';
$route['admin/kategori/edit/(:num)']['post']  = 'KategoriController/update/$1';
$route['admin/kategori/hapus/(:num)']['post'] = 'KategoriController/destroy/$1';
