<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller {
  
	public function index()
	{
		$this->load->view('admin/kategori/index', [
      'title'   => 'Kategori',
      'active'  => 'kategori',
    ]);
	}
}
