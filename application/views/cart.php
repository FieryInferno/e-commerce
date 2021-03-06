<?php $this->load->view('templates/header'); ?>
<!-- Page Header Start -->
<div class="container-fluid mb-5" style="background-color: #323233;">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
  <div class="row px-xl-5">
    <div class="col-lg-8 table-responsive mb-5">
      <form action="<?= base_url(); ?>shop/checkout" method="post" id="payment-form">
        <input type="hidden" name="status" id="status" value="pending">
        <input type="hidden" name="id_order" id="id_order" value="<?= uniqid(); ?>">
        <input type="hidden" name="detail" id="detail">
        <table class="table table-bordered text-center mb-0">
          <thead class="bg-secondary text-dark">
            <tr>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Kuantitas</th>
              <th>Warna</th>
              <th>Ukuran</th>
              <th>Total</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody class="align-middle">
            <?php
              $totalHarga = 0;

              foreach ($keranjang as $key) {
                $harga      = $key['harga'] * $key['kuantitas'];
                $totalHarga += $harga; ?>
                <input type="hidden" name="id_keranjang[]" value="<?= $key['id_keranjang']; ?>">
                <tr>
                  <td class="align-middle"><?= $key['nama_produk']; ?></td>
                  <td class="align-middle"><?= formatRupiah($key['harga']); ?></td>
                  <td class="align-middle">
                    <div class="input-group quantity mx-auto" style="width: 100px;">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-primary btn-minus" onclick="updateCart('<?= $key['id_keranjang']; ?>', 'kurang')" type="button">
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <input
                        type="text"
                        class="form-control form-control-sm bg-secondary text-center"
                        value="<?= $key['kuantitas']; ?>"
                        id="kuantitas"
                      >
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-primary btn-plus" onclick="updateCart('<?= $key['id_keranjang']; ?>', 'tambah')" type="button">
                          <i class="fa fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle"><?= $key['warna']; ?></td>
                  <td class="align-middle"><?= $key['ukuran']; ?></td>
                  <td class="align-middle" id="harga"><?= formatRupiah($harga); ?></td>
                  <td class="align-middle"><a href="<?= base_url(); ?>shop/cart/delete/<?= $key['id_keranjang']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                </tr>
              <?php }
            ?>
          </tbody>
        </table>
    </div>
    <div class="col-lg-4">
      <!-- <form class="mb-5" action="">
        <div class="input-group">
          <input type="text" class="form-control p-4" placeholder="Coupon Code">
          <div class="input-group-append">
            <button class="btn btn-primary">Apply Coupon</button>
          </div>
        </div>
      </form> -->
      <div class="card border-secondary mb-5" style="background-color: #000000;">
        <div class="card-header border-0">
          <h4 class="font-weight-semi-bold m-0">Metode Pengiriman</h4>
        </div>
        <div class="card-body">
          <div class="control-group">
            <select name="metode_pengiriman" class="form-control">
              <option disabled selected>Pilih Metode Pengiriman</option>
              <option value="JNE">JNE</option>
              <option value="JNT">JNT</option>
            </select>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="card-header border-0">
          <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Subtotal</h6>
            <h6 class="font-weight-medium totalHarga"><?= formatRupiah($totalHarga); ?></h6>
          </div>
          <!-- <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Shipping</h6>
            <h6 class="font-weight-medium">$10</h6>
          </div> -->
        </div>
        <div class="card-footer border-secondary bg-transparent">
          <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Total</h5>
            <h5 class="font-weight-bold totalHarga"><?= formatRupiah($totalHarga); ?></h5>
            <input type="hidden" name="harga" class="harga" id="inputHarga" value="<?= $totalHarga; ?>">
          </div>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-block btn-primary my-3 py-3" data-toggle="modal" data-target="#checkoutModal">
            Proceed To Checkout
          </button>

          <!-- Modal -->
          <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" style="color: #000000;">Masukan Alamat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="control-group">
                    <textarea
                      type="text"
                      class="form-control"
                      placeholder="Alamat"
                      required="required"
                      name="alamat"
                    ></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <h5 style="color: #000000;">Cara Pembayaran</h5>
                  <ul>
                    <li>Nama Bank: BCA</li>
                    <li>Nama Pemilik: Riyadh</li>
                    <li>No. Rekening: 123123123</li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Checkout</button>
                </div>
              </div>
            </div>
          </div>
          </form>
          <!-- <button class="btn btn-block btn-primary my-3 py-3" id="pay-button">Proceed To Checkout</button> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Cart End -->
<?php $this->load->view('templates/footer'); ?>