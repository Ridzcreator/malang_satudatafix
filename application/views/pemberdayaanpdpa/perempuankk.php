<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Perempuan Sebagai Kepala Keluarga di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Jumlah Perempuan Sebagai Kepala Keluarga di Kabupaten Malang</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Perempuan Sebagai Kepala Keluarga di Kabupaten Malang</h3>			
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
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%; text-align:center;"  id="tampilperempuankk">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;" rowspan="2">No</th>				
                        <th style="text-align:center;width:8%;vertical-align:middle;" rowspan="2">Periode</th>
						<th style="text-align:center;width:8%;vertical-align:middle;" rowspan="2">Jumlah Pekka</th>
						<th style="text-align:center;width:16%;vertical-align:middle;" colspan="2">Pekka Usia Produktif</th>
						<th style="text-align:center;width:16%;vertical-align:middle;" colspan="2">Pekka Rentan</th>
                        <th style="text-align:center;width:10%;vertical-align:middle;" rowspan="2">Aksi</th>
                    </tr>
					<tr>
						<th style="text-align:center;vertical-align:middle;">Jumlah</th>
						<th style="text-align:center;vertical-align:middle;">Persentase</th>
						<th style="text-align:center;vertical-align:middle;">Jumlah</th>
						<th style="text-align:center;vertical-align:middle;">Persentase</th>
					</tr>
                </thead>
                <tbody>
				</tbody>
        </table>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode=$a['periode'];
						$kecamatan=$a['kecamatan'];
						$pekka_jumlah=$a['pekka_jumlah'];
						$usiapro_kerja=$a['usiapro_jumlah'];
						$pekka_rentan=$a['pekka_rentan'];
                   
                    ?>

	<?php } ?>
	<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Perempuan Sebagai Kepala Keluarga</h3>
                    </div>
                    <?php echo form_open_multipart('Perempuankk/proses_input_perempuankk') ?>

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
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
							<select name="kecamatan" id="kecamatan" class="form-control" required>
							<option disabled selected value > Pilih Kecamatan </option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$value=$a['id_kecamatan'];
							$kecamatan=$a['nama_kecamatan'];
							?><option value="<?php echo $value; ?>"> <?php echo $kecamatan; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Jumlah Pekka Usia Produktif</label></td><td>:</td>
                            <td><input name="jpekkapro" class="form-control" type="number" placeholder="Jumlah Pekka Usia Produktif..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Pekka Usia Rentan</label></td><td>:</td>
                            <td><input name="jpekkarentan" class="form-control" type="number" placeholder="Jumlah Pekka Usia Rentan..." style="width:335px;" required></td>
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
					<?php echo form_open_multipart('Perempuankk/grafik_perbandingan') ?>
					<div class="modal-body">
					<table>
						<tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
							<select name="datap" id="datap" class="form-control" required>
							<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
							<option value="all">Semua Data</option>
							<option value="1">Jumlah Total Pekka</option>
							<option value="2">Jumlah Pekka Usia Produktif</option>
							<option value="3">Jumlah Pekka Rentan</option>
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
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->