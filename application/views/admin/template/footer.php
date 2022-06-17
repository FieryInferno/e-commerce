
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
          <button type="submit" class="btn btn-danger">Logout</button>
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
    $("#example1").DataTable({
      responsive: true,
      scrollX: true,
    });
    $('#summernote').summernote();
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
  
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  });

  const tabelGambar = $('#table-gambar').DataTable({
    "processing": true,
    "responsive":true,
    "serverSide": true,
    "ordering": true, // Set true agar bisa di sorting
    "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
    "ajax": {
      "url": "<?= base_url('gambar/' . $id_produk);?>",
      "type": "POST"
    },
    "deferRender": true,
    "columns": [
      {
        "data": 'id_gambar',
        "sortable": false, 
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }  
      },
      {
        "data": "gambar",
        "render": ( data, type, row, meta ) => `<img src="<?= base_url('assets/image/'); ?>${data}" class="d-block w-100" alt="...">`,
      },
      {
        "data": "id_gambar",
        "render": ( data, type, row, meta ) => {
          return `
            <button
              type="button"
              class="btn btn-sm btn-danger"
              data-toggle="modal"
              data-target="#modal${data}"
            >
              Hapus
            </button>

            <div class="modal fade" id="modal${data}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form>
                    <div class="modal-body">
                      Anda yakin akan menghapus gambar ini?
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <div class="btn btn-danger" onClick="hapusGambar('${data}')">Hapus</div>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>`;
        }
      },
    ],
  });

  const hapusGambar = (id_gambar) => {
    $.ajax({
      type: 'POST',
      url: `<?= base_url(); ?>gambar/delete/${id_gambar}`,
      success: () => {
        $('#modal' + id_gambar).modal('hide')
        tabelGambar.ajax.reload();
      },
      error: (response) => console.log(response),
    });
  }

  const previewImg = () => {
    const gambar      = document.querySelector('#image');
    const reader = new FileReader();

    const readFile = (index) => {
      if( index >= gambar.files.length ) return;
      const file = gambar.files[index];
      reader.onload = function(e) {  
        // get file content  
        const bin = e.target.result;
        
        $('#productImages').append(`<img class="img-thumbnail img-preview" id="anggota-img" width="40%" src="${bin}">`);
        readFile(index+1)
      }
      reader.readAsDataURL(file);
    }

    readFile(0);
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
