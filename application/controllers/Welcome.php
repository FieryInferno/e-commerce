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
    $filterByColor  = $this->input->get('filterByColor');
    $data           = [
      'kategori'      => $this->KategoriModel->getAll(),
      'produk'        => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, $filterByPrice, $filterByColor),
      'type'          => 'shop',
      'filterByPrice' => $filterByPrice,
      'filterByColor' => $filterByColor,
      'all'           => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, 'all', $filterByColor),
      'seratus'       => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '0-100', $filterByColor),
      'duaratus'      => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '100-200', $filterByColor),
      'tigaratus'     => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '200-300', $filterByColor),
      'empatratus'    => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '300-400', $filterByColor),
      'limaratus'     => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '400-500', $filterByColor),
      'warna'         => $this->ProdukModel->getAllWarna(),
    ];

    foreach ($data['warna'] as $key) {
      $data['jumlah_warna'][$key['warna']] = $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, $filterByPrice, $key['warna']);
    }

		$this->load->view('shop', $data); 
  }
}
