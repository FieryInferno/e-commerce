<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isUser();
  }
  
	public function index()
	{
		$this->load->view('user/order', [
      'title'   => 'Pemesanan',
      'active'  => 'order',
      'order'   => $this->PemesananModel->getByIdUser($this->session->user['id_user']),
    ]);
	}

  public function show($id_pemesanan)
  {
    $data           = $this->PemesananModel->getById($id_pemesanan);
    $data['title']  = 'Pemesanan';
    $data['active'] = 'order';

		$this->load->view('user/detail', $data);
  }
}
