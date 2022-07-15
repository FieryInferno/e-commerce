<?php 
  $this->load->view('components/table', [
    'th'    => [
      'Order ID'  => ['name' => 'id_pemesanan'],
      'Produk'    => [
        'render'  => function ($data) {
          $result = '<div class="row">';

          foreach ($data['keranjang'] as $value) {
            $result .= '<div class="col-12 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">' . 
                  formatRupiah($value['harga']) . ' x ' . $value['kuantitas'] .
                '</div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>' . $value['nama_produk'] . '</b></h2>
                      <p class="text-muted text-sm">' . $value['nama_kategori'] . '</p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small">Warna: ' . $value['warna'] . '</li>
                        <li class="small">Ukuran: ' . $value['ukuran'] . '</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="' . base_url('assets/image/' . $value['image'][0]['gambar']) . '" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>';
          };

          $result .= '</div>';
          return $result;
        },
      ],
      'Harga' => [
        'render'  => function ($data) {
          return formatRupiah($data['harga']);
        },
      ],
      'Metode Pengiriman' => ['name' => 'metode_pengiriman'],
      'Alamat'            => ['name' => 'alamat'],
      'Status'            => [
        'render'  => function ($data) {
          $url = base_url('order/' . $data['id_pemesanan']);

          switch ($data['status']) {
            case 'pending':
              return <<<HTML
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                  Menunggu Pembayaran<br>
                  Klik untuk upload bukti pembayaran
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{$url}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="image">Bukti Pembayaran</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input
                                  type="file"
                                  class="custom-file-input"
                                  id="image"
                                  onchange="previewImg()"
                                  name="bukti_pembayaran"
                                >
                                <label class="custom-file-label" for="image">Choose file</label>
                              </div>
                            </div>
                          </div>
                          <div class="text-center">
                            <div id="productImages">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Simpan Bukti Pembayaran</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              HTML;
              break;
            case 'sudah_dibayar':
              $urlImage       = base_url() . 'assets/image/' . $data['bukti_pembayaran'];
              $buttonconfirm  = $this->session->admin ? '<button type="submit" class="btn btn-primary">Konfirmasi</button>' : '';
              $urlAction      = base_url('admin/order/' . $data['id_pemesanan']);

              return <<<HTML
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                  Menunggu Konfirmasi Admin<br>
                  Klik untuk lihat bukti pembayaran
                </button>
                
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">bukti pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{$urlAction}" method="post">
                        <input type="hidden" name="status" value="konfirmasi">
                        <div class="modal-body">
                          <img src="{$urlImage}" alt="" width="100%">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          {$buttonconfirm}
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              HTML;
              break;

            case 'konfirmasi':
              $buttonkirim  = $this->session->admin ? '<br>Klik untuk ubah status' : '';
              $modalKirim   = $this->session->admin ? '
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kirim Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="' . base_url('admin/order/' . $data['id_pemesanan']) . '" method="post">
                        <input type="hidden" name="status" value="dikirim">
                        <div class="modal-body">
                          Ubah status menjadi dikirim?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              ' : '';

              return <<<HTML
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Sudah dikonfirmasi{$buttonkirim}</button>
                {$modalKirim}
              HTML;
              break;

            case 'dikirim':
              $buttonkirim  = $this->session->admin ? '' : '<br>Klik untuk menyelesaikan pesanan';
              $modalKirim   = $this->session->admin ? '' : '
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kirim Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="' . base_url('admin/order/' . $data['id_pemesanan']) . '" method="post">
                        <input type="hidden" name="status" value="selesai">
                        <div class="modal-body">
                          Ubah status menjadi barang menjadi selesai?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              ';

              return <<<HTML
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Barang sedang dikirim{$buttonkirim}</button>
                {$modalKirim}
              HTML;
              break;
              
            case 'selesai':
              return <<<HTML
                <button type="button" class="btn btn-success">Pesanan selesai</button>
              HTML;
              break;
            
            default:
              # code...
              break;
          };
        }
      ],
      'Aksi'  => [
        'render'  => function ($data) {
          return '<a href="' . base_url('order/' . $data['id_pemesanan']) . '" class="btn btn-success">Detail</a>';
        }
      ]
    ],
    'data'  => $order, 
  ]);
?>