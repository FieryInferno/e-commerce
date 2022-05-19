<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages']   = array();
$autoload['libraries']  = array('database', 'session', 'upload');
$autoload['drivers']    = array();
$autoload['helper']     = array('url', 'login');
$autoload['config']     = array();
$autoload['language']   = array();
$autoload['model']      = array('AdminModel', 'KategoriModel', 'ProdukModel');
