<?php
  $this->load->view('components/form', [
    'action'  => base_url('admin/stok'),
    'fields' => [
      'produk_id' => [
        'label'       => 'Nama Barang',
        'type'        => 'select',
        'value'       => 'id_produk',
        'labelOption' => 'nama_produk',
        'data'        => $produk,
      ],
      'jumlah' => [
        'label'       => 'Jumlah Barang',
        'type'        => 'input',
        'placeholder' => 'Masukan jumlah barang',
      ],
      'tipe' => [
        'type'  => 'hidden',
        'value' => $this->session->admin ? 'barang_masuk' : 'barang_keluar',
      ],
    ]
  ]);
?>
