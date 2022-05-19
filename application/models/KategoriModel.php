<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {
  
	public function store()
	{
    return $this->db->insert('kategori', $this->input->post());
	}

  public function getAll()
  {
    return $this->db->get('kategori')->result_array();
  }
}
