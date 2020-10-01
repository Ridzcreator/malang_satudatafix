<?php 
$hal=$datakec;
$idx = $this->uri->segment(1);

?>
<body class="hold-transition skin-blue sidebar-mini">
<?php 
    foreach ($data->result_array() as $a):
    $periodee=$a['periode'];
    endforeach;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>JUMLAH PEMBINAAN / SOSIALISASI MASYARAKAT<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url($idx); ?>">Jumlah Pembinaan / Sosialisasi Masyarakat</a></li>
			<li class="active">Detail Jumlah Pembinaan / Sosialisasi Masyarakat</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Data Jumlah Pembinaan / Sosialisasi Masyarakat di Kabupaten Malang  <b><?php echo $ex = $this->uri->segment(3);?></b> </h3>			
        </div>
		<div class="box-body table-responsive">
		<table>
		<tr>
			<td>
			<a class="btn btn-success" href="../grafik_kec_jumlah_pembinaan/<?php echo $periodee?>">Lihat Grafik</a>
			</td>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;width:3%;vertical-align:middle;" >No</th>				
                        <th style="text-align:center;width:57%;vertical-align:middle;" >Jenis Pembinaan</th>	
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
						$keterangan=$a['jenis_pembinaan'];
						$jumlah=$a['jumlah'];
						$jumlah1=$jumlah1+$jumlah;
                    ?>	
						<tr>
						<td><?php echo number_format($no,0,",",".");?></td>
						<td style="text-align:left;"><?php echo $keterangan ;?></td>
						<td><?php echo number_format($jumlah,0,",",".");?></td>
						<td>
						<a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
						</td>
						</tr>
						
						
					<?php } ?>
				</tbody>
				<tfoot>
					<th style="text-align:center;" colspan=2>Jumlah</th>
					<th style="text-align:center;"><?php echo number_format($jumlah1,0,",",".");?></th>
					<th></th>
				</tfoot>
        </table>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$keterangan=$a['jenis_pembinaan'];
						$jumlah=$a['jumlah'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Jumlah Pembinaan / Sosialisasi</h3>
                    </div>
                    <?php echo form_open_multipart($idx.'/proses_edit_kec_jumlah_pembinaan/'.$periode) ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td><input type="number" class="form-control" name="periode"  value="<?php echo $periode;?>" placeholder="Periode" autocomplete="off" readonly>
							</td>
						</tr>
						<tr>
                            <td><label>Jenis Pembinaan</label></td><td>:</td>
                            <td><input name="jenis_pembinaan" class="form-control" type="text" placeholder="Jumlah..." value="<?php echo $keterangan; ?>" style="width:335px;" required readonly></td>
						</tr>
						<tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td><input name="jumlah" class="form-control" type="number" placeholder="Jumlah..." value="<?php echo $jumlah; ?>" style="width:335px;" required></td>
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

	<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url($idx); ?>">Back</a>
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->