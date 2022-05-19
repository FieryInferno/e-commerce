<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {
  
	public function store()
	{
    $this->db->insert('kategori', $this->input->post());
	}

  public function getAll()
  {
    return $this->db->get('kategori')->result_array();
  }

  public function edit($id)
  {
    $this->db->where('id', $id)->update('kategori', ['nama_kategori' => $this->input->post('nama_kategori')]);
  }

  public function getById($id)
  {
    return $this->db->get_where('kategori', ['id' => $id])->row_array();
  }
}
