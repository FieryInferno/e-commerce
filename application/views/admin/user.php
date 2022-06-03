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
                <th>Nama</th>
                <th>Email</th>
                <th>Username</th>
                <th>Alamat</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($user as $key) { ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $key['nama']; ?></td>
                      <td><?= $key['email']; ?></td>
                      <td><?= $key['username']; ?></td>
                      <td><?= $key['alamat']; ?></td>
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
