<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StokModel extends CI_Model {
	public function getAll()
	{
    $produk = $this->ProdukModel->getAll([]);
    
    for ($i=0; $i < count($produk); $i++) {
      $key                          = $produk[$i];
      $produk[$i]['barang_masuk']   = $this->barangMasuk($key['id_produk']);
      $produk[$i]['barang_keluar']  = $this->barangKeluar($key['id_produk']);
    }

    return $produk;
	}

  public function barangMasuk($id_produk)
  {
    $produk = $this->db->get_where('stok', [
      'produk_id' => $id_produk,
      'tipe'      => 'barang_masuk',
    ])->result_array();
    $jumlah = 0;

    foreach ($produk as $key) {
      $jumlah += $key['jumlah'];
    }

    return $jumlah;
  }

  public function barangKeluar($id_produk)
  {
    $produk = $this->db->get_where('stok', [
      'produk_id' => $id_produk,
      'tipe'      => 'barang_keluar',
    ])->result_array();
    $jumlah = 0;

    foreach ($produk as $key) {
      $jumlah += $key['jumlah'];
    }

    return $jumlah;
  }

  public function insert($data)
  {
    $this->db->insert('stok', $data);
  }
}
