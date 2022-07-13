<?php $this->load->view('admin/template/header'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="10%">No</th>
                <th>Order ID</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Metode Pengiriman</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;

                  foreach ($order as $key) {
                    $detail = json_decode($key['detail']); ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $key['id_pemesanan']; ?></td>
                      <td>
                        <div class="row">
                          <?php
                            foreach ($key['keranjang'] as $value) { ?>
                              <div class="col-12 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                  <div class="card-header text-muted border-bottom-0">
                                    <?= formatRupiah($value['harga']) . ' x ' . $value['kuantitas']; ?>
                                  </div>
                                  <div class="card-body pt-0">
                                    <div class="row">
                                      <div class="col-7">
                                        <h2 class="lead"><b><?= $value['nama_produk']; ?></b></h2>
                                        <p class="text-muted text-sm"><?= $value['nama_kategori']; ?></p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                          <li class="small">Warna: <?= $value['warna']; ?></li>
                                          <li class="small">Ukuran: <?= $value['ukuran']; ?></li>
                                        </ul>
                                      </div>
                                      <div class="col-5 text-center">
                                        <img src="<?= base_url('assets/image/' . $value['image'][0]['gambar']); ?>" alt="user-avatar" class="img-circle img-fluid">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php }
                          ?>
                        </div>
                      </td>
                      <td><?= formatRupiah($key['harga']); ?></td>
                      <!-- <td><?= formatRupiah($detail->gross_amount); ?></td> -->
                      <td><?= $key['metode_pengiriman']; ?></td>
                      <td><?= $key['alamat']; ?></td>
                      <td>
                        <?php
                          switch ($key['status']) {
                            case 'pending': ?>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                Menunggu Pembayaran<br>
                                Klik untuk upload bukti pembayaran
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="<?= base_url('order/' . $key['id_pemesanan']); ?>" method="post" enctype="multipart/form-data">
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
                              <?php break;
                            case 'sudah_dibayar': ?>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Menunggu Konfirmasi Admin<br>
                                Klik untuk lihat bukti pembayaran
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">bukti pembayaran</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <img src="<?= base_url('assets/image/' . $key['bukti_pembayaran']); ?>" alt="" width="100%">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php break;
                            
                            default:
                              # code...
                              break;
                          }
                        ?>
                      </td>
                      <td>
                        <a href="<?= base_url('order/' . $key['id_pemesanan']); ?>" class="btn btn-success">Detail</a>
                        <!-- <a href="<?= $detail->pdf_url; ?>" class="btn btn-primary">PDF</a> -->
                      </td>
                    </tr>
                  <?php }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
  </div><!-- /.container-fluid -->
</section>
<?php $this->load->view('admin/template/footer'); ?>
