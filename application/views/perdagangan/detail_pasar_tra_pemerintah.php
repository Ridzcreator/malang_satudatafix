<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>DETAIL PASAR TRADISIONAL<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Pasar_tradisional'); ?>">Pasar Tradisional</a></li>
            <li class="active">Detail Pasar Tradisional Pemerintah</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    <div class="box">
    <div class="box-header">
            <h3 class="box-title">Tabel Pasar Tradisional</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
                <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a><br><br>
            </td>
            <td><div>
            <select style="margin-bottom: 20px; margin-left: 5px;" name="tahun" id="tahun" required>
            <option value="0000"> Pilih Tahun </option>
                <?php 
                foreach ($datax->result_array() as $a){
                $periode=$a['Tahun'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
        

                  <table  class="table table-bordered table-striped" id="tampilDetail" style="font-size:15px; width: 100%; text-align:left;">
                    <thead >
                        <tr>
                            <th style="text-align:center; vertical-align: middle;">No</th>
                            <th style="text-align:center; vertical-align: middle;">Nama Pasar</th>
                            <th style="text-align:center; vertical-align: middle;">Alamat Lengkap</th>
                            <th style="text-align:center; vertical-align: middle;">Luas Lahan </th>
                            <th style="text-align:center; vertical-align: middle;">Luas Bangunan</th>
                            <th style="text-align:center; vertical-align: middle;">Pengelola</th>
                            <th style="text-align:center; vertical-align: middle;">Tahun Berdiri</th>
                            <th style="text-align:center; vertical-align: middle;">Tahun Terakhir</th>
                            <th style="text-align:center; vertical-align: middle;">Kondisi Fisik</th>
                            <th style="text-align:center; vertical-align: middle; width:130px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                </tbody>
            </table>

            <?php
            foreach ($data->result_array() as $a){
                $no=$a['No'];
                $nama_pasar=$a['Nama_Pasar'];
                $alamat=$a['Alamat_Lengkap'];
                $luas=$a['Luas_Lahan'];
                $luas_bangunan=$a['Luas_Bangunan'];
                $pengelola=$a['Pengelola'];
                $nama_pengelola=$a['Nama_Pengelola'];
                $tahun_b=$a['Tahun_Berdiri'];
                $tahun_akhir=$a['Tahun_Terakhir'];
                $kondisi=$a['Kondisi_Fisik'];
                $penginput=$a['Penginput'];
                $tahun=$a['Tahun'];
                $timestamp=$a['Timestamp'];
                $status=$a['Status'];
                
                ?>


                <div id="modalEdit<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Edit Data Pasar Tradisional</h3>
                            </div>
                            <?php echo form_open_multipart('Pasar_tradisional/proses_edit_pasar_tradisional') ?>

                            <div class="modal-body">
                                <input class="form-control" type="hidden" name="no" value="<?php echo $no;?>" readonly>
                            </div> 
                <table width="100%">
                    <tr>
                        <td style="padding:  10px"><label> Nama Pasar</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="text" class="form-control" name="nama_pasar" placeholder="Nama Pasar" style="width:335px;" value="<?php echo $nama_pasar;?>" required autocomplete="off">
                        </td>
                        </div>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Alamat Lengkap</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="text" class="form-control" name="alamat_lengkap" placeholder="Alamat" style="width:335px;" value="<?php echo $alamat;?>" required autocomplete="off">
                        </td>
                    </tr><br>
                    <tr>
                        <td style="padding:  10px"><label>Luas Lahan</label></td>
                        <td style="padding:  10px">:</td>
                        <td> 
                            <input type="number" class="form-control" name="luas_lahan" placeholder="Luas" style="width:335px;" value="<?php echo $luas;?>" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label> Luas Bangunan</label></td>
                        <td style="padding:  10px">:</td>
                        <td>    
                            <input type="number" class="form-control" name="luas_bangunan" placeholder="Luas" style="width:335px;" value="<?php echo $luas_bangunan;?>" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Pengelola</label></td>
                        <td style="padding:  10px">:</td>
                        <td> 
                             <input type="text" class="form-control"  style="width:335px;" name="pengelola"  value="<?php echo $pengelola;?>" placeholder="Pengelola" autocomplete="off" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Nama Pengelola</label></td>
                        <td style="padding:  10px">:</td>
                        <td> 
                            <input type="text" class="form-control" name="nama_pengelola" placeholder="Nama Pengelola" style="width:335px;"  value="<?php echo $nama_pengelola;?>" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Tahun Berdiri</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="number" class="form-control" name="tahun_berdiri" placeholder="Tahun Berdiri" style="width:335px;" value="<?php echo $tahun_b;?>" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Tahun Terakhir</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="number" class="form-control" name="tahun_terakhir" placeholder="Tahun Terakhir" style="width:335px;" value="<?php echo $tahun_akhir;?>" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Kondisi Fisik</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="text" class="form-control" name="kondisi_fisik" placeholder="Kondisi" style="width:335px;" value="<?php echo $kondisi;?>" autocomplete="off">
                        </td>
                    </tr>
                     <tr>
                        <td style="padding:  10px"><label>Periode</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="text" class="form-control" name="tahun" placeholder="Periode" style="width:335px;" value="<?php echo $tahun;?>" autocomplete="off" readonly>
                        </td>
                    </tr>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                </table>
                        
                            <input style="margin-left: 525px;margin-bottom: 10px" type="submit" class="btn btn-success" value="Save"> &nbsp &nbsp

                        </div>

                        <?php echo form_close(); ?>
                    
                </div>
            </div>



            <div id="modalHapus<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Pasar Tradisional</h3>
                        </div>
                        <?php echo form_open_multipart('Pasar_tradisional/proses_hapus_pasar_tradisional') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data ini..?</p>
                            <input name="no" type="hidden" value="<?php echo $no; ?>">
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
                                <h3 class="modal-title" id="myModalLabel">Tambah Data Pasar Tradisional</h3>
                    </div>
                            <?php echo form_open_multipart('Pasar_tradisional/proses_tambah_pasar_tradisional') ?>

                    <div class="modal-body">
                                <input class="form-control" type="hidden" name="no" value="<?php echo $no;?>" readonly>
                                
                            
            <table width="100%">
                    <tr>
                        <td style="padding:  10px"><label> Nama Pasar</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="text" class="form-control" name="nama_pasar" placeholder="Nama Pasar" style="width:335px;" required autocomplete="off">
                        </td>
                    </tr><br>
                    <tr>
                        <td style="padding:  10px"><label>Alamat Lengkap</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="text" class="form-control" name="alamat_lengkap" placeholder="Alamat" style="width:335px;" required autocomplete="off">
                        </td>
                    </tr><br>
                    <tr>
                        <td style="padding:  10px"><label>Luas Lahan</label></td>
                        <td style="padding:  10px">:</td>
                        <td> 
                            <input type="number" class="form-control" name="luas_lahan" placeholder="Luas" style="width:335px;" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label> Luas Bangunan</label></td>
                        <td style="padding:  10px">:</td>
                        <td>    
                            <input type="number" class="form-control" name="luas_bangunan" placeholder="Luas" style="width:335px;" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Pengelola</label></td>
                        <td style="padding:  10px">:</td>
                        <td> 
                           <input type="text" class="form-control" name="pengelola"  value="Dikelola Pemerintah" autocomplete="off" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Nama Pengelola</label></td>
                        <td style="padding:  10px">:</td>
                        <td> 
                            <input type="text" class="form-control" name="nama_pengelola" placeholder="Nama Pengelola" style="width:335px;" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Tahun Berdiri</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="number" class="form-control" name="tahun_berdiri" placeholder="Tahun Berdiri" style="width:335px;" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Tahun Terakhir</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="number" class="form-control" name="tahun_terakhir" placeholder="Tahun Terakhir" style="width:335px;" autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Kondisi Fisik</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <input type="text" class="form-control" name="kondisi_fisik" placeholder="Kondisi" style="width:335px;" autocomplete="off">
                        </td>
                    </tr>
                     <tr>
                        <td style="padding:  10px"><label>Periode</label></td>
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
                                </table>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </div>
                         <div>
                           <input style="margin-left: 525px;margin-bottom: 10px;margin-top: 5px" type="submit" class="btn btn-success" name="add" value="Save"> &nbsp &nbsp 

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            <!-- /.box-body -->
        </div>

        <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Pasar_tradisional'); ?>">Back</a>
        
        <!-- /.box -->
            </div>
    </section>
    <!-- /.content -->
</div>
</body>
