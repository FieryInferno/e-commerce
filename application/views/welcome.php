<?php $this->load->view('templates/header'); ?>
<!-- Products Start -->
<div class="container-fluid pt-5">
  <div class="row px-xl-5 pb-3">
    <?php
      foreach ($produk as $key) { ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
          <div class="card product-item border-0 mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
              <img class="img-fluid w-100" src="<?= base_url(); ?>assets/image/<?= $key['image']; ?>" alt="">
            </div>
            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
              <h6 class="text-truncate mb-3"><?= $key['nama_produk']; ?></h6>
              <div class="d-flex justify-content-center">
                <?php
                  if ($key['diskon']) { ?>
                    <h6><?= formatRupiah((int) $key['harga'] - (int) $key['harga'] * (int) $key['diskon'] / 100); ?></h6><h6 class="text-muted ml-2"><del><?= formatRupiah((int) $key['harga']); ?></del></h6>
                  <?php } else { ?>
                    <h6><?= formatRupiah((int) $key['harga']); ?></h6>
                  <?php }
                ?>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-between bg-light border">
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
              <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            </div>
          </div>
        </div>
      <?php }
    ?>
  </div>
</div>
<!-- Products End -->
<?php $this->load->view('templates/footer'); ?>