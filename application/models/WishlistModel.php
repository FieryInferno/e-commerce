<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WishlistModel extends CI_Model {
  
	public function getByUserAndProduk($data)
	{
    return $this->db->get_where('wishlist', [
      'user_id'   => $data['user_id'],
      'produk_id' => $data['produk_id'],
    ])->row_array();
	}

  public function insert($data)
  {
    $this->db->insert('wishlist', $data);
  }

  public function getByUser($id_user)
  {
    $this->db->join('produk', 'wishlist.produk_id = produk.id_produk'); 
    return $this->db->get_where('wishlist', ['user_id' => $id_user])->result_array();
  }

  public function delete($id_wishlist)
  {
    $this->db->delete('wishlist', ['id_wishlist' => $id_wishlist]);
  }
}
