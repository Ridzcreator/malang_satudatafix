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
			<h3 class="box-title">Tabel Sampah Yang Dihasilkan dan Yang Diolah Kabupaten Malang</h3>
		</div>
		<div class="box-body">
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input Data Level User</a>
		<br><br>
        <table class="table table-bordered table-striped" style="font-size:15px; "  id="tampillevel">
                <thead>
                    <tr>
						
                				
                        <th style="text-align:center;width:5%;">No</th>
						<th style="width:80%;">Keterangan</th>
                        <th style="width:15%;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id = $a['id'];
						$keterangan=$a['keterangan'];
                ?>
                    <tr>
              
                        <td style="text-align:center;"><?php echo $no;?></td>
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
                        $id=$a['id'];
                        $keterangan=$a['keterangan'];
						$m1=$a['m1'];
						$m2=$a['m2'];
						$m3=$a['m3'];
						$m4=$a['m4'];
						$m5=$a['m5'];
						$m6=$a['m6'];
						$m7=$a['m7'];
						$m8=$a['m8'];
						$m9=$a['m9'];
						$m10=$a['m10'];
						$m11=$a['m11'];
						$m12=$a['m12'];
						$m13=$a['m13'];
						$m14=$a['m14'];
						$m15=$a['m15'];
						$m16=$a['m16'];
						$m17=$a['m17'];
						$m18=$a['m18'];
						$m19=$a['m19'];
						$m20=$a['m20'];
						$m21=$a['m21'];
						$k1=$a['k1'];
						$k2=$a['k2'];
						$k3=$a['k3'];
						$k4=$a['k4'];
						$k5=$a['k5'];
						$k6=$a['k6'];
						$k7=$a['k7'];
						$k8=$a['k8'];
						$k9=$a['k9'];
						$k10=$a['k10'];
						$k11=$a['k11'];
						$k12=$a['k12'];
						$k13=$a['k13'];
						$k14=$a['k14'];
						$k15=$a['k15'];
						$k16=$a['k16'];
						$k17=$a['k17'];
						$k18=$a['k18'];
						$k19=$a['k19'];
						$k20=$a['k20'];
						$k21=$a['k21'];
						$k22=$a['k22'];
						$k23=$a['k23'];
						$k24=$a['k24'];
						$k25=$a['k25'];
						$k26=$a['k26'];
						$k27=$a['k27'];
						$k28=$a['k28'];
						$k29=$a['k29'];
						$k30=$a['k30'];
						$k31=$a['k31'];
						$k32=$a['k32'];
						$k33=$a['k33'];
                      
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Level User</h3>
                    </div>
                    <?php echo form_open_multipart('Level/proses_edit_level') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td><label>Nama Level</label></td><td>:</td>
                            <td><input name="keterangan" class="form-control" type="text" value="<?php echo $keterangan;?>" placeholder="Nama Level..." style="width:335px;" required></td>
						</tr>
						<tr>
                            <td><label>Hak Akses</label><br></td>
                            <td>:</td>
						</tr>
					</table>
                    <div class="box box-info" style="overflow: scroll;width: 100%;height: 200px;">
					<div class="box-body table-responsive">
					<p class="text-center">
							Menu
					</p>
					<table width=100%>
						<tr >
                            <td>
                                <label class="checkbox-inline" >
                                    <input type="checkbox" name="m1" value="1" <?php if ($m1==1){ echo "checked";} ?>> Pengelolaan Admin
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m2" value="1" <?php if ($m2==1){ echo "checked";} ?>> Perumahan & Pemukiman
                                </label>
							</td>
						</tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m3" value="1" <?php if ($m3==1){ echo "checked";} ?>> P. Perempuan & P. Anak
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m4" value="1" <?php if ($m4==1){ echo "checked";} ?>> Tenaga Kerja
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m5" value="1" <?php if ($m5==1){ echo "checked";} ?>> Pangan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m6" value="1" <?php if ($m6==1){ echo "checked";} ?>> Kecamatan
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m7" value="1" <?php if ($m7==1){ echo "checked";} ?>> Ketentraman & Ketertiban
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m8" value="1" <?php if ($m8==1){ echo "checked";} ?>> Lingkungan Hidup
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m9" value="1" <?php if ($m9==1){ echo "checked";} ?>> Perhubungan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m10" value="1" <?php if ($m10==1){ echo "checked";} ?>> Pemberdayaan Masyarakat
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m11" value="1" <?php if ($m11==1){ echo "checked";} ?>> Perdagangan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m12" value="1" <?php if ($m12==1){ echo "checked";} ?>> Perindustrian
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m13" value="1" <?php if ($m13==1){ echo "checked";} ?>> Transmigrasi
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m14" value="1" <?php if ($m14==1){ echo "checked";} ?>> Komunikasi & Informatika
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m15" value="1" <?php if ($m15==1){ echo "checked";} ?>> Penanaman Modal
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m16" value="1" <?php if ($m16==1){ echo "checked";} ?>> Kepemudaan & Olahraga
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m17" value="1" <?php if ($m17==1){ echo "checked";} ?>> Pariwisata
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m18" value="1" <?php if ($m18==1){ echo "checked";} ?>> Pertanian
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m19" value="1" <?php if ($m19==1){ echo "checked";} ?>> Energi dan SDA
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m20" value="1" <?php if ($m20==1){ echo "checked";} ?>> Perpustakaan
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m21" value="1" <?php if ($m21==1){ echo "checked";} ?>> Perikanan dan Kelautan
                                </label>
							</td><td>
                            </td>
                        </tr>
					</table>
					</div>
					</div>
					<div class="box box-info" style="overflow: scroll;width: 100%;height: 200px;">
					<div class="box-body table-responsive">
					<p class="text-center">
							Kecamatan
					</p>
					<table width=100%>
						<tr >
                            <td>
                                <label class="checkbox-inline" >
                                    <input type="checkbox" name="k1" value="1" <?php if ($k1==1){ echo "checked";} ?>> Ampel Gading
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k2" value="1" <?php if ($k2==1){ echo "checked";} ?>> Bantur
                                </label>
							</td>
						</tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k3" value="1" <?php if ($k3==1){ echo "checked";} ?>> Bululawang
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k4" value="1" <?php if ($k4==1){ echo "checked";} ?>> Dampit
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k5" value="1" <?php if ($k5==1){ echo "checked";} ?>> Dau
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k6" value="1" <?php if ($k6==1){ echo "checked";} ?>> Donomulyo
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k7" value="1" <?php if ($k7==1){ echo "checked";} ?>> Gedangan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k8" value="1" <?php if ($k8==1){ echo "checked";} ?>> Gondanglegi
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k9" value="1" <?php if ($k9==1){ echo "checked";} ?>> Jabung
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k10" value="1" <?php if ($k10==1){ echo "checked";} ?>> Kalipare
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k11" value="1" <?php if ($k11==1){ echo "checked";} ?>> Karangploso
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k12" value="1" <?php if ($k12==1){ echo "checked";} ?>> Kasembon
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k13" value="1" <?php if ($k13==1){ echo "checked";} ?>> Kepanjen
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k14" value="1" <?php if ($k14==1){ echo "checked";} ?>> Kromengan
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k15" value="1" <?php if ($k15==1){ echo "checked";} ?>> Lawang
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k16" value="1" <?php if ($k16==1){ echo "checked";} ?>> Ngajum
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k17" value="1" <?php if ($k17==1){ echo "checked";} ?>> Ngantang
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k18" value="1" <?php if ($k18==1){ echo "checked";} ?>> Pagak
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k19" value="1" <?php if ($k19==1){ echo "checked";} ?>> Pagelaran
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k20" value="1" <?php if ($k20==1){ echo "checked";} ?>> Pakis
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k21" value="1" <?php if ($k21==1){ echo "checked";} ?>> Pakisaji
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k22" value="1" <?php if ($k22==1){ echo "checked";} ?>> Poncokusumo
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k23" value="1" <?php if ($k23==1){ echo "checked";} ?>> Pujon
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k24" value="1" <?php if ($k24==1){ echo "checked";} ?>> Singosari
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k25" value="1" <?php if ($k25==1){ echo "checked";} ?>> Sumbermanjing
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k26" value="1" <?php if ($k26==1){ echo "checked";} ?>> Sumberpucung
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k27" value="1" <?php if ($k27==1){ echo "checked";} ?>> Tajinan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k28" value="1" <?php if ($k28==1){ echo "checked";} ?>> Tirtoyudo
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k29" value="1" <?php if ($k29==1){ echo "checked";} ?>> Tumpang
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k30" value="1" <?php if ($k30==1){ echo "checked";} ?>> Turen
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k31" value="1" <?php if ($k31==1){ echo "checked";} ?>> Wagir
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k32" value="1" <?php if ($k32==1){ echo "checked";} ?>> Wajak
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k33" value="1" <?php if ($k33==1){ echo "checked";} ?>> Wonosari
                                </label>
							</td><td>
                            </td>
                        </tr>
					</table>
						
					</div>
					</div>
					<p>*Untuk pilih kecamatan harus centang / aktifkan kecamatan pada hak akses menu.</p>
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
                <?php echo form_open_multipart('Level/proses_delete_level') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Level User</h3>
                    </div>
                    <?php echo form_open_multipart('level/proses_input_level') ?>

                    <div class="modal-body">
					<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
					<table>
						<tr>
                            <td><label>Nama Level</label></td><td> : </td>
                            <td><input type="text" class="form-control" name="keterangan" placeholder="Nama Level..." required></td>
						</tr>
						<tr>
                            <td><label>Hak Akses</label><br></td>
                            <td>:</td>
						</tr>
					</table>
					<div class="box box-info" style="overflow: scroll;width: 100%;height: 200px;">
					<div class="box-body table-responsive">
					<p class="text-center">
							Menu
					</p>
					<table width=100%>
						<tr >
                            <td>
                                <label class="checkbox-inline" >
                                    <input type="checkbox" name="m1" value="1"> Pengelolaan Admin
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m2" value="1"> Perumahan & Pemukiman
                                </label>
							</td>
						</tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m3" value="1"> P. Perempuan & P. Anak
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m4" value="1"> Tenaga Kerja
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m5" value="1"> Pangan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m6" value="1"> Kecamatan
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m7" value="1"> Ketentraman & Ketertiban
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m8" value="1"> Lingkungan Hidup
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m9" value="1"> Perhubungan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m10" value="1"> Pemberdayaan Masyarakat
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m11" value="1"> Perdagangan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m12" value="1"> Perindustrian
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m13" value="1"> Transmigrasi
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m14" value="1"> Komunikasi & Informatika
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m15" value="1"> Penanaman Modal
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m16" value="1"> Kepemudaan & Olahraga
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m17" value="1"> Pariwisata
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m18" value="1"> Pertanian
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m19" value="1"> Energi dan SDA
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m20" value="1"> Perpustakaan
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="m21" value="1"> Perikanan dan Kelautan
                                </label>
							</td><td>
                            </td>
                        </tr>
					</table>
					</div>
					</div>
					<div class="box box-info" style="overflow: scroll;width: 100%;height: 200px;">
					<div class="box-body table-responsive">
					<p class="text-center">
							Kecamatan
					</p>
					<table width=100%>
						<tr >
                            <td>
                                <label class="checkbox-inline" >
                                    <input type="checkbox" name="k1" value="1"> Ampel Gading
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k2" value="1"> Bantur
                                </label>
							</td>
						</tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k3" value="1"> Bululawang
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k4" value="1"> Dampit
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k5" value="1"> Dau
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k6" value="1"> Donomulyo
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k7" value="1"> Gedangan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k8" value="1"> Gondanglegi
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k9" value="1"> Jabung
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k10" value="1"> Kalipare
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k11" value="1"> Karangploso
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k12" value="1"> Kasembon
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k13" value="1"> Kepanjen
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k14" value="1"> Kromengan
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k15" value="1"> Lawang
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k16" value="1"> Ngajum
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k17" value="1"> Ngantang
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k18" value="1"> Pagak
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k19" value="1"> Pagelaran
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k20" value="1"> Pakis
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k21" value="1"> Pakisaji
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k22" value="1"> Poncokusumo
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k23" value="1"> Pujon
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k24" value="1"> Singosari
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k25" value="1"> Sumbermanjing
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k26" value="1"> Sumberpucung
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k27" value="1"> Tajinan
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k28" value="1"> Tirtoyudo
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k29" value="1"> Tumpang
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k30" value="1"> Turen
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k31" value="1"> Wagir
                                </label>
							</td><td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k32" value="1"> Wajak
                                </label>
                            </td>
                        </tr>
						<tr>	
							<td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="k33" value="1"> Wonosari
                                </label>
							</td><td>
                            </td>
                        </tr>
					</table>
					</div>
					</div>
					<p>*Untuk pilih kecamatan harus centang / aktifkan kecamatan pada hak akses menu.</p>
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