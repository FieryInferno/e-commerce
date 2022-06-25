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
                <th>Harga</th>
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
                      <td><?= $detail->gross_amount; ?></td>
                      <td>
                        <a href="<?= base_url('order/' . $key['id_pemesanan']); ?>" class="btn btn-success">Detail</a>
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
