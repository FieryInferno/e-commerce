<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemesananModel extends CI_Model {
  
  public function insert($id_user, $data)
  {
    $detail = json_decode($data['detail']);
    
    return $this->db->insert('pemesanan', [
      'id_pemesanan'  => $detail->order_id,
      'user_id'       => $id_user,
      'detail'        => $data['detail'],
    ]);
  }

  public function getByIdUser($id_user)
  {
    $data = $this->db->get_where('pemesanan', ['user_id' => $id_user])->result_array();

    for ($i=0; $i < count($data); $i++) {
      $key                    = $data[$i];
      $data[$i]['keranjang']  = $this->KeranjangModel->pemesanan($key['id_pemesanan']);
    }

    return $data;
  }

  public function getById($id_pemesanan)
  {
    $data               = $this->db->get_where('pemesanan', ['id_pemesanan' => $id_pemesanan])->row_array();
    $data['keranjang']  = $this->KeranjangModel->pemesanan($data['id_pemesanan']);

    return $data;
  }

  public function updateStatus($data)
  {
    switch ($data->transaction_status) {
      case 'settlement':
        $transaction_status = 'settlement';
        break;
      case 'pending':
        $transaction_status = 'pending';
        break;
      case 'deny':
        $transaction_status = 'deny';
        break;
      case 'expire':
        $transaction_status = 'expire';
        break;
      case 'cancel':
        $transaction_status = 'cancel';
        break;
      
      default:
        # code...
        break;
    }

    $this->db->update('keranjang', ['status' => $transaction_status], ['pemesanan_id' => $data->order_id]);
  }
}
