<b><body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Banyak Korban Bencana Alam<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Korban</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Banyak Korban Bencana Alam Menurut Jenis Korban Kabupaten Malang </h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Korban Bencana</a>
            </td>
             <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
            </td>
            <td><div>
            <select name="tahun" id="tahun" required>
             <option value =""> Pilih Tahun </option>
                <?php 
                foreach ($datasx->result_array() as $a){
                $periode=$a['periode'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border" style=" font-size:15px; width:100%; text-align:center"   id="tampilKorban">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle" rowspan="2">No</th>             
                        <th style=" text-align:center;width:15%;vertical-align:middle" rowspan="2">Periode</th>
                        <th style="width:30%;text-align:center;vertical-align:middle" colspan="4">Usia</th>
                        <th style="width:10%;text-align:center;vertical-align:middle" rowspan="2">Jumlah</th>
                        
                        <th style="width:20%;text-align:center;vertical-align:middle" rowspan="2">Aksi</th>
                    </tr>
                     <tr>
                        <th style="width:100px;  text-align:center;" >0 - 10</th>
                        <th style="width:100px;  text-align:center;">10 - 20</th>
                        <th style="width:100px;  text-align:center;">20 - 35</th>
                        <th style="width:100px;  text-align:center;">> - 35</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
            <tr>
                <th style="text-align:center; " colspan="6">Total</th>
          <!--       <th style="text-align:right; "></th>
                <th style="text-align:right; "></th>
                <th style="text-align:right; "></th>
                <th style="text-align:right; "></th> -->
                <th style="text-align:center; ">Total:</th>
                <th style="text-align:center; "></th>
            
            </tr>
        </tfoot>
        </table>
        

             <?php
                    $no=0;
                    foreach ($data->result_array() as $a) {
                      $no++;
                         $id = $a['id'];
                        $jeniskorban=$a['jeniskorban'];
                        $nol=$a['nol'];
                        $sepuluh=$a['sepuluh'];
                        $duapuluh=$a['duapuluh'];
                        $tigalima=$a['tigalima'];
                        // $jumlah=$a['jumlah'];
                        $periode=$a['periode'];
                                         
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data</h3>
                    </div>
                    <?php echo form_open_multipart('jeniskorban/proses_edit_jenis') ?>

                    <div class="modal-body">
                    <?php $name = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <input type="hidden" name="status" value="0"> 
                    <table id="tabel">
                      <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $periode;?>" placeholder="Tahun Periode Laporan..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Jenis Korban</label></td><td>:</td>
                            <td>
                                <select name="jeniskorban" class="form-control">
                                <?php if ($jeniskorban=='Mati'):?>
                                <option value="Mati" selected>Mati</option>
                                <option value="Luka">Luka</option>
                                 <option value="Menderita">Menderita</option>
                                   <?php elseif ($jeniskorban=='Luka'):?>
                                <option value="Mati">Mati</option>
                                <option value="Luka" selected>Luka</option>
                                 <option value="Menderita">Menderita</option>
                                   <?php else :?>
                                <option value="Mati">Mati</option>
                                <option value="Luka">Luka</option>
                                 <option value="Menderita" selected>Menderita</option>
                                 <?php endif;?>
                          </select>
                        </td>
                        </tr>
                         <tr>
                            <td><label>Usia 0 - 10</label></td><td>:</td>
                            <td><input name="0" class="form-control" type="number" value="<?php echo $nol; ?>" placeholder="Usia 0 - 10..."  style="width:335px;" id="10" required></td>
                        </tr> 
                        <tr>
                            <td><label>Usia 10 - 20</label></td><td>:</td>
                            <td><input name="10" class="form-control" type="number" id="11" value="<?php echo $sepuluh; ?>"  placeholder="Usia 10 - 20..."  style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Usia 20 - 35</label></td><td>:</td>
                            <td><input name="20" class="form-control" type="number" id="12" value="<?php echo $duapuluh; ?>"  placeholder="Usia 20 - 35..."  style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Usia lebih dari 35</label></td><td>:</td>
                            <td><input name="35" class="form-control" type="number" value="<?php echo $tigalima; ?>"  placeholder="Usia lebih dari 35..."  style="width:335px;" id="13" required></td>
                        </tr> 
                      
                         <input class="form-control" type="hidden" name="status" value="0" style="width:335px;" readonly>
                        
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
                <?php echo form_open_multipart('jeniskorban/proses_delete_jenis') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Korban</h3>
                    </div>
                    <?php echo form_open_multipart('jeniskorban/proses_input_jenis') ?>

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
                            <td><label>Jenis Korban</label></td><td>:</td>
                            <td>
                                <select name="jeniskorban" class="form-control">
                                <option value="Mati">Mati</option>
                                <option value="Luka">Luka</option>
                                 <option value="Menderita">Menderita</option>
                          </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Usia 0 - 10</label></td><td>:</td>
                            <td><input name="0" class="form-control" type="number" placeholder="Usia 0 - 10..."  style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Usia 10 - 20</label></td><td>:</td>
                            <td><input name="10" class="form-control" type="number" placeholder="Usia 10 - 20..."  style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Usia 20 - 35</label></td><td>:</td>
                            <td><input name="20" class="form-control" type="number" placeholder="Usia 20 - 35..."  style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Usia lebih dari 35</label></td><td>:</td>
                            <td><input name="35" class="form-control" type="number" placeholder="Usia lebih dari 35..."  style="width:335px;" required></td>
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
                        <h3 class="modal-title" id="myModalLabel">Grafik Data Jenis Korban</h3>
                    </div>
                    <?php echo form_open_multipart('Jeniskorban/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                            
                        </tr>
                        <tr>
                            <td><label>Pilih Model Grafik</label></td><td>:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>
                            <option value="line">Grafik Line</option>
                            </select></td>
                        </tr>
                        <tr>
                        <td><label>Tahun Grafik</label></td><td>:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datasx->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2" required>
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


