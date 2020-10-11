<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Laporan Pengaduan Perempuan Korban Kekerasan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Pengaduanper'); ?>">Laporan Pengaduan Perempuan Korban Kekerasan</a></li>
			<li class="active">Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Laporan Pengaduan Perempuan Korban Kekerasan di Kabupaten Malang <b><?php echo $ex = $this->uri->segment(3);?><b></h3>			
        </div>
		<div class="box-body table-responsive">
		<table>
		<tr>
            <td>
			<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
			</td>
			<td>
			<a class="btn btn-success" href="../grafikpengaduanper/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
			</td>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;" rowspan="2">No</th>				
                        <th style="text-align:center;width:4%;vertical-align:middle;" rowspan="2">Bulan</th>
						<th style="text-align:center;width:4%;vertical-align:middle;" rowspan="2">Jumlah Kasus</th>
						<th style="text-align:center;width:4%;vertical-align:middle;" colspan="3">Usia</th>
						<th style="text-align:center;width:4%;vertical-align:middle;" colspan="6">Bentuk Kekerasan</th>
						<th style="text-align:center;text-align:center;width:4%;vertical-align:middle;" rowspan="2">Periode</th>
                        <th style="text-align:center;width:10%;text-align:center;vertical-align:middle;" rowspan="2">Aksi</th>
                    </tr>
					<tr>
						<th style="text-align:center;vertical-align:middle;">19 - 24</th>
						<th style="text-align:center;vertical-align:middle;">25 - 44</th>
						<th style="text-align:center;vertical-align:middle;">45+</th>
						<th style="text-align:center;vertical-align:middle;">Fisik & KDRT</th>
						<th style="text-align:center;vertical-align:middle;">Psikis</th>
						<th style="text-align:center;vertical-align:middle;">Seksual</th>
						<th style="text-align:center;vertical-align:middle;">Eksploitasi</th>
						<th style="text-align:center;vertical-align:middle;">Penelantaran</th>
						<th style="text-align:center;vertical-align:middle;">Lainnya</th>
					</tr>
                </thead>
                <tbody>
				<?php
					$no=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$bulan=$a['bulan'];
						$keterangan=$a['keterangan'];
						$jumlahk=$a['jumlah_kasus'];
						$muda=$a['19an'];
						$sedang=$a['25an'];
						$tua=$a['45an'];
						$kdrt=$a['kdrt'];
						$psikis=$a['psikis'];
						$seksual=$a['seksual'];
						$eksploitasi=$a['eksploitasi'];
						$penelantaran=$a['penelantaran'];
						$lainnya=$a['lainnya'];
                   
                    ?>
						<tr>
						<td><?php echo $no; ?></td>
						<td style="text-align:left;"><?php echo $keterangan; ?></td>
						<td><?php echo $jumlahk; ?></td>
						<td><?php echo $muda; ?></td>
						<td><?php echo $sedang; ?></td>
						<td><?php echo $tua; ?></td>
						<td><?php echo $kdrt; ?></td>
						<td><?php echo $psikis; ?></td>
						<td><?php echo $seksual; ?></td>
						<td><?php echo $eksploitasi; ?></td>
						<td><?php echo $penelantaran; ?></td>
						<td><?php echo $lainnya; ?></td>
						<td><?php echo $periode; ?></td>
						<td>
						<a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
						</td>
						</tr>
					<?php } ?>
				</tbody>
        </table>
		

             <?php
					$no=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$bulan=$a['bulan'];
						$jumlahk=$a['jumlah_kasus'];
						$muda=$a['19an'];
						$sedang=$a['25an'];
						$tua=$a['45an'];
						$kdrt=$a['kdrt'];
						$psikis=$a['psikis'];
						$seksual=$a['seksual'];
						$eksploitasi=$a['eksploitasi'];
						$penelantaran=$a['penelantaran'];
						$lainnya=$a['lainnya'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Laporan Perempuan Korban Kekerasan</h3>
                    </div>
                    <?php echo form_open_multipart('Pengaduanper/proses_edit_detailpengaduanper/'.$periode) ?>

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
                            <td><label>Bulan</label></td><td>:</td>
                            <td>
							<select name="bulan" id="bulan" class="form-control" required>
							<option disabled selected value > Pilih Bulan </option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$value=$a['kode'];
							$namabulan=$a['keterangan'];
							?><option value="<?php echo $value; ?>" <?php if($value==$bulan){ echo "selected";}?>> <?php echo $namabulan; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Jumlah Kasus Usia 19 - 24</label></td><td>:</td>
                            <td><input name="usia19" class="form-control" type="number" value="<?php echo $muda;?>" placeholder="Jumlah Kasus Usia 19 - 24..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Kasus Usia 25 - 44</label></td><td>:</td>
                            <td><input name="usia25" class="form-control" type="number" value="<?php echo $sedang;?>" placeholder="Jumlah Kasus Usia 25 - 44..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Kasus Usia 45 + </label></td><td>:</td>
                            <td><input name="usia45" class="form-control" type="number" value="<?php echo $tua;?>" placeholder="Jumlah Kasus Usia 45 +..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Fisik & KDRT</label></td><td>:</td>
                            <td><input name="fisik" class="form-control" type="number" value="<?php echo $kdrt;?>" placeholder="Fisik & KDRT..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Psikis</label></td><td>:</td>
                            <td><input name="psikis" class="form-control" type="number" value="<?php echo $psikis;?>" placeholder="Psikis..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Seksual</label></td><td>:</td>
                            <td><input name="seksual" class="form-control" type="number" value="<?php echo $seksual;?>" placeholder="Seksual..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Eksploitasi</label></td><td>:</td>
                            <td><input name="eksploitasi" class="form-control" type="number" value="<?php echo $eksploitasi;?>" placeholder="Eksploitasi..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Penelantaran</label></td><td>:</td>
                            <td><input name="penelantaran" class="form-control" type="number" value="<?php echo $penelantaran;?>" placeholder="Penelantaran..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Lainnya</label></td><td>:</td>
                            <td><input name="lainnya" class="form-control" type="number" value="<?php echo $lainnya;?>" placeholder="Lainnya..." style="width:335px;" required></td>
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
	
	<div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart('Pengaduanper/proses_delete_pengaduanper/'.$periode) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Laporan Perempuan Korban Kekerasan</h3>
                    </div>
                    <?php echo form_open_multipart('Pengaduanper/proses_input_detailpengaduanper/'.$periode) ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="number" value="<?php echo $periode;?>" placeholder="Periode..." style="width:335px;" readonly><td>
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
                            <td><label>Jumlah Kasus Usia 19 - 24</label></td><td>:</td>
                            <td><input name="usia19" class="form-control" type="number" placeholder="Jumlah Kasus Usia 19 - 24..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Kasus Usia 25 - 44</label></td><td>:</td>
                            <td><input name="usia25" class="form-control" type="number" placeholder="Jumlah Kasus Usia 25 - 44..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Kasus Usia 45 + </label></td><td>:</td>
                            <td><input name="usia45" class="form-control" type="number" placeholder="Jumlah Kasus Usia 45 +..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Fisik & KDRT</label></td><td>:</td>
                            <td><input name="fisik" class="form-control" type="number" placeholder="Fisik & KDRT..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Psikis</label></td><td>:</td>
                            <td><input name="psikis" class="form-control" type="number" placeholder="Psikis..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Seksual</label></td><td>:</td>
                            <td><input name="seksual" class="form-control" type="number" placeholder="Seksual..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Eksploitasi</label></td><td>:</td>
                            <td><input name="eksploitasi" class="form-control" type="number" placeholder="Eksploitasi..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Penelantaran</label></td><td>:</td>
                            <td><input name="penelantaran" class="form-control" type="number" placeholder="Penelantaran..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Lainnya</label></td><td>:</td>
                            <td><input name="lainnya" class="form-control" type="number" placeholder="Lainnya..." style="width:335px;" required></td>
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
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Pengaduanper'); ?>">Back</a>
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->