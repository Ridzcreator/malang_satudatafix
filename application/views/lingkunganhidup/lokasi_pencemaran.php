<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>LOKASI PENCEMARAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Lokasi Pencemaran</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Lokasi Pencemaran</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
             <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
            </td>
            <td>
             <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik Perbandingan</a>
            </td>
            
            <td><div>
            <select style="margin-left: 5px;" name="tahun" id="tahun" required>
            <option value="0000"> Pilih Tahun </option>
                <?php 
                foreach ($datax->result_array() as $a){
                $periode=$a['tahun'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
        

            <table  class="table table-bordered table-striped" id="tampillokasiPencemaran" style="text-align: center; font-size:15px; width: 100%;">
                <thead>
                    <tr>
						<th rowspan="2" style="text-align: left; vertical-align: middle;">No</th>
                        <th rowspan="2" style="text-align:left; vertical-align: middle;">Tingkat Pencemaran</th>
                        <th colspan="3" style="text-align: center;">Jumlah Lokasi dan Jenis Pencemaran</th>
                        <th rowspan="2" style="text-align:left; vertical-align: middle;">Jumlah</th>
                        <th rowspan="2" style="text-align:left; vertical-align: middle;">Tahun</th>
                        <th rowspan="2" style="width:130px; text-align:center; vertical-align: middle;">Aksi</th>
                    </tr>
                    <tr>
                        <th style="text-align:left; vertical-align: middle;">Pencemaran Tanah</th>
                        <th style="text-align:left; vertical-align: middle;">Pencemaran Air</th>
                        <th style="text-align:left; vertical-align: middle;">Pencemaran Udara</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

            </table>
        <?php 

        foreach ($data->result_array() as $a){

            $no=$a['id'];
            $tingkat_pencemaran=$a['tingkat_pencemaran'];
            $jumlah_pencemaran_tanah=$a['jumlah_pencemaran_tanah'];
            $jumlah_pencemaran_air=$a['jumlah_pencemaran_air'];
            $jumlah_pencemaran_udara=$a['jumlah_pencemaran_udara'];
            $jumlah=$a['jumlah'];
            $tahun=$a['tahun'];
            $penginput=$a['penginput'];
            $timestamp=$a['timestamp'];
            $status=$a['status'];

            ?>
            
            <div id="modalEdit<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Edit Data Lokasi Pencemaran</h3>
                        </div>
                        <?php echo form_open_multipart('Lokasi_pencemaran/proses_edit_lokasi_pencemaran') ?>

                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="no" value="<?php echo $no;?>" readonly>
                            <input class="form-control" type="hidden" name="tahun" value="<?php echo $tahun;?>" readonly>
                             <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jumlah;?>">

                        </div>
                        <table width="70%">
                        <tr>
                    <td style="padding:  20px"><label>Tahun</label></td>
                    <td style="padding:  20px">:</td>
                    <td>
                        <input type="number" class="form-control" name="tahun"  value="<?php echo $tahun;?>" placeholder="Tahun" autocomplete="off" readonly>
                    </td>
                </tr>
              <tr>
              <td style="padding:  20px"><label>Tingkat Pencemaran</label></td>
              <td style="padding:  20px">:</td>
              <td><input type="text" class="form-control" name="tingkat_pencemaran" value="<?php echo $tingkat_pencemaran;?>" placeholder="Tingkat Pencemaran Pasar" required readonly></td>
            </div>
                </tr>
                <tr>
                   <td style="padding:  20px"><label>Jumlah Pencemaran Tanah</label></td>
                   <td style="padding:  20px">:</td>
                   <td><input type="text" class="form-control" name="jumlah_pencemaran_tanah" value="<?php echo $jumlah_pencemaran_tanah;?>" placeholder="Jumlah Pencemaran Tanah" required autocomplete="off"></td>
               </tr>
                <tr>
                   <td style="padding:  20px"><label>Jumlah Pencemaran Air</label></td>
                   <td style="padding:  20px">:</td>
                   <td><input type="text" class="form-control" name="jumlah_pencemaran_air" value="<?php echo $jumlah_pencemaran_air;?>" placeholder="Jumlah Pencemaran Air" required autocomplete="off"></td>
               </tr>
                <tr>
                   <td style="padding:  20px"><label>Jumlah Pencemaran Udara</label></td>
                   <td style="padding:  20px">:</td>
                   <td><input type="text" class="form-control" name="jumlah_pencemaran_udara" value="<?php echo $jumlah_pencemaran_udara;?>" placeholder="Jumlah Pencemaran Udara" required autocomplete="off"></td>
               </tr>
               <tr>
                   <td style="padding:  20px"><label>Jumlah Pencemaran Udara</label></td>
                   <td style="padding:  20px">:</td>
                   <td><input type="text" class="form-control" name="jumlah_pencemaran_udara" value="<?php echo $jumlah_pencemaran_udara;?>" placeholder="Jumlah Pencemaran Udara" required autocomplete="off"></td>
               </tr>
                
    </table>
                         <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>

                        <input style="margin-left: 525px;margin-bottom: 10px" type="submit" class="btn btn-success" value="Save"> 

                    </div>
                    <?php echo form_close(); ?>
      
            </div>
        </div>
        

        <div id="modalHapus<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Lokasi Pencemaran</h3>
                        </div>
                        <?php echo form_open_multipart('Lokasi_pencemaran/proses_hapus_lokasi_pencemaran') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data ini..?</p>
                            <input name="no" type="hidden" value="<?php echo $no; ?>">
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
                                <h3 class="modal-title" id="myModalLabel">Tambah Data Lokasi Pencemaran</h3>
                    </div>
                                 <?php echo form_open_multipart('Lokasi_pencemaran/proses_tambah_lokasi_pencemaran') ?>

    <table width="90%">
    <tr>
                    <td style="padding:  20px"><label>Tahun</label></td>
                    <td style="padding:  20px">:</td>
                    <td>
                        <select name="tahun" id="tahun" class="form-control">
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
                            </select>
                    </td>
                </tr>
              <tr>
               <td style="padding:  20px"><label>Tingkat Pencemaran</label></td>
               <td style="padding:  20px">:</td>
               <td>   
                    <select name="tingkat_pencemaran" id="tingkat_pencemaran" class="form-control" required>
                            <option disabled selected value>Pilih Data Tingkat Pencemaran</option>
                            <option value="Ringan">Ringan</option>
                            <option value="Kronis">Kronis</option>
                            <option value="Akut">Akut</option>
                            </select>
               </td>
            </div>
                </tr>
                <tr>
                   <td style="padding:  20px"><label>Jumlah Pencemaran Tanah</label></td>
                   <td style="padding:  20px">:</td>
                   <td><input type="number" min="0" class="form-control" name="jumlah_pencemaran_tanah" placeholder="Jumlah Pencemaran Tanah" required autocomplete="off"></td>
               </tr>
               <tr>
                   <td style="padding:  20px"><label>Jumlah Pencemaran Air</label></td>
                   <td style="padding:  20px">:</td>
                   <td><input type="number" min="0" class="form-control" name="jumlah_pencemaran_air" placeholder="Jumlah Pencemaran Air" required autocomplete="off"></td>
               </tr>
               <tr>
                   <td style="padding:  20px"><label>Jumlah Pencemaran Udara</label></td>
                   <td style="padding:  20px">:</td>
                   <td><input type="number" min="0" class="form-control" name="jumlah_pencemaran_udara" placeholder="Jumlah Pencemaran Udara" required autocomplete="off"></td>
               </tr>
                
    </table>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <div>
                           <input style="margin-left: 365px;margin-bottom: 10px;margin-top: 5px" type="submit" class="btn btn-success" name="add" value="Save"> &nbsp &nbsp 
                            <button style="margin-left: 5px;margin-bottom: 10px;margin-top: 5px" type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                        <a style="margin-left: 5px;margin-bottom: 10px;margin-top: 5px" class="btn btn-primary" href="../pasar_tradisional">Back</a>
                        </div>

                        <?php echo form_close(); ?>
                
        </div>
    </div>
    </div><!-- /.box-body -->
    </div><!-- /.box -->

            <div id="modalAdd2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
                    </div>
                    <?php echo form_open_multipart('Lokasi_pencemaran/tampil_lokasi_pencemaran/') ?>
                    <div class="modal-body">
                                
                            
                <table width="90%">
                    <tr>
                        <td style="padding:  10px"><label>Periode</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                        <select name="tahunx" id="tahunx" class="form-control">
                        <option value="0000"> Pilih Tahun </option>
                <?php 
                foreach ($datax->result_array() as $a){
                $periode=$a['tahun'];
                ?>
                <option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                        </select>
                        </td>
                    </tr>
                </table>
                    </div>
                         <div>
                           <input style="margin-left: 485px;margin-bottom: 10px;margin-top: 5px" type="submit" class="btn btn-success" name="add" value="Lihat Grafik"> &nbsp &nbsp 
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            <!-- /.box-body -->
        </div>
    

       <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
                    </div>
                    <?php echo form_open_multipart('Lokasi_pencemaran/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                            <td style="padding:  20px"><label>Pilih Data</label></td>
                            <td style="padding:  20px">:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Pencemaran Tanah</option>
                            <option value="2">Jumlah Pencemaran Air</option>
                            <option value="3">Jumlah Pencemaran Udara</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  20px"><label>Model Grafik</label></td>
                            <td style="padding:  20px">:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>
                            <option value="line">Grafik Line</option>
                            </select></td>
                        </tr>
                        <tr>
                        <td style="padding:  20px"><label>Tahun Grafik</label></td>
                        <td style="padding:  20px">:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
                            $periode=$a['tahun'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
                            $periode=$a['tahun'];
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
    </div>



    </section><!-- /.content -->
    </div>
</body>