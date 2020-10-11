<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            PERDAGANGAN
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Perdagangan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
       <?php echo form_open_multipart('Sarana_perdagangan/proses_tambah_sarana_perdagangan') ?>
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
                   <td style="padding:  20px"><label>Pasar Umum</label></td>
                   <td><input type="number" class="form-control" name="pasar_umum" placeholder="pasar umum" autocomplete="off"></td>
               </tr>
               <tr>
                 <td style="padding:  20px"><label>Toko</label></td>
                 <td><input type="number" class="form-control" name="toko" placeholder="toko" autocomplete="off"></td>
             </tr>
             <tr>
               <td style="padding:  20px"><label>Rumah Makan</label></td>
               <td><input type="number" class="form-control" name="rumah_makan" placeholder="rumah makan" autocomplete="off"></td>
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
