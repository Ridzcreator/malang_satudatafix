<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Bencana Alam<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Bencana</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Korban Bencana di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
            <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalInput" data-toggle="modal" title="Add">Tambah Data Jumlah Korban Bencana</a>
            </td>
                <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
            </td>
            <td>
                <div>
                 
                                           
            <select name="tahun" id="tahun" required>
       
                <?php 
                foreach ($periode->result_array() as $a) {
                        $tahun = $a['periode'];
                ?><option value="<?php echo $tahun; ?>"> Tahun Terahir </option>
                <?php
                }
                foreach ($datasx->result_array() as $a){
                $periode=$a['periode'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
           <!--  <td>
             <a class="btn btn-success" href="bencana/tampil_grafik/<?php echo $periode; ?>">Tampil Grafik</a>
            </td> -->
        </tr>
      
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px;  text-align:center" id="tampilB">
                <thead>
                    <tr>
						
                        <th style="vertical-align:middle;width:25px;  text-align:center;" rowspan="2">No</th>
                      <!--   <th style="vertical-align:middle; width:100px;   text-align:center; " rowspan="2" >Kecamatan</th> -->
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Bencana Alam</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Banyak Bencana</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" colspan="2">Jumlah Korban</th>
                         <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Tahun</th>
                        <th style="vertical-align:middle;width:150px;text-align:center;  text-align:center;" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th style="width:100px;  text-align:center;" >Meninggal</th>
                        <th style="width:100px;  text-align:center;">Luka - luka</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
        </table>
		

             <?php
                    foreach ($dataz->result_array() as $a) {
                        $id = $a['id'];
                        $bencana=$a['bencana'];
                        $banyak=$a['banyak_bencana'];
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $periode=$a['periode'];
                        $kecamatann = $a['kecamatan'];
                        $desaa = $a['desa'];
                        $desaaa = $a['nama_desa'];
                    ?>
     
    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Jumlah Korban</h3>
                    </div>
                    <?php echo form_open_multipart('Bencana/proses_edit_bencana') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
					<table>
                        <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>

                        <select name="kecamatan_idd" class="form-control input-sm" id="kecamatan_idd"  onChange="tampilEditDesa()">
          <?php foreach ($datazx->result() as $row) {
          ?>
          <option value="<?php echo $row->id_kecamatan; ?>" <?=$row->id_kecamatan == $kecamatann ? "selected" : null?>><?=$row->nama_kecamatan?></option>
          <?php
          }
          ?>
          </select>
           </td>
                        </tr>
                        <tr>
                            <td><label>Desa</label></td><td>:</td>
                            <td>

          <select name="kelurahan_idd" class="form-control input-sm" id="kelurahan_idd">
                                
              <option value="<?php echo $desaa; ?>"> <?php echo $desaaa; ?> </option>
          
</select>
 </td>
                        </tr>
						<tr>
                            <td><label>Bencana Alam</label></td><td>:</td>
                            <td>
                                <select name="bencana" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($datas->result() as $key => $data){ ?>
                                <option value="<?=$data->bencana?>" <?=$data->bencana == $bencana ? "selected" : null?>><?=$data->bencana?></option>
                                <?php } ?>
                            </select>
                        </td>
						</tr>
                        <tr>
                            <td width=250px><label>Banyak Bencana</label></td><td>:</td>
                            <td><input name="banyak_bencana" class="form-control" type="text" value="<?php echo $banyak;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Meninggal</label></td><td>:</td>
                            <td><input name="meninggal" class="form-control" type="text" value="<?php echo $meninggal;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Luka - Luka</label></td><td>:</td>
                            <td><input name="luka" class="form-control" type="text" value="<?php echo $luka;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Periode</label></td><td>:</td>
                            <td><input name="tahun" class="form-control" type="text" value="<?php echo $periode;?>" style="width:335px;" required></td>
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
                <?php echo form_open_multipart('bencana/proses_delete_bencana') ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="id" type="hidden" value="<?php echo $id; ?>">
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
    <div id="modalInput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Input Data Jumlah Korban</h3>
                    </div>
                  <?php echo form_open_multipart('bencana/proses_input_bencana') ?>
                    
                    <div class="modal-body">
                    <table>
                    <tr>
                            <td width=250px><label>Periode</label></td><td >:</td>
                            <td><select name="date" id="date" class="form-control">
                                    <?php
                                    $tg_awal= date('Y')-10;
                                    $tgl_akhir= date('Y')+3;
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
                                <select name="kecamatan_id" class="form-control " id="kecamatan_id"  onChange="tampilDesa()">
                                <option value="">Pilih Kecamatan</option>
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
                            <td><label>Desa</label></td><td>:</td>
                            <td>
                                  <select name="kelurahan_id" class="form-control" id="kelurahan_id">
                                <option value="Pilih Desa">- Pilih Desa -</option>
</select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Bencana Alam</label></td><td>:</td>
                            <td>
                                <select name="bencana" class="form-control">
          <?php foreach ($datas->result() as $row) {
          ?>
          <option value="<?php echo $row->id; ?>"><?php echo $row->bencana; ?></option>
          <?php
          }
          ?>
          </select>
                        </td>
                        </tr>
                        <tr>
                            <td width=250px><label>Banyak Bencana</label></td><td>:</td>
                            <td>
                            <input type="number" class="form-control" name="banyak_bencana" placeholder="banyak_bencana" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Meninggal</label></td><td >:</td>
                            <td><input type="number" class="form-control" name="meninggal" placeholder="Jumlah Meninggal" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Luka - Luka</label></td><td>:</td>
                            <td><input type="number" class="form-control" name="luka" placeholder="Jumlah Luka" required></td>
                        </tr>
                        
                     <?php $name = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>   
                    <div class="form-group">
                     <label></label>
                     <input type="hidden" class="form-control" name="status" value="0" required>
                  </div>        
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success" value="Simpan"></input>
                        
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
                        <h3 class="modal-title" id="myModalLabel">Grafik Data Bencana</h3>
                    </div>
                    <?php echo form_open_multipart('Bencana/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                       
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Data Banjir</option>
                            <option value="2">Data Tanah Longsor</option>
                            <option value="3">Data Gempa Bumi</option>
                            <option value="4">Data Angin Topan</option>
                            <option value="5">Data Kekeringan</option>
                            <option value="6">Data Tsunami</option>
                            <option value="7">Data Kebakaran</option>
                            <option value="8">Data Angin Puting Beliung</option>
                            </select></td>
                  
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
                            </select>

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
</body><!-- /.body -->


</html>


