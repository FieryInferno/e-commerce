<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isLogin();
  }
  
	public function index()
	{

		$this->load->view('order', [
      'title'   => 'Pemesanan',
      'active'  => 'order',
      'order'   => $this->session->admin ? $this->PemesananModel->getAll() : $this->PemesananModel->getByIdUser($this->session->user['id_user']),
    ]);
	}

  public function show($id_pemesanan)
  {
    $data           = $this->PemesananModel->getById($id_pemesanan);
    $data['title']  = 'Pemesanan';
    $data['active'] = 'order';

		$this->load->view('user/detail', $data);
  }

  public function update($id_pemesanan)
  {
    $config['upload_path']	  = './assets/image/';
    $config['allowed_types']  = 'jpg|jpeg|png';

    $this->upload->initialize($config);

    if (!$this->upload->do_upload('bukti_pembayaran')) {
      $this->session->set_flashdata('message', $this->upload->display_errors());
    }else {
      $this->PemesananModel->update($id_pemesanan, [
        'bukti_pembayaran' => $this->upload->data('file_name'),
        'status'           => 'sudah_dibayar',
      ]);
      $this->session->set_flashdata('success', 'Berhasil upload bukti pembayaran');
    }
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function updateStatus($id_pemesanan)
  {
    $this->PemesananModel->update($id_pemesanan, $this->input->post());
    $this->session->set_flashdata('success', 'Berhasil ubah status');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function create()
  {
    $this->load->view('admin/orderForm', [
      'title'   => 'Pemesanan',
      'active'  => 'order',
      'produk'  => $this->ProdukModel->getAll([]),
    ]);
  }

  public function store()
  {
    $this->form_validation->set_rules('produk_id', 'Nama Barang', 'required');
    $this->form_validation->set_rules('kuantitas', 'Jumlah Barang', 'required');
    $this->form_validation->set_rules('harga', 'Harga Barang', 'required');

    if ($this->form_validation->run() !== FALSE) {
      $id_pemesanan = uniqid();

      $this->PemesananModel->insert(null, [
        'id_order'          => $id_pemesanan,
        'detail'            => null,
        'metode_pengiriman' => null,
        'alamat'            => null,
        'harga'             => $this->input->post('harga') * $this->input->post('kuantitas'),
        'status'            => 'selesai',
      ]);

      $this->db->insert('keranjang', [
        'produk_id'     => $this->input->post('produk_id'),
        'kuantitas'     => $this->input->post('kuantitas'),
        'pemesanan_id'  => $id_pemesanan,
      ]);

      $this->session->set_flashdata('success', 'Berhasil tambah pemesanan');
      redirect('admin/order');
    } else {
      $this->session->set_flashdata('message', validation_errors());
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
}
