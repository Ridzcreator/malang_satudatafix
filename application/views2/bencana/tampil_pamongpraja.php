<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Polisi Pamong Praja<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pemadam</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Unit Polisi Pamong Praja Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Pamong Praja</a>
            </td>
            <td>
            <a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a>
            </td>
            <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
            </td>
            <td><div>
            <select name="tahun" id="tahun" required>
                <?php 
                foreach ($periode->result_array() as $a) {
                        $tahun = $a['periode'];
                ?><option value="<?php echo $tahun; ?>"> Pilih Tahun </option>
                <?php
                }
                foreach ($datasx->result_array() as $a){
                $periode=$a['periode'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center"  id="tampilpamong">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle">No</th>                
                        <th style="text-align:center;width:8%;vertical-align:middle">Jenis Kelamin</th>
                        <th style="width:8%;text-align:center;vertical-align:middle">Jumlah</th>
                        <th style="width:10%;text-align:center;vertical-align:middle">Tahun</th>
                        <th style="width:25%;text-align:center;vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <th style="text-align:center; " colspan="2">Total</th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; " colspan="2"></th>
                
                </tfoot>
        </table>
        
         <?php
                    $no=0;
                    foreach ($data->result_array() as $a) {
                      $no++;
                        $id = $a['id'];
                        $jenis_kelamin=$a['jeniskelamin'];
                       
                        $jumlah=$a['jumlah'];
                        $periode=$a['periode'];                   
            ?>
   
   <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data</h3>
                    </div>
                    <?php echo form_open_multipart('Pamongpraja/proses_edit_pamong') ?>
                    <div class="modal-body">
                    <?php $nama = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $nama;?>" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <input type="hidden" name="status" value="0"> 
                    <table>
                       <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $periode;?>" placeholder="Tahun Periode Laporan..." style="width:335px;" required></td>
                        </tr>
                       <tr>
                            <tr>
                            <td><label>Jenis Kelamin</label></td><td>:</td>
                            <td>
                               <select name="kelamin" class="form-control">
                                <?php if ($jenis_kelamin=='Laki-laki'):?>
                                <option value="Laki-laki" selected>Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                   <?php elseif ($jenis_kelamin=='Perempuan'):?>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan" selected>Perempuan</option>
                                 <?php endif;?>
                          </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td><input name="jumlah" class="form-control" type="number"  value="<?php echo $jumlah?>" placeholder="Layak..." style="width:335px;" required></td>
                        </tr>
                        
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success" value="Update"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    
    <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart('Pamongpraja/proses_delete_pamong') ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="kodeinput" type="hidden" value="<?php echo $id; ?>">
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
                <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    
<?php } ?> 

       <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pamong</h3>
                    </div>
                    <?php echo form_open_multipart('Pamongpraja/proses_input_pamong') ?>

                    <div class="modal-body">
                    <div class="modal-body">
                    
                    <table>
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
                            <td><label>Jenis Kelamin</label></td><td>:</td>
                            <td>
                                <select name="kelamin" class="form-control">
                                <option value="Laki-laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                          </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td><input name="jumlah" class="form-control" type="number" placeholder="Jumlah..." style="width:335px;" required></td>
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
     <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('Pamongpraja/tampil_crosstab_pamong')) ?>
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
    <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Pamong Praja</h3>
                    </div>
                    <?php echo form_open_multipart('Pamongpraja/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="Laki-laki">Polisi Pamong Praja Laki - laki</option>
                            <option value="Perempuan">Polisi Pamong Praja Perempuan</option>
                          
                            </select>
                            </td>
                        </tr>
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

    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
