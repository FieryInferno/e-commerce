<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isAdmin();
  }
  
	public function index()
	{
		$this->load->view('admin/kategori/index', [
      'title'     => 'Kategori',
      'active'    => 'kategori',
      'kategori'  => $this->KategoriModel->getAll(),
    ]);
	}
  
	public function create()
	{
		$this->load->view('admin/kategori/form', [
      'title'   => 'Tambah Kategori',
      'active'  => 'kategori',
      'type'    => 'add',
    ]);
	}
  
	public function store()
	{
    $this->KategoriModel->store();
    $this->session->set_flashdata('success', 'Berhasil tambah kategori');
    redirect('/admin/kategori');
	}
  
	public function edit($id)
	{
    $data = $this->KategoriModel->getById($id);
    $data['title']  = 'Edit Kategori';
    $data['active'] = 'kategori';
    $data['type']   = 'edit';

		$this->load->view('admin/kategori/form', $data);
	}
  
	public function update($id)
	{
    $this->KategoriModel->edit($id);
    $this->session->set_flashdata('success', 'Berhasil edit kategori');
    redirect('/admin/kategori');
	}
  
	public function destroy($id)
	{
    $this->KategoriModel->destroy($id);
    $this->session->set_flashdata('success', 'Berhasil hapus kategori');
    redirect('/admin/kategori');
	}
}
