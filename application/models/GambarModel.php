<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GambarModel extends CI_Model {
  
	public function delete($id_gambar)
	{
    return $this->db->delete('gambar', ['id_gambar' => $id_gambar]);
	}
}
