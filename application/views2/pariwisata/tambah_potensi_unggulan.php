<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            POTENSI UNGGULAN
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Potensi Unggulan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
       <?php echo form_open_multipart('C_potensi_unggulan/proses_tambah_potensi_unggulan') ?>
       <div class="box-body">
          <table width="70%">
              <tr>
               <td style="padding:  20px"><label>Kecamatan</label></td>
               <td>   <select name="kecamatan" class="form-control">
                   <?php foreach ($data->result() as $a) {
                    ?>
                    <option value="<?php echo $a->nama_kecamatan ?>"><?php echo $a->nama_kecamatan ?></option>
                    <?php
                }
                ?>
            </select></td>
        </div>
                </tr>
                <tr>
                   <td style="padding:  20px"><label>Desa</label></td>
                   <td><input type="text" class="form-control" name="desa" placeholder="Desa" required autocomplete="off"></td>
               </tr>
               <tr>
                 <td style="padding:  20px"><label>Kelembagaan</label></td>
                 <td><input type="text" class="form-control" name="kelembagaan" placeholder="Kelembagaan" autocomplete="off"></td>
             </tr>
             <tr>
               <td style="padding:  20px"><label>Potensi Unggulan</label></td>
               <td><input type="text" class="form-control" name="potensi_unggulan" placeholder="Potensi Unggulan" autocomplete="off"></td>
            </tr>
             <tr>
               <td style="padding:  20px"><label>Keterangan</label></td>
               <td><select name="keterangan" class="form-control">
                 <option value="Maju">Maju</option>
                 <option value="Maju">Berkembang</option>
                 <option value="Maju">Berpotensi</option>
               </select></td>
            </tr>
            </table>
            <div>
                <input type="submit" class="btn btn-success" name="add" value="Save"> &nbsp &nbsp 
                <button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                <a class="btn btn-primary" href="../pasar_modern">Back</a>
            </div>
            </div>
            <?php echo form_close(); ?>
            </section>
            <!-- /.content -->

</div>
