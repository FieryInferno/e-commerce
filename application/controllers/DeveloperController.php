<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeveloperController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isDeveloper();
  }
  
	public function index()
	{
		$this->load->view('developer/dashboard', [
      'title'   => 'Dashboard',
      'active'  => 'dashboard',
    ]);
	}
}
