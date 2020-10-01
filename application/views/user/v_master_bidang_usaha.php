<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Bidang Usaha<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Bidang Usaha</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Bidang Usaha Dalam Penanaman Modal di Kabupaten Malang</h3>
		</div>
		<div class="box-body">
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input Data Level User</a>
		<br><br>
        <table class="table table-bordered table-striped" style="font-size:15px; font-family:"Courier New""  id="tampil">
                <thead>
                    <tr>
						
                        <th style="text-align:center;width:10px;">No</th>               
                        <!-- <th style="text-align:center;width:10px;">Id</th> -->				
                        <th style="text-align:center;">Nama Bidang Usaha</th>
						<th style="">Keterangan Jenis Sektor</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['id'];
                        $sktr=$a['sektor'];
						$keterangan=$a['keterangan'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $sktr;?></td>
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
                        $sktr=$a['sektor'];
                        $keterangan=$a['keterangan'];
                      
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Kecamatan</h3>
                    </div>
                    <?php echo form_open_multipart('C_master_bidang/proses_edit_mstrbidang') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td><label>Nama Bidang Usaha</label></td><td>:</td>
                            <td><input name="sektor" class="form-control" type="text" value="<?php echo $sktr;?>" placeholder="Password..." style="width:335px;" required></td>
						</tr>
                        <tr>
                            <td><label>Keterangan Jenis Sektor</label></td><td>:</td>
                            <td><input name="keterangan" class="form-control" type="text" value="<?php echo $keterangan;?>" placeholder="Password..." style="width:335px;" required></td>
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
	
	<div id="modalHapus<?php echo $id?>" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart('C_master_bidang/proses_delete_mstrbidang') ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="id" type="hidden" value="<?php echo $id; ?>">
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

	<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Bidang Usaha</h3>
                    </div>
                    <?php echo form_open_multipart('C_master_bidang/proses_input_mstrbidang') ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>Nama Bidang Usaha</label></td><td> : </td>
                            <td><input type="text" class="form-control" name="sektor" placeholder="Keterangan" required></td>
						</tr>
                        <tr>
                            <td><label>Keterangan Jenis Sektor</label></td><td> : </td>
                            <td><input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required></td>
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
	</div></div><!-- /.box-->
    </section>
    <!-- /.content -->
	


</div>
</body>