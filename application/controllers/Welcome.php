<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome', [
      'kategori'  => $this->KategoriModel->getAll(),
      'produk'    => $this->ProdukModel->getAll(),
      'type'      => 'home',
    ]);
	}

  public function shop()
  {
    $kategori = $this->input->get('kategori');
    $sortBy   = $this->input->get('sortBy');

		$this->load->view('shop', [
      'kategori'  => $this->KategoriModel->getAll(),
      'produk'    => $this->ProdukModel->getAll($kategori, $sortBy),
      'type'      => 'shop',
    ]); 
  }
}
