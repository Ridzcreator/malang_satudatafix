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
            <b>JUMLAH ASET<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url($idx); ?>"></i>Jumlah Aset</a></li>
            <li class="active">Detail</li> <b><?php echo $periodee; ?></b>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Detail Tabel Jumlah Aset di Kabupaten Malang</h3>
        </div>
		<div class="box-body table-responsive">
       <table>
        <tr>
			<td>
			     <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $periodee?></a>
			</td>
            <td>
                 <a class="btn btn-success" href="../grafik_jumlah_aset/<?php echo $periodee?>">Lihat Grafik</a>
            </td>
        </tr>
        </table>
       </table>
                <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;">No</th>
                        <th style="text-align:center;width:40%;vertical-align:middle;">Nama Aset</th>
                        <th style="text-align:center;width:20%;vertical-align:middle;">Jumlah Aset</th>
                        <th style="text-align:center;width:20%;vertical-align:middle;">Nominal</th>
                        <th style="text-align:center;width:20%;vertical-align:middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    $total=0;
					$total1=0;
                    foreach ($data->result_array() as $a){
                        $no++;
                        $id = $a['id'];
                        $penginput=$a['penginput'];
                        $value=$a['keterangan'];
                        $value1=$a['jumlah'];
						$value2=$a['nominal'];
						$total=$total+$value1;
						$total1=$total1+$value2;
                ?>

                        <tr>
                        <td><?php echo $no; ?></td>
                        <td style="text-align:left;"><?php echo $value; ?></td>
                        <td style="text-align:center;"><?php echo number_format($value1,0,",","."); ?></td>
                        <td style="text-align:right;"><?php echo number_format($value2,0,",","."); ?></td>
                        
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
				<tfoot>
					<tr class="child">
						<td></td>
						<td style="text-align:left;" class="child" >Total</td>
						<td style="text-align:center;" class="child">
						<?php 
						echo number_format($total,0,",",".");
						?></td>
						<td style="text-align:right;"><?php 
						echo number_format($total1,0,",",".");
						?></td><td ></td>
                    </tr>
				</tfoot>
        </table>
		
         <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $penginput=$a['penginput'];
                        $periode=$a['periode'];
                        $valuex=$a['aset'];
                        $value1=$a['jumlah'];
						$value2=$a['nominal'];
						$keterangan=$a['keterangan'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Jumlah Aset</h3>
                    </div>
                    <?php echo form_open_multipart($idx.'/proses_edit_jumlah_aset/'.$periodee) ?>

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
                            <td><label>Aset</label></td><td>:</td>
                            <td>
							<select name="aset" id="aset" class="form-control" required>
							<option disabled selected value > Pilih Aset</option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$value=$a['id'];
							$aset=$a['keterangan'];
							?><option value="<?php echo $value; ?>" <?php if($value==$valuex){echo "selected";}?>> <?php echo $aset; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
                        <tr>
                            <td><label>Jumlah Aset</label></td><td>:</td>
                            <td><input name="jumlah" class="form-control" type="number" value="<?php echo $value1;?>" placeholder="Jumlah Aset..." style="width:335px;" required></td>
                        </tr>
						<tr>
                            <td><label>Nominal</label></td><td>:</td>
                            <td><input name="nominal" class="form-control" type="number" value="<?php echo $value2;?>" placeholder="Nominal" style="width:335px;" required></td>
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
                <?php echo form_open_multipart($idx.'/proses_delete_jumlah_aset/'.$periodee) ?>
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
                    <?php echo form_open_multipart($idx.'/proses_input_detail_jumlah_aset/'.$periodee) ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>periode</label></td><td>:</td>
                            <td>
							<input name="periode" class="form-control" type="number" placeholder="Periode ..." value="<?php echo $ex = $this->uri->segment(3);?>" style="width:335px;" readonly></td>
							</td>
						</tr>
						<tr>
                            <td><label>Aset</label></td><td>:</td>
                            <td>
							<select name="aset" id="aset" class="form-control" required>
							<option disabled selected value > Pilih Aset</option>
							<?php 
							foreach ($dataxs->result_array() as $a){
							$value=$a['id'];
							$aset=$a['keterangan'];
							?><option value="<?php echo $value; ?>"> <?php echo $aset; ?> </option>
							<?php } ?>				
							</select>
							</td>
						</tr>
						<tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td><input name="jumlah" class="form-control" type="number" placeholder="Jumlah Aset ..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Nominal</label></td><td>:</td>
                            <td><input name="nominal" class="form-control" type="number" placeholder="Nominal ..." style="width:335px;" required></td>
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
	</div><!-- /.box -->
    </section>
    <!-- /.content -->
</div>
</body>