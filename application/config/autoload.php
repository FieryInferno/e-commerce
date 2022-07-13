<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages']   = array();
$autoload['libraries']  = array('database', 'session', 'upload', 'pagination', 'form_validation');
$autoload['drivers']    = array();
$autoload['helper']     = array('url', 'login', 'format');
$autoload['config']     = array();
$autoload['language']   = array();
$autoload['model']      = array('AdminModel', 'KategoriModel', 'ProdukModel', 'UserModel', 'KeranjangModel', 'DatatablesModel', 'GambarModel', 'WishlistModel', 'PemesananModel');
