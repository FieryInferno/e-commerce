<?php $this->load->view('admin/template/header'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url(); ?>admin/produk/<?= $type === 'add' ? 'tambah' : 'edit/' . $id_produk; ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
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
                          <option value="<?= $key['id_kategori']; ?>" 
                            <?=
                              $type === 'edit' ?
                                $kategori_id === $key['id_kategori'] ?
                                  'selected' :
                                  '' :
                                ''; ?>><?= $key['nama_kategori']; ?></option>
                        <?php }
                      ?>
                    </select>
                  </div>
                  <div id="warna">
                    <label>Warna</label>
                    <?php
                      $no = 0;
                      if ($type === 'edit') {
                        foreach ($warna as $key) { ?>
                          <div class="input-group" id="input-group<?= $no; ?>">
                            <input type="text" class="form-control" placeholder="Warna" name="warna[]" value="<?= ucfirst($key['warna']); ?>">
                            <div class="input-group-append" id="input-group-append<?= $no; ?>" onclick="hapusWarna(<?= $no; ?>)">
                              <span class="input-group-text bg-danger text-primary">
                                <i class="fa fa-trash"></i>
                              </span>
                            </div>
                          </div>
                          <?php 
                          $no++;
                        }
                      }
                    ?>
                    <div class="input-group" id="input-group<?= $no; ?>">
                      <input type="text" class="form-control" placeholder="Warna" name="warna[]">
                      <div class="input-group-append" id="input-group-append<?= $no; ?>" onclick="addWarna(<?= $no; ?>)">
                        <span class="input-group-text bg-success text-primary">
                          <i class="fa fa-plus"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Ukuran</label>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="ukuran[]"
                        <?= $type === 'edit' ? in_array('xs', array_column($ukuran, 'ukuran')) ? 'checked' : '' : ''; ?>
                        value="xs">
                      <label class="form-check-label">XS</label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="ukuran[]"
                        <?= $type === 'edit' ? in_array('s', array_column($ukuran, 'ukuran')) ? 'checked' : '' : ''; ?>
                        value="s">
                      <label class="form-check-label">S</label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="ukuran[]"
                        <?= $type === 'edit' ? in_array('m', array_column($ukuran, 'ukuran')) ? 'checked' : '' : ''; ?>
                        value="m">
                      <label class="form-check-label">M</label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="ukuran[]"
                        <?= $type === 'edit' ? in_array('l', array_column($ukuran, 'ukuran')) ? 'checked' : '' : ''; ?>
                        value="l">
                      <label class="form-check-label">L</label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        name="ukuran[]"
                        <?= $type === 'edit' ? in_array('xl', array_column($ukuran, 'ukuran')) ? 'checked' : '' : ''; ?>
                        value="xl">
                      <label class="form-check-label">XL</label>
                    </div>
                  </div>
                  <?php
                    if ($type === 'add') { ?>
                      <div class="form-group">
                        <label for="image">Gambar</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input
                              type="file"
                              class="custom-file-input"
                              id="image"
                              onchange="previewImg()"
                              name="image[]"
                              multiple
                            >
                            <label class="custom-file-label" for="image">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <div id="productImages">
                        </div>
                      </div>
                    <?php }
                  ?>
                </div>
              </div>
              <div class="col-md-6">
                <label for="namaProduk">Deskripsi</label>
                <textarea id="summernote" name="deskripsi">
                  <?= $type === 'edit' ? $deskripsi : ''; ?>
                </textarea>
              </div>
              <?php
                if ($type === 'edit') { ?>
                  <div class="col-md-12">
                    <div>
                      <label for="namaProduk">Gambar Produk</label>
                    </div>
                    <button
                      type="button"
                      class="btn btn-sm btn-success"
                      data-toggle="modal"
                      data-target="#modalTambahGambar"
                    >Tambah</button>

                    <div class="modal fade" id="modalTambahGambar">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Gambar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="formTambah">
                            <div class="modal-body" id="modalBody">
                              <div class="form-group">
                                <label for="image">Gambar</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input
                                      type="file"
                                      class="custom-file-input"
                                      id="image"
                                      onchange="previewImg()"
                                      name="image[]"
                                      multiple
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
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <div class="btn btn-success" onClick="tambahGambar('<?= $id_produk; ?>')">Tambah</div>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <br/>
                    <br/>
                    <table id="table-gambar" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th width="10%">No</th>
                        <th width="30%">Gambar</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                <?php }
              ?>
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
