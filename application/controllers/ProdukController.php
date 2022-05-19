<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukController extends CI_Controller {
  
	public function index()
	{
		$this->load->view('admin/produk/index', [
      'title'     => 'Produk',
      'active'    => 'produk',
      'produk'  => $this->ProdukModel->getAll(),
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
      'nama_produk' => $this->input->post('nama_produk'),
      'harga'       => $this->input->post('harga'),
      'diskon'      => $this->input->post('diskon'),
      'kategori_id' => $this->input->post('kategori_id'),
    ];

    $config ['upload_path']	  = './assets/image/';
    $config ['allowed_types'] = 'jpg|jpeg|png|gif';

    $this->upload->initialize($config);

    if (!$this->upload->do_upload('image')) {
      $this->session->set_flashdata('message', $this->upload->display_errors());
      redirect($_SERVER['HTTP_REFERER']);
    }else {
      $data['image'] = $this->upload->data('file_name');
    }

    $this->ProdukModel->store($data);
    $this->session->set_flashdata('success', 'Berhasil tambah produk');
    redirect('/admin/produk');
	}
  
	public function edit($id)
	{
    $data = $this->ProdukModel->getById($id);
    $data['title']  = 'Edit Produk';
    $data['active'] = 'produk';
    $data['type']   = 'edit';

		$this->load->view('admin/produk/form', $data);
	}
  
	public function update($id)
	{
    $this->ProdukModel->edit($id);
    $this->session->set_flashdata('success', 'Berhasil edit produk');
    redirect('/admin/produk');
	}
  
	public function destroy($id)
	{
    $this->ProdukModel->destroy($id);
    $this->session->set_flashdata('success', 'Berhasil hapus produk');
    redirect('/admin/produk');
	}
}
