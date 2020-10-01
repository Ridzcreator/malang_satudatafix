<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Luas Lahan Sawah Dirinci Menurut Pengairan di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Jenispengairan'); ?>">Home</a> Data Luas Lahan Sawah Dirinci Menurut Pengairan di Kabupaten Malang</li>
            <li class="active"> Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Data Luas Lahan Sawah Dirinci Menurut Pengairan di Kabupaten Malang  <b><?php echo $ex = $this->uri->segment(3);?></b> </h3>			
        </div>
		<div class="box-body table-responsive">
		<table>
		<tr>
            <td>
			<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
			</td>
			<td>
			<a class="btn btn-success" href="../grafikjenispengairan/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
			</td>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;width:5%;vertical-align:middle;" rowspan="2">No</th>				
                        <th style="text-align:center;width:10%;vertical-align:middle;" rowspan="2">Periode</th>
						<th style="text-align:center;width:65%;vertical-align:middle;" colspan="4">Jenis Pengairan</th>
                        <th style="text-align:center;width:5%;vertical-align:middle;" rowspan="2">Periode</th>
                        <th style="text-align:center;width:15%;vertical-align:middle;" rowspan="2">Aksi</th>
                    </tr>
					<tr>
						<th style="text-align:center;vertical-align:middle;">Irigasi</th>
						<th style="text-align:center;vertical-align:middle;">Tadah Hujan</th>
						<th style="text-align:center;vertical-align:middle;">Rawa Pasang Surut</th>
						<th style="text-align:center;vertical-align:middle;">Rawa Lebak</th>
					</tr>
                </thead>
                <tbody>
					<?php
					$no=0;
					$jumlah1=0;
					$jumlah2=0;
					$jumlah3=0;
					$jumlah4=0;
					$persentase=0;
					$persentase1=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$kecamatan=$a['kecamatan'];
						$value=$a['irigasi'];
						$value1=$a['tadah'];
						$value2=$a['rawa_pasang'];
						$value3=$a['rawa_lebak'];
						$jumlah1=$jumlah1+$value;
						$jumlah2=$jumlah2+$value1;
						$jumlah3=$jumlah3+$value2;
						$jumlah4=$jumlah4+$value3;
                    ?>	
						<tr>
						<td><?php echo number_format($no,0,",",".");?></td>
						<td style="text-align:left;"><?php echo $kecamatan ;?></td>
						<td><?php echo number_format($value,0,",",".");?></td>
						<td><?php echo number_format($value1,0,",",".");?></td>
						<td><?php echo number_format($value2,0,",",".");?></td>
						<td><?php echo number_format($value3,0,",",".");?></td>
						<td><?php echo $periode;?></td>
						<td>
						<a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
						</td>
						</tr>
						
						
					<?php } ?>
				</tbody>
				<tfoot>
					<th colspan="2">Jumlah</th>
					<th style="text-align:center;vertical-align:middle;"><?php echo number_format($jumlah1,0,",","."); ?></th>
					<th style="text-align:center;vertical-align:middle;"><?php echo number_format($jumlah2,0,",","."); ?></th>
					<th style="text-align:center;vertical-align:middle;"><?php echo number_format($jumlah3,0,",","."); ?></th>
					<th style="text-align:center;vertical-align:middle;"><?php echo number_format($jumlah4,0,",","."); ?></th>
					<th colspan="2" ></th>
				</tfoot>
        </table>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$kecamatan=$a['kecamatan'];
						$value=$a['irigasi'];
						$value1=$a['tadah'];
						$value2=$a['rawa_pasang'];
						$value3=$a['rawa_lebak'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Luas Lahan Sawah Dirinci Menurut Pengairan</h3>
                    </div>
                    <?php echo form_open_multipart('Jenispengairan/proses_edit_detailjenispengairan/'.$periode) ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td><label>Periode</label></td><td>:</td>
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
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
							<select name="kecamatan" id="kecamatan" class="form-control" required>
							<option disabled selected value > Pilih Kecamatan </option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$kecamatani=$a['nama_kecamatan'];
							$kodekec=$a['id_kecamatan'];
							?><option value="<?php echo $kodekec; ?>" <?php if($kecamatani==$kecamatan){ echo "selected";}?> > <?php echo $kecamatani; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Jumlah Irigasi</label></td><td>:</td>
                            <td><input name="irigasi" class="form-control" type="number" value="<?php echo $value; ?>" placeholder="Jumlah Irigasi..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Tadah Hujan</label></td><td>:</td>
                            <td><input name="tadah" class="form-control" type="number" value="<?php echo $value1; ?>" placeholder="Jumlah Tadah Hujan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Rawa Pasang Surut</label></td><td>:</td>
                            <td><input name="pasang" class="form-control" type="number" value="<?php echo $value2; ?>" placeholder="Jumlah Rawa Pasang Surut..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Rawa Lebak</label></td><td>:</td>
                            <td><input name="lebak" class="form-control" type="number" value="<?php echo $value3; ?>" placeholder="Jumlah Rawa Lebak..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('Jenispengairan/proses_delete_detailjenispengairan/'.$periode) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Luas Lahan Sawah Dirinci Menurut Pengairan Kepala Keluarga</h3>
                    </div>
                    <?php echo form_open_multipart('Jenispengairan/proses_input_detailjenispengairan/'.$periode) ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
							<input name="periode" class="form-control" type="number" placeholder="Periode..." value="<?php echo $ex = $this->uri->segment(3);?>" style="width:335px;" readonly></td>
							</td>
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
                            <td><label>Jumlah Irigasi</label></td><td>:</td>
                            <td><input name="irigasi" class="form-control" type="number" placeholder="Jumlah Irigasi..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Tadah Hujan</label></td><td>:</td>
                            <td><input name="tadah" class="form-control" type="number" placeholder="Jumlah Tadah Hujan..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Rawa Pasang Surut</label></td><td>:</td>
                            <td><input name="pasang" class="form-control" type="number" placeholder="Jumlah Rawa Pasang Surut..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Rawa Lebak</label></td><td>:</td>
                            <td><input name="lebak" class="form-control" type="number" placeholder="Jumlah Rawa Lebak..." style="width:335px;" required></td>
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
	<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Jenispengairan'); ?>">Back</a>
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->