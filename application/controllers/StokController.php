<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StokController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isLogin();
  }
  
	public function index()
	{
		$this->load->view('admin/stok/index', [
      'title'   => 'Stok',
      'active'  => 'stok',
      'stok'    => $this->StokModel->getAll(),
    ]);
	}
}
