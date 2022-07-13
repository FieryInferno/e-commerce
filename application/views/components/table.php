<table id="example1" class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>No</th>
    <?php
      foreach ($th as $key => $value) { ?>
        <th><?= $key; ?></th>
      <?php }
    ?>
  </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;

      foreach ($data as $keyData => $valueData) { ?>
        <tr>
          <td><?= $no++; ?></td>
          <?php
            foreach ($th as $keyTh => $valueTh) { ?>
              <td>
                <?php
                  if (isset($valueTh['render'])) {
                    echo $valueTh['render']($valueData);
                  } else {
                    echo $valueData[$valueTh['name']];
                  }
                ?>
              </td>
            <?php }
          ?>
        </tr>
      <?php }
    ?>
  </tbody>
</table>