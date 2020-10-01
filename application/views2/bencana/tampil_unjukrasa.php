<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Unjukrasa<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Unjukrasa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
   <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Unjuk Rasa Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalInput" data-toggle="modal" title="Add">Tambah Data Unjukrasa</a>
            </td>
            <td>
            <a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a>
            </td>
            <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
            </td>
            <td><div>
            <select name="tahun" id="tahun" required>
            <option value="0000"> Pilih Tahun </option>
                <?php 
                foreach ($datax->result_array() as $a){
                $periode=$a['periode'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center"  id="tampilUnjukrasa">
                <thead>
                    <tr>
                        <th style="text-align:center;width:5%;vertical-align:middle" >No</th> 
                       <th style="width:10%;text-align:center;vertical-align:middle" >Periode</th>
                        <th style="text-align:center;width:10%;vertical-align:middle" >Jumlah Unjukrasa</th>  
                        <th style="width:10%;text-align:center;vertical-align:middle" >Aksi</th>
                    </tr>
                   
                        
                </thead>
               
                 
                <tbody>
                </tbody>
        </table>

       <?php
                    $no=0;
                    foreach ($data1->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
                        $periode=$a['periode'];
                        $unjukrasa=$a['unjukrasa'];
                        $jumlah=$a['jumlah'];                
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Unjuk Rasa</h3>
                    </div>
                    <?php echo form_open_multipart('Unjukrasa/proses_edit_unjukrasa') ?>

                    <div class="modal-body">
                    <?php $name = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="status" value="0" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <table>
                       <tr>
                            <td>Periode</td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $periode;?>" placeholder="Tahun Periode Laporan..." style="width:335px;" required></td>
                        </tr>
                       <tr>
                            <td><label>Kasus Bidang Politik</label></td><td>:</td>
                            <td><select name="unjukrasa" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($datazx->result() as $key => $data){ ?>
                                <option value="<?=$data->nama_jenis?>" <?=$data->nama_jenis == $unjukrasa ? "selected" : null?>><?=$data->nama_jenis?></option>
                                <?php } ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td><input name="jumlah" class="form-control" type="number"  value="<?php echo $jumlah;?>" placeholder="Jumlah..." style="width:335px;" required></td>
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
    
    
    <div id="modalHapus<?php echo $periode?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart('Unjukrasa/proses_delete_unjukrasa') ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="kodeinput" type="hidden" value="<?php echo $periode; ?>">
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
            
   
    </div>
      <div id="modalInput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Input Data Jumlah Unjukrasa</h3>
                    </div>
                  <?php echo form_open_multipart('Unjukrasa/input_unjukrasa') ?>
                  <div class="container">
                  <div class="box-body">
                  
                  <table>
                <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                            <select name="periode" id="periode" class="form-control" onchange="myFunction(event)">
                            <option value="">Pilih Tahun</option>
                            <?php
                            $tg_awal= date('Y')-10;
                            $tgl_akhir= date('Y');
                            for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                            {       
                            echo "
                            <option value='$i'>$i</option>";    
                            }
                            ?>
                            </select></td>
                        </tr>
                
                        <tr>
                            <td><label>Bidang Politik</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Bidang Politik" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Unjukrasa Bidang Politik" required></td>
                            <input type="hidden" class="form-control" id="tahun9" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                        </tr>

                         <tr>
                            <td><label>Bidang Ekonomi</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Bidang Ekonomi" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Unjukrasa Bidang Ekonomi" required></td>
                            <input type="hidden" class="form-control" id="tahun2" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                        </tr>

                         <tr>
                            <td><label>Bidang Agama</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Bidang Agama" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Unjukrasa Bidang Agama" required></td>
                            <input type="hidden" class="form-control" id="tahun3" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                        </tr>
                           
                         <tr>
                            <td><label>Bidang Lainnya</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Bidang Lainnya" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Unjukrasa Bidang Lainnya" required></td>
                            <input type="hidden" class="form-control" id="tahun4" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                           
                        </tr>

                         <tr>
                            <td><label>Korban Meninggal</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Korban Meninggal" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Korban Unjukrasa" required></td>
                            <input type="hidden" class="form-control" id="tahun5" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                      
                        </tr>
                        
                         <tr>
                            <td><label>Korban Luka</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Korban Luka" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Korban Unjukrasa" required></td>
                            <input type="hidden" class="form-control" id="tahun6" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                        </tr>
                        
                         <tr>
                            <td><label>Jumlah Pengungsi</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Jumlah Pengungsi" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah Pengungsi" required></td>
                            <input type="hidden" class="form-control" id="tahun7" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                           
                        </tr>

                         <tr>
                            <td><label>Kerugian Material</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Kerugian Material" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Kerugian Material" required></td>
                            <input type="hidden" class="form-control" id="tahun1" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                           
                        </tr>
                        
                  </table>
                        <div style="margin-left:450px; ">
                            <input type="submit" class="btn btn-success" name="add" value="Save">
                        <a class="btn btn-primary" href="<?php echo base_url('Unjukrasa'); ?>">Back</a>
                        </div> 
                        </tr>
                      </div>  
                    </div>    
                  </div>
          <?php echo form_close(); ?>
            </div>
        </div>

          <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Unjukrasa</h3>
                    </div>
                    <?php echo form_open_multipart('Unjukrasa/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                         <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="Bidang Politik">Bidang Politik</option>
                            <option value="Bidang Ekonomi">Bidang Ekonomi</option>
                            <option value="Bidang Agama">Bidang Agama</option>
                            <option value="Bidang Lainnya">Bidang Lainnya</option>
                            <option value="Korban Meninggal">Korban Meninggal</option>
                            <option value="Korban Luka">Korban Luka</option>
                            <option value="Jumlah Pengungsi">Jumlah Pengungsi</option>
                            <option value="Kerugian Material">Kerugian Material</option>
                          
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
                            foreach ($datax->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
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
                    <?php echo form_open_multipart(base_url('Unjukrasa/tampil_crosstab_unjukrasa')) ?>
                    <div class="modal-body">
                    <table>
  
                        <tr>
                        <td><label>Pilih Tahun Report</label></td><td>:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
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


