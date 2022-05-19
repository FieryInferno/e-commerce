<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {
  
	public function store($data)
	{
    $this->db->insert('produk', $data);
	}

  public function getAll()
  {
    return $this->db->get('produk')->result_array();
  }

  public function edit($id)
  {
    $this->db->where('id', $id)->update('produk', ['nama_produk' => $this->input->post('nama_produk')]);
  }

  public function getById($id)
  {
    return $this->db->get_where('produk', ['id' => $id])->row_array();
  }

  public function destroy($id)
  {
    $this->db->delete('produk', ['id' => $id]);
  }
}
