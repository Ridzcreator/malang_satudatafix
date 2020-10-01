<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Laporan Pengaduan Korban Kekerasan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Tempat Laporan Pengaduan Korban Kekerasan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Laporan Pengaduan Korban Kekerasan di Kabupaten Malang</h3>			
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
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampilpengaduanker">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;">No</th>
						<th style="text-align:center;width:8%;vertical-align:middle;">Periode</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">F L</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">F P</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Ps L</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Ps P</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">S L</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">S P</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Ek L</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Ek P</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Pen L</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Pen P</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Lai L</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Lai P</th>
						<th style="text-align:center;width:10%;vertical-align:middle;">Aksi</th>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Laporan Kasus Kekerasan</h3>
                    </div>
                    <?php echo form_open_multipart('Pengaduanker/proses_input_pengaduanker') ?>

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
                            <td><label>Fisik Laki - Laki</label></td><td>:</td>
                            <td><input name="lfisik" class="form-control" type="number" placeholder="Fisik Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Fisik Perempuan</label></td><td>:</td>
                            <td><input name="fisik" class="form-control" type="number" placeholder="Fisik Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Psikis Laki - Laki</label></td><td>:</td>
                            <td><input name="lpsikis" class="form-control" type="number" placeholder="Psikis Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Psikis Perempuan</label></td><td>:</td>
                            <td><input name="psikis" class="form-control" type="number" placeholder="Psikis Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Seksual Laki - Laki</label></td><td>:</td>
                            <td><input name="lseksual" class="form-control" type="number" placeholder="Seksual Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Seksual Perempuan</label></td><td>:</td>
                            <td><input name="seksual" class="form-control" type="number" placeholder="Seksual Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Eksploitasi Laki - Laki</label></td><td>:</td>
                            <td><input name="leksploitasi" class="form-control" type="number" placeholder="Eksploitasi Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Eksploitasi Perempuan</label></td><td>:</td>
                            <td><input name="eksploitasi" class="form-control" type="number" placeholder="Eksploitasi Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Penelantaran Laki - Laki</label></td><td>:</td>
                            <td><input name="lpenelantaran" class="form-control" type="number" placeholder="Penelantaran Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Penelantaran Perempuan</label></td><td>:</td>
                            <td><input name="penelantaran" class="form-control" type="number" placeholder="Penelantaran Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Lainnya Laki - Laki</label></td><td>:</td>
                            <td><input name="llainnya" class="form-control" type="number" placeholder="Lainnya Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Lainnya Perempuan</label></td><td>:</td>
                            <td><input name="lainnya" class="form-control" type="number" placeholder="Lainnya Perempuan..." style="width:335px;" required></td>
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
					<?php echo form_open_multipart('Pengaduanker/grafik_perbandingan') ?>
					<div class="modal-body">
					<table>
						<tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
							<select name="datap" id="datap" class="form-control" required>
							<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
							<option value="all">Semua Data</option>
							<option value="1">Fisik Laki laki</option>
							<option value="2">Fisik Perempuan</option>
							<option value="3">Psikis Laki laki</option>
							<option value="4">Psikis Perempuan</option>
							<option value="5">Seksual Laki laki</option>
							<option value="6">Seksual Perempuan</option>
							<option value="7">Eksploitasi Laki laki</option>
							<option value="8">Eksploitasi Perempuan</option>
							<option value="9">Lainnya Laki laki</option>
							<option value="10">Lainnya Perempuan</option>
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
	<table width=100%>
	<tr>
	<td></td>
	<td>
	<div class="callout callout-info pull-middle" style="position:relative;align:center;">
	<table style="align:center;">
	<tr>
		<td width=25%></td><td width=25% style="text-align:left;">F L : Fisik Laki - Laki</td><td> | </td><td width=25% style="text-align:left;">F P : Fisik Perempuan</td><td width=25%></td>
	</tr><tr>
		<td></td><td style="text-align:left;">Ps L : Psikis Laki - Laki</td><td> | </td><td style="text-align:left;">Ps P : Psikis Perempuan</td><td width=25%></td>
	</tr><tr>
		<td></td><td style="text-align:left;">S L : Seksual Laki - Laki</td><td> | </td><td style="text-align:left;">S P : Seksual Perempuan</td><td width=25%></td>
	</tr><tr>
		<td></td><td style="text-align:left;">Ek L : Eksploitasi Laki - Laki</td><td> | </td><td style="text-align:left;">Ek P : Eksploitasi Perempuan</td><td width=25%></td>
	</tr><tr>
		<td></td><td style="text-align:left;">Pen L : Penelantaran Laki - Laki</td><td> | </td><td style="text-align:left;">Pen P : Penelantaran Perempuan</td><td width=25%></td>
	</tr><tr>
		<td></td><td style="text-align:left;">Lai L : Lainnya Laki - Laki</td><td> | </td><td style="text-align:left;">Lai P : Lainnya Perempuan</td><td width=25%></td>
	</tr>
	</table>
	</div>
	</td><td></td>
	</tr>
	</table>
</div>	
</body><!-- /.body -->