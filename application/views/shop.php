<?php $this->load->view('templates/header'); ?>
<!-- Page Header Start -->
<div class="container-fluid mb-5" style="background-color: #323233;">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
    <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
    <div class="d-inline-flex">
      <p class="m-0"><a href="">Home</a></p>
      <p class="m-0 px-2">-</p>
      <p class="m-0">Shop</p>
    </div>
  </div>
</div>
<!-- Page Header End -->
<!-- Shop Start -->
<div class="container-fluid pt-5">
  <div class="row px-xl-5">
    <!-- Shop Sidebar Start -->
    <div class="col-lg-3 col-md-12">
      <!-- Price Start -->
      <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
        <form>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" class="custom-control-input" <?= $filterByPrice === 'all' ? 'checked' : ''; ?> id="price-all" onchange="addOrUpdateUrlParam('filterByPrice', 'all')">
            <label class="custom-control-label" for="price-all">All Price</label>
            <span class="badge border font-weight-normal"><?= count($all); ?></span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" class="custom-control-input"  <?= $filterByPrice === '0-100' ? 'checked' : ''; ?> id="price-1" onchange="addOrUpdateUrlParam('filterByPrice', '0-100')">
            <label class="custom-control-label" for="price-1">Rp. 0 - Rp. 100k</label>
            <span class="badge border font-weight-normal"><?= count($seratus); ?></span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" class="custom-control-input"  <?= $filterByPrice === '100-200' ? 'checked' : ''; ?> id="price-2" onchange="addOrUpdateUrlParam('filterByPrice', '100-200')">
            <label class="custom-control-label" for="price-2">Rp. 100k - Rp. 200k</label>
            <span class="badge border font-weight-normal"><?= count($duaratus); ?></span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" class="custom-control-input"  <?= $filterByPrice === '200-300' ? 'checked' : ''; ?> id="price-3" onchange="addOrUpdateUrlParam('filterByPrice', '200-300')">
            <label class="custom-control-label" for="price-3">Rp. 200k - Rp. 300k</label>
            <span class="badge border font-weight-normal"><?= count($tigaratus); ?></span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" class="custom-control-input"  <?= $filterByPrice === '300-400' ? 'checked' : ''; ?> id="price-4" onchange="addOrUpdateUrlParam('filterByPrice', '300-400')">
            <label class="custom-control-label" for="price-4">Rp. 300k - Rp. 400k</label>
            <span class="badge border font-weight-normal"><?= count($empatratus); ?></span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
            <input type="checkbox" class="custom-control-input"  <?= $filterByPrice === '400-500' ? 'checked' : ''; ?> id="price-5" onchange="addOrUpdateUrlParam('filterByPrice', '400-500')">
            <label class="custom-control-label" for="price-5">Rp. 400k - Rp. 500k</label>
            <span class="badge border font-weight-normal"><?= count($limaratus); ?></span>
          </div>
        </form>
      </div>
      <!-- Price End -->
      
      <!-- Color Start -->
      <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
        <form>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input
              type="checkbox"
              class="custom-control-input"
              <?= $filterByColor === 'all' ? 'checked' : ''; ?> 
              id="color-all"
              onchange="addOrUpdateUrlParam('filterByColor', 'all')"
            >
            <label class="custom-control-label" for="color-all">All Color</label>
            <span class="badge border font-weight-normal">
              <?php
                $jumlahAll = 0;
                foreach ($warna as $key) {
                  $jumlahAll  += count($jumlah_warna[$key['warna']]);
                }

                echo $jumlahAll;
              ?>
            </span>
          </div>
          <?php
            foreach ($warna as $key) { ?>
              <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  <?= $filterByColor === $key['warna'] ? 'checked' : ''; ?>
                  id="<?= $key['warna']; ?>"
                  onchange="addOrUpdateUrlParam('filterByColor', '<?= $key['warna']; ?>')"
                >
                <label class="custom-control-label" for="<?= $key['warna']; ?>"><?= ucfirst($key['warna']); ?></label>
                <span class="badge border font-weight-normal"><?= count($jumlah_warna[$key['warna']]); ?></span>
              </div>
            <?php }
          ?>
        </form>
      </div>
      <!-- Color End -->

      <!-- Size Start -->
      <div class="mb-5">
        <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
        <form>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input
              type="checkbox"
              class="custom-control-input"
              <?= $filterBySize === 'all' ? 'checked' : ''; ?>
              id="size-all"
              onchange="addOrUpdateUrlParam('filterBySize', 'all')"
            >
            <label class="custom-control-label" for="size-all">All Size</label>
            <span class="badge border font-weight-normal">1000</span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input
              type="checkbox"
              class="custom-control-input"
              id="size-1"
              onchange="addOrUpdateUrlParam('filterBySize', 'xs')"
              <?= $filterBySize === 'xs' ? 'checked' : ''; ?>
            >
            <label class="custom-control-label" for="size-1">XS</label>
            <span class="badge border font-weight-normal">150</span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input
              type="checkbox"
              class="custom-control-input"
              id="size-2"
              onchange="addOrUpdateUrlParam('filterBySize', 's')"
              <?= $filterBySize === 's' ? 'checked' : ''; ?>
            >
            <label class="custom-control-label" for="size-2">S</label>
            <span class="badge border font-weight-normal">295</span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input
              type="checkbox"
              class="custom-control-input"
              id="size-3"
              onchange="addOrUpdateUrlParam('filterBySize', 'm')"
              <?= $filterBySize === 'm' ? 'checked' : ''; ?>
            >
            <label class="custom-control-label" for="size-3">M</label>
            <span class="badge border font-weight-normal">246</span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input
              type="checkbox"
              class="custom-control-input"
              id="size-4"
              onchange="addOrUpdateUrlParam('filterBySize', 'l')"
              <?= $filterBySize === 'l' ? 'checked' : ''; ?>
            >
            <label class="custom-control-label" for="size-4">L</label>
            <span class="badge border font-weight-normal">145</span>
          </div>
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
            <input
              type="checkbox"
              class="custom-control-input"
              id="size-5"
              onchange="addOrUpdateUrlParam('filterBySize', 'xl')"
              <?= $filterBySize === 'xl' ? 'checked' : ''; ?>
            >
            <label class="custom-control-label" for="size-5">XL</label>
            <span class="badge border font-weight-normal">168</span>
          </div>
        </form>
      </div>
      <!-- Size End -->
    </div>
    <!-- Shop Sidebar End -->


    <!-- Shop Product Start -->
    <div class="col-lg-9 col-md-12">
      <div class="row pb-3">
        <div class="col-12 pb-1">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search by name" id="nama_produk">
              <div class="input-group-append" onclick="searchByNameProduct()">
                <span class="input-group-text bg-transparent text-primary">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </div>
            <div class="dropdown ml-4">
              <button
                class="btn border dropdown-toggle"
                type="button"
                id="triggerId"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >Sort by</button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                <a class="dropdown-item" onclick="addOrUpdateUrlParam('sortBy', 'latest')">Latest</a>
                <!-- <a class="dropdown-item" href="#">Popularity</a>
                <a class="dropdown-item" href="#">Best Rating</a> -->
              </div>
            </div>
          </div>
        </div>
        
        <?php
          foreach ($produk as $key) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
              <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  <img class="img-fluid w-100" src="<?= count($key['image']) > 0 ? base_url('assets/image/' . $key['image'][0]['gambar']) : ''; ?>" alt="">
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
                  <a href="<?= base_url(); ?>shop/detail/<?= $key['id_produk']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                  <a class="btn btn-sm text-dark p-0" <?= !$this->session->user ? 'data-toggle="tooltip" data-placement="top" title="Anda belum login"' : '' ?>><i class="fas fa-heart text-primary mr-1"></i>Add To Wishlist</a>
                </div>
              </div>
            </div>
          <?php }
          echo $this->pagination->create_links(); ?>
      </div>
    </div>
    <!-- Shop Product End -->
  </div>
</div>
<!-- Shop End -->
<?php $this->load->view('templates/footer'); ?>