<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    isLogin();
  }

	public function index()
	{
		$this->load->view('admin/login');
	}

  public function adminAuth()
  {
    $result = $this->AdminModel->login();

    if ($result) {
      if (password_verify($this->input->post('password'), $result['password'])) {
        $this->session->set_userdata('admin', $result);
        redirect('/admin');
      } else {
        $this->session->set_flashdata('message', 'Password Salah');
      }
    } else {
      $this->session->set_flashdata('message', 'Username Salah');
    }

    redirect($_SERVER['HTTP_REFERER']);
  }
}
