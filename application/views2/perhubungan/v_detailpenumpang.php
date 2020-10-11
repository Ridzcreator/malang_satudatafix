<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Pemberangkatan Penumpang Kereta Api<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Penumpang</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Pemberangkatan Penumpang Kereta Api Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Penumpang Kereta Api</a>
            </td>
          
             <td>
            <a class="btn btn-success" href="../grafikpenumpangangkutan/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
            
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px;  text-align:center" id="tampil_banyak_detail_penumpang">
                <thead>
                    <tr>
                        
                        <th style="vertical-align:middle;width:25px;  text-align:center;" rowspan="2">No</th>
                      <!--   <th style="vertical-align:middle; width:100px;   text-align:center; " rowspan="2" >Kecamatan</th> -->
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Bulan</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" colspan="5">Jumlah Penumpang</th>
                   
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Jumlah</th>
                         <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Tahun</th>
                        <th style="vertical-align:middle;width:150px;text-align:center;  text-align:center;" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th style="width:100px;  text-align:center;" >Stasiun Lawang</th>
                        <th style="width:100px;  text-align:center;" >Stasiun Singosari</th>
                        <th style="width:100px;  text-align:center;" >Stasiun Kepanjen</th>
                        <th style="width:100px;  text-align:center;" >Stasiun Ngebruk</th>
                        <th style="width:100px;  text-align:center;" >Stasiun Sumberpucung</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=0;
                    foreach ($data->result_array() as $a) {
              
                        $no++;
                        $id = $a['id_penumpang'];
                        // $name=$a['nama_kecamatan'];
                        $bulan=$a['keterangan'];
                        $lawang=$a['lawang'];
                        $singosari=$a['singosari'];
                        $kepanjen=$a['kepanjen'];
                        $ngebruk=$a['ngebruk'];
                        $sumberpucung=$a['sumberpucung'];
                        $jumlah=$lawang+$singosari+$kepanjen+$ngebruk+$sumberpucung;
                        $periode=$a['periode'];

                        ?>

                         <tr>
                        <td><?php echo number_format($no,0,",",".");?></td>
                        <td style="text-align:center;"><?php echo $bulan;?></td>
                        <td style="text-align:center;"><?php echo $lawang;?></td>
                        
                        <td style="text-align:center;"><?php echo $singosari; ?></td>
                        <td style="text-align:center;"><?php echo $kepanjen;?></td>
                        <td style="text-align:center;"><?php echo $ngebruk;?></td>
                        <td style="text-align:center;"><?php echo $sumberpucung;?></td>
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
                <th style="vertical-align:middle;width:100px;  text-align:center;" colspan="2">Jumlah</th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>


                </tfoot>
        </table>
        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pemberangkatan Penumpang Angkutan Kereta Api </h3>
                    </div>
                    <?php echo form_open_multipart('Penumpangangkutan/proses_input_detail_penumpang/'.$this->uri->segment(3)) ?>

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
                            <td><label>Stasiun Lawang</label></td><td>:</td>
                            <td><input name="lawang" class="form-control" type="number" placeholder="Stasiun Lawang..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Singosari</label></td><td>:</td>
                            <td><input name="singosari" class="form-control" type="number" placeholder="Stasiun Singosari..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Kepanjen</label></td><td>:</td>
                            <td><input name="kepanjen" class="form-control" type="number" placeholder="Stasiun Kepanjen..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Ngebruk</label></td><td>:</td>
                            <td><input name="ngebruk" class="form-control" type="number" placeholder="Stasiun Ngebruk..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Stasiun Sumberpucung</label></td><td>:</td>
                            <td><input name="sumberpucung" class="form-control" type="number" placeholder="Stasiun Sumberpucung..." style="width:335px;" required></td>
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
                        $id = $a['id_penumpang'];
                        // $name=$a['nama_kecamatan'];
                        $kode_bulan=$a['kode'];
                        $bulan=$a['keterangan'];
                        $lawang=$a['lawang'];
                        $singosari=$a['singosari'];
                        $kepanjen=$a['kepanjen'];
                        $ngebruk=$a['ngebruk'];
                        $sumberpucung=$a['sumberpucung'];
                        $jumlah=$lawang+$singosari+$kepanjen+$ngebruk+$sumberpucung;
                        $periode=$a['periode'];

                        ?>
   
   <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data</h3>
                    </div>
                    <?php echo form_open_multipart('Penumpangangkutan/proses_edit_detail_penumpang/'.$this->uri->segment(3)) ?>
                    <div class="modal-body">
                    <?php $nama = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $nama;?>" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <input type="hidden" name="status" value="0"> 
                     <table>
                        <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                            <input type="text" name="periode" class="form-control" value="<?php echo $this->uri->segment(3) ?>" readonly>
                            </td>
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
                            <td><label>Stasiun Lawang</label></td><td>:</td>
                            <td><input name="lawang" class="form-control" type="number" value="<?php echo $lawang; ?>" placeholder="Stasiun Lawang..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Singosari</label></td><td>:</td>
                            <td><input name="singosari" class="form-control" type="number" placeholder="Stasiun Singosari..." value="<?php echo $singosari; ?>" style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Kepanjen</label></td><td>:</td>
                            <td><input name="kepanjen" class="form-control" value="<?php echo $kepanjen; ?>" type="number" placeholder="Stasiun Kepanjen..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Ngebruk</label></td><td>:</td>
                            <td><input name="ngebruk" class="form-control" value="<?php echo $ngebruk; ?>" type="number" placeholder="Stasiun Ngebruk..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Stasiun Sumberpucung</label></td><td>:</td>
                            <td><input name="sumberpucung" class="form-control" value="<?php echo $sumberpucung; ?>" type="number" placeholder="Stasiun Sumberpucung..." style="width:335px;" required></td>
                        </tr> 
                       
                         
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
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
                <?php echo form_open_multipart('Penumpangangkutan/proses_delete_detail_penumpang/'.$this->uri->segment(3)) ?>
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
     <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Penumpangangkutan'); ?>">Back</a>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
