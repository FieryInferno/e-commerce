<?php 
  $this->load->view('components/table', [
    'th'    => [
      'Nama Barang'   => ['name' => 'nama_produk'],
      'Barang Masuk'  => ['name' => 'barang_masuk'],
      'Barang Keluar' => ['name' => 'barang_keluar'],
    ],
    'data'  => $stok, 
  ]);
?>