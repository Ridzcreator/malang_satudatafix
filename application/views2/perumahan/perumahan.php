<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Sampah<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Perumahan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Sampah Yang Dihasilkan dan Yang Diolah Kabupaten Malang</h3>
		</div>
		<div class="box-body table-responsive">
		<table>
		<tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
			</td>
			<td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
			</td>
			<td>
			<select name="tahun" id="tahun" required>
			<option value="0000"> Pilih Tahun </option>
				<?php 
				foreach ($datax->result_array() as $a){
				$periode=$a['periode'];
				?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
				<?php } ?>
				
			</select>
			</td>
		</tr>
		</table>		
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%; text-align:center"  id="tampilPerumahan">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle">No</th>				
                        <th style="text-align:center;width:8%;vertical-align:middle">Hasil SRT</th>
                        <th style="width:8%;text-align:center;vertical-align:middle">Sejenis SRT</th>
						<th style="width:10%;text-align:center;vertical-align:middle">Sampah Terolah</th>
						<th style="width:5%;text-align:center;vertical-align:middle">Beracun</th>
						<th style="width:10%;text-align:center;vertical-align:middle">Beracun Terolah</th>
						<th style="width:5%;text-align:center;vertical-align:middle">Limbah</th>
						<th style="width:10%;text-align:center;vertical-align:middle">Limbah Terolah</th>
						<th style="width:5%;text-align:center;vertical-align:middle">Tahun</th>
						<th style="width:25%;text-align:center;vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
		

             <?php
					$no=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$hasilsrt=$a['hasilsrt'];
						$sejenissrt=$a['sejenissrt'];
						$tertangani=$a['tertangani'];
						$beracun=$a['beracun'];
						$beracunterolah=$a['beracunterolah'];
						$limbah=$a['limbah'];
						$limbahterolah=$a['limbahterolah'];                    
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Sampah</h3>
                    </div>
                    <?php echo form_open_multipart('Perumahan/proses_edit_sampah') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td>
							<select name="periode" id="periode" class="form-control">
							<?php
							$tg_awal= date('Y')-10;
							$tgl_akhir= date('Y');
							for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
							{
							echo "
							<option value='$i'";
							if($periode==$i){echo "selected";}
							echo">$i</option>";
							}
							?>
							</select></td>
						</tr>
						<tr>
                            <td><label>Sampah Yang Dihasilkan Rumah Tangga</label></td><td>:</td>
                            <td><input name="srt" class="form-control" type="number" value="<?php echo $hasilsrt;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Sampah Sejenis Rumah Tangga</label></td><td>:</td>
                            <td><input name="ssrt" class="form-control" type="number" value="<?php echo $sejenissrt;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Sampah Rumah Tangga Yang Terolah</label></td><td>:</td>
                            <td><input name="ssrtt" class="form-control" type="number" value="<?php echo $tertangani;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Bahan Berbahaya Dan Beracun</label></td><td>:</td>
                            <td><input name="racun" class="form-control" step="0.01" type="number" value="<?php echo $beracun;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Bahan Berbahaya Dan Beracun Terolah</label></td><td>:</td>
                            <td><input name="racunt" class="form-control" step="0.01" type="number" value="<?php echo $beracunterolah;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Limbah Bahan Berbahaya Dan Beracun</label></td><td>:</td>
                            <td><input name="limbah" class="form-control" step="0.01" type="number" value="<?php echo $limbah;?>" placeholder="Jumlah Unit Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Limbah Bahan Berbahaya Dan Beracun Yang Terolah</label></td><td>:</td>
                            <td><input name="limbaht" class="form-control" step="0.01" type="number" value="<?php echo $limbahterolah;?>" placeholder="Jumlah Unit Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<?php $name = $this->session->userdata('user');?>
						<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
					</table>
                    </div>
                    <div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
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
                <?php echo form_open_multipart('alatangkut/proses_delete_alatangkut') ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
				<input name="id" type="hidden" value="<?php echo $id; ?>">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Sampah</h3>
                    </div>
					<?php echo form_open_multipart('perumahan/proses_input_sampah') ?>
					<div class="modal-body">
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
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
                            <td><label>Sampah Yang Dihasilkan Rumah Tangga</label></td><td>:</td>
                            <td><input name="srt" class="form-control" type="number" step="0.01" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Sampah Sejenis Rumah Tangga</label></td><td>:</td>
                            <td><input name="ssrt" class="form-control" type="number" step="0.01" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Sampah Rumah Tangga Yang Terolah</label></td><td>:</td>
                            <td><input name="ssrtt" class="form-control" type="number" step="0.01" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Bahan Berbahaya Dan Beracun</label></td><td>:</td>
                            <td><input name="racun" class="form-control" type="number" step="0.01" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Bahan Berbahaya Dan Beracun Terolah</label></td><td>:</td>
                            <td><input name="racunt" class="form-control" type="number" step="0.01" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Limbah Bahan Berbahaya Dan Beracun</label></td><td>:</td>
                            <td><input name="limbah" class="form-control" type="number" step="0.01" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Limbah Bahan Berbahaya Dan Beracun Yang Terolah</label></td><td>:</td>
                            <td><input name="limbaht" class="form-control" type="number" step="0.01" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<?php $name = $this->session->userdata('user');?>
						<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
					</table>
                    </div>
                    <div class="modal-footer">
					
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
							
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
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
                    </div>
					<?php echo form_open_multipart('Perumahan/grafik_perbandingan') ?>
					<div class="modal-body">
					<table>
						<tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
							<select name="datap" id="datap" class="form-control" required>
							<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
							<option value="all">Semua Data</option>
							<option value="srt">Sampah Yang Dihasilkan Rumah Tangga</option>
							<option value="sejenissrt">Sejenis Sampah Rumah Tangga</option>
							<option value="tertangani">Sampah Rumah Tangga Tertangani</option>
							<option value="beracun">Mengandung Bahan Berbahaya dan Beracun</option>
							<option value="beracunterolah">Mengandung Bahan Berbahaya dan Beracun Terolah</option>
							<option value="limbah">Limbah Mengandung Bahan Berbahaya dan Beracun</option>
							<option value="limbahterolah">Limbah Mengandung Bahan Berbahaya dan Beracun Terolah</option>
							</select></td>
						</tr>
						<tr>
                            <td><label>Model Grafik</label></td><td>:</td>
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
	
	</div>
	</div><!-- /.box-->
    </section>
    <!-- /.content -->
	<table width=100%>
	<tr>
	<td></td>
	<td align="center">
	<div class="callout callout-info pull-middle" style="position:relative;text-align:left;">
		<p>SRT  : Sampah Hasil Rumah Tangga</p>
	</div>
	</td><td></td>
	</tr>
	</table>

</div>
</body>