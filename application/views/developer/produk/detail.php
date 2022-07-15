<?php $this->load->view('admin/template/header'); ?>
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none"><?= $nama_produk; ?></h3>
          <div class="col-12">
            <img src="<?= base_url('assets/image/' . $image[0]['gambar']); ?>" class="product-image" alt="Product Image">
          </div>
          <div class="col-12 product-image-thumbs">
            <?php
              for ($i=0; $i < count($image); $i++) {
                $value = $image[$i]; ?>
                <div class="product-image-thumb <?= $i === 0 ? 'active' : ''; ?>">
                  <img src="<?= base_url('assets/image/' . $value['gambar']); ?>" alt="Product Image">
                </div>
              <?php }
            ?>
          </div>
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3"><?= $nama_produk; ?></h3>
          <p><?= $deskripsi; ?></p>

          <hr>
          <h4>Warna</h4>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <?php
              foreach ($warna as $key) { ?>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off">
                  <?= ucfirst($key['warna']); ?>
                </label>
              <?php }
            ?>
          </div>

          <h4 class="mt-3">Ukuran</small></h4>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <?php
              if (in_array('xs', array_column($ukuran, 'ukuran'))) { ?>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">XS</span>
                  <br>
                  Xtra-Small
                </label>
              <?php }
            ?>
            <?php
              if (in_array('s', array_column($ukuran, 'ukuran'))) { ?>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">S</span>
                  <br>
                  Small
                </label>
              <?php }
            ?>
            <?php
              if (in_array('m', array_column($ukuran, 'ukuran'))) { ?>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">M</span>
                  <br>
                  Medium
                </label>
              <?php }
            ?>
            <?php
              if (in_array('l', array_column($ukuran, 'ukuran'))) { ?>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">L</span>
                  <br>
                  Large
                </label>
              <?php }
            ?>
            <?php
              if (in_array('l', array_column($ukuran, 'ukuran'))) { ?>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                  <span class="text-xl">XL</span>
                  <br>
                  Xtra-Large
                </label>
              <?php }
            ?>
          </div>

          <div class="bg-gray py-2 px-3 mt-4">
            <h2 class="mb-0">
              <?= formatRupiah($diskon > 0 ? $harga - (int) $harga * (int) $diskon / 100 : $harga); ?>
            </h2>
            <?php
              if ($diskon > 0) { ?>
                <h4 class="mt-0">
                  <small>
                    <del><?= formatRupiah($harga); ?></del>
                  </small>
                </h4>
              <?php }
            ?>
          </div>
        </div>
      </div>
      <!-- <div class="row mt-4">
        <nav class="w-100">
          <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
          </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
          <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
        </div>
      </div> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->  
<?php $this->load->view('admin/template/footer'); ?>
