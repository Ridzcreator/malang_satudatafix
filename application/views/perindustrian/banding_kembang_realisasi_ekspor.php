<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
            <b>PERBANDINGAN DAN PERKEMBANGAN REALISASI EKSPOR<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Realisasi Ekspor</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
			<h3 class="box-title">Tabel Perbandingan dan Perkembangan Realisasi Ekspor</h3>			
        </div>
		<div class="box-body">
		<table>
		<tr>
			<td>
                         <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
            </td>
            <td>
                         <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik Perbandingan</a>
            </td>
			<td><div>
			<select style="margin-left: 5px;" name="tahun" id="tahun" required>
			<option value="0000"> Pilih Tahun </option>
				<?php 
				foreach ($datax->result_array() as $a){
				$tahun=$a['tahun'];
				?><option value="<?php echo $tahun; ?>"> <?php echo $tahun; ?> </option>
				<?php } ?>
				
			</select>
			</td></div>
		</tr>
		</table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampilPerkembangan">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;">No</th>
						<th style="text-align:center;width:8%;vertical-align:middle;">Tahun</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Volum</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Nilai (US$)</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">% Perkomoditi thd Total Ekspor</th>
						<th style="text-align:center;width:4%;vertical-align:middle;">Kenaikan/Penurunan US$</th>
						<th style="text-align:center;width:10%;vertical-align:middle;">Aksi</th>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Realisasi Ekspor</h3>
                    </div>
                    <?php echo form_open_multipart('Banding_kembang_realisasi_ekspor/proses_input_banding_kembang_realisasi_ekspor') ?>

                    <div class="modal-body">
					<table width="80%">
						<tr>
               				<td style="padding:  10px"><label>Komoditi</label></td>
               				<td style="padding:  10px">:</td>
               				<td> 
                		<select name="komoditi" class="form-control">
                   				<?php foreach ($datas->result() as $a) {
                    				?>
                    	<option value="<?php echo $a->nama_komoditi ?>"><?php echo $a->nama_komoditi ?></option>
                    		<?php
                				}
                				?>
                		</select>
               				</td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Volum</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="volum" placeholder="Volum" autocomplete="off"></td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Nilai (US$)</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="nilai" placeholder="Nilai" autocomplete="off"></td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Total Ekspor</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="total_ekspor" placeholder="Total Ekspor" autocomplete="off"></td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Kenaikan/Penurunan (US$)</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="naik_turun" placeholder="Kenaikan/Penurunan" autocomplete="off"></td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Kenaikan/Penurunan Nilai</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="naik_turun_nilai" placeholder="Kenaikan/Penurunan Nilai" autocomplete="off"></td>
                		</tr>
						<tr>
                        <td style="padding:  10px"><label>Tahun</label></td>
                        <td style="padding:  10px">:</td>
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
                    <?php echo form_open_multipart('Banding_kembang_realisasi_ekspor/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td style="padding:  10px"><label>Pilih Data</label></td>
                            <td style="padding:  10px">:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Volum</option>
                            <option value="2">Jumlah Nilai</option>
                            <option value="3">Kenaikan/Penurunan</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Model Grafik</label></td>
                            <td style="padding:  10px">:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>
                            <option value="line">Grafik Line</option>
                            </select></td>
                        </tr>
                        <tr>
                        <td style="padding:  10px"><label>Tahun Grafik</label></td>
                        <td style="padding:  10px">:</td>
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