<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';

class Welcome extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    Midtrans\Config::$serverKey = 'SB-Mid-server-yQCDmfpPIBdQRiHPVDyUfXqp';
    Midtrans\Config::$clientKey = 'SB-Mid-client-JPMWoXrThdHhiuv-';
    Midtrans\Config::$isSanitized = true;
    Midtrans\Config::$is3ds = true;
  }

	public function index()
	{
		$this->load->view('welcome', [
      'kategori'        => $this->KategoriModel->getAll(),
      'produk'          => $this->ProdukModel->getAll(['limit' => 12]),
      'type'            => 'home',
      'jumlahKeranjang' => $this->session->user ? count($this->KeranjangModel->getByUser($this->session->user['id_user'])) : 0,
      'jumlahWishlist'  => $this->session->user ? count($this->WishlistModel->getByUser($this->session->user['id_user'])) : 0,
    ]);
	}

  public function notification()
  {
    $notif  = Midtrans\Notification();

    print_r($notif);
    die();
    // $this->db->insert('test_midtrans', ['notif' => json_encode($notif)]);
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
      'jumlahWishlist'  => $this->session->user ? count($this->WishlistModel->getByUser($this->session->user['id_user'])) : 0,
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
    $data['jumlahKeranjang']  = $this->session->user ? count($this->KeranjangModel->getByUser($this->session->user['id_user'])) : 0;
    $data['jumlahWishlist']   = $this->session->user ? count($this->WishlistModel->getByUser($this->session->user['id_user'])) : 0;
    
    $this->load->view('detailProduk', $data);
  }

  public function cart()
  {
    $this->load->view('cart', [
      'type'            => 'cart',
      'keranjang'       => $this->KeranjangModel->getByUser($this->session->user['id_user']),
      'jumlahKeranjang' => $this->session->user ? count($this->KeranjangModel->getByUser($this->session->user['id_user'])) : 0,
      'jumlahWishlist'  => $this->session->user ? count($this->WishlistModel->getByUser($this->session->user['id_user'])) : 0,
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

  public function checkout()
  {
    $this->PemesananModel->insert($this->session->user['id_user'], $this->input->post());

    $id_keranjang = $this->input->post('id_keranjang');

    foreach ($id_keranjang as $key) {
      $this->KeranjangModel->checkout($key, $this->input->post());
    }

    redirect('order');
  }

  public function token()
  {
    $keranjang    = $this->KeranjangModel->getByUser($this->session->user['id_user']);
    $item_details = [];
    $grossAmount  = 0;

    foreach ($keranjang as $key) {
      array_push($item_details, [
        'id'        => $key['id_keranjang'],
        'price'     => $key['harga'],
        'quantity'  => $key['kuantitas'],
        'name'      => $key['nama_produk'],
      ]);

      $grossAmount += $key['harga'];
    }

    // Required
    $transaction_details = array(
      'order_id'      => uniqid(),
      'gross_amount'  => $grossAmount, // no decimal allowed for creditcard
    );
    
    // Optional
    $customer_details = [
      'first_name'  => $this->session->user['nama'],
      'email'       => $this->session->user['email'],
    ];
    
    // Optional, remove this to display all available payment methods
    $enable_payments = [
      "credit_card",
      // "gopay",
      "shopeepay",
      "permata_va",
      "bca_va",
      "bni_va",
      "bri_va",
      "echannel",
      "other_va",
      "danamon_online",
      "mandiri_clickpay",
      "cimb_clicks",
      "bca_klikbca",
      "bca_klikpay",
      "bri_epay",
      "xl_tunai",
      "indosat_dompetku",
      "kioson",
      "Indomaret",
      "alfamart",
      "akulaku",
    ];
    
    // Fill transaction details
    $transaction = array(
      'enabled_payments'    => $enable_payments,
      'transaction_details' => $transaction_details,
      'customer_details'    => $customer_details,
      'item_details'        => $item_details,
    );
    
    $snap_token = Midtrans\Snap::getSnapToken($transaction);

    echo $snap_token;
  }

  public function storeWishlist()
  {
    $data['user_id']    = $this->session->user['id_user'];
    $data['produk_id']  = $this->input->post('id_produk');
    $availableProduk    = $this->WishlistModel->getByUserAndProduk($data);
    
    $response;

    if ($availableProduk) {
      $response = 'error';  
    } else {
      $this->WishlistModel->insert($data);
      $response = 'success';
    }

    echo $response;
  }

  public function wishlist()
  {
    $this->load->view('wishlist', [
      'type'            => 'wishlist',
      'wishlist'        => $this->WishlistModel->getByUser($this->session->user['id_user']),
      'jumlahKeranjang' => $this->session->user ? count($this->KeranjangModel->getByUser($this->session->user['id_user'])) : 0,
      'jumlahWishlist'  => $this->session->user ? count($this->WishlistModel->getByUser($this->session->user['id_user'])) : 0,
    ]);
  }

  public function destroyWishlist($id_wishlist)
  {
    $this->WishlistModel->delete($id_wishlist);
    $this->session->set_flashdata('success', 'Berhasil hapus wishlist');
    redirect('wishlist');    
  }
}
