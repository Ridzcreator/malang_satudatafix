<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>POTENSI UNGGULAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Potensi Unggulan</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">


               <!-- /.box-header -->
               <div class="box-header">
                        <h4 class="box-title" style="margin-bottom: 10px">Potensi Unggulan Dan Desa Wisata</h3><br>
                        <table>
                            <tr>
                                <td><a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a></td>
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

                  <table  class="table table-striped" id="tampilPotensi">
                    <thead >
                        <tr>
                            <th style="text-align:center">Tahun</th>
                            <th style="text-align:center">Kecamatan</th>
                            <th style="text-align:center">Desa</th>
                            <th style="text-align:center">Kelembagaan </th>
                            <th style="text-align:center">Potensi Unggulan</th>
                            <th style="text-align:center">Keterangan</th>
                            <th style="width:110px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="text-align:center">

                    </tbody>
            </table>


            <?php 

            foreach ($data->result_array() as $a){

                $id=$a['id'];
                
                $kelembagaan=$a['kelembagaan'];
                $potensi=$a['potensi_unggulan'];
                $keterangan=$a['keterangan'];

                $tahun=$a['tahun'];
                ?>

                <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Edit Data</h3>
                            </div>
                            <?php echo form_open_multipart('C_potensi_unggulan/proses_edit_potensi_unggulan') ?>

                            <div class="modal-body">
                                <input class="form-control" type="hidden" name="no" value="<?php echo $id;?>" readonly>
                                <table>

                                <tr>
                                    <td><label>Tahun</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="tahun" style="width:335px;" value="<?php echo $tahun;?>" readonly placeholder="tahun" autocomplete="off"></td>
                                </tr>
                               
                                <tr>
                                    <td><label>Kelembagaan</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="kelembagaan" style="width:335px;" value="<?php echo $kelembagaan;?>" placeholder="Kelembagaan" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><label>Potensi Unggulan</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="potensi_unggulan" style="width:335px;" value="<?php echo $potensi;?>" placeholder="Potensi Unggulan" autocomplete="off"></td>
                                </tr> 
                                <tr>
                                    <td><label>Keterangan</label></td>
                                    <td>:</td>
                                    <td><select name="keterangan" class="form-control" style="width:335px;">
                                        <option value="Maju" <?php if($keterangan == 'Maju'){ echo 'selected'; } ?>>Maju</option>
                                        <option value="Berkembang" <?php if($keterangan == 'Berkembang'){ echo 'selected'; } ?>>Berkembang</option>
                                        <option value="Berpotensi" <?php if($keterangan == 'Berpotensi'){ echo 'selected'; } ?>>Berpotensi</option>
                                    </select></td>
                                </tr>
                                    <?php $name=$this->session->userdata('user'); ?>
                                    <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
                            </div>
                            </table>

                            <div class="modal-footer">
                                <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> &nbsp &nbsp
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            </div>

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
                            <h3 class="modal-title" id="myModalLabel">Hapus Potensi Unggulan</h3>
                        </div>
                        <?php echo form_open_multipart('C_potensi_unggulan/proses_hapus_potensi_unggulan') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data ini..?</p>
                            <input name="no" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
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
                            <h3 class="modal-title" id="myModalLabel">Tambah Data</h3>
                        </div>
                        <?php echo form_open_multipart('C_potensi_unggulan/proses_tambah_potensi_unggulan') ?>

                        <div class="modal-body">
                            <input type="hidden" name="id" readonly>
                            <table>
                                <tr>
                                    <td><label >Tahun</label></td>
                                    <td>:</td>
                                    <td><select name="tahun" id="tahun" style="width:335px;"  class="form-control" required>
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
                                <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
                                <select name="kecamatan_id" class="form-control " id="kecamatan_id"  onChange="tampilDesa()">
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
                            <td><label>Desa</label></td><td>:</td>
                            <td>
                                <select name="kelurahan_id" class="form-control" id="kelurahan_id">
                                    <option value="Pilih Desa">- Pilih Desa -</option>
                                </select>
                            </td>
                        </tr>
                                <tr>
                                    <td><label>Kelembagaan</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="kelembagaan" placeholder="Kelembagaan" style="width:335px;" required autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><label>Potensi Unggulan</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" name="potensi_unggulan" placeholder="Potensi Unggulan" style="width:335px;" required autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td><label>Keterangan</label></td>
                                    <td>:</td>
                                    <td><select name="keterangan" class="form-control" style="width:335px;">
                                        <option value="Maju">Maju</option>
                                        <option value="Berkembang">Berkembang</option>
                                        <option value="Berpotensi">Berpotensi</option>
                                        </select>
                                    </td>
                                </tr>
                        </table>
                            <?php $name=$this->session->userdata('user'); ?>
                            <input type="hidden"  name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
                    </div>

                    <div class="modal-footer">
                        <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> &nbsp &nbsp
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>

                </div>
                <?php echo form_close(); ?>
            </div>





            
        </div>
    </div>


    <!-- /.box-body -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>