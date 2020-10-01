<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Energi Dan Sumber Daya Alam<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Detail Volume Air Minum PDAM</li>
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
                    
                         <h4 class="box-title" style="margin-bottom:10px ">Detail Volume Air Minum PDAM Menurut Bulan Di Kabupaten Malang</h3><br>
                    <table>
                    <tr>
                        <td><a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Input Data <?php echo $page ?></a></td>
                        <td><a class="btn btn-primary" href="../tampil_grafik/<?php echo $page ?>" >Lihat Grafik</a></td>
                    </tr>
                    </table>
                    </div>
                    
                    
                    <div class="box-body">
                    <table  class="table table-striped" id="tampil1" width="100%" style="text-align:center; font-size:15px;">
                        <thead >
                            <tr>
                            	<th style="text-align:center">Tahun</th>
                                <th style="text-align:center">Bulan</th>
                                <th style="text-align:center">Jumlah</th>
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        	$jm=0;
                            foreach ($data->result_array() as $a):  
                                $id=$a['id'];
                                $bulan=$a['bulan'];
                                $jumlah=$a['jumlah'];
                                $tahun=$a['tahun'];
                                $jm=$jm+$jumlah;
                        ?>
                            <tr>
                            	<td style="text-align:center"><?php echo $tahun;?></td>
                                <td style="text-align:center"><?php echo $bulan;?></td>
                                <td style="text-align:center"><?php echo number_format($jumlah,0,",",".");?></td>
                                <td style="text-align:center;width:130px">
                                    <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                    <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                                
                        </tbody>
                        <tfoot >
                        	<tr>
                        		<th colspan="2" style="text-align:center">Jumlah</th>
                        		<th style="text-align:center"><?php echo number_format($jm,0,",",".");?></th>
                        		<th></th>
                        	</tr>
                        </tfoot>
                    </table>


                     <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										<h3 class="modal-title" id="myModalLabel">Tambah Data Pelanggan PDAM</h3>
									</div>


									<?php echo form_open_multipart('C_volume_air_minum_pdam/tambah_detail_pdam/'.$page) ?>

									<div class="modal-body">
										<input class="form-control" type="hidden" name="id" readonly>
											<table>
												<tr>
													<td><label >Tahun</label></td>
													<td>:</td>
													<td><input type="number" class="form-control" style="width:335px;" value="<?php echo $page ?>" name="tahun" placeholder="tahun" readonly required autocomplete="off"></td>
												</tr>
												<tr>
													<td><label >bulan</label></td>
													<td>:</td>
													<td>
														<select name="bulan" id="bulan" style="width:335px;"  class="form-control" required>
														<option disabled selected value> Pilih bulan </option>
														<?php 
														foreach ($datas->result_array() as $a){
															$keterangan=$a['keterangan'];
															?>
															<option value="<?php echo $keterangan; ?>"> <?php echo $keterangan; ?> </option>
															<?php } ?>
														</select>
													</td>
												</tr>
												<tr>
													<td><label >Jumlah</label></td>
													<td>:</td>
													<td><input type="number" class="form-control" style="width:335px;"  name="jumlah" placeholder="Jumlah" required autocomplete="off"></td>
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



						<?php 

                    foreach ($data->result_array() as $a){

                        $id=$a['id'];
                        $tahun=$a['tahun'];
                        $bulan=$a['bulan'];
                        $jumlah=$a['jumlah'];
                        $penginput=$a['penginput'];
                        ?>

                        <?php $page=$this->uri->segment(3); ?>

                <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Hapus Data Pelanggan PDAM</h3>
                            </div>
                            <?php echo form_open_multipart('C_volume_air_minum_pdam/proses_hapus_pdam/'.$page) ?>
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

                <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 class="modal-title" id="myModalLabel">Edit Pelanggan PDAM</h3>
                                    </div>
                                    <?php echo form_open_multipart('C_volume_air_minum_pdam/ubah_pdam/'.$page) ?>

                                    <div class="modal-body">
                                        <input class="form-control" type="hidden" name="id" value="<?php echo $id ?>" readonly>
                                        <?php $name=$this->session->userdata('user'); ?>
                                        <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>"  readonly>

                                            <table>
                                                <tr>
                                                    <td><label >Tahun</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:355px;"  class="form-control" name="tahun" value="<?php echo $tahun ?>" placeholder="Tahun" required readonly autocomplete="off"></td>
                                                </tr>
                                                <tr>
			                                        <td><label>Bulan</label></td>
			                                        <td>:</td>
			                                        <td><select name="bulan" id="bulan" class="form-control" style="width:355px"  required>
			                                            <option disabled selected value> Pilih Bulan </option>
			                                            <?php 
			                                                foreach ($datas->result_array() as $a){
			                                                    $bulan1=$a['keterangan'];
			                                                    ?>
			                                                <option value="<?php echo $bulan1; ?>" <?=$bulan1== $bulan? "selected" : null ?>> <?php echo $bulan1; ?> </option>
			                                            <?php } ?>
			                                            </select></td>
			                                    </tr>
                                                <tr>
                                                    <td><label >Jumlah</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:355px;"  class="form-control" name="jumlah" placeholder="Jumlah" value="<?php echo $jumlah ?>" required autocomplete="off"></td>
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





