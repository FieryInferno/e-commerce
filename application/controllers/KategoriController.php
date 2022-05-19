<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller {
  
	public function index()
	{
		$this->load->view('admin/kategori/index', [
      'title'   => 'Kategori',
      'active'  => 'kategori',
    ]);
	}
  
	public function create()
	{
		$this->load->view('admin/kategori/form', [
      'title'   => 'Tambah Kategori',
      'active'  => 'kategori',
    ]);
	}
  
	public function store()
	{
    $this->KategoriModel->store();
    $this->session->set_flashdata('success', 'Berhasil tambah kategori');
    redirect('/admin/kategori');
	}
}
