<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Tempat Pengelolahan Sampah<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tempat Pengelolahan Sampah</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tabel Tempat Pengelolahan Sampah Yang Tersedia di Kab. Malang</h3>			
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
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampiltps">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;">No</th>				
                        <th style="text-align:center;width:4%;">TPS</th>
						<th style="text-align:center;width:4%;">TPST</th>
						<th style="text-align:center;width:4%;">TPA Lokal</th>
						<th style="text-align:center;width:4%;">TPA Regional</th>
						<th style="text-align:center;text-align:center;width:4%;">Periode</th>
                        <th style="text-align:center;width:24%;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
				</tbody>
        </table>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$tps=$a['TPS'];
						$tpst=$a['TPST'];
						$tpal=$a['TPAlokal'];
						$tpar=$a['TPAregional'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data TPS</h3>
                    </div>
                    <?php echo form_open_multipart('tps/proses_edit_tps') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
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
                            <td><label>TPS</label></td><td>:</td>
                            <td><input name="tps" class="form-control" type="number" value="<?php echo $tps;?>" placeholder="Jumlah Lokasi TPS..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPST</label></td><td>:</td>
                            <td><input name="tpst" class="form-control" type="number" value="<?php echo $tpst;?>" placeholder="Jumlah Lokasi TPST..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPAlokal</label></td><td>:</td>
                            <td><input name="tpal" class="form-control" type="number" value="<?php echo $tpal;?>" placeholder="Jumlah Lokasi TPA Lokal..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPAregional</label></td><td>:</td>
                            <td><input name="tpar" class="form-control" type="number" value="<?php echo $tpar;?>" placeholder="Jumlah Lokasi TPA Regional..." style="width:335px;" required></td>
						</tr>
						<?php $name = $this->session->userdata('user');?>
						<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
					</table>
                    </div>
                    <div class="modal-footer">
					
                            <input type="submit" class="btn btn-success pull-right" value="Update"></input>
							
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
                <?php echo form_open_multipart('tps/proses_delete_tps') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data TPS</h3>
                    </div>
                    <?php echo form_open_multipart('tps/proses_input_tps') ?>

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
                            <td><label>TPS</label></td><td>:</td>
                            <td><input name="tps" class="form-control" type="number" placeholder="Jumlah Lokasi TPS..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPST</label></td><td>:</td>
                            <td><input name="tpst" class="form-control" type="number" placeholder="Jumlah Lokasi TPST..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPAlokal</label></td><td>:</td>
                            <td><input name="tpal" class="form-control" type="number" placeholder="Jumlah Lokasi TPA Lokal..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPAregional</label></td><td>:</td>
                            <td><input name="tpar" class="form-control" type="number" placeholder="Jumlah Lokasi TPA Regional..." style="width:335px;" required></td>
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
					<?php echo form_open_multipart('Tps/grafik_perbandingan') ?>
					<div class="modal-body">
					<table>
						<tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
							<select name="datap" id="datap" class="form-control" required>
							<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
							<option value="all">Semua Data</option>
							<option value="tps">Tempat Penampungan Sementara (TPS)</option>
							<option value="tpst">Tempat Pengelahan Sampah Terpadu (TPST)</option>
							<option value="tpalokal">Tempat Pemrosesan Akhir (TPA) Lokal</option>
							<option value="tparegional">Tempat Pemrosesan Akhir (TPA) Regional</option>
							</select></td>
						</tr>
						<tr>
                            <td><label>Model Grafik</label></td><td>:</td>
                            <td>
							<select name="grafikp" id="grafikp" class="form-control" required>
							<option disabled selected value>Pilih Model Grafik</option>
							<option value="bar">Grafik Bar</option>
							<option value="area">Grafik Area</option>
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
	
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->
	<table width=100%>
	<tr>
	<td></td>
	<td>
	<div class="callout callout-info pull-middle" style="position:relative;text-align:left;">
					<p>TPS   : Tempat Penampungan Sementara.<p>
					<p>TPST  : Tempat Pengelolahan Sampah Terpadu.<p>
					<p>TPA   : Tempat Pemrosesan Akhir.<p>
	</div>
	</td><td></td>
	</tr>
	</table>
</div>	
</body><!-- /.body -->