<select name="kelurahan_idd" class="form-control input-sm" id="kelurahan_idd">
                                <?php foreach ($kelurahan->result() as $row) {
          ?>
          <option value="<?php echo $row->id_desa; ?>"><?php echo $row->nama_desa; ?></option>
          <?php
          }
          ?>
</select>