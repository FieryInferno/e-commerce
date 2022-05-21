<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {
  
	public function store($data, $warna)
	{
    $this->db->insert('produk', $data);
    foreach ($warna as $key) {
      $this->db->insert('warna_produk', [
        'produk_id' => $data['id_produk'],
        'warna'     => strtolower($key),
      ]);
    }
	}

  public function getAll($id_kategori = null, $sortBy = null, $nama_produk = null, $filterByPrice = null)
  {
    $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');

    if ($id_kategori) $this->db->where('produk.kategori_id', $id_kategori);
    if ($sortBy) $this->db->order_by('created_at', 'desc');
    if ($nama_produk) $this->db->like('nama_produk', $nama_produk);
    if ($filterByPrice && $filterByPrice !== 'all') {
      switch ($filterByPrice) {
        case '0-100':
          $this->db->where('harga >=', 0);
          $this->db->where('harga <=', 100000);
          break;
        case '100-200':
          $this->db->where('harga >=', 100000);
          $this->db->where('harga <=', 200000);
          break;
        case '200-300':
          $this->db->where('harga >=', 200000);
          $this->db->where('harga <=', 300000);
          break;
        case '400-500':
          $this->db->where('harga >=', 400000);
          $this->db->where('harga <=', 500000);
          break;
      }
    }

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
