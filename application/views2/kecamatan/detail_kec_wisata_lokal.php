<?php 
$hal=$datakec;
$idx = $this->uri->segment(1);
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
            <b>JUMLAH WISATA LOKAL<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url($idx); ?>"></i>Jumlah Wisata Lokal</a></li>
            <li class="active">Detail</li> <b><?php echo $periodee; ?></b>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Detail Tabel Jumlah Wisata Lokal di Kabupaten Malang</h3>
        </div>
		<div class="box-body table-responsive">
       </table>
                <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampil">
                <thead>
                    <tr>
                        <th style="text-align:center;width:60%;vertical-align:middle;">Jenis Wisata</th>
                        <th style="text-align:center;width:19%;vertical-align:middle;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $total=0;
                    foreach ($data->result_array() as $a){
                        $id = $a['id'];
                        $penginput=$a['penginput'];
                        $value1=$a['wisata_alam'];
                        $value2=$a['wisata_buatan'];
                        $value3=$a['wisata_edukasi'];
                        $value4=$a['wisata_budaya'];
						$total=$total+$value1;
					}
                ?>

                        <tr>
                        <td style="text-align:left;">Wisata Alam</td>
                        <td style="text-align:center;"><?php echo $value1; ?></td>
                        </tr>
						<tr>
                        <td style="text-align:left;">Wisata Buwatan</td>
                        <td style="text-align:center;"><?php echo $value2; ?></td>
                        </tr>
						<tr>
                        <td style="text-align:left;">Wisata Edukasi</td>
                        <td style="text-align:center;"><?php echo $value3; ?></td>
                        </tr>
						<tr>
                        <td style="text-align:left;">Wisata Budaya</td>
                        <td style="text-align:center;"><?php echo $value4; ?></td>
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
        </table>
		
         <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $penginput=$a['penginput'];
                        $value1=$a['wisata_alam'];
                        $value2=$a['wisata_buatan'];
                        $value3=$a['wisata_edukasi'];
                        $value4=$a['wisata_budaya'];
						$periode=$a['periode'];
						$total=$total+$value1;
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Jumlah Wisata Lokal</h3>
                    </div>
                    <?php echo form_open_multipart($idx.'/proses_edit_detail_wisata_lokal/'.$periodee) ?>

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
                            <td><label>Wisata Alam</label></td><td>:</td>
                            <td><input name="value" class="form-control" type="number" placeholder="Jumlah Wisata Alam" value="<?php echo $value1;?>" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Wisata Buatan</label></td><td>:</td>
                            <td><input name="value1" class="form-control" type="number" placeholder="Jumlah Wisata Buatan" value="<?php echo $value2;?>" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Wisata Edukasi</label></td><td>:</td>
                            <td><input name="value2" class="form-control" type="number" placeholder="Jumlah Wisata Edukasi" value="<?php echo $value3;?>" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Wisata Budaya</label></td><td>:</td>
                            <td><input name="value3" class="form-control" type="number" placeholder="Jumlah Wisata Budaya" value="<?php echo $value4;?>" style="width:335px;" required></td>
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
                <?php echo form_open_multipart($idx.'/proses_delete_wisata_lokal') ?>
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
                    <?php echo form_open_multipart($idx.'/proses_input_detail_wisata_lokal/'.$periodee) ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td>
							<input name="periode" class="form-control" type="number" placeholder="Periode..." value="<?php echo $ex = $this->uri->segment(3);?>" style="width:335px;" readonly></td>
							</td>
						</tr>
						<tr>
                            <td><label>Wisata Alam</label></td><td>:</td>
                            <td><input name="value" class="form-control" type="number" placeholder="Jumlah Wisata Alam" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Wisata Buatan</label></td><td>:</td>
                            <td><input name="value1" class="form-control" type="number" placeholder="Jumlah Wisata Buatan" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Wisata Edukasi</label></td><td>:</td>
                            <td><input name="value2" class="form-control" type="number" placeholder="Jumlah Wisata Edukasi" style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Wisata Budaya</label></td><td>:</td>
                            <td><input name="value3" class="form-control" type="number" placeholder="Jumlah Wisata Budaya" style="width:335px;" required></td>
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
		<a class="btn btn-s btn-success pull-right" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="../grafik_wisata_lokal/<?php echo $id?>">Lihat Grafik</a>
		<a class="btn btn-s btn-warning pull-right" style=" margin-left: 1em; margin-top: 1em; margin-bottom: 0.5em;" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
        <a class="btn btn-s btn-danger pull-right" style=" margin-left: 1em; margin-top: 1em;" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
	</div><!-- /.box -->
    </section>
    <!-- /.content -->
</div>
</body>