<?php
  $this->load->view('components/form', [
    'action'  => base_url('admin/order/store'),
    'fields' => [
      'produk_id' => [
        'label'       => 'Nama Barang',
        'type'        => 'select',
        'value'       => 'id_produk',
        'labelOption' => 'nama_produk',
        'data'        => $produk,
      ],
      'kuantitas' => [
        'label'       => 'Jumlah Barang',
        'type'        => 'input',
        'placeholder' => 'Masukan jumlah barang',
      ],
      'harga' => [
        'label'       => 'Harga Barang',
        'type'        => 'input',
        'placeholder' => 'Masukan harga barang',
      ],
    ]
  ]);
?>
