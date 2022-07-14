<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeveloperModel extends CI_Model {
  
	public function login()
	{
    return $this->db->get_where('developer', ['username' => $this->input->post('username')])->row_array();
	}
}
