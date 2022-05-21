<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isUser();
  }
  
	public function index()
	{
		$this->load->view('user/dashboard', [
      'title'   => 'Dashboard',
      'active'  => 'dashboard',
    ]);
	}
}
