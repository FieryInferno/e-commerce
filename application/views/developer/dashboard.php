<?php
  $this->load->view('admin/template/header');
  $this->load->view('components/contentHolder', ['content' => 'components/dashboard']);
  $this->load->view('admin/template/footer');
?>
