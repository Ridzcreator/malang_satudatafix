<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
            MASTER PASAR MODERN
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Kelola Master Pasar Modern</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Master Pasar Modern</h3>
		</div>
		<div class="box-body">
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input Pasar Modern</a>
		<br><br>
        <table class="table table-bordered table-striped" style="font-size:15px; font-family:"Courier New""  id="tampil">
                <thead>
                    <tr>
						
                        <th style="text-align:center;width:10px;">No</th>				
                       <!--  <th style="text-align:center;width:100px;">Kode Pasar Modern</th> -->
						<th style="width:450px;">Nama Pasar Modern</th>
                        <th style="width:50px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['id_pasar'];
						$keterangan=$a['nama_pasar_modern'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                      <!--   <td style="text-align:center;"><?php echo $id;?></td> -->
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
                        $id=$a['id_pasar'];
                        $keterangan=$a['nama_pasar_modern'];
                      
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Pasar Modern</h3>
                    </div>
                    <?php echo form_open_multipart('PasarM/proses_edit_pasarm') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id_pasar" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td><label>Nama Pasar Modern</label></td>
                            <td style="padding:  20px">:</td>
                            <td><input name="nama_pasar_modern" class="form-control" type="text" value="<?php echo $keterangan;?>" placeholder="Nama Pasar Modern" style="width:335px;" required></td>
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
                <?php echo form_open_multipart('PasarM/proses_delete_pasarm') ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="id_pasar" type="hidden" value="<?php echo $id; ?>">
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pasar Modern</h3>
                    </div>
                    <?php echo form_open_multipart('PasarM/proses_input_pasarm') ?>

					<table>
						<tr>
                            <td style="padding:  20px"><label>Nama Pasar Modern</label></td>
                            <td style="padding:  20px"> : </td>
                            <td><input type="text" class="form-control" name="nama_pasar_modern" placeholder="Nama Pasar" required></td>
						</tr>
					</table>

                    <div class="modal-footer">
					
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
							
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>	
	</div><!-- /.box-->
    </section>
    <!-- /.content -->
	


</div>
</body>