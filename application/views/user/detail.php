<?php $this->load->view('admin/template/header'); ?>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row">
        <?php
          foreach ($keranjang as $key) { ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <?= formatRupiah($key['harga']) . ' x ' . $key['kuantitas']; ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?= $key['nama_produk']; ?></b></h2>
                      <p class="text-muted text-sm"><?= $key['nama_kategori']; ?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small">Warna: <?= $key['warna']; ?></li>
                        <li class="small">Ukuran: <?= $key['ukuran']; ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= base_url('assets/image/' . $key['image'][0]['gambar']); ?>" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php }
        ?>
      </div>
    </div>
    <!-- /.card-body -->
    <!-- <div class="card-footer">
      <nav aria-label="Contacts Page Navigation">
        <ul class="pagination justify-content-center m-0">
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">6</a></li>
          <li class="page-item"><a class="page-link" href="#">7</a></li>
          <li class="page-item"><a class="page-link" href="#">8</a></li>
        </ul>
      </nav>
    </div> -->
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
<?php $this->load->view('admin/template/footer'); ?>
