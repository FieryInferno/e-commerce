<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {
  
	public function store($data)
	{
    $this->db->insert('produk', $data);
	}

  public function getAll()
  {
    $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
    return $this->db->get('produk')->result_array();
  }

  public function update($id, $data)
  {
    $this->db->where('id_produk', $id)->update('produk', $data);
  }

  public function getById($id)
  {
    return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
  }

  public function destroy($id)
  {
    $this->db->delete('produk', ['id_produk' => $id]);
  }
}
