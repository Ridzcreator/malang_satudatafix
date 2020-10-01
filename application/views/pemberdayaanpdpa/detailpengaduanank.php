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
            <li><a href="<?= base_url('Pengaduanper'); ?>">Laporan Pengaduan Anak Korban Kekerasan</a></li>
			<li class="active">Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Laporan Pengaduan Anak Korban Kekerasan di Kabupaten Malang <b><?php echo $ex = $this->uri->segment(3);?><b></h3>			
        </div>
		<div class="box-body table-responsive">
		<table>
		<tr>
            <td>
			<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
			</td>
			<td>
			<a class="btn btn-success" href="../grafikpengaduanank/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
			</td>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;" rowspan="2">No</th>
						<th style="text-align:center;width:1%;vertical-align:middle;" rowspan="2">Bulan</th>
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
				<?php
					$no=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$bulan=$a['bulan'];
						$jumlahk=$a['jumlah_kasus'];
						$l=$a['l'];
						$p=$a['p'];
						$l06=$a['l06'];
						$p06=$a['p06'];
						$l712=$a['l712'];
						$p712=$a['p712'];
						$l1315=$a['l1315'];
						$p1315=$a['p1315'];
						$l1618=$a['l1618'];
						$p1618=$a['p1618'];
						$keterangan=$a['keterangan'];
                    ?>
						<tr>
						<td><?php echo $no; ?></td>
						<td style="text-align:left;"><?php echo $keterangan; ?></td>
						<td><?php echo $periode; ?></td>
						<td><?php echo $jumlahk; ?></td>
						<td><?php echo $l; ?></td>
						<td><?php echo $p; ?></td>
						<td><?php echo $l06; ?></td>
						<td><?php echo $p06; ?></td>
						<td><?php echo $l712; ?></td>
						<td><?php echo $p712; ?></td>
						<td><?php echo $l1315; ?></td>
						<td><?php echo $p1315; ?></td>
						<td><?php echo $l1618; ?></td>
						<td><?php echo $p1618; ?></td>
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
						$l=$a['l'];
						$p=$a['p'];
						$l06=$a['l06'];
						$p06=$a['p06'];
						$l712=$a['l712'];
						$p712=$a['p712'];
						$l1315=$a['l1315'];
						$p1315=$a['p1315'];
						$l1618=$a['l1618'];
						$p1618=$a['p1618'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Laporan Kekerasan Anak</h3>
                    </div>
                    <?php echo form_open_multipart('Pengaduanank/proses_edit_detailpengaduanank/'.$periode) ?>

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
							?><option value="<?php echo $value; ?>"<?php if($value==$bulan){ echo "selected";}?>> <?php echo $namabulan; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Usia 0-6 Laki-laki</label></td><td>:</td>
                            <td><input name="usia6l" class="form-control" type="number" value="<?php echo $l06;?>" placeholder="Usia 0-6 Laki-laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 0-6 perempuan</label></td><td>:</td>
                            <td><input name="usia6p" class="form-control" type="number" value="<?php echo $p06;?>" placeholder="Usia 0-6 perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 7-12 Laki-laki</label></td><td>:</td>
                            <td><input name="usia12l" class="form-control" type="number" value="<?php echo $l712;?>" placeholder="Usia 7-12 Laki-laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 7-12 Perempuan</label></td><td>:</td>
                            <td><input name="usia12p" class="form-control" type="number" value="<?php echo $p712;?>" placeholder="Usia 7-12 Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 13-15 Laki-laki</label></td><td>:</td>
                            <td><input name="usia15l" class="form-control" type="number" value="<?php echo $l1315;?>" placeholder="Usia 13-15 Laki-laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 13-15 Perempuan</label></td><td>:</td>
                            <td><input name="usia15p" class="form-control" type="number" value="<?php echo $p1315;?>" placeholder="Usia 13-15 Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 16-18 Laki-laki</label></td><td>:</td>
                            <td><input name="usia18l" class="form-control" type="number" value="<?php echo $l1618;?>" placeholder="Usia 16-18 Laki-laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Usia 16-18 Perempuan</label></td><td>:</td>
                            <td><input name="usia18p" class="form-control" type="number" value="<?php echo $p1618;?>" placeholder="Usia 16-18 Perempuan..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('Pengaduanank/proses_delete_pengaduanank/'.$periode) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Laporan Kekerasan Anak</h3>
                    </div>
                    <?php echo form_open_multipart('Pengaduanank/proses_input_detailpengaduanank/'.$periode) ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="number" value="<?php echo $periode;?>" placeholder="Periode..." style="width:335px;" readonly><td></td>
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
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Pengaduanank'); ?>">Back</a>
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->