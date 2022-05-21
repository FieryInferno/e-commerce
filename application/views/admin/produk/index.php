<?php $this->load->view('admin/template/header'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url(); ?>admin/produk/tambah" class="btn btn-success">Tambah</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="10%">No</th>
                <th width="30%">Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Diskon</th>
                <th>Kategori</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($produk as $key) { ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><img src="<?= base_url(); ?>assets/image/<?= $key['image']; ?>" width="100%"></td>
                      <td><?= $key['nama_produk']; ?></td>
                      <td><?= formatRupiah($key['harga']); ?></td>
                      <td><?= $key['diskon']; ?></td>
                      <td><?= $key['nama_kategori']; ?></td>
                      <td>
                        <?php
                          foreach ($key['warna'] as $value) { ?>
                            - <?= ucfirst($value['warna']); ?><br/>
                          <?php }
                        ?>
                      </td>
                      <td>
                        <?php
                          foreach ($key['ukuran'] as $value) { ?>
                            <span class="badge badge-info">
                              <?= strtoupper($value['ukuran']); ?><br/>
                            </span>
                          <?php }
                        ?>
                      </td>
                      <td>
                        <a href="<?= base_url(); ?>admin/produk/edit/<?= $key['id_produk']; ?>" class="btn btn-primary">Edit</a>
                        <button
                          type="button"
                          class="btn btn-danger"
                          data-toggle="modal"
                          data-target="#modal<?= $key['id_produk']; ?>"
                        >
                          Hapus
                        </button>

                        <div class="modal fade" id="modal<?= $key['id_produk']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="<?= base_url(); ?>admin/produk/hapus/<?= $key['id_produk']; ?>" method="post">
                                <div class="modal-body">
                                  Anda yakin akan menghapus data produk <b><?= $key['nama_produk']; ?></b>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
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
