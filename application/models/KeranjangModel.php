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
    return $this->db->get_where('keranjang', [
      'user_id'       => $id_user,
      'pemesanan_id'  => null,
    ])->result_array();
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

  public function destroyCart($id_keranjang)
  {
    $this->db->delete('keranjang', ['id_keranjang' => $id_keranjang]);
  }

  public function checkout($id_keranjang, $data)
  {
    $this->db->update('keranjang', ['pemesanan_id'  => $data['id_order']], ['id_keranjang'  => $id_keranjang]);
  }

  public function pemesanan($id_pemesanan)
  {
    $this->db->join('produk', 'keranjang.produk_id = produk.id_produk');
    $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');
    $data = $this->db->get_where('keranjang', ['pemesanan_id' => $id_pemesanan])->result_array();

    for ($i=0; $i < count($data); $i++) {
      $key                = $data[$i];
      $data[$i]['image']  = $this->db->get_where('gambar', ['produk_id' => $key['id_produk']])->result_array();
    }

    return $data;
  }
}
