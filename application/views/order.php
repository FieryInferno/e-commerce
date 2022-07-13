<?php
  $this->load->view('admin/template/header');
  $this->load->view('components/contentHolder', ['content' => 'components/orderTable']);
  $this->load->view('admin/template/footer');
?>
