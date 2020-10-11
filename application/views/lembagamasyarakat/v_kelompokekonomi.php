<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Lembaga Kemasyarakatan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Lembaga</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Kelompok Ekonomi di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
            <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalInput" data-toggle="modal" title="Add">Tambah Data</a>
            </td>
            <td>
            <a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a>
            </td>
            <td>
             
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
         
            </td>
        </tr>
      
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px;   text-align:center" id="tampil_kelompok">
                <thead>
                    <tr>
                        
                        <th style="vertical-align:middle;width:25px;   text-align:center"; >No</th>
                        <th style="vertical-align:middle; width:100px;   text-align:center;">Periode</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;">Jumlah</th>
                        
                        <th style="vertical-align:middle;width:150px;text-align:center;  text-align:center;" >Aksi</th>
                    </tr>
                    
                </thead>
                <tbody>
        
                </tbody>
        </table>
        
         <div id="modalInput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Lembaga Masyarakat</h3>
                    </div>

                    <?php echo form_open_multipart('KelompokEkonomi/proses_input_lembaga') ?>

                    <div class="modal-body">
                    <div class="modal-body">
                    
                    <table width="90%">
                         <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                            <select name="periode" id="periode" class="form-control">
                            <?php
                            $tg_awal= date('Y')-10;
                            $tgl_akhir= date('Y');
                            for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                            {
                            echo "
                            <option value='$i'";
                            if(date('Y')==$i){echo "selected";}
                            echo">$i</option>";
                            }
                            ?>
                            </select></td>
                        </tr>
                         <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
                                <select name="kecamatan_id" class="form-control" id="kecamatan_id"  onChange="tampilDesa()" required>
                                <option value="">Pilih Kecamatan</option>
          <?php foreach ($kecamatan->result() as $row) {
          ?>
          <option value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
          <?php
          }
          ?>
          </select>
                        </td>
                        </tr>
                             <tr>
                            <td><label>Desa</label></td><td>:</td>
                            <td>
                                  <select name="kelurahan_id" class="form-control" id="kelurahan_id" required>
                                <option value="Pilih Desa">- Pilih Desa -</option>
</select>
                        </td>
                        </tr>
                         <tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td>
                               <input type="number" name="jumlah" class="form-control" placeholder="Input Jumlah ...">
                             </td>
                        </tr>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                         <input class="form-control" type="hidden" name="status" value="0" style="width:335px;" readonly>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    </div> 

    <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Kelompok Ekonomi</h3>
                    </div>
                    <?php echo form_open_multipart('KelompokEkonomi/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                        
                        <tr>
                            <td><label>Model Grafik</label></td><td>:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>
                            <option value="line">Grafik Line</option>
                            
                            </select></td></tr>
                            <tr>
                            <td><label>Pilih Tahun Grafik</label></td><td>:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datasx->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datasx->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select>
                        </td>
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success pull-right" value="Lihat Grafik"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    

        <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('KelompokEkonomi/tampil_crosstab_ekonomi')) ?>
                    <div class="modal-body">
                    <table>
  
                        <tr>
                        <td><label>Pilih Tahun Report</label></td><td>:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datasx->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datasx->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select>
                        </td>
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success pull-right" value="Lihat Crosstab"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
</html>
