<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {
  
	public function store($data, $warna, $ukuran)
	{
    $this->db->insert('produk', $data);
    $this->addWarna($warna, $data['id_produk']);
    $this->addUkuran($ukuran, $data['id_produk']);
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

  public function getAll(
    $id_kategori    = null,
    $sortBy         = null,
    $nama_produk    = null,
    $filterByPrice  = null,
    $filterByColor  = null,
    $filterBySize   = null,
  ) {
    $this->db->join('kategori', 'produk.kategori_id = kategori.id_kategori');

    if ($id_kategori) $this->db->where('produk.kategori_id', $id_kategori);
    if ($sortBy) $this->db->order_by('created_at', 'desc');
    if ($nama_produk) $this->db->like('nama_produk', $nama_produk);
    if ($filterByPrice && $filterByPrice !== 'all') {
      switch ($filterByPrice) {
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
    if ($filterByColor && $filterByColor !== 'all') {
      $this->db->join('warna_produk', 'produk.id_produk = warna_produk.produk_id');
      $this->db->where('warna_produk.warna', $filterByColor);
    }
    if ($filterBySize && $filterBySize !== 'all') {
      $this->db->join('ukuran_produk', 'produk.id_produk = ukuran_produk.produk_id');
      $this->db->where('ukuran_produk.ukuran', $filterBySize);
    }

    return $this->getWarnaAndUkuran($this->db->get('produk')->result_array());
  }

  public function getAllWithPagination(
    $id_kategori    = null,
    $sortBy         = null,
    $nama_produk    = null,
    $filterByPrice  = null,
    $filterByColor  = null,
    $filterBySize   = null,
    $pagination     = FALSE,
  ) {
    $config['base_url'] = base_url() . 'shop';
    $config['per_page'] = 9;
    $from               = $this->uri->segment(2);
    $data               = $this->getAll(
      $id_kategori,
      $sortBy,
      $nama_produk,
      $filterByPrice,
      $filterByColor,
      $filterBySize,
    );

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
      }
    } else {
      for ($i=0; $i < count($produk); $i++) {
        $key                  = $produk[$i];
        $produk[$i]['warna']  = $this->db->get_where('warna_produk', ['produk_id' => $key['id_produk']])->result_array();
        $produk[$i]['ukuran']  = $this->db->get_where('ukuran_produk', ['produk_id' => $key['id_produk']])->result_array();
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
