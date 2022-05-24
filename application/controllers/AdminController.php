<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isAdmin();
  }
  
	public function index()
	{
		$this->load->view('admin/dashboard', [
      'title'   => 'Dashboard',
      'active'  => 'dashboard',
    ]);
	}

  public function user()
  {
		$this->load->view('admin/user', [
      'title'   => 'User',
      'active'  => 'user',
      'user'    => $this->AdminModel->getUser(),
    ]); 
  }
}
