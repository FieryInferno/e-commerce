<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
  
	public function store($data)
	{
    $this->db->insert('user', $data);
	}

  public function getByUsername($username)
  {
    return $this->db->get_where('user', ['username' => $username])->row_array();
  }
}
