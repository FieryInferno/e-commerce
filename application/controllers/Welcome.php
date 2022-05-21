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
    $filterBySize   = $this->input->get('filterBySize');
    $data           = [
      'kategori'      => $this->KategoriModel->getAll(),
      'produk'        => $this->ProdukModel->getAllWithPagination($kategori, $sortBy, $nama_produk, $filterByPrice, $filterByColor, $filterBySize),
      'type'          => 'shop',
      'filterByPrice' => $filterByPrice,
      'filterByColor' => $filterByColor,
      'filterBySize' => $filterBySize,
      'all'           => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, 'all', $filterByColor, $filterBySize),
      'seratus'       => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '0-100', $filterByColor, $filterBySize),
      'duaratus'      => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '100-200', $filterByColor, $filterBySize),
      'tigaratus'     => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '200-300', $filterByColor, $filterBySize),
      'empatratus'    => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '300-400', $filterByColor, $filterBySize),
      'limaratus'     => $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, '400-500', $filterByColor, $filterBySize),
      'warna'         => $this->ProdukModel->getAllWarna(),
    ];

    foreach ($data['warna'] as $key) {
      $data['jumlah_warna'][$key['warna']] = $this->ProdukModel->getAll($kategori, $sortBy, $nama_produk, $filterByPrice, $key['warna'], $filterBySize);
    }

		$this->load->view('shop', $data); 
  }

  public function show($id_produk)
  {
    $data         = $this->ProdukModel->getById($id_produk);
    $data['type'] = 'shop';
    
    $this->load->view('detailProduk', $data);
  }
}
