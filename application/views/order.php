<?php
  $this->load->view('admin/template/header');
  $this->load->view('components/contentHolder', [
    'content'     => 'components/order/list',
    'cardHeader'  => $this->session->admin ? '<a class="btn btn-success" href="' . base_url() . 'admin/order/create">Tambah</a>' : '',
  ]);
  $this->load->view('admin/template/footer');
?>
