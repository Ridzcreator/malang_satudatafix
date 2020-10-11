<b><body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Banyak Bencana<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Banyak Bencana</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Banyaknya Bencana Menurut Jumlah Korban Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Banyak Bencana</a>
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
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; "  id="tampilBanyakbencana">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align:center;width:1%;vertical-align:middle">No</th>                
                       <th rowspan="2" style="width:5%;text-align:center;vertical-align:middle">Periode</th>
                        <th rowspan="2" style="width:8%;text-align:center;vertical-align:middle">Jumlah Bencana Alam</th>
                        <th colspan="3" style="width:8%;text-align:center;vertical-align:middle">Banyak Korban</th>
                         <th rowspan="2" style="width:10%;text-align:center;vertical-align:middle">Hancur</th>
                        <th rowspan="2" style="width:10%;text-align:center;vertical-align:middle">Rusak</th>
                        <th rowspan="2" style="width:10%;text-align:center;vertical-align:middle">Kerugian</th>
                        <th rowspan="2" style="width:20%;text-align:center;vertical-align:middle">Aksi</th>
                    </tr>
                    <tr>
                        <th>Mati</th>
                        <th>Luka</th>
                        <th>Menderita</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <th style="text-align:center; " colspan="2">Total</th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                  <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                
                </tfoot>
        </table>
        
       <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Bencana</h3>
                    </div>
                    <?php echo form_open_multipart('banyakbencana/proses_input_bencana') ?>

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
                            <td><label>Jumlah Bencana Alam</label></td><td>:</td>
                            <td><input name="jumlah" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Korban Meninggal</label></td><td>:</td>
                            <td><input name="mati" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Korban Luka</label></td><td>:</td>
                            <td><input name="luka" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Banyak Korban Menderita</label></td><td>:</td>
                            <td><input name="menderita" class="form-control" type="number" placeholder="Banyak Korban Menderita..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Hancur</label></td><td>:</td>
                            <td><input name="hancur" class="form-control" type="number" placeholder="Hancur..." style="width:335px;" required></td>
                           </tr>
                          <tr>
                            <td><label>Rusak</label></td><td>:</td>
                            <td><input name="rusak" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                         </tr>   
                            <tr>
                            <td><label>Kerugian (Juta Rp)</label></td><td>:</td>
                            <td><input name="rugi" class="form-control" type="number" placeholder="Jumlah Kerugian..." style="width:335px;" required></td>
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
     <?php
                    $no=0;
                    foreach ($dataa->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $name=$a['kecamatan'];
                        $jumlah_bencana=$a['jumlah_bencana'];
                        $mati =$a['mati'];
                        $luka=$a['luka'];
                        $menderita=$a['menderita'];
                        $hancur=$a['hancur'];
                        $rusak=$a['rusak'];
                        $kerugian=$a['kerugian'];
                        $periode=$a['periode'];            
            ?>

    <div id="modalEdit<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Banyak Bencana</h3>
                    </div>
                    <?php echo form_open_multipart('banyakbencana/proses_edit_bencana') ?>

                    <div class="modal-body">
                    <?php $nama = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $nama;?>" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <input type="hidden" name="status" value="0"> 
                    <table>
                       <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $tahun;?>" placeholder="Tahun Periode Laporan..." style="width:335px;" required></td>
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
                            <td><label>Jumlah Bencana Alam</label></td><td>:</td>
                            <td><input name="jumlah" value="<?php echo $jumlah_bencana; ?>" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Korban Meninggal</label></td><td>:</td>
                            <td><input name="mati" value="<?php echo $mati; ?>" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Korban Luka</label></td><td>:</td>
                            <td><input name="luka" value="<?php echo $luka; ?>" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Banyak Korban Menderita</label></td><td>:</td>
                            <td><input name="menderita" value="<?php echo $menderita; ?>" class="form-control" type="number" placeholder="Banyak Korban Menderita..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Hancur</label></td><td>:</td>
                            <td><input name="hancur" value="<?php echo $hancur; ?>" class="form-control" type="number" placeholder="Hancur..." style="width:335px;" required></td>
                           </tr>
                          <tr>
                            <td><label>Rusak</label></td><td>:</td>
                            <td><input name="rusak" value="<?php echo $rusak; ?>" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                         </tr>   
                            <tr>
                            <td><label>Kerugian (Juta Rp)</label></td><td>:</td>
                            <td><input name="rugi" value="<?php echo $kerugian; ?>" class="form-control" type="number" placeholder="Jumlah Kerugian..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('banyakbencana/proses_delete_bencana_tahun') ?>
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
    <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Banyak Bencana</h3>
                    </div>
                    <?php echo form_open_multipart('Banyakbencana/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                            <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="bencana">Jumlah Bencana Alam</option>
                            <option value="mati">Jumlah Korban Meninggal</option>
                            <option value="luka">Jumlah Korban Luka</option>
                            <option value="menderita">Jumlah Korban Menderita</option>
                            <option value="hancur">Jumlah Hancur</option>
                            <option value="kerusakan">Jumlah Kerusakan</option>
                            <option value="kerugian">Jumlah Kerugian</option>

                          
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
</html>
