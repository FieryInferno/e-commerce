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
                      <td><?= formatRupiah($detail->gross_amount); ?></td>
                      <td>
                        <?php
                          switch ($key['keranjang'][0]['status']) {
                            case 'pending': ?>
                              <div class="btn btn-warning">Pending</div>
                              <?php break;
                            case 'settlement': ?>
                              <div class="btn btn-primary">Sudah dibayar</div>
                              <?php break;
                            
                            default:
                              # code...
                              break;
                          }
                        ?>
                      </td>
                      <td>
                        <a href="<?= base_url('order/' . $key['id_pemesanan']); ?>" class="btn btn-success">Detail</a>
                        <a href="<?= $detail->pdf_url; ?>" class="btn btn-primary">PDF</a>
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
