<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            KELOLA DATA KEPEMUDAAN & OLAHRAGA
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kepemudaan & Olahraga</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
           <?php echo form_open_multipart('Atlet/proses_input_atlet') ?>
                  <div class="box-body">
                        <div class="form-group">
                            <label>Cabang Olahraga </label>
                            <input type="text" class="form-control" name="cabang" placeholder="" required>
                        </div>
                         <div class="form-group">
                            <label>Jumlah Prestasi</label>
                            <input type="number" class="form-control" name="prestasi" value="0" placeholder="Jumlah Prestasi" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Pembinaan</label>
                            <input type="number" class="form-control" name="bina" value="0" placeholder="Jumlah Pembinaan" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number" class="form-control" name="tki" placeholder="Masukkan Tahun" value="0" required>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success" value="Save"> &nbsp &nbsp 
                            <button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                        <a class="btn btn-primary" href="<?php echo base_url('Atlet'); ?>">Back</a>
                        </div>
                  </div>
          <?php echo form_close(); ?>
    </section>
    <!-- /.content -->

</div>


