<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
  
	public function login()
	{
    return $this->db->get_where('admin', ['username' => $this->input->post('username')])->row_array();
	}

  public function getUser()
  {
    return $this->db->get('user')->result_array();
  }
}
