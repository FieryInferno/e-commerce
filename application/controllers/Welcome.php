<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome', [
      'kategori'        => $this->KategoriModel->getAll(),
      'produk'          => $this->ProdukModel->getAll(['limit' => 12]),
      'type'            => 'home',
      'jumlahKeranjang' => $this->session->user ? count($this->KeranjangModel->getByUser($this->session->user['id_user'])) : 0,
    ]);
	}

  public function shop()
  {
    $filter['kategori']       = $this->input->get('kategori');
    $filter['sortBy']         = $this->input->get('sortBy');
    $filter['nama_produk']    = $this->input->get('nama_produk');
    $filter['filterByPrice']  = $this->input->get('filterByPrice');
    $filter['filterByColor']  = $this->input->get('filterByColor');
    $filter['filterBySize']   = $this->input->get('filterBySize');
    $data                     = [
      'kategori'        => $this->KategoriModel->getAll(),
      'produk'          => $this->ProdukModel->getAllWithPagination($filter),
      'type'            => 'shop',
      'filterByPrice'   => $filter['filterByPrice'],
      'filterByColor'   => $filter['filterByColor'],
      'filterBySize'    => $filter['filterBySize'],
      'all'             => $this->ProdukModel->getAll(array_merge($filter, ['filterByPrice' => 'all'])),
      'seratus'         => $this->ProdukModel->getAll(array_merge($filter, ['filterByPrice' => '0-100'])),
      'duaratus'        => $this->ProdukModel->getAll(array_merge($filter, ['filterByPrice' => '100-200'])),
      'tigaratus'       => $this->ProdukModel->getAll(array_merge($filter, ['filterByPrice' => '200-300'])),
      'empatratus'      => $this->ProdukModel->getAll(array_merge($filter, ['filterByPrice' => '300-400'])),
      'limaratus'       => $this->ProdukModel->getAll(array_merge($filter, ['filterByPrice' => '400-500'])),
      'warna'           => $this->ProdukModel->getAllWarna(),
      'jumlahKeranjang' => $this->session->user ? count($this->KeranjangModel->getByUser($this->session->user['id_user'])) : 0,
    ];

    foreach ($data['warna'] as $key) {
      $data['jumlah_warna'][$key['warna']] = $this->ProdukModel->getAll(array_merge($filter, ['filterByColor' => $key['warna']]));
    }

		$this->load->view('shop', $data); 
  }

  public function show($id_produk)
  {
    $data                     = $this->ProdukModel->getById($id_produk);
    $data['type']             = 'shop';
    $data['jumlahKeranjang']  = count($this->KeranjangModel->getByUser($this->session->user['id_user']));
    
    $this->load->view('detailProduk', $data);
  }

  public function cart()
  {
    $this->load->view('cart', [
      'type'      => 'cart',
      'keranjang' => $this->KeranjangModel->getByUser($this->session->user['id_user']),
      'jumlahKeranjang' => $this->session->user ? count($this->KeranjangModel->getByUser($this->session->user['id_user'])) : 0,
    ]);
  }

  public function addCart($id_produk)
  {
    $this->KeranjangModel->store($id_produk, $this->input->post());
    redirect('shop/cart/');
  }

  public function updateCart($id_keranjang)
  {
    $data['kuantitas']  = $this->input->post('kuantitas');
    $produk             = $this->KeranjangModel->getById($id_keranjang);

    $this->KeranjangModel->updateCart($id_keranjang, $data);

    $keranjang  = $this->KeranjangModel->getByUser($this->session->user['id_user']);
    $totalHarga = 0;

    foreach ($keranjang as $key) {
      $totalHarga += $key['harga'] * $key['kuantitas'];
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode([
          'harga'       => formatRupiah($data['kuantitas'] * $produk['harga']),
          'totalHarga'  => formatRupiah($totalHarga),
        ]));
  }

  public function destroyCart($id_keranjang)
  {
    $this->KeranjangModel->destroyCart($id_keranjang);
    redirect('shop/cart');
  }
}
