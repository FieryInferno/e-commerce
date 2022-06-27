<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'welcome';
$route['404_override']          = 'LoginController/error404';
$route['translate_uri_dashes']  = FALSE;
$route['user']                  = 'UserController';
$route['admin/user']['get']     = 'AdminController/user';
$route['notification']['post']   = 'Welcome/notification';

$route['order']['get']        = 'OrderController';
$route['order/(:any)']['get'] = 'OrderController/show/$1';

$route['login']['get']    = 'LoginController/user';
$route['login']['post']   = 'LoginController/userAuth';
$route['logout']['post']  = 'LoginController/logout';

$route['register']['get']   = 'LoginController/register';
$route['register']['post']  = 'LoginController/registerAction';

$route['shop']                  = 'Welcome/shop';
$route['shop/(:num)']           = 'Welcome/shop';
$route['shop/detail/(:any)']    = 'Welcome/show/$1';
$route['shop/token']['get']     = 'Welcome/token';
$route['shop/checkout']['post'] = 'Welcome/checkout';

$route['wishlist']['post']              = 'Welcome/storeWishlist';
$route['wishlist']['get']               = 'Welcome/wishlist';
$route['wishlist/delete/(:num)']['get'] = 'Welcome/destroyWishlist/$1';

$route['shop/cart']['get']                = 'Welcome/cart';
$route['shop/cart/(:any)']['post']        = 'Welcome/addCart/$1';
$route['shop/cart/update/(:any)']['post'] = 'Welcome/updateCart/$1';
$route['shop/cart/delete/(:any)']['get']  = 'Welcome/destroyCart/$1';

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

$route['gambar/(:any)']['post']         = 'GambarController/index/$1';
$route['gambar']['post']                = 'GambarController/store';
$route['gambar/delete/(:any)']['post']  = 'GambarController/destroy/$1';
