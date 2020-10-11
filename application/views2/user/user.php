<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data User<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data User</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Sampah Yang Dihasilkan dan Yang Diolah Kabupaten Malang</h3>
		</div>
		<div class="box-body">
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input Data User</a>
		<br><br>
        <table class="table table-bordered table-striped" style="font-size:15px;"  id="tampiluser">
                <thead>
                    <tr>
						
                        <th style="text-align:center;width:25px;">No</th>				
                        <th style="width:200px;">Username</th>
						<th style="width:200px;">Password</th>
                        <th style="text-align:center;width:100px;">Level</th>
                        <th style="width:50px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id = $a['id'];
                        $username=$a['username'];
						$password=$a['password'];
                        $level=$a['keterangan'];

                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $username;?></td>
						<td><?php echo $password;?></td>
                        <td style="text-align:center;"><?php echo $level;?></td>
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
                        $user=$a['username'];
                        $password=$a['password'];
						$level=$a['level'];
                      
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit User</h3>
                    </div>
                    <?php echo form_open_multipart('User/proses_edit_user') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td width=250px><label>Username</label></td><td width=20px>:</td>
                            <td><input name="user" class="form-control" type="text" value="<?php echo $user;?>" placeholder="Username..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Password</label></td><td>:</td>
                            <td><input name="password" class="form-control" type="text" value="<?php echo $password;?>" placeholder="Password..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Level</label></td><td>:</td>
							<td>
							<select name="level" id="level" required>
							<?php 
							foreach ($datas->result_array() as $a){
							$kode=$a['kode'];
							$keterangan=$a['keterangan'];
							?><option value="<?php echo $kode; ?>" <?php if($kode==$level){echo "selected";} ?>> <?php echo $keterangan; ?> </option>
							<?php } ?>
							</td>
							</select>
							</td>
						</tr>
					</table>
					<?php $name = $this->session->userdata('user');?>
					<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
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
                <h3 class="modal-title" id="myModalLabel">Hapus Data User</h3>
            </div>
                <?php echo form_open_multipart('user/proses_delete_user') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Alat Angkut Sampah</h3>
                    </div>
                    <?php echo form_open_multipart('user/proses_input_user') ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td width=100px><label>Username</label></td><td width=20> : </td>
                            <td><input type="text" class="form-control" name="user" placeholder="Username" required></td>
						</tr>
						<tr>
                            <td><label>Password</label></td><td> : </td>
                            <td><input type="text" class="form-control" name="password" placeholder="Password" required></td>
						</tr>
						<tr>
                            <td><label>Level</label></td><td> : </td>
							<td>
							<select name="level" id="level" required>
							<?php 
							foreach ($datas->result_array() as $a){
							$kode=$a['kode'];
							$keterangan=$a['keterangan'];
							?><option value="<?php echo $kode; ?>"> <?php echo $keterangan; ?> </option>
							<?php } ?>
							</td>
							</select>
						</tr>
					</table>
					<?php $name = $this->session->userdata('user');?>
					<input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
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