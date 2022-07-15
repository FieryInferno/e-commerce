<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StokController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isLogin();
  }
  
	public function index()
	{
		$this->load->view($this->session->admin ? 'admin/stok/index' : 'developer/stok/index', [
      'title'   => 'Stok',
      'active'  => 'stok',
      'stok'    => $this->StokModel->getAll(),
    ]);
	}

  public function create()
  {
		$this->load->view($this->session->admin ? 'admin' : 'developer' . '/stok/form', [
      'title'   => 'Stok',
      'active'  => 'stok',
      'produk'  => $this->ProdukModel->getAll([]),
    ]);
  }

  public function store()
  {
    $this->form_validation->set_rules('produk_id', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Barang', 'required');

    if ($this->form_validation->run() !== FALSE) {
      $this->StokModel->insert($this->input->post());
      $this->session->set_flashdata('success', 'Berhasil tambah data stok');
      redirect($this->session->admin ? 'admin' : 'developer' . '/stok');
    } else {
      $this->session->set_flashdata('message', validation_errors());
      redirect($_SERVER['HTTP_REFERER']);
    }
  }
}
