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
            <li><a href="#"><i class="fa fa-dashboard"></i> Pertanian</a></li>
            <li class="active">Jumlah Ternak Yang Dipotong</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    	
        <div class="row">
            <div class="col-xs-12">


            	<div class="box">

               <!-- /.box-header -->
               		<div class="box-header">
               		
			                <h4 class="box-title" style="margin-bottom:10px ">Jumlah Ternak Yang Dipotong Di Kabupaten Malang</h3>
			            <table>
			            <tr>
               			<td><a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Input Data</a></td>
			            <td><a class="btn btn-danger" href="#modalCross" data-toggle="modal" >Tampil Report</a></td>
			            <td><a class="btn btn-primary" href="#modalAdd2" data-toggle="modal" title="Add">Grafik Per Tahun</a></td>
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

			            <table  class="table table-striped" id="tampilTernakDipotong" width="100%" style="text-align:center; font-size:15px">
			                <thead >
			                    <tr>
	                                <th style="text-align:center">Nama Kecamatan</th>
	                                <th style="text-align:center">Jumlah Total</th>
	                                <th style="text-align:center">Tahun</th>
	                                <th style="text-align:center">Aksi</th>
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
										<h3 class="modal-title" id="myModalLabel">Tambah Data Hewan Teranak Dipotong</h3>
									</div>


									<?php echo form_open_multipart('C_ternak_dipotong/tambah_ternak_dipotong') ?>

									<div class="modal-body">
										<input class="form-control" type="hidden" name="id" readonly>
											<table>
												<tr>
													<td><label >Tahun</label></td>
													<td>:</td>
													<td><select name="tahun" style="width:335px;" id="tahun" class="form-control">
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
													<td><label >Kecamatan</label></td>
													<td>:</td>
													<td>
														<select name="kecamatan" style="width:335px;" id="kecamatan" class="form-control" required>
														<option disabled selected value> Pilih Kecamatan </option>
														<?php 
														foreach ($datas->result_array() as $a){
															$nama_kecamatan=$a['nama_kecamatan'];
															?>
															<option value="<?php echo $nama_kecamatan; ?>"> <?php echo $nama_kecamatan; ?> </option>
															<?php } ?>
														</select>
													</td>
												</tr>
												<tr>
													<td><label >Nama Ternak</label></td>
													<td>:</td>
													<td>
														<select name="nama_ternak" style="width:335px;" id="nama_ternak" class="form-control" required>
														<option disabled selected value> Pilih Hewan Ternak </option>
														<?php 
														foreach ($datam->result_array() as $a){
															$hewan_ternak=$a['hewan_ternak'];
															?>
															<option value="<?php echo $hewan_ternak; ?>"> <?php echo $hewan_ternak; ?> </option>
															<?php } ?>
														</select>
													</td>
												</tr>
												<tr>
													<td><label >Jumlah</label></td>
													<td>:</td>
													<td><input type="number" class="form-control" style="width:335px;" name="jumlah" placeholder="Jumlah" required autocomplete="off"></td>
												</tr>
											</table>
											
											<?php $name=$this->session->userdata('user'); ?>
											<input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>"  readonly>
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
									<?php echo form_open_multipart(base_url('C_ternak_dipotong/tampil_crosstab_ternak')) ?>
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




						<div id="modalAdd2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
						    <div class="modal-dialog">
						        <div class="modal-content">
						            <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
						            </div>
						            <?php echo form_open_multipart('C_ternak_dipotong/tampil_grafik_ternak/') ?>
						            <div class="modal-body">


						                <table width="90%">
						                	<tr>
												<td><label>Pilih Kecamatan</label></td><td>:</td>
												<td>
													<select name="kecam" id="kecam" required class="form-control">
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
						                        <td style="padding:  10px"><label>Periode</label></td>
						                        <td style="padding:  10px">:</td>
						                        <td>
						                            <select name="tahunx" id="tahunx" class="form-control">
						                                <option disabled selected value> Pilih Tahun </option>
						                                <?php 
						                                foreach ($datax->result_array() as $a){
						                                    $periode=$a['tahun'];
						                                    ?>
						                                <option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
						                                    <?php } ?>
						                            </select>
						                        </td>
						                    </tr>
						                </table>
						            </div>
						            <div class="modal-footer">
						            	<input  type="submit" class="btn btn-success" name="add" value="Lihat Grafik">
						            </div>

						             <?php echo form_close(); ?>
						        </div>
						    </div>
						</div>






					






		            </div><!-- /.box-body -->
	         	</div><!-- /.box -->
    		</div> <!-- col -->
		</div> <!-- row -->


	</section>
<!-- /.content -->
</div>
</body>





