<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WishlistModel extends CI_Model {
  
	public function getByUserAndProduk($data)
	{
    return $this->db->get_where('wishlist', [
      'id_user'   => $data['id_user'],
      'id_produk' => $data['id_produk'],
    ])->row_array();
	}

  public function insert($data)
  {
    $this->db->insert('wishlist', $data);
  }
}
