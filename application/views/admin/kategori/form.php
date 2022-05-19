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
          <form action="<?= base_url(); ?>admin/kategori/<?= $type === 'add' ? 'tambah' : 'edit/' . $id; ?>" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="namaKategori">Nama Kategori</label>
                <input type="text" class="form-control" id="namaKategori" placeholder="Masukan Nama Kategori" name="nama_kategori" value="<?= $type === 'edit' ? $nama_kategori : ''; ?>">
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
