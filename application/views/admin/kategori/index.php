<?php $this->load->view('admin/template/header'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url(); ?>admin/kategori/tambah" class="btn btn-success">Tambah</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="10%">No</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($kategori as $key) { ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $key['nama_kategori']; ?></td>
                      <td>
                        <a href="<?= base_url(); ?>admin/kategori/edit/<?= $key['id_kategori']; ?>" class="btn btn-primary">Edit</a>
                        <button
                          type="button"
                          class="btn btn-danger"
                          data-toggle="modal"
                          data-target="#modal<?= $key['id_kategori']; ?>"
                        >
                          Hapus
                        </button>

                        <div class="modal fade" id="modal<?= $key['id_kategori']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="<?= base_url(); ?>admin/kategori/hapus/<?= $key['id_kategori']; ?>" method="post">
                                <div class="modal-body">
                                  Anda yakin akan menghapus data kategori <b><?= $key['nama_kategori']; ?></b>
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
