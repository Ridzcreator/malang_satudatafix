<?php $hal=30;//gedangan
$idx = $this->uri->segment(1);
$tujuan = "gedangan";
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Struktur Pemerintahan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Struktur Pemerintahan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tabel Struktur Pemerintahan di Kab. Malang</h3>			
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
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampil_struktur_pemerintahan">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;">No</th>				
                        <th style="text-align:center;width:4%;">Desa</th>
						<th style="text-align:center;width:4%;">Dusun</th>
						<th style="text-align:center;width:4%;">RW</th>
						<th style="text-align:center;width:4%;">RT</th>
						<th style="text-align:center;width:4%;">Jumlah</th>
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
						$value=$a['desa'];
						$value1=$a['dusun'];
						$value2=$a['rw'];
						$value3=$a['rt'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Struktur Pemerintahan</h3>
                    </div>
                    <?php echo form_open_multipart($idx.'/proses_edit_'.$tujuan.'_struktur_pemerintahan') ?>

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
                            <td><label>Desa</label></td><td>:</td>
                            <td><input name="desa" class="form-control" type="number" value="<?php echo $value;?>" placeholder="Jumlah Desa..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Dusun</label></td><td>:</td>
                            <td><input name="dusun" class="form-control" type="number" value="<?php echo $value1;?>" placeholder="Jumlah Dusun..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>RW</label></td><td>:</td>
                            <td><input name="rw" class="form-control" type="number" value="<?php echo $value2;?>" placeholder="Jumlah RW..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>RT</label></td><td>:</td>
                            <td><input name="rt" class="form-control" type="number" value="<?php echo $value3;?>" placeholder="Jumlah RT..." style="width:335px;" required></td>
						</tr>
						<?php $name = $this->session->userdata('user');?>
						<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
						<input class="form-control" type="hidden" name="kecamatan" value="<?php echo $hal;?>" style="width:335px;" readonly>
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
                <?php echo form_open_multipart($idx.'/proses_delete_'.$tujuan.'_struktur_pemerintahan') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data</h3>
                    </div>
                    <?php echo form_open_multipart($idx.'/proses_input_'.$tujuan.'_struktur_pemerintahan') ?>

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
                            <td><label>Desa</label></td><td>:</td>
                            <td><input name="desa" class="form-control" type="number" placeholder="Jumlah Desa..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Dusun</label></td><td>:</td>
                            <td><input name="dusun" class="form-control" type="number" placeholder="Jumlah Dusun..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>RW</label></td><td>:</td>
                            <td><input name="rw" class="form-control" type="number" placeholder="Jumlah RW..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>RT</label></td><td>:</td>
                            <td><input name="rt" class="form-control" type="number" placeholder="Jumlah RT..." style="width:335px;" required></td>
						</tr>
						<?php $name = $this->session->userdata('user');?>
						<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
						<input class="form-control" type="hidden" name="kecamatan" value="<?php echo $hal;?>" style="width:335px;" readonly>
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
					<?php echo form_open_multipart($idx.'/grafik_perbandingan') ?>
					<div class="modal-body">
					<table>
						<tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
							<select name="datap" id="datap" class="form-control" required>
							<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
							<option value="all">Semua Data</option>
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
						<input class="form-control" type="hidden" name="kecamatan" value="<?php echo $hal;?>" style="width:335px;" readonly>
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