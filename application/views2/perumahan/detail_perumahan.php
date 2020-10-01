<body>
<?php 
	foreach ($data->result_array() as $a):
	$periodee=$a['periode'];
	endforeach;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Sampah<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Perumahan'); ?>"></i> Perumahan</a></li>
            <li class="active">Detail Sampah Yang diHasilkan</li> <b><?php echo $periodee; ?></b>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Detail Tabel Sampah Yang Dihasilkan dan Yang Diolah Kabupaten Malang</h3>
        </div>
		<div class="box-body table-responsive">
        <table class="table table-bordered table-striped cell-border display" style="width:100%; font-size:15px;" id="tampil">
		
				<?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$hasilsrt=number_format($a['hasilsrt'],0,",",".");
						$sejenissrt=number_format($a['sejenissrt'],0,",",".");
						$tertangani=number_format($a['tertangani'],0,",",".");
						$beracun=number_format($a['beracun'],0,",",".");
						$beracunterolah=number_format($a['beracunterolah'],0,",",".");
						$limbah=number_format($a['limbah'],0,",",".");
						$limbahterolah=number_format($a['limbahterolah'],0,",",".");                        
                ?>
                <thead>
					<tr role="row" class="parent">
						<th style="text-align:center;">Sampah Yang Dihasilkan dan Yang Diolah Kabupaten Malang</th>
						<th style="text-align:center;">Periode <?php echo $periode;?></th>
                    </tr>
				</thead>
                <tbody>
                	<tr>
						<td style="text-align:center;"  >Jenis Sampah</td>
						<td style="text-align:center;" >Volume Sampah</td>
                    </tr>
					<tr>
						<td style="text-align:left;"  >Yang dihasilkan Rumah Tangga</td>
						<td style="text-align:center;" ><?php echo $hasilsrt;?> Kg/Tahun</td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Sejenis Sampah Rumah Tangga</td>
						<td style="text-align:center;" ><?php echo $sejenissrt;?> Kg/Tahun</td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Rumah Tangga Yang Terolah (Tertangani)</td>
						<td style="text-align:center;" ><?php echo $tertangani;?> Kg/Tahun</td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Yang Mengandung Bahan Berbahaya dan Beracun</td>
						<td style="text-align:center;" ><?php echo $beracun;?> Kg/Tahun</td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Yang Mengandung Bahan Berbahaya dan Beracun Yang Terolah</td>
						<td style="text-align:center;" ><?php echo $beracunterolah;?> Kg/Tahun</td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Yang Mengandung Limbah Bahan Berbahaya dan Beracun</td>
						<td style="text-align:center;" ><?php echo $limbah;?> Kg/Tahun</td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Yang Mengandung Limbah Bahan Berbahaya dan Beracun Yang Terolah</td>
						<td style="text-align:center;" ><?php echo $limbahterolah;?> Kg/Tahun</td>
						
                    </tr>
                <?php endforeach;?>
                </tbody>
        </table>

		<?php 
            $no=0;
			$total=0;
            foreach ($data->result_array() as $a):
            $id=$a['id'];
		?>
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="<?= base_url('Perumahan'); ?>">Back</a>
		<a class="btn btn-s btn-success pull-right" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="../grafik_perumahan/<?php echo $id?>">Lihat Grafik</a>
		<a class="btn btn-s btn-warning pull-right" style=" margin-left: 1em; margin-top: 1em; margin-bottom: 0.5em;" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
        <a class="btn btn-s btn-danger pull-right" style=" margin-left: 1em; margin-top: 1em;" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
		<?php 
			endforeach;
		?>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$hasilsrt=$a['hasilsrt'];
						$sejenissrt=$a['sejenissrt'];
						$tertangani=$a['tertangani'];
						$beracun=$a['beracun'];
						$beracunterolah=$a['beracunterolah'];
						$limbah=$a['limbah'];
						$limbahterolah=$a['limbahterolah'];                    
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Sampah</h3>
                    </div>
                    <?php echo form_open_multipart('Perumahan/proses_edit_sampah') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $periode;?>" placeholder="Tahun Periode Laporan...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Sampah Yang Dihasilkan Rumah Tangga</label></td><td>:</td>
                            <td><input name="srt" class="form-control" type="number" value="<?php echo $hasilsrt;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Sampah Sejenis Rumah Tangga</label></td><td>:</td>
                            <td><input name="ssrt" class="form-control" type="number" value="<?php echo $sejenissrt;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Sampah Rumah Tangga Yang Terolah</label></td><td>:</td>
                            <td><input name="ssrtt" class="form-control" type="number" value="<?php echo $tertangani;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Bahan Berbahaya Dan Beracun</label></td><td>:</td>
                            <td><input name="racun" class="form-control" step="0.01" type="number" value="<?php echo $beracun;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Bahan Berbahaya Dan Beracun Terolah</label></td><td>:</td>
                            <td><input name="racunt" class="form-control" step="0.01" type="number" value="<?php echo $beracunterolah;?>" placeholder="Jumlah Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Limbah Bahan Berbahaya Dan Beracun</label></td><td>:</td>
                            <td><input name="limbah" class="form-control" step="0.01" type="number" value="<?php echo $limbah;?>" placeholder="Jumlah Unit Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Limbah Bahan Berbahaya Dan Beracun Yang Terolah</label></td><td>:</td>
                            <td><input name="limbaht" class="form-control" step="0.01" type="number" value="<?php echo $limbahterolah;?>" placeholder="Jumlah Unit Sampah...Kg/Tahun" style="width:335px;" required></td>
						</tr>
						<?php $name = $this->session->userdata('user');?>
						<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
					</table>
                    </div>
                    <div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <input type="submit" class="btn btn-success" value="Update"></input>							
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
                <?php echo form_open_multipart('alatangkut/proses_delete_alatangkut') ?>
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
	</div>
	</div><!-- /.box-->
    </section>
    <!-- /.content -->
<br>
<br>
</div>
</body>

