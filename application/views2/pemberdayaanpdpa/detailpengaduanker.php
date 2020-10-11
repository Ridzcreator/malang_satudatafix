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
			<h3 class="box-title">Tabel Laporan Pengaduan Korban Kekerasan di Kabupaten Malang <b><?php echo $ex = $this->uri->segment(3);?><b></h3>			
        </div>
		<div class="box-body table-responsive">
		<table>
		<tr>
            <td>
			<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
			</td>
			<td>
			<a class="btn btn-success" href="../grafikpengaduanker/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
			</td>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
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
				<?php
					$no=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$bulan=$a['bulan'];
						$keterangan=$a['keterangan'];
						$lfisik=number_format($a['lfisik'],0,",",".");
						$pfisik=number_format($a['pfisik'],0,",",".");
						$lpsikis=number_format($a['lpsikis'],0,",",".");
						$ppsikis=number_format($a['ppsikis'],0,",",".");
						$lseksual=number_format($a['lseksual'],0,",",".");
						$pseksual=number_format($a['pseksual'],0,",",".");
						$leksploitasi=number_format($a['leksploitasi'],0,",",".");
						$peksploitasi=number_format($a['peksploitasi'],0,",",".");
						$lpenelantaran=number_format($a['lpenelantaran'],0,",",".");
						$ppenelantaran=number_format($a['ppenelantaran'],0,",",".");
						$llainnya=number_format($a['llainnya'],0,",",".");
						$plainnya=number_format($a['plainnya'],0,",",".");
                   
                    ?>
						<tr>
						<td><?php echo $no; ?></td>
						<td style="text-align:left;"><?php echo $keterangan; ?></td>
						<td><?php echo $lfisik; ?></td>
						<td><?php echo $pfisik; ?></td>
						<td><?php echo $lpsikis; ?></td>
						<td><?php echo $ppsikis; ?></td>
						<td><?php echo $lseksual; ?></td>
						<td><?php echo $pseksual; ?></td>
						<td><?php echo $leksploitasi; ?></td>
						<td><?php echo $peksploitasi; ?></td>
						<td><?php echo $lpenelantaran; ?></td>
						<td><?php echo $ppenelantaran; ?></td>
						<td><?php echo $llainnya; ?></td>
						<td><?php echo $plainnya; ?></td>
						
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
						$lfisik=$a['lfisik'];
						$pfisik=$a['pfisik'];
						$lpsikis=$a['lpsikis'];
						$ppsikis=$a['ppsikis'];
						$lseksual=$a['lseksual'];
						$pseksual=$a['pseksual'];
						$leksploitasi=$a['leksploitasi'];
						$peksploitasi=$a['peksploitasi'];
						$lpenelantaran=$a['lpenelantaran'];
						$ppenelantaran=$a['ppenelantaran'];
						$llainnya=$a['llainnya'];
						$plainnya=$a['plainnya'];
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Laporan Kekerasan</h3>
                    </div>
                    <?php echo form_open_multipart('Pengaduanker/proses_edit_detailpengaduanker/'.$periode) ?>

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
                            <td><label>Fisik Laki - Laki</label></td><td>:</td>
                            <td><input name="lfisik" class="form-control" type="number" value="<?php echo $lfisik;?>" placeholder="Fisik Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Fisik Perempuan</label></td><td>:</td>
                            <td><input name="fisik" class="form-control" type="number" value="<?php echo $pfisik;?>" placeholder="Fisik Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Psikis Laki - Laki</label></td><td>:</td>
                            <td><input name="lpsikis" class="form-control" type="number" value="<?php echo $lpsikis;?>" placeholder="Psikis Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Psikis Perempuan</label></td><td>:</td>
                            <td><input name="psikis" class="form-control" type="number" value="<?php echo $ppsikis;?>" placeholder="Psikis Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Seksual Laki - Laki</label></td><td>:</td>
                            <td><input name="lseksual" class="form-control" type="number" value="<?php echo $lseksual;?>" placeholder="Seksual Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Seksual Perempuan</label></td><td>:</td>
                            <td><input name="seksual" class="form-control" type="number" value="<?php echo $pseksual;?>" placeholder="Seksual Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Eksploitasi Laki - Laki</label></td><td>:</td>
                            <td><input name="leksploitasi" class="form-control" type="number" value="<?php echo $leksploitasi;?>" placeholder="Eksploitasi Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Eksploitasi Perempuan</label></td><td>:</td>
                            <td><input name="eksploitasi" class="form-control" type="number" value="<?php echo $peksploitasi;?>" placeholder="Eksploitasi Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Penelantaran Laki - Laki</label></td><td>:</td>
                            <td><input name="lpenelantaran" class="form-control" type="number" value="<?php echo $lpenelantaran;?>" placeholder="Penelantaran Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Penelantaran Perempuan</label></td><td>:</td>
                            <td><input name="penelantaran" class="form-control" type="number" value="<?php echo $ppenelantaran;?>" placeholder="Penelantaran Perempuan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Lainnya Laki - Laki</label></td><td>:</td>
                            <td><input name="llainnya" class="form-control" type="number" value="<?php echo $llainnya;?>" placeholder="Lainnya Laki - laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Lainnya Perempuan</label></td><td>:</td>
                            <td><input name="lainnya" class="form-control" type="number" value="<?php echo $plainnya;?>" placeholder="Lainnya Perempuan..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('Pengaduanker/proses_delete_pengaduanker/'.$periode) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Perempuan Sebagai Kepala Keluarga</h3>
                    </div>
                    <?php echo form_open_multipart('Pengaduanker/proses_input_detailpengaduanker/'.$periode) ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="number" value="<?php echo $periode;?>" placeholder="Periode..." style="width:335px;" required><td>
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
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Pengaduanker'); ?>">Back</a>
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