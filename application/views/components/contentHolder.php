<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <?php
            if (isset($cardHeader)) { ?>
              <div class="card-header">
                <?= $cardHeader; ?>
              </div>
            <?php }
          ?>
          <div class="card-body">
            <?php $this->load->view($content); ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
  </div><!-- /.container-fluid -->
</section>