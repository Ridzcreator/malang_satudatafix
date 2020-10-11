<?php $hal=21;//Poncokusumo
$idx = $this->uri->segment(1); 
$tujuan = "poncokusumo";
?>
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
            <b>Struktur Pemerintahan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url($idx); ?>"></i> Struktur Pemerintahan</a></li>
            <li class="active">Detail</li> <b><?php echo $periodee; ?></b>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Detail Tabel Struktur Pemerintahan di Kabupaten Malang</h3>
        </div>
		<div class="box-body table-responsive">
        <table class="table table-bordered table-striped cell-border display" style="width:100%;" id="tampil">
                
                <?php 
                    $no=0;
					$total=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$value=$a['desa'];
						$value1=$a['dusun'];
						$value2=$a['rw'];
						$value3=$a['rt'];
						$total=$value+$value1+$value2+$value3;
						
                ?>
				<thead>
					<tr role="row" class="parent">
						<th style="text-align:center;">Data Struktur Pemerintahan di Kabupaten Malang</th>
						<th style="text-align:center;">Periode <?php echo $periode;?></th>
                    </tr>
				</thead>
				<tbody>
					<tr class="child">
						<td style="text-align:center;" class="child" >Struktur Pemerintahan</td>
						<td style="text-align:center;" class="child">Jumlah</td>
                    </tr>
					<tr class="child">
						<td style="text-align:left;" class="child" >Desa</td>
						<td style="text-align:center;" class="child"><?php echo $value;?></td>
						
                    </tr>
					<tr class="child">
						<td style="text-align:left;" class="child" >Dusun</td>
						<td style="text-align:center;" class="child"><?php echo $value1;?></td>
						
                    </tr>
					<tr class="child">
						<td style="text-align:left;" class="child" >RT</td>
						<td style="text-align:center;" class="child"><?php echo $value2;?></td>
						
                    </tr>
					<tr class="child">
						<td style="text-align:left;" class="child" >RW</td>
						<td style="text-align:center;" class="child"><?php echo $value3;?></td>
						
                    </tr>
				</tbody>
				<tfoot>
					<tr class="child">
						<td style="text-align:left;" class="child" >Total</td>
						<td style="text-align:center;" class="child">
						<?php 
						echo number_format($total,0,",",".");
						?></td>
						
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
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="<?= base_url($idx); ?>">Back</a>
		<a class="btn btn-s btn-success pull-right" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="../grafik_<?php echo $tujuan;?>_struktur_pemerintahan/<?php echo $id?>">Lihat Grafik</a>
		<a class="btn btn-s btn-warning pull-right" style=" margin-left: 1em; margin-top: 1em;" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
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

	</div><!-- /.box -->
    </section>
    <!-- /.content -->
</div>
</body>