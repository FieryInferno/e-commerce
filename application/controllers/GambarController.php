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
    $where    = ['produk_id' => $id_produk];
    $isWhere  = null;
    
    header('Content-Type: application/json');
    echo $this->DatatablesModel->get_tables_where($tables, $search, $where, $isWhere);
	}

  public function destroy($id_gambar)
  {
    $result = $this->GambarModel->delete($id_gambar);
    
    header('Content-Type: application/json');
    echo $result;
  }

  public function store()
  {
    $result = $this->ProdukModel->addGambar($this->input->post('produk_id'));
  }
}
