<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isUser();
  }
  
	public function index()
	{
		$this->load->view('user/order', [
      'title'   => 'Pemesanan',
      'active'  => 'order',
      'order'   => $this->PemesananModel->getByIdUser($this->session->user['id_user']),
    ]);
	}

  public function show($id_pemesanan)
  {
    $data           = $this->PemesananModel->getById($id_pemesanan);
    $data['title']  = 'Pemesanan';
    $data['active'] = 'order';

		$this->load->view('user/detail', $data);
  }

  public function update($id_pemesanan)
  {
    $config['upload_path']	  = './assets/image/';
    $config['allowed_types']  = 'jpg|jpeg|png';

    $this->upload->initialize($config);

    if (!$this->upload->do_upload('bukti_pembayaran')) {
      $this->session->set_flashdata('message', $this->upload->display_errors());
    }else {
      $this->PemesananModel->update($id_pemesanan, [
        'bukti_pembayaran' => $this->upload->data('file_name'),
        'status'           => 'sudah_dibayar',
      ]);
      $this->session->set_flashdata('success', 'Berhasil upload bukti pembayaran');
    }
    redirect($_SERVER['HTTP_REFERER']);
  }
}
