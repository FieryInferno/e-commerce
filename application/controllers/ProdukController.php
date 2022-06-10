<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isAdmin();
  }
  
	public function index()
	{
		$this->load->view('admin/produk/index', [
      'title'   => 'Produk',
      'active'  => 'produk',
      'produk'  => $this->ProdukModel->getAll([]),
    ]);
	}
  
	public function create()
	{
		$this->load->view('admin/produk/form', [
      'title'     => 'Tambah Produk',
      'active'    => 'produk',
      'type'      => 'add',
      'kategori'  => $this->KategoriModel->getAll(),
    ]);
	}
  
	public function store()
	{
    $data = [
      'id_produk'   => uniqid(),
      'nama_produk' => $this->input->post('nama_produk'),
      'harga'       => $this->input->post('harga'),
      'diskon'      => $this->input->post('diskon'),
      'kategori_id' => $this->input->post('kategori_id'),
      'deskripsi'   => $this->input->post('deskripsi'),
    ];

    $this->ProdukModel->store($data, $this->input->post('warna'), $this->input->post('ukuran'));
    $this->session->set_flashdata('success', 'Berhasil tambah produk');
    redirect('/admin/produk');
	}
  
	public function edit($id)
	{
    $data             = $this->ProdukModel->getById($id);
    $data['title']    = 'Edit Produk';
    $data['active']   = 'produk';
    $data['type']     = 'edit';
    $data['kategori'] = $this->KategoriModel->getAll();

		$this->load->view('admin/produk/form', $data);
	}
  
	public function update($id)
	{
    $data = [
      'nama_produk' => $this->input->post('nama_produk'),
      'harga'       => $this->input->post('harga'),
      'diskon'      => $this->input->post('diskon'),
      'kategori_id' => $this->input->post('kategori_id'),
      'deskripsi'   => $this->input->post('deskripsi'),
    ];

    $this->ProdukModel->update($id, $data, $this->input->post('warna'), $this->input->post('ukuran'));
    $this->session->set_flashdata('success', 'Berhasil edit produk');
    redirect('/admin/produk');
	}
  
	public function destroy($id)
	{
    $this->ProdukModel->destroy($id);
    $this->session->set_flashdata('success', 'Berhasil hapus produk');
    redirect('/admin/produk');
	}

  public function show($id_produk)
  {
    $data           = $this->ProdukModel->getById($id_produk);
    $data['active'] = 'produk';
    $data['title']  = 'Detail Produk';

    $this->load->view('admin/produk/detail', $data);
  }
}
