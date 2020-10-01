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
            <li class="active">Pekerjaan Penduduk</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Pekerjaan Penduduk</h3>			
        </div>
		<div class="box-body">
		<table>
		<tr>
			<td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
            </td>
			<td>
			<a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
			</td>
			<td>
			<select name="tahun" id="tahun" required>
			<option value="0000"> Pilih Tahun </option>
				<?php 
				foreach ($datax->result_array() as $a){
				$tahun=$a['tahun'];
				?><option value="<?php echo $tahun; ?>"> <?php echo $tahun; ?> </option>
				<?php } ?>
				
			</select>
			</td>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampilPenduduk">
                <thead>
                    <tr>
                        <th style="text-align:center;vertical-align:middle;">No</th>
						<th style="text-align:center;vertical-align:middle;">Tahun</th>
						<th style="text-align:center;vertical-align:middle;">Jumlah</th>
						<th style="text-align:center;vertical-align:middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
				</tbody>
        </table>
		
        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pekerjaan Penduduk</h3>
                    </div>
                    <?php echo form_open_multipart('Pekerjaan_penduduk/proses_input_pekerjaan_penduduk') ?>

                    <div class="modal-body">
					<table width="90%">
                    <tr>
                        <td style="padding:  20px"><label>Tahun</label></td>
                        <td style="padding:  20px">:</td>
                        <td>
                            <select name="tahun" id="tahun" class="form-control">
                            <?php
                            $tg_awal= date('Y')-10;
                            $tgl_akhir= date('Y');
                            for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                            {
                            echo "
                            <option value='$i'";
                            if(date('Y')==$i){echo "selected";}
                            echo">$i</option>";
                            }
                            ?>
                            </select>
                        </td>
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

    <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
                    </div>
                    <?php echo form_open_multipart('Pekerjaan_penduduk/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                            <td><label>Pilih Data</label></td>
                            <td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Jumlah Pekerjaan Penduduk</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><label>Model Grafik</label></td>
                            <td>:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>
                            <option value="line">Grafik Line</option>
                            </select></td>
                        </tr>
                        <tr>
                        <td><label>Tahun Grafik</label></td>
                        <td>:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
                            $periode=$a['tahun'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
                            $periode=$a['tahun'];
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

	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->