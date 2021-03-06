<form action="<?= $action; ?>" method="post">
  <div class="card-body">
    <?php
      foreach ($fields as $key => $value) {
        if ($value['type'] === 'hidden') { ?>
          <input type="hidden" name="<?= $key; ?>" value="<?= $value['value']; ?>">
          <?php } else { ?>
            <div class="form-group">
              <label for="namaKategori"><?= $value['label']; ?></label>
              <?php
                switch ($value['type']) {
                  case 'hidden': ?>
                    <?php break;

                  case 'input': ?>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="<?= $value['placeholder']; ?>"
                      name="<?= $key; ?>"
                    >
                    <?php break;

                  case 'select': ?>
                    <select class="form-control select2" style="width: 100%;" name="<?= $key; ?>">
                      <option></option>
                      <?php
                        foreach ($value['data'] as $data) { ?>
                          <option value="<?= $data[$value['value']]; ?>"><?= $data[$value['labelOption']]; ?></option>
                        <?php }
                      ?>
                    </select>
                    <?php break;
                  
                  default:
                    # code...
                    break;
                }
              ?>
            </div>
          <?php }
        ?>
      <?php }
    ?>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
