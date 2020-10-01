<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Aset<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Aset</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Data Aset Kabupaten Malang</h3>
		</div>
	<div class="box-body">
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Master Aset</a>
		<br><br>
        <table class="table table-bordered table-striped" style="font-size:15px;"  id="tampilaset">
                <thead>
                    <tr>
						
                        <th style="text-align:center;width:10px;">No</th>				
                     <!--    <th style="text-align:center;width:100px;">Kode Aset</th> -->
						<th style="width:450px;">Nama Aset</th>
                        <th style="width:50px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['id'];
						$keterangan=$a['keterangan'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                     <!--    <td style="text-align:center;"><?php echo $id;?></td> -->
						<td><?php echo $keterangan;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                            <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
				</tbody>
        </table>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
						$keterangan=$a['keterangan'];
                      
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Aset</h3>
                    </div>
                    <?php echo form_open_multipart('Master_aset/proses_edit_aset') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td><label>Nama Aset</label></td><td>:</td>
                            <td><input name="keterangan" class="form-control" type="text" value="<?php echo $keterangan;?>" placeholder="Nama Aset..." style="width:335px;" required></td>
						</tr>
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
                <?php echo form_open_multipart('Master_aset/proses_delete_aset') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Aset</h3>
                    </div>
                    <?php echo form_open_multipart('Master_aset/proses_input_aset') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td><label>Nama Aset</label></td><td> : </td>
                            <td><input type="text" class="form-control" name="keterangan" placeholder="Nama Aset" required></td>
						</tr>
					</table>
                    </div>
                    <div class="modal-footer">
					
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
							
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>	
	</div><!-- /.box-->
	</div>
    </section>
    <!-- /.content -->
	


</div>
</body>