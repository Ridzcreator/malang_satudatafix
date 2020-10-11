<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Banyak Kendaraan Lulus Uji Menurut Jenis<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Bibit</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Banyak Kendaraan Lulus Uji Menurut Jenis dan Status Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Banyak Kendaraan</a>
            </td>
          
             <td>
            <a class="btn btn-success" href="../grafikbanyakkendaraan/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
            <td><div>
            <select name="tahun" id="tahun" required>
                <option value="0000"> Pilih Tahun </option>
                <?php
                foreach ($datasx->result_array() as $a){
                $periode=$a['periode'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
       <table class="table table-bordered table-striped compact cell-border" style="font-size:15px;  text-align:center" id="tampil_banyak_detail_kendaraan">
                <thead>
                    <tr>
                        
                        <th style="vertical-align:middle;width:25px;  text-align:center;" rowspan="2">No</th>
                      <!--   <th style="vertical-align:middle; width:100px;   text-align:center; " rowspan="2" >Kecamatan</th> -->
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Bulan</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Jenis</th>
                        <th style="vertical-align:middle;width:90px;  text-align:center;" rowspan="2">MPU</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Bus</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Mobil Barang</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" colspan="2">Kereta</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Kendaraan Khusus</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Jumlah</th>
                         <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Tahun</th>
                        <th style="vertical-align:middle;width:150px;text-align:center;  text-align:center;" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th style="width:100px;  text-align:center;" >Gandeng</th>
                        <th style="width:100px;  text-align:center;">Tempel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=0;
                    foreach ($data->result_array() as $a) {
              
                        $no++;
                        $id = $a['id_kendaraan'];
                        // $name=$a['nama_kecamatan'];
                        $bulan=$a['keterangan'];
                        $jenis=$a['jenis'];
                        $mpu=$a['mpu'];
                        $bus=$a['bus'];
                        $mobil=$a['mobil'];
                        $gandeng=$a['gandeng'];
                        $tempel=$a['tempel'];
                        $khusus=$a['khusus'];
                        $jumlah=$a['jumlah'];
                        $periode=$a['periode'];

                        ?>

                         <tr>
                        <td><?php echo number_format($no,0,",",".");?></td>
                        <td style="text-align:center;"><?php echo $bulan;?></td>
                        <td style="text-align:center;"><?php echo $jenis;?></td>
                        
                        <td style="text-align:center;"><?php echo $mpu; ?></td>
                        <td style="text-align:center;"><?php echo $bus;?></td>
                        <td style="text-align:center;"><?php echo $mobil;?></td>
                        <td style="text-align:center;"><?php echo $gandeng;?></td>
                        <td style="text-align:center;"><?php echo $tempel;?></td>
                        <td style="text-align:center;"><?php echo $khusus;?></td>
                        <td style="text-align:center;"><?php echo $jumlah;?></td>
                        <td style="text-align:center;"><?php echo $periode;?></td>
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>
                        
                        
                    <?php } 


                    ?>

                </tbody>
                <tfoot>
                <?php
                    foreach ($semua->result_array() as $b) {
              
                        $periode=$b['periode'];
                        $mpu=$b['mpu'];
                        $bus=$b['bus'];
                        $mobil=$b['mobil'];
                        $gandeng=$b['gandeng'];
                        $tempel=$b['tempel'];
                        $khusus=$b['khusus'];
                        $jumlah=$b['jumlah']; ?>
                        <th style="text-align:center;" colspan="3">Jumlah Total</th>
                       
                        <th style="text-align:center;"><?php echo $mpu; ?></th>
                        <th style="text-align:center;"><?php echo $bus;?></th>
                        <th style="text-align:center;"><?php echo $mobil;?></th>
                        <th style="text-align:center;"><?php echo $gandeng;?></th>
                        <th style="text-align:center;"><?php echo $tempel;?></th>
                        <th style="text-align:center;"><?php echo $khusus;?></th>
                        <th style="text-align:center;"><?php echo $jumlah;?></th>
                        <th style="text-align:center;"><?php echo $periode;?></th>
                        <th></th>

                        <?php 
                    }
                        ?>
                </tr>
                <tr>
                <?php
                    foreach ($umum->result_array() as $b) {
                        $jenis=$b['jenis'];
                        $periode=$b['periode'];
                        $mpu=$b['mpu'];
                        $bus=$b['bus'];
                        $mobil=$b['mobil'];
                        $gandeng=$b['gandeng'];
                        $tempel=$b['tempel'];
                        $khusus=$b['khusus'];
                        $jumlah=$b['jumlah']; ?>
                        <th style="text-align:center;" colspan="2">Jumlah</th>
                        <th style="text-align:center;"><?php echo $jenis;?></th>
                        <th style="text-align:center;"><?php echo $mpu; ?></th>
                        <th style="text-align:center;"><?php echo $bus;?></th>
                        <th style="text-align:center;"><?php echo $mobil;?></th>
                        <th style="text-align:center;"><?php echo $gandeng;?></th>
                        <th style="text-align:center;"><?php echo $tempel;?></th>
                        <th style="text-align:center;"><?php echo $khusus;?></th>
                        <th style="text-align:center;"><?php echo $jumlah;?></th>
                        <th style="text-align:center;"><?php echo $periode;?></th>
                        <th></th>

                        <?php 
                    }
                        ?>
                </tr>
                <tr>
                <?php
                    foreach ($bukan->result_array() as $b) {
                        $jenis=$b['jenis'];
                        $periode=$b['periode'];
                        $mpu=$b['mpu'];
                        $bus=$b['bus'];
                        $mobil=$b['mobil'];
                        $gandeng=$b['gandeng'];
                        $tempel=$b['tempel'];
                        $khusus=$b['khusus'];
                        $jumlah=$b['jumlah']; ?>
                        <th style="text-align:center;" colspan="2">Jumlah</th>
                        <th style="text-align:center;"><?php echo $jenis;?></th>
                        <th style="text-align:center;"><?php echo $mpu; ?></th>
                        <th style="text-align:center;"><?php echo $bus;?></th>
                        <th style="text-align:center;"><?php echo $mobil;?></th>
                        <th style="text-align:center;"><?php echo $gandeng;?></th>
                        <th style="text-align:center;"><?php echo $tempel;?></th>
                        <th style="text-align:center;"><?php echo $khusus;?></th>
                        <th style="text-align:center;"><?php echo $jumlah;?></th>
                        <th style="text-align:center;"><?php echo $periode;?></th>
                        <th></th>

                        <?php 
                    }
                        ?>
                </tr>
                </tfoot>
        </table>
        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Banyak Kendaraan Menurut Jenis dan Statusnya</h3>
                    </div>
                    <?php echo form_open_multipart('Banyakkendaraan/proses_input_detail_kendaraan/'.$this->uri->segment(3)) ?>

                    <div class="modal-body">
                    <div class="modal-body">
                    
                    <table>
                        <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                          
                            <input type="text" name="periode" class="form-control" value="<?php echo $this->uri->segment(3) ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Bulan</label></td><td>:</td>
                            <td>
                              <select name="bulan" class="form-control">
                          <?php foreach ($datax->result() as $row) {
                          ?>
                          <option value="<?php echo $row->kode; ?>"><?php echo $row->keterangan; ?></option>
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
                                <option value="Umum">Umum</option>
                                <option value="Bukan">Bukan</option>
                                  </select>
                             </td>
                        </tr>
                        <tr>
                            <td><label>Banyak MPU</label></td><td>:</td>
                            <td><input name="mpu" class="form-control" type="number" placeholder="Banyak MPU..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Banyak BUS</label></td><td>:</td>
                            <td><input name="bus" class="form-control" type="number" placeholder="Banyak BUS..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Banyak Mobil Barang</label></td><td>:</td>
                            <td><input name="barang" class="form-control" type="number" placeholder="Banyak Mobil Barang..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Banyak Kereta Gandeng</label></td><td>:</td>
                            <td><input name="gandeng" class="form-control" type="number" placeholder="Banyak Kereta Gandeng..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Banyak Kereta Tempel</label></td><td>:</td>
                            <td><input name="tempel" class="form-control" type="number" placeholder="Banyak Kereta Tempel..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Kendaraan Khusus</label></td><td>:</td>
                            <td><input name="khusus" class="form-control" type="number" placeholder="Luas Tanah..." style="width:335px;" required></td>
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
                        $id = $a['id_kendaraan'];
                        // $name=$a['nama_kecamatan'];
                        $bulan=$a['bulan'];
                        $jenis=$a['jenis'];
                        $mpu=$a['mpu'];
                        $bus=$a['bus'];
                        $mobil=$a['mobil'];
                        $gandeng=$a['gandeng'];
                        $tempel=$a['tempel'];
                        $khusus=$a['khusus'];
                        $jumlah=$a['jumlah'];
                        $kode_bulan=$a['bulan'];
                        $periode=$a['periode'];

                        ?>
   
   <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data</h3>
                    </div>
                    <?php echo form_open_multipart('Banyakkendaraan/proses_edit_detail_kendaraan/'.$this->uri->segment(3)) ?>
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
                            <td><label>Bulan</label></td><td>:</td>
                            <td>
                            <select name="bulan" class="form-control">    
                          <?php foreach($datax->result() as $key => $data){ ?>
                                <option value="<?=$data->kode?>" <?=$data->kode == $kode_bulan ? "selected" : null?>><?=$data->keterangan?></option>
                                <?php } ?>
                          </select>
                        </td>
                        </tr>
                       <tr>
                            <td><label>Tipe Terminal</label></td><td>:</td>
                            <td>
                               <select name="tipe" class="form-control">
                                <?php if ($jenis=='Bukan'):?>
                                 <option value="Umum" selected>Umum</option>
                                <option value="Bukan" selected>Bukan</option>

                                   <?php else:?>
                               <option value="Umum" selected>Umum</option>
                                <option value="Bukan" >Bukan</option>
                                 <?php endif;?>
                          </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Banyak MPU</label></td><td>:</td>
                            <td><input name="mpu" class="form-control" type="number" value="<?php echo $mpu; ?>" placeholder="Banyak MPU..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Banyak BUS</label></td><td>:</td>
                            <td><input name="bus" class="form-control" value="<?php echo $bus; ?>" type="number" placeholder="Banyak BUS..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Banyak Mobil Barang</label></td><td>:</td>
                            <td><input name="barang" class="form-control" value="<?php echo $mobil; ?>" type="number" placeholder="Banyak Mobil Barang..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Banyak Kereta Gandeng</label></td><td>:</td>
                            <td><input name="gandeng" class="form-control" value="<?php echo $gandeng; ?>" type="number" placeholder="Banyak Kereta Gandeng..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Banyak Kereta Tempel</label></td><td>:</td>
                            <td><input name="tempel" class="form-control" value="<?php echo $tempel; ?>" type="number" placeholder="Banyak Kereta Tempel..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Kendaraan Khusus</label></td><td>:</td>
                            <td><input name="khusus" class="form-control" value="<?php echo $khusus; ?>" type="number" placeholder="Luas Tanah..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('Banyakkendaraan/proses_delete_detail_kendaraan/'.$this->uri->segment(3)) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Distribusi Tanaman</h3>
                    </div>
                    <?php echo form_open_multipart('DistribusiBibit/grafik_perbandinganx') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            
                          
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
     <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Banyakkendaraan'); ?>">Back</a>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
