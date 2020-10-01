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
            <b>Kelola Data Unjukrasa<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Unjukrasa'); ?>"></i> Unjukrasa</a></li>
            <li class="active">Detail Tabel Unjuk Rasa</li> <b><?php echo $periodee; ?></b>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
		<div class="box-body">
		<div class="box-header">
			<h3 class="box-title">Detail Tabel Unjuk Rasa di Malang Tiap Tahun di Kabupaten Malang</h3>
        </div>
        <table class="table table-bordered table-striped cell-border display" style="width:100%;" id="tampil1">
		
				<?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $id = $a['id'];
                        $periode=$a['periode'];
                        $politik=$a['politik'];
                        $ekonomi=$a['ekonomi'];
                        $agama=$a['agama'];
                        $lain=$a['lain'];
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $pengungsi=$a['pengungsi'];
                        $material=$a['material']; 
                        $jumlah = $politik + $ekonomi + $agama + $lain;
                        $korban = $meninggal + $luka;                       
                ?>
                <thead>
					<tr role="row" class="parent">
						<th style="text-align:center;">Unjuk Rasa di Malang Tiap Tahun di Kabupaten Malang</th>
						<th style="text-align:center;">Periode <?php echo $periode;?></th>
                    </tr>
				</thead>
                <tbody>
                	<tr>
						<td style="text-align:center;" >Unjuk Rasa</td>
						<td style="text-align:center;" >Jumlah</td>
                    </tr>
					<tr>
						<td style="text-align:left;"  >Jumlah Kasus </td>
						<td style="text-align:center;" ><?php echo $jumlah;?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Bidang Politik</td>
						<td style="text-align:center;" ><?php echo $politik;?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Bidang Agama</td>
						<td style="text-align:center;" ><?php echo $agama;?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Lainnya</td>
						<td style="text-align:center;" ><?php echo $lain;?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Korban Unjuk Rasa</td>
						<td style="text-align:center;" ><?php echo $korban;?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Meninggal</td>
						<td style="text-align:center;" ><?php echo $meninggal?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  >Luka - luka</td>
						<td style="text-align:center;" ><?php echo $luka;?> </td>
						
                    </tr>
                    <tr>
						<td style="text-align:left;"  >Luka - luka</td>
						<td style="text-align:center;" ><?php echo $luka;?> </td>
						
                    </tr>
                      <tr>
						<td style="text-align:left;"  >Jumlah Pengungsi</td>
						<td style="text-align:center;" ><?php echo $pengungsi;?> </td>
						
                    </tr>
                    <tr>
						<td style="text-align:left;"  >Kerugian Material</td>
						<td style="text-align:center;" ><?php echo $material;?> </td>
						
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
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="<?= base_url('Unjukrasa'); ?>">Back</a>
		<a class="btn btn-s btn-warning pull-right" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
        
		<?php 
			endforeach;
		?>
<?php
                    $no=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
                        $periode=$a['periode'];
                        $politik=$a['politik'];
                        $ekonomi=$a['ekonomi'];
                        $agama=$a['agama'];
                        $lain=$a['lain'];
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $pengungsi=$a['pengungsi'];
                        $material=$a['material'];                
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Unjuk Rasa</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('Unjukrasa/proses_edit_unjukrasa')) ?>

                    <div class="modal-body">
                    <?php $name = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="status" value="0" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <table>
                       <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $periode;?>" placeholder="Tahun Periode Laporan..." style="width:335px;" required></td>
                        </tr>
                       <tr>
                            <td><label>Kasus Bidang Politik</label></td><td>:</td>
                            <td><input name="politik" class="form-control" type="number"  value="<?php echo $politik;?>" placeholder="Kasus Bidang Politik..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Kasus Bidang Ekonomi</label></td><td>:</td>
                            <td><input name="ekonomi" class="form-control" type="number"  value="<?php echo $ekonomi;?>" placeholder="Kasus Bidang Ekonomi..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Kasus Bidang Agama</label></td><td>:</td>
                            <td><input name="agama" class="form-control" type="number"  value="<?php echo $agama;?>" placeholder="Kasus Bidang Agama..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Kasus lain - lain</label></td><td>:</td>
                            <td><input name="lain" class="form-control" type="number"  value="<?php echo $lain;?>" placeholder="Kasus lain - lain..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Korban Meninggal</label></td><td>:</td>
                            <td><input name="meninggal" class="form-control" type="number"  value="<?php echo $meninggal;?>" placeholder="Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Korban luka - luka</label></td><td>:</td>
                            <td><input name="luka" class="form-control" type="number"  value="<?php echo $luka;?>" placeholder="Korban luka - luka..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Pengungsi</label></td><td>:</td>
                            <td><input name="pengungsi" class="form-control" type="number"  value="<?php echo $pengungsi;?>" placeholder="Jumlah Pengungsi..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Kerugian Material</label></td><td>:</td>
                            <td><input name="material" class="form-control" type="number"  value="<?php echo $material;?>" placeholder="Kerugian Material..." style="width:335px;" required></td>
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
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
                <?php echo form_open_multipart('Unjukrasa/proses_delete_unjukrasa') ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="kodeinput" type="hidden" value="<?php echo $id; ?>">
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
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

