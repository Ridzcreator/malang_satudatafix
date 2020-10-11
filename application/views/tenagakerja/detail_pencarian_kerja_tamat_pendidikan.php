<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Pencari Kerja Yang Terdaftar Menurut Tingkat Pendidikan Yang Ditamatkan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Pencariantapend'); ?>">Jumlah Pencari Kerja Yang Terdaftar Menurut Tingkat Pendidikan Yang Ditamatkan di Kabupaten Malang</a></li>
			<li class="active">Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Pencari Kerja Yang Terdaftar Menurut Tingkat Pendidikan Yang Ditamatkan di Kabupaten Malang <b><?php echo $ex = $this->uri->segment(3);?><b> </h3>			
        </div>
		<div class="box-body table-responsive">
		<table>
		<tr>
            <td>
			<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
			</td>
			<td>
			<a class="btn btn-success" href="../grafikpencariantapend/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
			</td>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;" rowspan="2">No</th>				
                        <th style="text-align:center;width:5%;vertical-align:middle;" rowspan="2">Pendidikan</th>
						<th style="text-align:center;width:25%;vertical-align:middle;" colspan="2">Jenis Kelamin</th>
						<th style="text-align:center;width:5%;vertical-align:middle;" rowspan="2">Jumlah</th>
						<th style="text-align:center;width:5%;vertical-align:middle;" rowspan="2">Periode</th>
                        <th style="text-align:center;width:3%;vertical-align:middle;" rowspan="2">Aksi</th>
                    </tr>
					<tr>
						<th style="text-align:center;vertical-align:middle;">Laki-Laki</th>
						<th style="text-align:center;vertical-align:middle;">Perempuan</th>
					</tr>
                </thead>
                <tbody>
					<?php
					$no=0;
					$jumlah1=0;
					$jumlah2=0;
					$jumlah3=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$pendidikan=$a['keterangan'];
						$l=$a['l'];
						$p=$a['p'];
						$jumlah=$a['jumlah'];
						$jumlah1=$jumlah1+$l;
						$jumlah2=$jumlah2+$p;
						$jumlah3=$jumlah3+$jumlah;
                    ?>	
						<tr>
						<td><?php echo number_format($no,0,",",".");?></td>
						<td style="text-align:left;"><?php echo $pendidikan;?></td>
						<td><?php echo number_format($l,0,",",".");?></td>
						<td><?php echo number_format($p,0,",",".");?></td>
						<td><?php echo number_format($jumlah,0,",",".");?></td>
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
					<th colspan="2" ></th>
				</tfoot>
        </table>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$keterangan=$a['keterangan'];
						$l=$a['l'];
						$p=$a['p'];
						$jumlah=$a['jumlah'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data TPS</h3>
                    </div>
                    <?php echo form_open_multipart('Pencariantapend/proses_edit_detailpencariantapend/'.$periode) ?>

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
                            <td><label>Pendidikan</label></td><td>:</td>
                            <td>
							<select name="pendidikan" id="pendidikan" class="form-control" required>
							<option disabled selected value > Pilih Pendidikan</option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$value=$a['id'];
							$pendidikan=$a['keterangan'];
							?><option value="<?php echo $value; ?>" <?php if($pendidikan==$keterangan){echo "selected";}?>> <?php echo $pendidikan; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Jumlah Laki-Laki</label></td><td>:</td>
                            <td><input name="jl" class="form-control" type="number" value="<?php echo $l;?>" placeholder="Jumlah Laki-Laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Perempuan</label></td><td>:</td>
                            <td><input name="jp" class="form-control" type="number" value="<?php echo $p;?>" placeholder="Jumlah Perempuan..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('Pencariantapend/proses_delete_detailpencariantapend/'.$periode) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data <h4>Pencari Kerja Yang Terdaftar Menurut Tingkat Pendidikan Yang Ditamatkan</h1></h3>
                    </div>
                    <?php echo form_open_multipart('Pencariantapend/proses_input_detailpencariantapend/'.$periode) ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
							<input name="periode" class="form-control" type="number" placeholder="Periode..." value="<?php echo $ex = $this->uri->segment(3);?>" style="width:335px;" readonly></td>
							</td>
						</tr>
						<tr>
                            <td><label>Pendidikan</label></td><td>:</td>
                            <td>
							<select name="pendidikan" id="pendidikan" class="form-control" required>
							<option disabled selected value > Pilih Pendidikan</option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$value=$a['id'];
							$pendidikan=$a['keterangan'];
							?><option value="<?php echo $value; ?>"> <?php echo $pendidikan; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Jumlah Laki-Laki</label></td><td>:</td>
                            <td><input name="jl" class="form-control" type="number" placeholder="Jumlah Laki-Laki..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Jumlah Perempuan</label></td><td>:</td>
                            <td><input name="jp" class="form-control" type="number" placeholder="Jumlah Perempuan..." style="width:335px;" required></td>
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
	<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Pencariantapend'); ?>">Back</a>
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->