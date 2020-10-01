<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
             <b>PEKERJAAN PENDUDUK<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
             <li><a href="<?= base_url('Pekerjaan_penduduk'); ?>">Pekerjaan Penduduk</a></li>
            <li class="active">Detail Pekerjaan Penduduk</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Detail Pekerjaan Penduduk 
            <?php echo $ex = $this->uri->segment(3);?></h3>          
        </div>
		<div class="box-body">
		<table>
		<tr>
			<td>
						<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
                         <a class="btn btn-success" href="../grafik_pekerjaan_penduduk/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a><br><br>
            </td>
		</tr>
		</table>
                <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;vertical-align:middle;">Nama Pekerjan</th>
                        <th style="text-align:center;vertical-align:middle;">Jumlah</th>
                        <th style="text-align:center;vertical-align:middle;">Tahun</th>
                        <th style="text-align:center;vertical-align:middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datab->result_array() as $a) {
                        $id = $a['id'];
                        $nama_pekerjaan=$a['nama_pekerjaan'];
                        $jumlah=number_format($a['jumlah'],0,",",".");
                        $tahun=$a['tahun'];
                   
                    ?>
                        <tr>
                        <td style="text-align:left;""><?php echo $nama_pekerjaan; ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td><?php echo $tahun; ?></td>
                        
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
        </table>

         <?php
                    foreach ($datab->result_array() as $a) {
                        $id = $a['id'];
                        $nama_pekerjaan=$a['nama_pekerjaan'];
                        $jumlah=$a['jumlah'];
                        $tahun=$a['tahun'];
                        $penginput=$a['penginput'];
                        $timestamp=$a['timestamp'];
                        $status=$a['status'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Pekerjaan Penduduk</h3>
                    </div>
                    <?php echo form_open_multipart('Pekerjaan_penduduk/proses_edit_detail_pekerjaan_penduduk/'.$tahun) ?>

                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
                    <table width="90%">
                        <tr>
                    <td style="padding:  20px"><label>Tahun</label></td>
                    <td><input type="number" class="form-control" name="tahun"  value="<?php echo $tahun;?>" placeholder="Tahun" autocomplete="off" readonly></td>
                        </tr>
                        <tr>
                    <td style="padding:  20px"><label>Nama Pekerjaan</label></td>
                    <td><input type="text" class="form-control" name="nama_pekerjaan"  value="<?php echo $nama_pekerjaan;?>" placeholder="Nama Pekerjaan" autocomplete="off" readonly></td>
                        </tr>
                        <tr>
                    <td style="padding:  20px"><label>Jumlah</label></td>
                    <td><input type="number" min="0" step="0.01" class="form-control" name="jumlah"  value="<?php echo $jumlah;?>" placeholder="Jumlah" autocomplete="off"></td>
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
                <?php echo form_open_multipart('Pekerjaan_penduduk/proses_hapus_pekerjaan_penduduk/'.$tahun) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pekerjaan Penduduk</h3>
                    </div>
                    <?php echo form_open_multipart('Pekerjaan_penduduk/proses_input_detail_pekerjaan_penduduk/'.$tahun) ?>

                    <div class="modal-body">
					<table width="90%">
                        <tr>
                        <td style="padding:  20px"><label>Tahun</label></td>
                        <td style="padding:  20px">:</td>
                        <td><input type="number" class="form-control" name="tahun" placeholder="Tahun.." value="<?php echo $ex = $this->uri->segment(3);?>" readonly></td>
                        </tr>
						<tr>
               				<td style="padding:  20px"><label>Nama Pekerjaan</label></td>
               				<td style="padding:  20px">:</td>
               				<td> 
                		<select name="nama_pekerjaan" class="form-control">
                   				<?php foreach ($datas->result() as $a) {
                    				?>
                    	<option value="<?php echo $a->nama_pekerjaan ?>"><?php echo $a->nama_pekerjaan ?></option>
                    		<?php
                				}
                				?>
                		</select>
               				</td>
                		</tr>
						<tr>
                    		<td style="padding:  20px"><label>Jumlah</label></td>
                    		<td style="padding:  20px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="jumlah" placeholder="Jumlah" autocomplete="off"></td>
                		</tr>
						
						<?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
					</table>
					
                    </div>
                    <div class="modal-footer">
					
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
							
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
		<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Pekerjaan_penduduk'); ?>">Back</a>
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->