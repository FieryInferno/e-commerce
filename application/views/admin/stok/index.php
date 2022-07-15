<?php
  $this->load->view('admin/template/header');
  $this->load->view('components/contentHolder', [
    'content'     => 'components/stok/list',
    'cardHeader'  => '<a class="btn btn-success" href="' . base_url() . 'admin/stok/create">Tambah</a>'
  ]);
  $this->load->view('admin/template/footer');
?>
