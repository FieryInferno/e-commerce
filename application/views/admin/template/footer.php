
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<div class="modal fade" id="logout">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Logout</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url(); ?>logout" method="post">
        <div class="modal-body">
          Anda yakin akan keluar?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php $this->load->view('admin/template/script'); ?>
<script>
  $(function () {
    $("#example1").DataTable()
    $('.select2').select2({
      placeholder: "Masukan",
      allowClear: true
    })

    let Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
    
    if ('<?= $this->session->success; ?>') {
      Toast.fire({
        icon: 'success',
        title: '<?= $this->session->success; ?>',
      })
    }
    
    if ('<?= $this->session->message; ?>') {
      Toast.fire({
        icon: 'error',
        title: '<?= $this->session->message; ?>',
      })
    }
  });

  const previewImg = () => {
    const gambar      = document.querySelector('#image');
    const imgPreview  = document.querySelector('.img-preview');
    // label.textContent = gambar.files[0].name;
    const file = new FileReader();
    file.readAsDataURL(gambar.files[0]);
    file.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }

  const addWarna = (index) => {
    $('#warna').append(
      `
        <div class="input-group" id="input-group${index + 1}">
          <input type="text" class="form-control" placeholder="Warna" name="warna[]">
          <div class="input-group-append" id="input-group-append${index + 1}" onclick="addWarna(${index + 1})">
            <span class="input-group-text bg-success text-primary">
              <i class="fa fa-plus"></i>
            </span>
          </div>
        </div>
      `
    );

    $(`#input-group-append${index}`).attr('onclick', `hapusWarna(${index})`);

    $(`#input-group-append${index}`).html(
      `
        <span class="input-group-text bg-danger text-primary">
          <i class="fa fa-trash"></i>
        </span>
      `
    );
  }

  const hapusWarna = (index) => {
    $(`#input-group${index}`).remove();
  }
</script>
</body>
</html>
