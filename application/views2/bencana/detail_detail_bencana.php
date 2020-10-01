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
            <b>Kelola Data Jumlah Korban<b><?php echo $bencana; ?>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Perumahan'); ?>"></i> Ketertiban</a></li>
            <li class="active">Detail Jumlah Korban Bencana Tahun</li> <b><?php echo $periodee; ?></b>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
		<div class="box-body">
        <table class="table table-bordered table-striped" id="tampil">
		
				<?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                       $no++;
                        $id = $a['id'];
                        $name=$a['nama_kecamatan'];
                        $name_desa=$a['nama_desa'];
                        $bencana=$a['bencana_alam'];
                        $banyak=$a['banyak_bencana'];
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $tahun=$a['periode'];                     
                ?>
                <thead>
					<tr role="row" class="parent">
						<th colspan=4 style="text-align:center;">Jumlah Korban Bencana</th>
						<th style="text-align:center;">Periode <?php echo $tahun;?></th>
                    </tr>
				</thead>
                <tbody>
                	<tr>
						<td style="text-align:center;"  colspan=4 >Bencana Alam</td>
						<td style="text-align:center;" >Keterangan</td>
                    </tr>
					<tr>
						<td style="text-align:left;"  colspan=4>Lokasi Kecamatan</td>
						<td style="text-align:center;" ><?php echo $name;?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  colspan=4>Lokasi Desa</td>
						<td style="text-align:center;" ><?php echo $name_desa;?></td>
						
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4>Jenis Bencana</td>
                        <td style="text-align:center;" ><?php echo $bencana;?></td>
                        
                    </tr>
					<tr>
						<td style="text-align:left;"  colspan=4>Banyak Bencana</td>
						<td style="text-align:center;" ><?php echo $banyak;?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  colspan=4>Jumlah Korban Meninggal</td>
						<td style="text-align:center;" ><?php echo $meninggal;?></td>
						
                    </tr>
					<tr>
						<td style="text-align:left;"  colspan=4>Jumlah Korban Luka - Luka</td>
						<td style="text-align:center;" ><?php echo $luka;?> </td>
						
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
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="<?= base_url('Bencana'); ?>">Back</a>
		<a class="btn btn-s btn-warning pull-right" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
        <a class="btn btn-s btn-danger pull-right" style=" margin-left: 1em; margin-top: 1em;" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
		<?php 
			endforeach;
		?>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
                        $bencana=$a['bencana_alam'];
                        $banyak=$a['banyak_bencana'];
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $periode=$a['periode'];                    
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Jumlah Korban</h3>
                    </div>
                      <?php echo form_open_multipart('Bencana/proses_edit_bencana') ?>

                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <table>
                        <tr>
                            <td><label>Bencana Alam</label></td><td>:</td>
                            <td>
                                <select name="bencana" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($datas->result() as $key => $data){ ?>
                                <option value="<?=$data->bencana?>" <?=$data->bencana == $bencana ? "selected" : null?>><?=$data->bencana?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td width=250px><label>Banyak Bencana</label></td><td width=20>:</td>
                            <td><input name="banyak_bencana" class="form-control" type="text" value="<?php echo $banyak;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Meninggal</label></td><td width=20>:</td>
                            <td><input name="meninggal" class="form-control" type="text" value="<?php echo $meninggal;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Luka - Luka</label></td><td width=20>:</td>
                            <td><input name="luka" class="form-control" type="text" value="<?php echo $luka;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Periode</label></td><td width=20>:</td>
                            <td><input name="tahun" class="form-control" type="text" value="<?php echo $periode;?>" style="width:335px;" required></td>
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
                <?php echo form_open_multipart('Bencana/proses_delete_bencana_alam') ?>
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

