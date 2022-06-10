<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {
  
	public function store($data, $warna, $ukuran)
	{
    $this->db->insert('produk', $data);
    $this->addWarna($warna, $data['id_produk']);
    $this->addUkuran($ukuran, $data['id_produk']);
    $this->addGambar($data['id_produk']);
	}

  public function addGambar($id_produk)
  {
    $count = count($_FILES['image']['name']);

    for($i = 0;$i < $count;$i++){
      if(!empty($_FILES['image']['name'][$i])){
        $_FILES['file']['name']     = $_FILES['image']['name'][$i];
        $_FILES['file']['type']     = $_FILES['image']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
        $_FILES['file']['error']    = $_FILES['image']['error'][$i];
        $_FILES['file']['size']     = $_FILES['image']['size'][$i];
        $config['upload_path']	    = './assets/image/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
    
        $this->upload->initialize($config);
    
        if (!$this->upload->do_upload('file')) {
          $this->session->set_flashdata('message', $this->upload->display_errors());
          redirect($_SERVER['HTTP_REFERER']);
        }else {
          $this->db->insert('gambar', [
            'produk_id' => $id_produk,
            'gambar'    => $this->upload->data('file_name'),
          ]);
        }
      }
    }
  }

  public function addWarna($warna, $id_produk)
  {
    foreach ($warna as $key) {
      if ($key !== '') {
        $this->db->insert('warna_produk', [
          'produk_id' => $id_produk,
          'warna'     => strtolower($key),
        ]);
      }
    }
  }

  public function addUkuran($ukuran, $id_produk)
  {
    foreach ($ukuran as $key) {
      if ($key !== '') {
        $this->db->insert('ukuran_produk', [
          'produk_id' => $id_produk,
          'ukuran'     => $key,
        ]);
      }
    }
  }

  public function getAll($filter) {
    $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');

    if (array_key_exists('kategori', $filter) && $filter['kategori']) $this->db->where('produk.kategori_id', $filter['kategori']);
    if (array_key_exists('sortBy', $filter) && $filter['sortBy']) $this->db->order_by('created_at', 'desc');
    if (array_key_exists('nama_produk', $filter) && $filter['nama_produk']) $this->db->like('nama_produk', $filter['nama_produk']);
    if (array_key_exists('filterByPrice', $filter)  && $filter['filterByPrice'] && $filter['filterByPrice'] !== 'all') {
      switch ($filter['filterByPrice']) {
        case '0-100':
          $this->db->where('harga >=', 0);
          $this->db->where('harga <=', 100000);
          break;
        case '100-200':
          $this->db->where('harga >=', 100000);
          $this->db->where('harga <=', 200000);
          break;
        case '200-300':
          $this->db->where('harga >=', 200000);
          $this->db->where('harga <=', 300000);
          break;
        case '400-500':
          $this->db->where('harga >=', 400000);
          $this->db->where('harga <=', 500000);
          break;
      }
    }
    if (array_key_exists('filterByColor', $filter)  && $filter['filterByColor'] && $filter['filterByColor'] !== 'all') {
      $this->db->join('warna_produk', 'produk.id_produk = warna_produk.produk_id');
      $this->db->where('warna_produk.warna', $filter['filterByColor']);
    }
    if (array_key_exists('filterBySize', $filter)  && $filter['filterBySize'] && $filter['filterBySize'] !== 'all') {
      $this->db->join('ukuran_produk', 'produk.id_produk = ukuran_produk.produk_id');
      $this->db->where('ukuran_produk.ukuran', $filter['filterBySize']);
    }
    if (array_key_exists('limit', $filter) && $filter['limit']) $this->db->limit(12);

    return $this->getWarnaAndUkuran($this->db->get('produk')->result_array());
  }

  public function getAllWithPagination($filter) {
    $config['base_url'] = base_url() . 'shop';
    $config['per_page'] = 9;
    $from               = $this->uri->segment(2);
    $data               = $this->getAll($filter);

    $config['total_rows']       = count($data);
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '
      <div class="col-12 pb-1">
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center mb-3">';
    $config['full_tag_close']   = '
          </ul>
        </nav>
      </div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '</span></li>';
    $config['next_tag_open']    = '<li class="page-item">
    <span class="page-link" aria-label="Next">';
    $config['next_tagl_close']  = '
    <span aria-hidden="true">&raquo;</span>
    <span class="sr-only">Next</span>
  </span>
</li>';
    $config['prev_tag_open']    = '
    <li class="page-item">
      <span class="page-link" href="#" aria-label="Previous">';
    $config['prev_tagl_close']  = '
    <span aria-hidden="true">&laquo;</span>
    <span class="sr-only">Previous</span>
  </span>
</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    $config['reuse_query_string'] = TRUE;
    $this->pagination->initialize($config);
    return array_slice($data, $from, $config['per_page']);
  }

  protected function getWarnaAndUkuran($produk)
  {
    if(array_keys($produk) !== range(0, count($produk) - 1)) {
      if (count($produk) !== 0) {
        $produk['warna']  = $this->db->get_where('warna_produk', ['produk_id' => $produk['id_produk']])->result_array();
        $produk['ukuran'] = $this->db->get_where('ukuran_produk', ['produk_id' => $produk['id_produk']])->result_array();
        $produk['image']  = $this->db->get_where('gambar', ['produk_id' => $produk['id_produk']])->result_array();
      }
    } else {
      for ($i=0; $i < count($produk); $i++) {
        $key                  = $produk[$i];
        $produk[$i]['warna']  = $this->db->get_where('warna_produk', ['produk_id' => $key['id_produk']])->result_array();
        $produk[$i]['ukuran']  = $this->db->get_where('ukuran_produk', ['produk_id' => $key['id_produk']])->result_array();
        $produk[$i]['image']  = $this->db->get_where('gambar', ['produk_id' => $key['id_produk']])->result_array();
      }
    }

    return $produk;
  }

  public function update($id, $data, $warna, $ukuran)
  {
    $this->db->where('id_produk', $id)->update('produk', $data);
    $this->db->where('produk_id', $id)->delete('warna_produk');
    $this->addWarna($warna, $id);
    $this->db->where('produk_id', $id)->delete('ukuran_produk');
    $this->addUkuran($ukuran, $id);
    $this->db->where('produk_id', $id)->delete('gambar');
    $this->addGambar($id);
  }

  public function getById($id)
  {
    return $this->getWarnaAndUkuran($this->db->get_where('produk', ['id_produk' => $id])->row_array());
  }

  public function destroy($id)
  {
    $this->db->delete('produk', ['id_produk' => $id]);
  }

  public function getAllWarna()
  {
    $this->db->group_by('warna');
    return $this->db->get('warna_produk')->result_array();
  }
}
