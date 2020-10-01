<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Level User<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Level User</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Master Desa Kabupaten Malang</h3>
		</div>
		<div class="box-body">
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Master Level User</a>
		<br><br>
        <table class="table table-bordered table-striped" style="font-size:15px; font-family:"Courier New""  id="tampildesa">
                <thead>
                    <tr>
						
                        <th style="text-align:center;width:10px;">No</th>				
                      <!--   <th style="text-align:center;width:100px;">Kode Desa</th> -->
                        <th style="text-align:center;width:100px;">Nama kecamatan</th>
						<th style="width:400px;">Nama Desa</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['id_desa'];
                        $kecamatanx=$a['nama_kecamatan'];
						$keterangan=$a['nama_desa'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                  <!--       <td style="text-align:center;"><?php echo $id;?></td> -->
                        <td style="text-align:center;"><?php echo $kecamatanx;?></td>
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
                        $id=$a['id_desa'];
                        $keterangan=$a['nama_desa'];
                        $id_kecamatan=$a['id_kecamatan'];
                        $kecamatanx=$a['nama_kecamatan'];
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Desa</h3>
                    </div>
                    <?php echo form_open_multipart('Desa/proses_edit_desa') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
                    <tr>
                            <td><label>Nama Kecamatan</label></td><td>:</td>
                            <td>
                                <select name="kecamatan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($kecamatan->result() as $key => $data){ ?>
                                <option value="<?=$data->id_kecamatan?>" <?=$data->id_kecamatan == $id_kecamatan ? "selected" : null?>><?=$data->nama_kecamatan?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </tr>
						<tr>
                            <td><label>Nama Desa</label></td><td>:</td>
                            <td><input name="desa" class="form-control" type="text" value="<?php echo $keterangan;?>" placeholder="Password..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('Desa/proses_delete_desa') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Desa</h3>
                    </div>
                    <?php echo form_open_multipart('Desa/proses_input_desa') ?>

                    <div class="modal-body">
					<table>
                        <tr>
                            <td><label>Nama Kecamatan</label></td><td> : </td>
                            <td><select name="kecamatan" class="form-control" required>
          <?php foreach ($kecamatan->result() as $row) {
          ?>
          <option value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
          <?php
          }
          ?>
          </select></td>
                        </tr>
						<tr>
                            <td><label>Nama Desa</label></td><td> : </td>
                            <td><input type="text" class="form-control" name="desa" placeholder="Keterangan" required></td>
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
    </section>
    <!-- /.content -->
	


</div>
</body>