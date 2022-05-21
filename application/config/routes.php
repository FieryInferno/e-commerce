<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'welcome';
$route['404_override']          = 'LoginController/error404';
$route['translate_uri_dashes']  = FALSE;

$route['login']['get']    = 'LoginController/user';
$route['login']['post']   = 'LoginController/userAuth';
$route['logout']['post']  = 'LoginController/logout';

$route['register']['get']   = 'LoginController/register';
$route['register']['post']  = 'LoginController/registerAction';

$route['shop']                = 'Welcome/shop';
$route['shop/(:num)']         = 'Welcome/shop';
$route['shop/detail/(:any)']  = 'Welcome/show/$1';

$route['admin']['get']        = 'AdminController';
$route['admin/login']['get']  = 'LoginController';
$route['admin/login']['post'] = 'LoginController/adminAuth';

$route['admin/kategori']['get']               = 'KategoriController';
$route['admin/kategori/tambah']['get']        = 'KategoriController/create';
$route['admin/kategori/tambah']['post']       = 'KategoriController/store';
$route['admin/kategori/edit/(:num)']['get']   = 'KategoriController/edit/$1';
$route['admin/kategori/edit/(:num)']['post']  = 'KategoriController/update/$1';
$route['admin/kategori/hapus/(:num)']['post'] = 'KategoriController/destroy/$1';

$route['admin/produk']['get']               = 'ProdukController';
$route['admin/produk/tambah']['get']        = 'ProdukController/create';
$route['admin/produk/tambah']['post']       = 'ProdukController/store';
$route['admin/produk/edit/(:any)']['get']   = 'ProdukController/edit/$1';
$route['admin/produk/edit/(:any)']['post']  = 'ProdukController/update/$1';
$route['admin/produk/hapus/(:any)']['post'] = 'ProdukController/destroy/$1';
$route['admin/produk/detail/(:any)']['get'] = 'ProdukController/show/$1';
