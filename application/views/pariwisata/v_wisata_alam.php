<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>DAYA TARIK WISATA ALAM<b>
                        <small>KABUPATEN MALANG SATU DATA</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Pariwisata</a></li>
                <li class="active">Daya Tarik Wisata Alam</li>
            </ol>
        </section>
        <!-- Main content -->

        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-header">
                            <h4 class="box-title" style="margin-bottom: 10px">Daya Tarik Wisata Alam Kabupaten Malang</h3><br>
                                <table>
                                    <tr>
                                        <td>
                                            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input Data</a>
                                        </td>
                                        <td>
                                            <a href='<?php echo base_url('c_wisata_alam/maps') ?>' class="btn btn-primary" data-toggle="modal" title="Maps"> Lihat Maps</a>
                                        </td>
                                        <td>
                                            <select name="opt_kecamatan" id="opt_kecamatan" required>
                                                <option value='0000'> Pilih Kecamatan </option>
                                                <?php
                                                foreach ($datax->result_array() as $a) {
                                                    $id_kecamatan = $a['id_kecamatan'];
                                                    $kecamatan = $a['nama_kecamatan'];
                                                ?>
                                                    <option value="<?php echo $id_kecamatan; ?>"> <?php echo $kecamatan; ?> </option>
                                                <?php } ?>

                                            </select>
                                        </td>
                                    </tr>
                                </table>
                        </div>


                        <div class="box-body">
                            <table class="table table-striped" id="tampilWisataAlam" width="100%" style="text-align:center; font-size:15px">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Nama Wisata</th>
                                        <th style="text-align:center;width:40px;">Kecamatan</th>
                                        <th style="text-align:center">Desa</th>
                                        <th style="text-align:center">Alamat</th>
                                        <th style="text-align:center;">Fasilitas Tersedia</th>
                                        <th style="text-align:center;">Pengelola</th>
                                        <th style="text-align:center">Pendukung Publikasi</th>
                                        <th style="text-align:center;">Aksesibilitas</th>
                                        <th style="text-align:center">Tenaga Kerja/Org</th>
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


                                        <?php echo form_open_multipart('C_wisata_alam/tambah_wisata_alam') ?>

                                        <div class="modal-body">
                                            <!-- INPUT TYPE HIDDEN -->
                                            <input class="form-control" type="hidden" name="id" readonly>
                                            <?php $name = $this->session->userdata('user'); ?>
                                            <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>

                                            <table>
                                                <tr>
                                                    <td><label>Nama Wisata Alam</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" style="width:335px;" class="form-control" name="nama" placeholder="Nama Wisata Alam" autocomplete="off" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Kecamatan</label></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="kecamatan_id" class="form-control " id="kecamatan_id" onChange="tampilDesa()">
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
                                                        <select name="kelurahan_id" class="form-control" id="kelurahan_id">
                                                            <option value="Pilih Desa">- Pilih Desa -</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Latitude</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" style="width:335px;" name="latitude" placeholder="Latitude" autocomplete="off" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Longitude</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" style="width:335px;" name="longitude" placeholder="Longitude" autocomplete="off" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Alamat</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" style="width:335px;" name="alamat" placeholder="Alamat" autocomplete="off" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Fasilitas</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" style="width:335px;" name="fasilitas" placeholder="Fasilitas" autocomplete="off" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Pengelola</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" style="width:335px;" style="width:335px;" name="pengelola" placeholder="Pengelola" required autocomplete="off"></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Pendukung Publikasi</label></td>
                                                    <td>:</td>
                                                    <td style="width:335px;">
                                                        <label class="checkbox-inline">
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
                                                    <td><input type="text" style="width:335px;" class="form-control" name="aksesibilitas" placeholder="Aksesibilitas" autocomplete="off" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Tenaga Kerja</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:335px;" class="form-control" name="tenaga_kerja" placeholder="Tenaga Kerja" autocomplete="off"></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Jenis Wisata</label></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="jenis_wisata" style="width:335px;" id="jenis_wisata" class="form-control" required>
                                                            <option disabled selected value> Pilih Jenis Wisata </option>
                                                            <?php
                                                            foreach ($datam->result_array() as $a) {
                                                                $id = $a['id'];
                                                                $jenis_wisata = $a['jenis_wisata'];
                                                            ?>
                                                                <option value="<?php echo $id; ?>"> <?php echo $jenis_wisata; ?> </option>
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

                            foreach ($data->result_array() as $a) {

                                $id = $a['id'];
                                $nama = $a['nama'];
                                $latitude = $a['latitude'];
                                $longitude = $a['longitude'];
                                $alamat = $a['alamat'];
                                $fasilitas = $a['fasilitas'];
                                $pengelola = $a['pengelola'];
                                $publikasi = explode(", ", $a['publikasi']);
                                $aksesibilitas = $a['aksesibilitas'];
                                $tenaga_kerja = $a['tenaga_kerja'];
                                $jenis_wisata = $a['jenis_wisata'];

                            ?>


                                <!-- MODAL HAPUS -->

                                <div id="modalHapus<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                                            </div>
                                            <?php echo form_open_multipart('C_wisata_alam/hapus_wisata_alam') ?>
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


                                <!--edit data-->
                                <div id="modalEdit<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 class="modal-title" id="myModalLabel">Ubah Wisata Alam</h3>
                                            </div>
                                            <?php echo form_open_multipart('C_wisata_alam/ubah_wisata_alam') ?>

                                            <div class="modal-body">
                                                <!-- INPUT TYPE HIDDEN -->
                                                <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>" readonly>
                                                <?php $name = $this->session->userdata('user'); ?>
                                                <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>


                                                <table>
                                                    <tr>
                                                        <td><label>Nama wisata</label></td>
                                                        <td>:</td>
                                                        <td><input type="text" style="width:335px;" class="form-control" name="nama" value="<?php echo $nama; ?>" placeholder="Kecamatan" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Latitude</label></td>
                                                        <td>:</td>
                                                        <td><input type="text" style="width:335px;" class="form-control" name="latitude" value="<?php echo $latitude; ?>" placeholder="Latitude" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Longitude</label></td>
                                                        <td>:</td>
                                                        <td><input type="text" style="width:335px;" class="form-control" name="longitude" value="<?php echo $longitude; ?>" placeholder="Longitude" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Alamat</label></td>
                                                        <td>:</td>
                                                        <td><input type="text" style="width:335px;" class="form-control" name="alamat" value="<?php echo $alamat; ?>" placeholder="Alamat" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Fasilitas</label></td>
                                                        <td>:</td>
                                                        <td><input type="text" style="width:335px;" class="form-control" name="fasilitas" value="<?php echo $fasilitas; ?>" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Pengelola</label></td>
                                                        <td>:</td>
                                                        <td><input type="text" style="width:335px;" class="form-control" name="pengelola" value="<?php echo $pengelola; ?>" autocomplete="off"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label>Pendukung Publikasi</label></td>
                                                        <td>:</td>
                                                        <td style="width:335px;" style="width:335px;">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="publikasi[]" value="Poster" <?php foreach ($publikasi as $key) {
                                                                                                                                if ($key == 'Poster') {
                                                                                                                                    echo 'checked';
                                                                                                                                }
                                                                                                                            } ?>> Poster
                                                            </label>

                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="publikasi[]" value="Brosur" <?php foreach ($publikasi as $key) {
                                                                                                                                if ($key == 'Brosur') {
                                                                                                                                    echo 'checked';
                                                                                                                                }
                                                                                                                            } ?>> Brosur
                                                            </label>

                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="publikasi[]" value="CD" <?php foreach ($publikasi as $key) {
                                                                                                                            if ($key == 'CD') {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                        } ?>> CD
                                                            </label>

                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="publikasi[]" value="Web" <?php foreach ($publikasi as $key) {
                                                                                                                            if ($key == 'Web') {
                                                                                                                                echo 'checked';
                                                                                                                            }
                                                                                                                        } ?>> Web
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Aksesibilitas</label></td>
                                                        <td>:</td>
                                                        <td><input type="text" style="width:335px;" class="form-control" name="aksesibilitas" value="<?php echo $aksesibilitas; ?>" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Tenaga Kerja</label></td>
                                                        <td>:</td>
                                                        <td><input type="text" style="width:335px;" class="form-control" name="tenaga_kerja" value="<?php echo $tenaga_kerja; ?>" autocomplete="off"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Jenis Wisata</label></td>
                                                        <td>:</td>
                                                        <td>
                                                            <select name="jenis_wisata" style="width:335px;" id="jenis_wisata" class="form-control" required>
                                                                <option disabled selected value> Pilih Jenis Wisata </option>
                                                                <?php
                                                                foreach ($datam->result_array() as $a) {
                                                                    $id_master_jenis_wisata = $a['id'];
                                                                    $master_jenis_wisata = $a['jenis_wisata'];
                                                                ?>
                                                                    <option value="<?php echo $id_master_jenis_wisata; ?>" <?php if($id_master_jenis_wisata==$jenis_wisata){echo "selected";}?>> <?php echo $master_jenis_wisata; ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>




                                            </div>

                                            <div class="modal-footer">
                                                <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Update"> &nbsp &nbsp
                                                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                                            </div>

                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>








                            <?php } ?>








                            <!-- /.box-body -->

                            <!-- /.box -->
                        </div>
        </section>
        <!-- /.content -->
    </div>
</body>