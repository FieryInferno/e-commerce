<?php $this->load->view('admin/template/header'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card">
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url(); ?>admin/produk/<?= $type === 'add' ? 'tambah' : 'edit/' . $id_produk; ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="namaProduk">Nama Produk</label>
                <input type="text" class="form-control" id="namaProduk" placeholder="Masukan Nama Produk" name="nama_produk" value="<?= $type === 'edit' ? $nama_produk : ''; ?>">
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input
                  type="text"
                  class="form-control"
                  id="harga"
                  placeholder="Masukan Harga"
                  name="harga"
                  value="<?= $type === 'edit' ? $harga : ''; ?>"
                >
              <div class="form-group">
                <label for="diskon">Diskon</label>
                <input
                  type="text"
                  class="form-control"
                  id="diskon"
                  placeholder="Masukan Diskon"
                  name="diskon"
                  value="<?= $type === 'edit' ? $diskon : ''; ?>"
                >
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control select2" style="width: 100%;" name="kategori_id">
                  <option></option>
                  <?php
                    foreach ($kategori as $key) { ?>
                      <option value="<?= $key['id_kategori']; ?>" <?= $kategori_id === $key['id_kategori'] ? 'selected' : ''; ?>><?= $key['nama_kategori']; ?></option>
                    <?php }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="image">Gambar</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      id="image"
                      onchange="previewImg()"
                      name="image"
                    >
                    <label class="custom-file-label" for="image">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <img class="img-thumbnail img-preview" id="anggota-img" width="40%" src="<?= $type === 'edit' ? base_url() . 'assets/image/' . $image : ''; ?>">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
  </div><!-- /.container-fluid -->
</section>
<?php $this->load->view('admin/template/footer'); ?>
