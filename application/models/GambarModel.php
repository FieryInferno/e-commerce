<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GambarModel extends CI_Model {
  
	public function delete($id_gambar)
	{
    $gambar = $this->db->get_where('gambar', ['id_gambar' => $id_gambar])->row_array();

    if (file_exists('./assets/image/' .  $gambar['gambar'])) unlink('./assets/image/' .  $gambar['gambar']);

    return $this->db->delete('gambar', ['id_gambar' => $id_gambar]);
	}
}
