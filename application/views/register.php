<?php $this->load->view('templates/header'); ?>
<!-- Contact Start -->
<div class="container-fluid pt-5">
  <div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Register</span></h2>
  </div>
  <div class="row px-xl-5">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 mb-5">
      <div class="contact-form">
        <form
          novalidate="novalidate"
          action="<?= base_url(); ?>register"
          method="post"
        >
          <div class="control-group">
            <input
              type="text"
              class="form-control"
              id="nama"
              placeholder="Masukan Nama"
              required="required"
              data-validation-required-message="Masukan nama"
              name="nama"
            />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="Masukan email"
              required="required"
              data-validation-required-message="Masukan email"
              name="email"
            />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input
              type="text"
              class="form-control"
              id="username"
              placeholder="Username"
              required="required"
              data-validation-required-message="Masukan username"
              name="username"
            />
            <p class="help-block text-danger"></p>
          </div>
          <div class="control-group">
            <input
              type="password"
              class="form-control"
              id="password"
              placeholder="Password"
              required="required"
              data-validation-required-message="Masukan password"
              name="password"
            />
            <p class="help-block text-danger"></p>
          </div>
          <div>
            <button class="btn btn-primary py-2 px-4" type="submit">
              Register
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>
<!-- Contact End -->
<?php $this->load->view('templates/footer'); ?>