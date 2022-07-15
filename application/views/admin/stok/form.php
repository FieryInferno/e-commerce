<?php
  $this->load->view('admin/template/header');
  $this->load->view('components/contentHolder', ['content' => 'components/order/form']);
  $this->load->view('admin/template/footer');
?>