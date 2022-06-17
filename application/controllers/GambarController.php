<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GambarController extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    isAdmin();
  }
  
	public function index($id_produk)
	{
    $tables   = "gambar";
    $search   = ['id_gambar', 'gambar'];
    $isWhere  = null;
    
    header('Content-Type: application/json');
    echo $this->DatatablesModel->get_tables($tables,$search,$isWhere);
	}

  public function destroy($id_gambar)
  {
    $result = $this->GambarModel->delete($id_gambar);
    
    header('Content-Type: application/json');
    echo $result;
  }
}
