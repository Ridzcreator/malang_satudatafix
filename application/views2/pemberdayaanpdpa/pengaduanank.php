<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Laporan Pengaduan Anak Korban Kekerasan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tempat Laporan Pengaduan Anak Korban Kekerasan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Laporan Pengaduan Anak Korban Kekerasan di Kabupaten Malang</h3>			
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
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampilpengaduanank">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;" rowspan="2">No</th>
						<th style="text-align:center;width:1%;vertical-align:middle;" rowspan="2">Periode</th>
						<th style="text-align:center;width:1%;vertical-align:middle;" rowspan="2">Jumlah Kasus</th>
						<th style="text-align:center;width:5%;vertical-align:middle;" rowspan="2">Laki Laki</th>
						<th style="text-align:center;width:5%;vertical-align:middle;" rowspan="2">Perempuan</th>
						<th style="text-align:center;width:45%;vertical-align:middle;" colspan="8">Usia</th>
                        <th style="text-align:center;width:10%;text-align:center;vertical-align:middle;" rowspan="2">Aksi</th>
                    </tr>
					<tr>
						<th style="text-align:center;vertical-align:middle;">0-6 L</th>
						<th style="text-align:center;vertical-align:middle;">0-6 P</th>
						<th style="text-align:center;vertical-align:middle;">7-12 L</th>
						<th style="text-align:center;vertical-align:middle;">7-12 P</th>
						<th style="text-align:center;vertical-align:middle;">13-15 L</th>
						<th style="text-align:center;vertical-align:middle;">13-15 P</th>
						<th style="text-align:center;vertical-align:middle;">16-18 L</th>
						<th style="text-align:center;vertical-align:middle;">16-18 P</th>
					</tr>
                </thead>
                <tbody>
				</tbody>
        </table>
		
	<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Laporan Kekerasan Anak</h3>
                    </div>
                    <?php echo form_open_multipart('Pengaduanank/proses_input_pengaduanank') ?>

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
                            <td><label>Bulan</label></td><td>:</td>
                            <td>
							<select name="bulan" id="bulan" class="form-control" required>
							<option disabled selected value > Pilih Bulan </option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$value=$a['kode'];
							$namabulan=$a['keterangan'];
							?><option value="<?php echo $value; ?>"> <?php echo $namabulan; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Usia 0-6 Laki-laki</label></td><td>:</td>
                            <td><input name="usia6l" class="form-control" type="number" placeholder="Usia 0-6 Laki-laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 0-6 perempuan</label></td><td>:</td>
                            <td><input name="usia6p" class="form-control" type="number" placeholder="Usia 0-6 perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 7-12 Laki-laki</label></td><td>:</td>
                            <td><input name="usia12l" class="form-control" type="number" placeholder="Usia 7-12 Laki-laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 7-12 Perempuan</label></td><td>:</td>
                            <td><input name="usia12p" class="form-control" type="number" placeholder="Usia 7-12 Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 13-15 Laki-laki</label></td><td>:</td>
                            <td><input name="usia15l" class="form-control" type="number" placeholder="Usia 13-15 Laki-laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 13-15 Perempuan</label></td><td>:</td>
                            <td><input name="usia15p" class="form-control" type="number" placeholder="Usia 13-15 Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 16-18 Laki-laki</label></td><td>:</td>
                            <td><input name="usia18l" class="form-control" type="number" placeholder="Usia 16-18 Laki-laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 16-18 Perempuan</label></td><td>:</td>
                            <td><input name="usia18p" class="form-control" type="number" placeholder="Usia 16-18 Perempuan..." style="width:335px;" required></td>
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
					<?php echo form_open_multipart('Pengaduanank/grafik_perbandingan') ?>
					<div class="modal-body">
					<table>
						<tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
							<select name="datap" id="datap" class="form-control" required>
							<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
							<option value="all">Semua Data</option>
							<option value="1">Jumlah Total Kasus</option>
							<option value="2">Total Kasus Laki-laki Usia 0-6 Tahun</option>
							<option value="3">Total Kasus Perempuan Usia 0-6 Tahun</option>
							<option value="4">Total Kasus Laki-laki Usia 7-12 Tahun</option>
							<option value="5">Total Kasus Perempuan Usia 7-12 Tahun</option>
							<option value="6">Total Kasus Laki-laki Usia 13-15 Tahun</option>
							<option value="7">Total Kasus Perempuan Usia 13-15 Tahun</option>
							<option value="8">Total Kasus Laki-laki Usia 16-18 Tahun</option>
							<option value="9">Total Kasus Perempuan Usia 16-18 Tahun</option>
							<option value="10">Total Kasus Laki-laki Seluruh Usia</option>
							<option value="11">Total Kasus Perempuan Seluruh Usia</option>
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