<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

  // public function __construct()
  // {
  //   parent::__construct();
  //   isLogin();
  // }

	public function index()
	{
		$this->load->view('components/login', ['role' => 'admin']);
	}

	public function developer()
	{
		$this->load->view('components/login', ['role' => 'developer']);
	}

	public function user()
	{
		$this->load->view('login', [
      'kategori'  => $this->KategoriModel->getAll(),
      'type'      => 'login'
    ]);
	}

  public function developerAuth()
  {
    $result = $this->DeveloperModel->login();

    if ($result) {
      if (password_verify($this->input->post('password'), $result['password'])) {
        $this->session->set_userdata('developer', $result);
        redirect('/developer');
      } else {
        $this->session->set_flashdata('message', 'Password Salah');
      }
    } else {
      $this->session->set_flashdata('message', 'Username Salah');
    }

    redirect($_SERVER['HTTP_REFERER']);
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

  public function userAuth()
  {
    $result = $this->UserModel->getByUsername($this->input->post('username'));

    if ($result) {
      if (password_verify($this->input->post('password'), $result['password'])) {
        $this->session->set_userdata('user', $result);
        redirect('/shop');
      } else {
        $this->session->set_flashdata('message', 'Password Salah');
      }
    } else {
      $this->session->set_flashdata('message', 'Username Salah');
    }

    redirect($_SERVER['HTTP_REFERER']);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->session->set_flashdata('success', 'Anda berhasil logout');
    redirect();
  }

  public function error404()
  {
    $this->load->view('404');
  }

  public function register()
  {
    $this->load->view('register', [
      'kategori'  => $this->KategoriModel->getAll(),
      'type'      => 'register',
    ]);
  }

  public function registerAction()
  {
    $data             = $this->input->post();
    $password         = $this->input->post('password');
    $data['password'] = password_hash($password, PASSWORD_DEFAULT);

    $this->UserModel->store($data);
    $this->session->set_flashdata('success', 'Anda berhasil melakukan register');
    redirect('login');
  }
}
