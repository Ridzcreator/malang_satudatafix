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
            <li class="active">Detail per_butir Produksi Telur</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">


                <div class="box">

               <!-- /.box-header -->
                    <div class="box-header">
                    <?php $page=$this->uri->segment(3); ?>
                    <tr>
                        <td>
                            <h4 class="box-title" style="margin-bottom:10px ">Detail per_butir Produksi Telur Di Kabupaten Malang</h3><br>
                            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Input Data <?php echo $page ?></a>
                            
                        </td>
                    </tr>
                    </div>
                    
                    
                    <div class="box-body">
                    <table  class="table table-striped" id="tampil1" width="100%" style="text-align:center; font-size:15px">
                        <thead >
                            <tr>
                            	<th style="text-align:center">Tahun</th>
                            	<th style="text-align:center">Kecamatan</th>
                                <th style="text-align:center">Jenis Produksi</th>
                                <th style="text-align:center">Produksi (Butir)</th>
                                <th style="text-align:center">Produksi (Kg)</th>
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach ($data->result_array() as $a):  
                                $id=$a['id'];
                                $kecamatan=$a['kecamatan'];
                                $hewan=$a['hewan'];
                                $per_butir=$a['per_butir'];
                                $per_kg=$a['per_kg'];
                                $tahun=$a['tahun'];
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $tahun;?></td>
                                <td style="text-align:center"><?php echo $kecamatan;?></td>
                                <td style="text-align:center"><?php echo $hewan;?></td>
                                <td style="text-align:center"><?php echo number_format($per_butir,0,",",".");?></td>
                                <td style="text-align:center"><?php echo number_format($per_kg,0,",",".");?></td>
                                <td style="text-align:center;width:130px">
                                    <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                    <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                                
                        </tbody>
                    </table>


                   <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                   <?php $kcmtn = $this->uri->segment(4);  ?>
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 class="modal-title" id="myModalLabel">Tambah Data</h3>
									</div>


									<?php echo form_open_multipart('C_produksi_telur/tambah_detail_produksi_telur/'.$page.'/'.$kcmtn) ?>

									<div class="modal-body">
										<input class="form-control" type="hidden" name="id" readonly>
											
											<table>
												<tr>
													<td><label   >Tahun</label></td>
                                                    <td>:</td>
													<td><input type="number" class="form-control" style="width:335px;"  readonly name="tahun" value="<?php echo $page ?>" placeholder="Tahun" required autocomplete="off"></td>
												</tr>
                                                <tr>
                                                    <td><label   >Kecamatan</label></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="kecamatan" id="kecamatan" style="width:335px;"  class="form-control" required>
                                                        <option disabled selected value> Pilih Kecamatan </option>
                                                        <?php 
                                                        foreach ($datak->result_array() as $a){
                                                            $nama_kecamatan=$a['nama_kecamatan'];
                                                            ?>
                                                            <option value="<?php echo $nama_kecamatan; ?>" <?=$nama_kecamatan== $kecamatan? "selected" : null ?>> <?php echo $nama_kecamatan; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
												<tr>
													<td><label   >Jenis Produksi</label></td>
                                                    <td>:</td>
													<td>
														<select name="nama_unggas" id="nama_unggas" style="width:335px;"  class="form-control" required>
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
													<td><label   >Produksi (Butir)</label></td>
                                                    <td>:</td>
													<td><input type="number" class="form-control" style="width:335px;"  name="per_butir" placeholder="Produksi (Butir)" required autocomplete="off"></td>
												</tr>
											</div>
											<div class="form-group">
												<tr>
													<td><label   >Produksi (Kg)</label></td>
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



						
						<?php 
							foreach ($data->result_array() as $a) {

								$id=$a['id'];
                                $kecamatan=$a['kecamatan'];
                                $hewan=$a['hewan'];
                                $per_butir=$a['per_butir'];
                                $per_kg=$a['per_kg'];
                                $tahun=$a['tahun'];
							
						 ?>
						 <?php $page=$this->uri->segment(3); ?>
                        <?php $kcmtn = $this->uri->segment(4);  ?>


                        <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        	<div class="modal-dialog">
                        		<div class="modal-content">
                        			<div class="modal-header">
                        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        				<h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                        			</div>
                        			<?php echo form_open_multipart('C_produksi_telur/proses_hapus_produksi_telur/'.$page.'/'.$kcmtn) ?>
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

					<!-- Modal Edit -->
											
                                            


 				<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 class="modal-title" id="myModalLabel">Edit Wisatawan Menginap</h3>
                                    </div>
                                    <?php echo form_open_multipart('C_produksi_telur/proses_ubah_produksi_telur/'.$page.'/'.$kcmtn) ?>

                                    <div class="modal-body">
                                        <input class="form-control" type="hidden" name="id" value="<?php echo $id ?>" readonly>
                                        <?php $name=$this->session->userdata('user'); ?>
                                        <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>"  readonly>

                                            <table>
												<tr>
													<td><label   >Tahun</label></td>
                                                    <td>:</td>
													<td><input type="number" style="width:335px;"  class="form-control" readonly name="tahun" value="<?php echo $page ?>" placeholder="Tahun" required autocomplete="off"></td>
												</tr>
                                                <tr>
                                                    <td><label   >Kecamatan</label></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="kecamatan" style="width:335px;"  id="kecamatan" class="form-control" required>
                                                        <option disabled selected value> Pilih Kecamatan </option>
                                                        <?php 
                                                        foreach ($datak->result_array() as $a){
                                                            $nama_kecamatan=$a['nama_kecamatan'];
                                                            ?>
                                                            <option value="<?php echo $nama_kecamatan; ?>" <?=$nama_kecamatan== $kecamatan? "selected" : null ?>> <?php echo $nama_kecamatan; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label   >Jenis Produksi</label></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="nama_unggas" style="width:335px;"  id="nama_unggas" class="form-control" required>
                                                        <option disabled selected value> Pilih Kecamatan </option>
                                                        <?php 
                                                        foreach ($datas->result_array() as $a){
                                                            $nama_unggas=$a['nama_unggas'];
                                                            ?>
                                                            <option value="<?php echo $nama_unggas; ?>" <?=$nama_unggas== $hewan? "selected" : null ?>> <?php echo $nama_unggas; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
												<tr>
													<td><label   >Produksi (Butir)</label></td>
                                                    <td>:</td>
													<td><input type="number" style="width:335px;"  class="form-control" name="per_butir" value="<?php echo $per_butir; ?>" placeholder="Produksi (Butir)" required autocomplete="off"></td>
												</tr>
												<tr>
													<td><label   >Produksi (Kg)</label></td>
                                                    <td>:</td>
													<td><input type="number" style="width:335px;"  class="form-control" name="per_kg" value="<?php echo $per_kg; ?>" placeholder="Produksi (Kg)" required autocomplete="off"></td>
												</tr>
											</table>
                                            
                                            
                                    </div>

                                        <div class="modal-footer">
                                            <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> 
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>



                   


                
						<?php } ?>
                





                    




                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div> <!-- col -->
        </div> <!-- row -->


    </section>
<!-- /.content -->
</div>
</body>





