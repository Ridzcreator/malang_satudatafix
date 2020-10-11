<b<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Kebakaran<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Kebakaran</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Banyaknya Kebakaran dan Korban Manusia Menurut Kecamatan Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Banyak Kebakaran</a>
            </td>
            <td>
            <a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a>
            </td>
             <td>
            <a class="btn btn-success" href="../grafik_jenis/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
            <td>
            
             
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
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; "   id="tampilDetailKebakaran">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle">No</th>                
                        <th style="text-align:center;width:8%;vertical-align:middle">Kecamatan</th>
                        <th style="width:8%;text-align:center;vertical-align:middle">Kebakaran</th>
                        <th style="width:10%;text-align:center;vertical-align:middle">Korban Manusia</th>

                        <th style="width:5%;text-align:center;vertical-align:middle">Tahun</th>
                        <th style="width:25%;text-align:center;vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 0;
                    foreach ($data->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $name=$a['nama_kecamatan'];
                        $kebakaran=$a['kebakaran'];
                        $korban_manusia=$a['korban_manusia'];
                        $periode=$a['periode'];
                    ?>
                        <tr>
                        <td><?php echo $no;?></td>
                        <td style="text-align:left;"><?php echo $name;?></td>
                        <td><?php echo $kebakaran;?></td>
                        <td><?php echo $korban_manusia;?></td>
                        <td><?php echo $periode;?></td>    
                         <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>

                        <?php
                        }
                        ?>

                </tbody>
                <tfoot>
                <th style="text-align:center; " colspan="2">Total</th>
               
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center;" colspan="2"></th>
                
                </tfoot>
        </table>
        
 
           <?php
                    $no=0;
                    foreach ($dataa->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $name=$a['kecamatan'];
                        $kebakaran=$a['kebakaran'];
                        $korban_manusia=$a['korban_manusia'];
                        $periode=$a['periode'];             
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Korban Kebakaran</h3>
                    </div>
                    <?php echo form_open_multipart('Kebakaran/proses_edit_detail_kebakaran/'.$this->uri->segment(3)) ?>

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
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
                               <select name="kecamatan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($datazx->result() as $key => $data){ ?>
                                <option value="<?=$data->id_kecamatan?>" <?=$data->id_kecamatan == $name ? "selected" : null?>><?=$data->nama_kecamatan?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Kebakaran</label></td><td>:</td>
                            <td><input name="kebakaran" class="form-control" type="number"  value="<?php echo $kebakaran?>" placeholder="Layak..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Korban Manusia</label></td><td>:</td>
                            <td><input name="manusia" class="form-control" type="number"  value="<?php echo $korban_manusia;?>" placeholder="Petugas Satpol PP..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('kebakaran/proses_delete_detail_kebakaran/'.$this->uri->segment(3)) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Kebakaran</h3>
                    </div>
                    <?php echo form_open_multipart('Kebakaran/proses_input_detail_kebakaran/'.$this->uri->segment(3)) ?>

                    <div class="modal-body">
                    <div class="modal-body">
                    
                    <table>
                        <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                            <input type="text" name="periode" class="form-control" value="<?php echo $this->uri->segment(3); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Lokasi</label></td><td>:</td>
                            <td>
                                <select name="kecamatan" class="form-control">
                          <?php foreach ($datazx->result() as $row) {
                          ?>
                          <option value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
                          <?php
                          }
                          ?>
                          </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Kebakaran</label></td><td>:</td>
                            <td><input name="kebakaran" class="form-control" type="number" placeholder="Kebakaran..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Korban Manusia</label></td><td>:</td>
                            <td><input name="manusia" class="form-control" type="number" placeholder="Korban Manusia..." style="width:335px;" required></td>
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
                        <h3 class="modal-title" id="myModalLabel">Tampilan CrossTab Mode</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('Kebakaran/tampil_crosstab')) ?>
                    <div class="modal-body">
                    <table>
  
                        <tr>
                        <td><label>Pilih Tahun Crosstab</label></td><td>:</td>
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
    <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Kebakaran'); ?>">Back</a>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
</html>
