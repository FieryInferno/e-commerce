<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeranjangModel extends CI_Model {
  
	public function store($id_produk, $data)
	{
    $data['produk_id']  = $id_produk;
    $data['user_id']    = $this->session->user['id_user'];

    $this->db->insert('keranjang', $data);
	}

  public function getByUser($id_user)
  {
    $this->db->join('produk', 'keranjang.produk_id = produk.id_produk');
    return $this->db->get_where('keranjang', ['user_id' => $id_user])->result_array();
  }

  public function updateCart($id_keranjang, $data)
  {
    $this->db->update('keranjang', $data, ['id_keranjang' => $id_keranjang]);
  }

  public function getById($id_keranjang)
  {
    $this->db->join('produk', 'keranjang.produk_id = produk.id_produk');
    return $this->db->get_where('keranjang', ['id_keranjang' => $id_keranjang])->row_array();
  }
}
