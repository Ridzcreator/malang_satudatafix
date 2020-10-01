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
           <?php echo form_open_multipart('Pasar_tradisional/proses_tambah_pasar_tradisional') ?>
                  <div class="box-body">
                        <div class="form-group">
                            <label>Nama Pasar</label>
                            <input type="text" class="form-control" name="nama_pasar" placeholder="Nama Pasar" required autocomplete="off">
                        </div>
                         <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <input type="text" class="form-control" name="alamat_lengkap" placeholder="Alamat" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Luas Lahan</label>
                            <input type="number" class="form-control" name="luas_lahan" placeholder="Luas" autocomplete="off">
                        </div>
                         <div class="form-group">
                            <label>Luas Bangunan</label>
                            <input type="number" class="form-control" name="luas_bangunan" placeholder="Luas" autocomplete="off">
                        </div>
                         <div class="form-group">
                            <label>Pengelola</label>
                            <input type="text" class="form-control" name="pengelola" placeholder="Pengelola" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Tahun Berdiri</label>
                            <input type="number" class="form-control" name="tahun_berdiri" placeholder="Tahun Berdiri" autocomplete="off">
                        </div>
                         <div class="form-group">
                            <label>Tahun Terakhir</label>
                            <input type="number" class="form-control" name="tahun_terakhir" placeholder="Tahun Terakhir" autocomplete="off">
                        </div>
                         <div class="form-group">
                            <label>Kondisi Fisik</label>
                            <input type="text" class="form-control" name="kondisi_fisik" placeholder="Kondisi" autocomplete="off">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success" name="add" value="Save"> &nbsp &nbsp 
                            <button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                        <a class="btn btn-primary" href="../pasar_tradisional">Back</a>
                        </div>
                  </div>
          <?php echo form_close(); ?>
    </section>
    <!-- /.content -->

</div>
