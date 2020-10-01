<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Lokasi dan Luas Terminal<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Lokasi Terminal</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Lokasi, Kategori, dan Luas Terminal Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Lokasi Terminal</a>
            </td>
          
            
          
        </tr>
        </table>
       <table class="table table-bordered table-striped compact cell-border" style="font-size:15px;  text-align:center" id="tampildetail">
                <thead>
                    <tr>
                        
                        <th style="vertical-align:middle;width:25px;  text-align:center;" rowspan="2">No</th>
                      <!--   <th style="vertical-align:middle; width:100px;   text-align:center; " rowspan="2" >Kecamatan</th> -->
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Lokasi Terminal</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Tipe</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" colspan="2">Luas</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Keterangan</th>
                         <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Tahun</th>
                        <th style="vertical-align:middle;width:150px;text-align:center;  text-align:center;" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th style="width:100px;  text-align:center;" >Tanah</th>
                        <th style="width:100px;  text-align:center;">Bangungan</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=0;
                    foreach ($data->result_array() as $a) {
                        # code...
                        $no++;
                        $id = $a['id_lokasi'];
                        $nama_terminal=$a['nama_terminal'];
                        $tipe=$a['type'];
                        $luas=$a['luas_tanah'];
                        $bangunan=$a['bangunan'];
                        $keterangan=$a['keterangan'];
                        $periode=$a['periode'];

                        ?>
                        <tr>
                         <td><?php echo $no; ?></td>
                        <td><?php echo $nama_terminal; ?></td>
                        <td><?php echo $tipe; ?></td>  
                        <td><?php echo $luas; ?></td>  
                        <td><?php echo $bangunan; ?></td>
                        <td><?php echo $keterangan; ?></td>
                        <td><?php echo $periode; ?></td>
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Hapus</a>
                        </td>


                        </tr>
                


                        <?php
                     }   
                     ?>

                </tbody>
        </table>
        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Lokasi dan Kategori Terminal</h3>
                    </div>
                    <?php echo form_open_multipart('Lokasi_terminal/proses_input_detail_terminal/'.$this->uri->segment(3)) ?>

                    <div class="modal-body">
                    <div class="modal-body">
                    
                    <table>
                        <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                            <input type="text" class="form-control" name="periode" value="<?php echo $this->uri->segment(3); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Lokasi Terminal</label></td><td>:</td>
                            <td>
                               <select name="terminal" class="form-control">
                                  <?php foreach ($terminal->result() as $row) {
                                  ?>
                                  <option value="<?php echo $row->id_terminal; ?>"><?php echo $row->nama_terminal; ?></option>
                                  <?php
                                  }
                                  ?>
                                  </select>
                             </td>
                        </tr>
                        <tr>
                            <td><label>Tipe</label></td><td>:</td>
                            <td>
                               <select name="tipe" class="form-control">
                               <option value="">Pilih Tipe</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                  </select>
                             </td>
                        </tr>
                        <tr>
                            <td><label>Luas Tanah</label></td><td>:</td>
                            <td><input name="tanah" class="form-control" type="number" placeholder="Luas Tanah..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Luas Bangunan</label></td><td>:</td>
                            <td><input name="bangunan" class="form-control" type="number" placeholder="Luas Tanah..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Keterangan</label></td><td>:</td>
                            <td>
                               <input type="text" name="keterangan" class="form-control" placeholder="Input Keterangan ...">
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
         <?php
                    $no=0;
                    foreach ($data->result_array() as $a) {
                      $no++;
                        $id = $a['id_lokasi'];
                        $lokasi=$a['lokasi_terminal']; 
                        $tipe=$a['type'];  
                        $tanah=$a['luas_tanah']; 
                        $bangunan=$a['bangunan'];      
                        $keteranganx=$a['keterangan'];
                        $periode=$a['periode'];                   
            ?>
   
   <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data</h3>
                    </div>
                    <?php echo form_open_multipart('Lokasi_terminal/proses_edit_detail_terminal/'.$this->uri->segment(3)) ?>
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
                            <td><label>Lokasi Terminal</label></td><td>:</td>
                            <td>
                            <select name="terminal" class="form-control">    
                          <?php foreach($terminal->result() as $key => $data){ ?>
                                <option value="<?=$data->id_terminal?>" <?=$data->id_terminal == $lokasi ? "selected" : null?>><?=$data->nama_terminal?></option>
                                <?php } ?>
                          </select>
                        </td>
                        </tr>
                       <tr>
                            <td><label>Tipe Terminal</label></td><td>:</td>
                            <td>
                               <select name="tipe" class="form-control">
                                <?php if ($tipe=='A'):?>
                                <option value="A" selected>A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>

                                   <?php elseif ($tipe=='B'):?>
                               <option value="A">A</option>
                                <option value="B" selected>B</option>
                                <option value="C">C</option>
                            <?php elseif ($tipe=='C'):?>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C" selected>C</option>
                                 <?php endif;?>
                          </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Luas Tanah</label></td><td>:</td>
                            <td><input name="tanah" class="form-control" type="text"  value="<?php echo $tanah;?>" placeholder="Layak..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Luas Bangunan</label></td><td>:</td>
                            <td><input name="bangunan" class="form-control" type="text"  value="<?php echo $bangunan;?>" placeholder="Layak..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Keterangan</label></td><td>:</td>
                            <td>
                            <input type="text" name="keterangan" class="form-control" value="<?php echo $keteranganx ?>">
                          </td>
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
                <?php echo form_open_multipart('Lokasi_terminal/proses_delete_detail_terminal/'.$this->uri->segment(3)) ?>
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
        
     <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('DistribusiBibit/tampil_crosstab_bibit')) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Lokasi Terminal</h3>
                    </div>
                    <?php echo form_open_multipart('Lokasi_terminal/grafik_perbandinganx') ?>
                    <div class="modal-body">
                    <table>

                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="A">Terminal Tipe A</option>
                            <option value="B">Terminal Tipe B</option>
                            <option value="C">Terminal Tipe C</option>
                            
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
