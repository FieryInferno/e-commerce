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
    $kategori       = $this->input->get('kategori');
    $sortBy         = $this->input->get('sortBy');
    $nama_produk    = $this->input->get('nama_produk');
    $filterByPrice  = $this->input->get('filterByPrice');

		$this->load->view('shop', [
      'kategori'      => $this->KategoriModel->getAll(),
      'produk'        => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, $filterByPrice),
      'type'          => 'shop',
      'filterByPrice' => $filterByPrice,
      'all'           => $this->ProdukModel->getAll($kategori, $nama_produk, null, 'all'),
      'seratus'       => $this->ProdukModel->getAll($kategori, $nama_produk, null, '0-100'),
      'duaratus'      => $this->ProdukModel->getAll($kategori, $nama_produk, null, '100-200'),
      'tigaratus'     => $this->ProdukModel->getAll($kategori, $nama_produk, null, '200-300'),
      'empatratus'    => $this->ProdukModel->getAll($kategori, $nama_produk, null, '300-400'),
      'limaratus'     => $this->ProdukModel->getAll($kategori, $nama_produk, null, '400-500'),
    ]); 
  }
}
