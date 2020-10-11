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
            <b>Kelola Tempat Pengelolahan Sampah<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Tps'); ?>"></i> Tempat Pengelolahan Sampah</a></li>
            <li class="active">Tempat Pengelolahan Sampah</li> <b><?php echo $periodee; ?></b>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Detail Tabel Pengolahan Sampah Yang Tersedia di Kabupaten Malang</h3>
        </div>
		<div class="box-body table-responsive">
        <table class="table table-bordered table-striped cell-border display" style="width:100%; font-size:15px;" id="tampil">
                
                <?php 
                    $no=0;
					$total=0;
                    foreach ($data->result_array() as $a):
                        $no++;
						$id=$a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$tps=number_format($a['TPS'],0,",",".");
						$tpst=number_format($a['TPST'],0,",",".");
						$tpal=number_format($a['TPAlokal'],0,",",".");
						$tpar=number_format($a['TPAregional'],0,",",".");
						
                ?>
				<thead>
					<tr role="row" class="parent">
						<th style="text-align:center;">Tempat Pengelolahan Sampah Yang Tersedia di Kabupaten Malang</th>
						<th style="text-align:center;">Periode <?php echo $periode;?></th>
                    </tr>
				</thead>
				<tbody>
					<tr class="child">
						<td style="text-align:center;" class="child" >Tempat Pengelolahan Sampah</td>
						<td style="text-align:center;" class="child">Jumlah</td>
                    </tr>
					<tr class="child">
						<td style="text-align:left;" class="child" >Tempat Penampungan Sampah (TPS)</td>
						<td style="text-align:center;" class="child"><?php echo $tps;?> lokasi</td>
						
                    </tr>
					<tr class="child">
						<td style="text-align:left;" class="child" >Tempat Penampungan Sampah Terpadu (TPST)</td>
						<td style="text-align:center;" class="child"><?php echo $tpst;?> lokasi</td>
						
                    </tr>
					<tr class="child">
						<td style="text-align:left;" class="child" >Tempat Penampungan Akhir (TPA) Lokal</td>
						<td style="text-align:center;" class="child"><?php echo $tpal;?> lokasi</td>
						
                    </tr>
					<tr class="child">
						<td style="text-align:left;" class="child" >Tempat Penampungan Akhir (TPA) Regional</td>
						<td style="text-align:center;" class="child"><?php echo $tpar;?> lokasi</td>
						
                    </tr>
				</tbody>
				<tfoot>
					<tr class="child">
						<td style="text-align:left;" class="child" >Total</td>
						<td style="text-align:center;" class="child">
						<?php 
						
						$total=0;
						$total=$total+$tps+$tpst+$tpal+$tpar;
						echo number_format($total,0,",",".");
						
						?>  lokasi</td>
						
                    </tr>
				</tfoot>
                <?php endforeach;?>
				
        </table>
		<?php 
            $no=0;
			$total=0;
            foreach ($data->result_array() as $a):
            $id=$a['id'];
		?>
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="<?= base_url('Tps'); ?>">Back</a>
		<a class="btn btn-s btn-success pull-right" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="../grafik_tps/<?php echo $id?>">Lihat Grafik</a>
		<a class="btn btn-s btn-warning pull-right" style=" margin-left: 1em; margin-top: 1em;" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
        <a class="btn btn-s btn-danger pull-right" style=" margin-left: 1em; margin-top: 1em;" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
		<?php 
			endforeach;
		?>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$tps=$a['TPS'];
						$tpst=$a['TPST'];
						$tpal=$a['TPAlokal'];
						$tpar=$a['TPAregional'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data TPS</h3>
                    </div>
                    <?php echo form_open_multipart('tps/proses_edit_tps') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $periode;?>" placeholder="Periode..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPS</label></td><td>:</td>
                            <td><input name="tps" class="form-control" type="number" value="<?php echo $tps;?>" placeholder="Jumlah Lokasi TPS..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPST</label></td><td>:</td>
                            <td><input name="tpst" class="form-control" type="number" value="<?php echo $tpst;?>" placeholder="Jumlah Lokasi TPST..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPAlokal</label></td><td>:</td>
                            <td><input name="tpal" class="form-control" type="number" value="<?php echo $tpal;?>" placeholder="Jumlah Lokasi TPA Lokal..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>TPAregional</label></td><td>:</td>
                            <td><input name="tpar" class="form-control" type="number" value="<?php echo $tpar;?>" placeholder="Jumlah Lokasi TPA Regional..." style="width:335px;" required></td>
						</tr>
						<?php $name = $this->session->userdata('user');?>
						<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
					</table>
                    </div>
                    <div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
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
                <?php echo form_open_multipart('tps/proses_delete_tps') ?>
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

	</div><!-- /.box -->
    </section>
    <!-- /.content -->
</div>
</body>