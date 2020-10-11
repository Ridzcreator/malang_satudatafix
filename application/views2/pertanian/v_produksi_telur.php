<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>PERTANIAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Produksi Telur</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    	
        <div class="row">
            <div class="col-xs-12">


            	<div class="box">

               <!-- /.box-header -->
               		<div class="box-header">
               		
			                <h4 class="box-title" style="margin-bottom:10px ">Produksi Telur Menurut Kecamatan Dan Jenisnya di Kabupaten Malang</h3>
			            <table>
			            <tr>
               			<td><a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Input Data</a></td>
	    				<td><a class="btn btn-danger" href="#modalCross" data-toggle="modal" >Tampil Report</a></td>
            			<td><a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a></td>
    					<td>
							<select name="tahun" id="tahun" required>
							<option value="0000"> Pilih Tahun </option>
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
	                
	                
	                <div class="box-body">
		            <table  class="table table-striped" id="tampilProduksiTelur" width="100%" style="text-align:center; font-size:15px">
		                <thead >
		                    <tr>
		                        <th style="text-align:center;width:40px;">Tahun</th>
		                        <th style="text-align:center">Kecamatan</th>
		                        <th style="text-align:center">Produksi(Butir)</th>
		                        <th style="text-align:center;">Produksi(Kg)</th>
		                        <th style="text-align:center;width:50px">Aksi</th>
		                    </tr>
		                </thead>
		                <tbody>
		                        <!-- ADA DI CONTROLLER -->
		              	</tbody>
		            </table>





					<!-- Modal Tambah -->

						<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 class="modal-title" id="myModalLabel">Tambah Data</h3>
									</div>


									<?php echo form_open_multipart('C_produksi_telur/tambah_produksi_telur') ?>

									<div class="modal-body">
										<input class="form-control" type="hidden" name="id" readonly>
											
											<table>
												<tr>
													<td><label >Tahun</label></td>
													<td>:</td>
													<td><select name="tahun" id="tahun" class="form-control" style="width:335px;"  required>
															<option disabled selected value> Pilih Tahun </option>
							                            <?php
								                            $tg_awal= date('Y')-10;
								                            $tgl_akhir= date('Y');
								                            for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
								                            {
								                            echo "
								                            <option value='$i'";
								                            if(date('Y')==$i){echo "";}
								                            echo">$i</option>";
							                            	} 
							                            ?>
							                            </select>
													</td>
												</tr>
											</div>
											<div class="form-group">
		                                        <tr>
		                                            <td><label >Kecamatan</label></td>
		                                            <td>:</td>
		                                            <td>
		                                                <select name="kecamatan" id="kecamatan" style="width:335px;"  class="form-control" required>
		                                                    <option disabled selected value> Pilih Kecamatan </option>
		                                                    <?php 
		                                                    foreach ($datak->result_array() as $a){
		                                                        $nama_kecamatan=$a['nama_kecamatan'];
		                                                        ?>
		                                                    <option value="<?php echo $nama_kecamatan; ?>"> <?php echo $nama_kecamatan; ?> </option>
		                                                        <?php } ?>
		                                                </select>
		                                            </td>
		                                        </tr>
												<tr>
													<td><label >Jenis Produksi</label></td>
													<td>:</td>
													<td>
														<select name="nama_unggas" style="width:335px;"  id="nama_unggas" class="form-control" required>
														<option disabled selected value> Pilih Jenis Produksi </option>
														<?php 
														foreach ($datas->result_array() as $a){
															$nama_unggas=$a['nama_unggas'];
															?>
															<option value="<?php echo $nama_unggas; ?>"> <?php echo $nama_unggas; ?> </option>
															<?php } ?>
														</select>
													</td>
												</tr>
												<tr>
													<td><label >Produksi (Butir)</label></td>
													<td>:</td>
													<td><input type="number" class="form-control" style="width:335px;"  name="per_butir" placeholder="Produksi (Butir)" required autocomplete="off"></td>
												</tr>
												<tr>
													<td><label >Produksi (Kg)</label></td>
													<td>:</td>
													<td><input type="number" class="form-control" style="width:335px;"  name="per_kg" placeholder="Produksi (Kg)" required autocomplete="off"></td>
												</tr>
											</table>
											
											<?php $name=$this->session->userdata('user'); ?>
											<input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
									</div>

										<div class="modal-footer">
											<input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> 
											<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
										</div>

								</div>
									<?php echo form_close(); ?>
							</div>
						</div>



						<div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
									</div>
									<?php echo form_open_multipart(base_url('C_produksi_telur/tampil_crosstab_telur')) ?>
									<div class="modal-body">
										<table>

											<tr>
												<td><label>Pilih Kecamatan</label></td><td>:</td>
												<td>
													<select name="kecam" id="kecam" required>
														<option disabled selected value> Pilih Kecamatan </option>

														<?php 
														foreach ($kecam->result_array() as $a){
															$kecamatan=$a['kecamatan'];
															?><option value="<?php echo $kecamatan; ?>"> <?php echo $kecamatan; ?> </option>
															<?php } ?>
													</select>
												</td>
											</tr>

											<tr>
												<td><label>Pilih Tahun Report</label></td><td>:</td>
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
											<input type="submit" class="btn btn-success pull-right" value="Lihat Report"></input>      
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
										<?php echo form_open_multipart('C_wisatawan_menginap/grafik_perbandingan') ?>
										<div class="modal-body">
										<table>
											<tr>
					                            <td><label>Pilih Data</label></td><td>:</td>
					                            <td>
												<select name="datap" id="datap" class="form-control" required>
												<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
												<option value="all">Semua Data</option>
												<option value="1">Jumlah Total Produksi (Butir)</option>
												<option value="2">Jumlah Total Produksi (telur)</option>
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





		            </div>
	         	</div>
    		</div>


    <!-- /.box-body -->
		
<!-- /.box -->
		</div>
	</section>
<!-- /.content -->
</div>
</body>
