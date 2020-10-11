<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>DAYA TARIK WISATA BUDAYA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Pariwisata</a></li>
            <li class="active">Daya Tarik Wisata Budaya</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">


            	<div class="box">

               <!-- /.box-header -->
               		<div class="box-header">
		                <h4 class="box-title" style="margin-bottom: 10px" >Daya Tarik Wisata Budaya Kabupaten Malang</h3><br>
		                <table>
                        <tr>
		                	<td>
		                		<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Input Data</a>
		                	</td>
		                	<td>
                                <select name="opt_kecamatan" id="opt_kecamatan" required>
                                    <option value='0000'> Pilih Kecamatan </option>
                                    <?php 
                                    foreach ($datax->result_array() as $a){
                                    $id_kecamatan=$a['id_kecamatan'];
                                    $kecamatan=$a['nama_kecamatan'];
                                    ?>
                                    <option value="<?php echo $id_kecamatan; ?>"> <?php echo $kecamatan; ?> </option>
                                    <?php } ?>
                                
                            </select>
                            </td>
		                </tr>
                        </table>
		            </div>
	                
	                
	                <div class="box-body">
		            <table  class="table table-striped" id="tampilWisataBudaya" width="100%" style="text-align:center; font-size:13px ">
		                <thead >
		                    <tr>
		                        <th style="text-align:center;">Nama Wisata</th>
		                        <th style="text-align:center;width:40px;">Kecamatan</th>
		                        <th style="text-align:center">Desa</th>
                                <th style="text-align:center;">Fasilitas Tersedia</th>
                                <th style="text-align:center">Deskripsi Keunikan</th>
                                <th style="text-align:center;">Pengelola</th>
                                <th style="text-align:center">Pendukung Publikasi</th>
                                <th style="text-align:center;">Aksesibilitas</th>
		                        <th style="text-align:center;width:100px">Aksi</th>
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


                        <?php echo form_open_multipart('C_wisata_budaya/tambah_wibu') ?>

                        <div class="modal-body">
                            <!-- INPUT TYPE HIDDEN -->
                            <input class="form-control" type="hidden" name="id" readonly>
                            <?php $name=$this->session->userdata('user'); ?>
                            <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>

                            <table>
                                <tr>
                                    <td><label>Nama Wisata Budaya</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="nama" placeholder="Nama Wisata Budaya" autocomplete="off" required></td>
                                </tr>
                                <tr>
                                    <td><label>Kecamatan</label></td>
                                    <td>:</td>
                                    <td>
                                        <select name="kecamatan_id" class="form-control " style="width:355px" id="kecamatan_id"  onChange="tampilDesa()">
                                        <option value="">Pilih Kecamatan</option>
                                          <?php foreach ($datazx->result() as $row) {
                                          ?>
                                          <option value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
                                          <?php
                                          }
                                          ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Desa</label></td>
                                    <td>:</td>
                                    <td>
                                        <select name="kelurahan_id" class="form-control" style="width:355px" id="kelurahan_id">
                                            <option value="Pilih Desa">- Pilih Desa -</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Fasilitas</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="fasilitas" placeholder="fasilitas" autocomplete="off" required></td>
                                </tr>
                                <tr>
                                    <td><label>Deskripsi Keunikan</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="deskripsi" placeholder="Deskripsi" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><label>Pengelola</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="pengelola" placeholder="Pengelola" required autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><label>Pendukung Publikasi</label><br></td>
                                    <td>:</td>
                                    <td>
                                        <label class="checkbox-inline" >
                                            <input type="checkbox" name="publikasi[]" value="Poster"> Poster
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="publikasi[]" value="Brosur"> Brosur
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="publikasi[]" value="CD"> CD
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="publikasi[]" value="Web"> Web
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Aksesibilitas</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="aksesibilitas" placeholder="Aksesibilitas" autocomplete="off" required></td>
                                </tr>
                                <tr>
                                    <td><label>Jenis Warisa Budaya</label></td>
                                    <td>:</td>
                                    <td>
                                        <select name="jenis_warisan" style="width:355px" id="jenis_warisan" class="form-control" required>
                                        <option disabled selected value> Pilih Jenis Warisan Budaya </option>
                                        <?php 
                                        foreach ($datam->result_array() as $a){
                                            $id=$a['id'];
                                            $warisan_budaya=$a['warisan_budaya'];
                                            ?>
                                            <option value="<?php echo $id; ?>"> <?php echo $warisan_budaya; ?> </option>
                                        <?php } ?>
                                        </select>
                                    </td>
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





                      <!-- MODAL EDIT -->

            <?php 

            foreach ($data->result_array() as $a){

                $id=$a['id'];
                $nama=$a['nama'];
                $fasilitas=$a['fasilitas'];
                $deskripsi=$a['deskripsi'];
                $pengelola=$a['pengelola'];
                $publikasi=explode(", ", $a['publikasi']);
                $aksesibilitas=$a['aksesibilitas'];
                $jenis_warisan=$a['jenis_warisan'];
                ?>


                    <!-- MODAL HAPUS -->

                <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                            </div>
                            <?php echo form_open_multipart('C_wisata_budaya/hapus_wisata_budaya') ?>
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
                                <h3 class="modal-title" id="myModalLabel">Ubah Wisata Budaya</h3>
                            </div>
                            <?php echo form_open_multipart('C_wisata_budaya/ubah_wisata_budaya') ?>

                            <div class="modal-body">
                                <!-- INPUT TYPE HIDDEN -->
                                <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                                <?php $name=$this->session->userdata('user'); ?>
                                <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>

                                <table>
                                <tr>
                                    <td><label >Nama wisata</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="nama" value="<?php echo $nama;?>" placeholder="Kecamatan" required></td>
                                </tr>
                                <tr>
                                   <td><label >Fasilitas</label></td>
                                   <td>:</td>
                                   <td><input type="text" class="form-control" style="width:355px" name="fasilitas" placeholder="fasilitas" autocomplete="off" required value="<?php echo $fasilitas;?>"></td>
                               </tr>
                                <tr>
                                    <td><label >Deskripsi</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="deskripsi"  value="<?php echo $deskripsi;?>"  autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><label >Pengelola</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="pengelola"  value="<?php echo $pengelola;?>"  autocomplete="off"></td>
                                </tr>
                                    <tr><td><label >Pendukung Publikasi</label></td>
                                        <td>:</td>
                                        <td>
                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="publikasi[]" value="Poster"
                                                <?php foreach ($publikasi as $key) {
                                                      if ($key == 'Poster') {
                                                      echo 'checked';
                                                    }
                                                } ?>  > Poster
                                            </label>

                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="publikasi[]" value="Brosur"
                                                <?php foreach ($publikasi as $key) {
                                                      if ($key == 'Brosur') {
                                                      echo 'checked';
                                                    }
                                                } ?>  > Brosur
                                            </label>

                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="publikasi[]" value="CD"
                                                <?php foreach ($publikasi as $key) {
                                                      if ($key == 'CD') {
                                                      echo 'checked';
                                                    }
                                                } ?>  > CD
                                            </label>

                                            <label class="checkbox-inline">
                                            <input type="checkbox" name="publikasi[]" value="Web"
                                                <?php foreach ($publikasi as $key) {
                                                      if ($key == 'Web') {
                                                      echo 'checked';
                                                    }
                                                } ?>  > Web
                                            </label>
                                        </td>
                                    </tr>
                                <tr>
                                    <td><label >Aksesibilitas</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="aksesibilitas"  value="<?php echo $aksesibilitas;?>"  autocomplete="off"></td>
                                </tr>
                                
                                    <tr>
                                        <td><label >Jenis Warisa Budaya</label></td>
                                        <td>:</td>
                                        <td>
                                            <select name="jenis_warisan" style="width:355px" id="jenis_warisan" class="form-control" required>
                                            <option disabled selected value> Pilih Jenis Warisan Budaya </option>
                                            <?php 
                                            foreach ($datam->result_array() as $a){
                                                $id=$a['id'];
                                                $warisan_budaya=$a['warisan_budaya'];
                                                ?>
                                                <option value="<?php echo $id; ?>" <?=$id== $jenis_warisan? "selected" : null ?>> <?php echo $warisan_budaya; ?> </option>
                                            <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                            </table>


                            </div>

                            <div class="modal-footer">
                                <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> &nbsp &nbsp
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            </div>

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>


            

            <?php } ?>


              
			


	

    		


            </div><!-- /.box-body -->
		
        </div><!-- /.box -->
		
	</section>
<!-- /.content -->
</div>
</body>



