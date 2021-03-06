<?php 
$hal=$datakec;
$idx = $this->uri->segment(1);
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Jaminan Kesehatan Masyarakat<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url($idx); ?>">Jaminan Kesehatan</a></li>
			<li class="active">Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Data Penduduk Terfasilitasi Jaminan Kesehatan Masyarakat di Kabupaten Malang  <b><?php echo $ex = $this->uri->segment(3);?></b> </h3>			
        </div>
		<div class="box-body table-responsive">
		<table>
		<tr>
            <td>
			<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
			</td>
			<td>
			<a class="btn btn-success" href="../grafikkec_jamkesmas/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
			</td>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;width:3%;vertical-align:middle;" >No</th>				
                        <th style="text-align:center;width:57%;vertical-align:middle;" >Desa</th>	
                        <th style="text-align:center;width:15%;vertical-align:middle;" >Jumlah</th>
                        <th style="text-align:center;width:25%;text-align:center;vertical-align:middle;" >Aksi</th>
                    </tr>
                </thead>
                <tbody>
					<?php
					$no=0;
					$jumlah1=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$keterangan=$a['nama_desa'];
						$jumlah=$a['jumlah'];
						$jumlah1=$jumlah1+$jumlah;
                    ?>	
						<tr>
						<td><?php echo number_format($no,0,",",".");?></td>
						<td style="text-align:left;"><?php echo $keterangan ;?></td>
						<td><?php echo number_format($jumlah,0,",",".");?> Unit</td>
						<td>
						<a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
						</td>
						</tr>
						
						
					<?php } ?>
				</tbody>
				<tfoot>
					<th colspan=2>Jumlah</th>
					<th style="text-align:center;"><?php echo number_format($jumlah1,0,",",".");?> Unit</th>
					<th></th>
				</tfoot>
        </table>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$keterangan=$a['desa'];
						$jumlah=$a['jumlah'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Banyak Jaminan Kesehatan</h3>
                    </div>
                    <?php echo form_open_multipart($idx.'/proses_edit_detailkec_jamkesmas/'.$periode) ?>

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
                            <td><label>Nama Desa</label></td><td>:</td>
                            <td>
							<select name="desa" id="ket" class="form-control" required>
							<option disabled selected value > Pilih Desa </option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$id=$a['id_desa'];
							$desa=$a['nama_desa'];
							?><option value="<?php echo $id; ?>" <?php if($id==$keterangan){echo "selected";}?>> <?php echo $desa; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td><input name="unit" class="form-control" type="number" placeholder="Jumlah..." value="<?php echo $jumlah; ?>" style="width:335px;" required></td>
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
		<?php } ?>
		<?php
                    foreach ($data->result_array() as $a) {
                       
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$keterangan=$a['desa'];
						$jumlah=$a['jumlah'];
                   
                    ?>
	<div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart($idx.'/proses_delete_detailkec_jamkesmas/'.$periode) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Jaminan Kesehatan Tahun <?php echo $periode; ?></h3>
                    </div>
                    <?php echo form_open_multipart($idx.'/proses_input_detailkec_jamkesmas/'.$periode) ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td>
							<input name="periode" class="form-control" type="number" placeholder="Periode..." value="<?php echo $ex = $this->uri->segment(3);?>" style="width:335px;" readonly></td>
							</td>
						</tr>
						<tr>
                            <td><label>Nama Desa</label></td><td>:</td>
                            <td>
							<select name="desa" id="ket" class="form-control" required>
							<option disabled selected value > Pilih Desa </option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$value=$a['id_desa'];
							$alat=$a['nama_desa'];
							?><option value="<?php echo $value; ?>"> <?php echo $alat; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td><input name="unit" class="form-control" type="number" placeholder="Jumlah..." style="width:335px;" required></td>
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
	<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url($idx); ?>">Back</a>
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->