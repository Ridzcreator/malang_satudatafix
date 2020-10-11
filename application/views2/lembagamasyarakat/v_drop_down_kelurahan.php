<select name="kelurahan_id" class="form-control input-sm" id="kelurahan_id">
                                <?php foreach ($kelurahan->result() as $row) {
          ?>
          <option value="<?php echo $row->id_desa; ?>"><?php echo $row->nama_desa; ?></option>
          <?php
          }
          ?>
</select>


		<!--  <?php
        
			$style_kelurahan='class="form-control input-sm" id="kelurahan_id"';
echo form_dropdown("kelurahan_id",$kelurahan,'',$style_kelurahan);
    ?>
 -->