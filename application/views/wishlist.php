<?php $this->load->view('templates/header'); ?>
<!-- Page Header Start -->
<div class="container-fluid mb-5" style="background-color: #323233;">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Wishlist</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Wishlist</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
  <div class="row px-xl-5">
    <div class="col-lg-12 table-responsive mb-5">
      <table class="table table-bordered text-center mb-0">
        <thead class="bg-secondary text-dark">
          <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody class="align-middle">
          <?php
            foreach ($wishlist as $key) { ?>
              <tr>
                <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"><?= $key['nama_produk']; ?></td>
                <td class="align-middle"><?= formatRupiah($key['harga']); ?></td>
                <td class="align-middle">
                  <a href="<?= base_url(); ?>shop/detail/<?= $key['produk_id']; ?>" class="btn btn-sm btn-primary">Add to cart</a>
                  <a href="<?= base_url(); ?>wishlist/delete/<?= $key['id_wishlist']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a>
                </td>
              </tr>
            <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Cart End -->
<?php $this->load->view('templates/footer'); ?>