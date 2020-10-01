<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Ketentraman dan Ketertiban Umum<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Ketertiban</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Korban Bencana di Kabupaten Malang Tahun <?php echo $ex = $this->uri->segment(5);?></h3>
        </div>
        <div class="box-body">
            <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalInput" data-toggle="modal" title="Add">Tambah Data Jumlah Korban Bencana Tahun <?php echo $ex = $this->uri->segment(5);?></a>
            </td>
            <td>
                <?php
                $periodei = $this->uri->segment(5);
                $bencanai = $this->uri->segment(4);
                ?>
             <a class="btn btn-success" href="<?php echo base_url('bencana/tampil_grafik/'.$periodei.'/'.$bencanai); ?>">Tampil Grafik Bencana Periode <?php echo $periodei;?></a>
            </td>
        </tr>
      
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px;   text-align:center" id="detail_bencana">
                <thead>
                    <tr>
						
                        <th style="vertical-align:middle;width:25px;   text-align:center"; rowspan="2">No</th>
                        <th style="vertical-align:middle; width:100px;   text-align:center; " rowspan="2" >Lokasi Kecamatan</th>
                        <th style="vertical-align:middle; width:100px;   text-align:center; " rowspan="2" >Lokasi Desa</th>
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
                    <?php
                    $no=0;
                    foreach ($dataa->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
                        $name=$a['nama_kecamatan'];
                        $name_desa=$a['nama_desa'];
                        $bencana=$a['bencana'];
                        $banyak=$a['banyak_bencana'];
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $tahun=$a['periode'];
                    ?>  
                        <tr>
                        <td><?php echo number_format($no,0,",",".");?></td>
                        <td style="text-align:left;"><?php echo $name;?></td>
                        <td><?php echo $name_desa; ?></td>
                        <td><?php echo $bencana;?></td>
                        <td><?php echo $banyak;?> </td>
                        <td><?php echo $meninggal;?></td>
                        <td><?php echo $luka;?></td>
                        <td><?php echo $tahun;?></td>
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>
                        
                        
                    <?php } ?>
                </tbody>
        </table>
		

             <?php
                    foreach ($dataz->result_array() as $a) {
                       $id = $a['id'];
                        $bencana=$a['bencana_alam'];
                        $banyak=$a['banyak_bencana'];
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $periode=$a['periode'];
                        $nama_kecamatann=$a['nama_kecamatan'];
                        $kecamatann = $a['kecamatan'];
                        $desaa = $a['desa'];
                        $desaaa = $a['nama_desa'];
                    ?>
     <div id="modalInput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Input Data Jumlah Korban</h3>
                    </div>
                    <?php
                    $idd = $this->uri->segment(3);
                    ?>
                  <?php echo form_open_multipart('Bencana/proses_input_detail_bencana/'.$idd) ?>

                    <div class="modal-body">
                    <table>
                    <tr>
                            <td width=250px><label>Periode</label></td><td width=20>:</td>
                             <td>
                            <input type="text" class="form-control" name="date" value="<?php echo $periode; ?>" readonly></td>
                        </tr>

                      <tr>
                            <td><label>Bencana Alam</label></td><td>:</td>
                            <td><?php
                            $bencanaa = $this->uri->segment(4);
                            ?>
                               <select name="bencana" class="form-control" required readonly>
                                <option value="">- Pilih -</option>

                                 <?php foreach ($datas->result() as $row) {
          ?>
          <option value="<?php echo $row->id; ?>" <?=$row->id == $bencanaa ? "selected" : null?>><?=$row->bencana?></option>
          <?php
          }
          ?>
                            </select>
                        </td>
                        </tr>    
                        <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
                                <select name="kecamatan_id" class="form-control input-sm" id="kecamatan_id"  onChange="tampilDesa()" required>
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
                                  <select name="kelurahan_id" class="form-control input-sm" id="kelurahan_id" required>
                                <option value="Pilih Desa">- Pilih Desa -</option>
</select>
                        </td>
                        </tr>
                      
                        <tr>
                            <td width=250px><label>Banyak Bencana</label></td><td width=20>:</td>
                            <td>
                            <input type="number" class="form-control" name="banyak_bencana" placeholder="banyak_bencana" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Meninggal</label></td><td width=20>:</td>
                            <td><input type="number" class="form-control" name="meninggal" placeholder="Jumlah Meninggal" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Luka - Luka</label></td><td width=20>:</td>
                            <td><input type="number" class="form-control" name="luka" placeholder="Jumlah Luka" required></td>
                        </tr>
                        
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
    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Jumlah Korban</h3>
                    </div>
                    <?php echo form_open_multipart('Bencana/proses_edit_bencana') ?>

                    <div class="modal-body">
					<input class="form-control" id="id" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
					<table>
                        <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
                        <input type="text" name="kecamatan_idd" class="form-control" value="<?php echo $nama_kecamatann; ?>" required readonly>
                       
           </td>
                        </tr>
                        <tr>
                            <td><label>Desa</label></td><td>:</td>
                            <td>

                    <input type="text" name="desa_idd" class="form-control" value="<?php echo $desaaa; ?>" required readonly>
 </td>
                        </tr>
						<tr>
                            <td><label>Bencana Alam</label></td><td>:</td>
                            <td>
                                <select name="bencana" class="form-control" required>
                                <option value="">- Pilih -</option>

                                 <?php foreach ($datas->result() as $row) {
          ?>
          <option value="<?php echo $row->id; ?>" <?=$row->id == $bencana ? "selected" : null?>><?=$row->bencana?></option>
          <?php
          }
          ?>
                            </select>
                        </td>
						</tr>
                        <tr>
                            <td width=250px><label>Banyak Bencana</label></td><td width=20>:</td>
                            <td><input name="banyak_bencana" class="form-control" type="text" value="<?php echo $banyak;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Meninggal</label></td><td width=20>:</td>
                            <td><input name="meninggal" class="form-control" type="text" value="<?php echo $meninggal;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Luka - Luka</label></td><td width=20>:</td>
                            <td><input name="luka" class="form-control" type="text" value="<?php echo $luka;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Periode</label></td><td width=20>:</td>
                            <td><input name="tahun" class="form-control" type="text" value="<?php echo $periode;?>" style="width:335px;" readonly></td>
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
<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Bencana'); ?>">Back</a>
 </div><!-- /.box -->
    </section>
    <!-- /.content -->
    </div>
</body><!-- /.body -->

<style>
p {
    text-align:left;
    text-size:15px;
}
</style>
