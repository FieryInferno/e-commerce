<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
  <div class="row px-xl-5 pt-5">
      <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
          <a href="" class="text-decoration-none">
              <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
          </a>
          <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
          <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
          <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
          <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
      </div>
      <div class="col-lg-8 col-md-12">
          <div class="row">
              <div class="col-md-4 mb-5">
                  <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                  <div class="d-flex flex-column justify-content-start">
                      <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                      <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                      <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                      <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                      <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                      <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                  </div>
              </div>
              <div class="col-md-4 mb-5">
                  <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                  <div class="d-flex flex-column justify-content-start">
                      <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                      <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                      <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                      <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                      <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                      <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                  </div>
              </div>
              <div class="col-md-4 mb-5">
                  <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                  <form action="">
                      <div class="form-group">
                          <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                      </div>
                      <div class="form-group">
                          <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                              required="required" />
                      </div>
                      <div>
                          <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <div class="row border-top border-light mx-xl-5 py-4">
      <div class="col-md-6 px-xl-0">
          <p class="mb-md-0 text-center text-md-left text-dark">
              &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
              by
              <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
              Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
          </p>
      </div>
      <div class="col-md-6 px-xl-0 text-center text-md-right">
          <img class="img-fluid" src="<?= base_url(); ?>assets/eshopper/img/payments.png" alt="">
      </div>
  </div>
</div>
<!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/eshopper/lib/easing/easing.min.js"></script>
  <script src="<?= base_url(); ?>assets/eshopper/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="<?= base_url(); ?>assets/eshopper/mail/jqBootstrapValidation.min.js"></script>
  <script src="<?= base_url(); ?>assets/eshopper/mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="<?= base_url(); ?>assets/eshopper/js/main.js"></script>
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-1gUtnXSu6YUOwNFg"></script>
  <script src="<?= base_url(); ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script>
    const addOrUpdateUrlParam = (name, value) => {
      let queryParams = new URLSearchParams(window.location.search);
      
      queryParams.set(name, value);
      history.pushState(null, null, "?"+queryParams.toString());
      window.location.search = queryParams.toString();
    }

    const searchByNameProduct = () => {
      const name = $('#nama_produk').val();

      addOrUpdateUrlParam('nama_produk', name);
    }

    const updateCart = (id_keranjang, tipe) => {
      const kuantitas = parseInt($('#kuantitas').val());

      $.ajax({
        url   : `<?= base_url(); ?>shop/cart/update/${id_keranjang}`,
        type  : 'post',
        data  : {kuantitas: tipe === 'tambah' ? kuantitas + 1 : kuantitas - 1}, 
        success : (result) => {
          $('#harga').html(result.harga);
          $('.totalHarga').html(result.totalHarga);
        }
      });
    }

    $('#pay-button').click((event) => {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
      $.ajax({
        url   : '<?= site_url(); ?>shop/token',
        cache : false,
        success: (token) => {
          snap.pay(token, {
            onSuccess: (result) => {
              $("#status").val('success');
              $("#id_order").val(result.order_id);
              $("#detail").val(JSON.stringify(result));
              $("#payment-form").submit();
            },
            onPending: (result) => {
              $("#status").val('pending');
              $("#id_order").val(result.order_id);
              $("#detail").val(JSON.stringify(result));
              $("#payment-form").submit();
            },
            onError: (result) => {
              console.log(result.status_message);
              // $("#payment-form").submit();
            }
          });
        }
      });
    });

    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
    
    if ('<?= $this->session->success; ?>') {
      Toast.fire({
        icon: 'success',
        title: '<?= $this->session->success; ?>',
      });
    }

    const addToWishlist = (data) => {
      const id_produk = data.dataset.idProduk;
      $.ajax({
        url: '<?= base_url(); ?>wishlist',
        method: 'POST',
        data: {'id_produk': id_produk},
        cache: false,
        success: (response) => {
          switch (response) {
            case 'success':
              Toast.fire({
                icon: 'success',
                title: 'Berhasil menambah produk',
              });
              break;
            case 'error':
              Toast.fire({
                icon: 'error',
                title: 'Produk sudah ada',
              });
              break;
          
            default:
              break;
          }
        },
        error: (e) => {
          Toast.fire({
            icon: 'error',
            title: 'Unknown error occured',
          });
        }
      });
    }

    // {
    //   "status_code":"201",
    //   "status_message":"Transaksi sedang diproses","transaction_id":"f41ca0fd-d544-4ee9-a1b2-f5b85a302373",
    //   "order_id":"1270640099",
    //   "gross_amount":"94000.00",
    //   "payment_type":"bank_transfer",
    //   "transaction_time":"2022-06-04 08:36:38",
    //   "transaction_status":"pending",
    //   "va_numbers":[
    //     {
    //       "bank":"bri",
    //       "va_number":"088783754935698040"
    //     }
    //   ],
    //   "fraud_status":"accept",
    //   "pdf_url":"https://app.sandbox.midtrans.com/snap/v1/transactions/775326e6-d17f-4033-9098-7b93f729bdba/pdf",
    //   "finish_redirect_url":"http://example.com?order_id=1270640099&status_code=201&transaction_status=pending"
    // }
  </script>
</body>

</html>