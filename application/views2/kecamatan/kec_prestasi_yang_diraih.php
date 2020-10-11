<?php 
$hal=$datakec;
$idx = $this->uri->segment(1);
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Banyak Prestasi Yang Diraih<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Banyak Prestasi Yang Diraih</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tabel Banyak Prestasi Yang Diraih di Kabupaten Malang</h3>
        </div>
		<div class="box-body table-responsive">
		<table>
		<tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
			</td>
			<td>
            <a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a>
            </td>
			<td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
			</td>
			<td><div>
			<select name="tahun" id="tahun" required>
			<option value="0000"> Pilih Tahun </option>
				<?php 
				foreach ($datax->result_array() as $a){
				$periode=$a['periode'];
				?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
				<?php } ?>
				
			</select>
			</td></div>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%; text-align:center;"  id="tampilbanyakprestasi">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;" >No</th>				
                        <th style="text-align:center;width:8%;vertical-align:middle;" >Periode</th>
						<th style="text-align:center;width:8%;vertical-align:middle;" >Jumlah Prestasi Yang Diraih</th>
                        <th style="text-align:center;width:10%;vertical-align:middle;" >Aksi</th>
                    </tr>
                </thead>
                <tbody>
				</tbody>
        </table>
		

             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode=$a['periode'];
                    ?>

	<?php } 

    ?>


    
	<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Banyak Prestasi Yang Diraih</h3>
                    </div>
                    <?php echo form_open_multipart($idx.'/proses_input_kec_prestasi') ?>

                    <div class="modal-body">
					<table>
						<tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
							<select name="periode" id="periode" class="form-control" onchange="myFunction(event)">
                            <option value="">Pilih Tahun</option>
							<?php
							$tg_awal= date('Y')-10;
							$tgl_akhir= date('Y');
							for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
							{		
							echo "
							<option value='$i'>$i</option>";	
							}
							?>
							</select></td>
						</tr>
                
                        <tr>
                            <td><label>Prestasi di Bidang Olahraga</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Prestasi Bidang Olahraga" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah Prestasi" required></td>
                            <input type="hidden" class="form-control" id="tahun9" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                            <input class="form-control" type="hidden" name="kecamatan[]" value="<?php echo $hal;?>" style="width:335px;" readonly>
                        </tr>

                         <tr>
                            <td><label>Prestasi di Bidang Pendidikan</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Pendidikan TK" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Tingkat TK" required></td>
                            <input type="hidden" class="form-control" id="tahun2" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                            <input class="form-control" type="hidden" name="kecamatan[]" value="<?php echo $hal;?>" style="width:335px;" readonly>
                        </tr>

                         <tr>
                            <td><label>Prestasi di Bidang Pendidikan</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Pendidikan SD / MI" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Tingkat SD / MI" required></td>
                            <input type="hidden" class="form-control" id="tahun3" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                            <input class="form-control" type="hidden" name="kecamatan[]" value="<?php echo $hal;?>" style="width:335px;" readonly>
                        </tr>
					       
                         <tr>
                            <td><label>Prestasi di Bidang Pendidikan</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Pendidikan SMP / MTS" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Tingkat SMP / MTS" required></td>
                            <input type="hidden" class="form-control" id="tahun4" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                            <input class="form-control" type="hidden" name="kecamatan[]" value="<?php echo $hal;?>" style="width:335px;" readonly>
                        </tr>

                         <tr>
                            <td><label>Prestasi di Bidang Pendidikan</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Pendidikan SMA / SMK / MA" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Tingkat SMA / SMK / MA" required></td>
                            <input type="hidden" class="form-control" id="tahun5" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                            <input class="form-control" type="hidden" name="kecamatan[]" value="<?php echo $hal;?>" style="width:335px;" readonly>
                        </tr>
                        
                         <tr>
                            <td><label>Prestasi di Bidang Pendidikan</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Pendidikan Perguruan Tinggi" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Tingkat Perguruan Tinggi" required></td>
                            <input type="hidden" class="form-control" id="tahun6" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                            <input class="form-control" type="hidden" name="kecamatan[]" value="<?php echo $hal;?>" style="width:335px;" readonly>
                        </tr>
						
                         <tr>
                            <td><label>Prestasi di Bidang Kesenian</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Prestasi di Bidang Kesenian" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah prestasi Kesenian" required></td>
                            <input type="hidden" class="form-control" id="tahun7" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                            <input class="form-control" type="hidden" name="kecamatan[]" value="<?php echo $hal;?>" style="width:335px;" readonly>
                        </tr>

                         <tr>
                            <td><label>Prestasi di Bidang Kebersihan</label></td><td>:</td>
                            <input type="hidden" class="form-control" name="jenis_kasus[]" value="Prestasi di Bidang Kebersihan" required readonly>
                            <td>
                            <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah Prestasi Kebersihan" required></td>
                            <input type="hidden" class="form-control" id="tahun1" name="tahun[]" readonly required style="width: 100px;">
                            <input type="hidden" name="status[]" value="0">
                           <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput[]" value="<?php echo $name;?>" style="width:335px;" readonly>
                            <input class="form-control" type="hidden" name="kecamatan[]" value="<?php echo $hal;?>" style="width:335px;" readonly>
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
     <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $periode=$a['periode'];
                    ?>

 

    <div id="modalHapus<?php echo $periode?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart($idx.'/proses_delete_banyak_prestasi/'.$periode) ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="id" type="hidden" value="<?php echo $periode; ?>">
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

	<div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
                    </div>
					<?php echo form_open_multipart($idx.'/grafik_perbandingan') ?>
					<div class="modal-body">
					<table>
					<input class="form-control" type="hidden" name="kecamatan" value="<?php echo $hal;?>" style="width:335px;" readonly>
						<tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
							<select name="datap" id="datap" class="form-control" required>
							<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
							<option value="all">Semua Data</option>
							<option value="jumlah">Data Jumlah</option>
							</select></td>
						</tr>
						<tr>
                            <td><label>Model Grafik</label></td><td>:</td>
                            <td>
							<select name="grafikp" id="grafikp" class="form-control" required>
							<option disabled selected value>Pilih Model Grafik</option>
							<option value="bar">Grafik Bar</option>
							<option value="line">Grafik Line</option>
							</select></td>
						</tr>
						<tr>
						<td><label>Tahun Grafik</label></td><td>:</td>
							<td>
							<select name="tahun1" id="tahun1" required>
							<option disabled selected value> Pilih Tahun </option>
							<?php 
							foreach ($datax->result_array() as $a){
							$periode=$a['periode'];
							?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
							<?php } ?>
							</select> - 
							<select name="tahun2" id="tahun2"  required>
							<option disabled selected value> Pilih Tahun </option>
							<?php 
							foreach ($datax->result_array() as $a){
							$periode=$a['periode'];
							?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
							<?php } ?>
							</select>
						</td>
						</tr>
					</table>
                    </div>
                    <div class="modal-footer">
					
                            <input type="submit" class="btn btn-success pull-right" value="Lihat Grafik"></input>
							
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
	<div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url($idx.'/tampil_crosstab_banyak_prestasi')) ?>
                    <div class="modal-body">
                    <table>
					<input class="form-control" type="hidden" name="kecamatan" value="<?php echo $hal;?>" style="width:335px;" readonly>
  
                        <tr>
                        <td><label>Pilih Tahun Report</label></td><td>:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select>
                        </td>
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success pull-right" value="Lihat Crosstab"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->