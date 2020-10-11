<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <section class="content-header">
        <h1>
            <b>SARANA PERDAGANGAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Sarana Perdagangan</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Sarana Perdagangan</h3>
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
            <td>
                 <a class="btn btn-primary" href="#modalAdd2" data-toggle="modal" title="Add">Pilih Grafik Per Tahun</a>
            </td>
            <td><div>
            <select style="margin-left: 5px;" name="tahun" id="tahun" required>
            <option value="0000"> Pilih Tahun </option>
                <?php 
                foreach ($datax->result_array() as $a){
                $periode=$a['tahun'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>

                  <table  class="table table-bordered table-striped" style="text-align: center; font-size:15px; width: 100%;" id="tampilSaranaPerdagangan">
                    <thead >
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">Kecamatan</th>
                            <th style="text-align: center; vertical-align: middle;">Pasar Umum</th>
                            <th style="text-align: center; vertical-align: middle;">Toko</th>
                            <th style="text-align: center; vertical-align: middle;">Rumah Makan</th>
                            <th style="text-align: center; vertical-align: middle;">Tahun</th>
                            <th style="width:130px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <tfoot>
            <tr>
                <th style="text-align:center;">Jumlah</th>
          <!--       <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th> -->
                <th style="text-align:center;"></th>
                <th style="text-align:center;"></th>
                <th style="text-align:center;"></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>

                    </table>
                        <?php 
                        
                        foreach ($data->result_array() as $a){
                        
                        $no=$a['id'];
                        $kecamatan=$a['kecamatan'];
                        $pasar_umum=$a['pasar_umum'];
                        $toko=$a['toko'];
                        $rumah_makan=$a['rumah_makan'];
                        $tahun=$a['tahun'];
                        $penginput=$a['penginput'];
                        $timestamp=$a['timestamp'];
                        $status=$a['status'];
                        
                        ?>
                      
            
            <div id="modalEdit<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Edit Data Sarana Perdagangan</h3>
                        </div>
                        <?php echo form_open_multipart('Sarana_perdagangan/proses_edit_sarana_perdagangan') ?>

                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="no" value="<?php echo $no;?>" readonly>


                        </div>
             <table width="80%">
              <tr>
              <td style="padding:  10px"><label>Kecamatan</label></td>
              <td style="padding:  10px">:</td>
              <td> 
              <input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan;?>" placeholder="Kecamatan" required readonly>
              </td>
            </div>
                </tr>
                <tr>
                   <td style="padding:  10px"><label>Pasar Umum</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="text" class="form-control" name="pasar_umum" value="<?php echo $pasar_umum;?>" placeholder="Pasar_umum" required autocomplete="off"></td>
               </tr>
               <tr>
                 <td style="padding:  10px"><label>Toko</label></td>
                 <td style="padding:  10px">:</td>
                 <td><input type="number" class="form-control" name="toko"  value="<?php echo $toko;?>" placeholder="Toko" autocomplete="off"></td>
             </tr>
             <tr>
               <td style="padding:  10px"><label>Rumah Makan</label></td>
               <td style="padding:  10px">:</td>
               <td><input type="number" class="form-control" name="rumah_makan"  value="<?php echo $rumah_makan;?>" placeholder="Rumah Makan" autocomplete="off"></td>
            </tr>
            <tr>
               <td style="padding:  10px"><label>Tahun</label></td>
               <td style="padding:  10px">:</td>
               <td>
                  <input type="number" class="form-control" name="tahun"  value="<?php echo $tahun;?>" placeholder="Tahun" autocomplete="off" readonly>
               </td>
            </tr>
                </table>
                          <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
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
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Sarana Perdagangan</h3>
                        </div>
                        <?php echo form_open_multipart('Sarana_perdagangan/proses_hapus_sarana_perdagangan') ?>
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
                                <h3 class="modal-title" id="myModalLabel">Tambah Data Sarana Perdagangan</h3>
                            </div>
                        <?php echo form_open_multipart('Sarana_perdagangan/proses_tambah_sarana_perdagangan') ?>

                <table width="80%">
              <tr>
               <td style="padding:  10px"><label>Kecamatan</label></td>
               <td style="padding:  10px">:</td>
               <td>   <select name="kecamatan" class="form-control">
                   <?php foreach ($datas->result() as $a) {
                    ?>
                    <option value="<?php echo $a->nama_kecamatan ?>"><?php echo $a->nama_kecamatan ?></option>
                    <?php
                }
                ?>
            </select></td>
            </div>
                </tr>
                <tr>
                   <td style="padding:  10px"><label>Pasar Umum</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" class="form-control" name="pasar_umum" placeholder="Jumlah Pasar Umum" autocomplete="off"></td>
               </tr>
               <tr>
                 <td style="padding:  10px"><label>Toko</label></td>
                 <td style="padding:  10px">:</td>
                 <td><input type="number" class="form-control" name="toko" placeholder="Jumlah Toko" autocomplete="off"></td>
             </tr>
             <tr>
               <td style="padding:  10px"><label>Rumah Makan</label></td>
               <td style="padding:  10px">:</td>
               <td><input type="number" class="form-control" name="rumah_makan" placeholder="Jumlah Rumah Makan" autocomplete="off"></td>
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
                </table>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <div>
                           <input style="margin-left: 525px;margin-bottom: 10px;margin-top: 5px" type="submit" class="btn btn-success" name="add" value="Save"> &nbsp &nbsp 
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
                    <?php echo form_open_multipart('Sarana_perdagangan/tampil_sarana_grafik/') ?>
                    <div class="modal-body">
                                
                            
                <table width="90%">
                    <tr>
                        <td style="padding:  10px"><label>Periode</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                        <select name="tahunx" id="tahunx" class="form-control">
                        <option value="0000"> Pilih Tahun </option>
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
                         <div>
                           <input style="margin-left: 525px;margin-bottom: 10px;margin-top: 5px" type="submit" class="btn btn-success" name="add" value="Save"> &nbsp &nbsp 
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            <!-- /.box-body -->
        </div>

               <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
                    </div>
                    <?php echo form_open_multipart('Sarana_perdagangan/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td style="padding:  10px"><label>Pilih Data</label></td>
                            <td style="padding:  10px">:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Pasar Umum</option>
                            <option value="2">Jumlah Toko</option>
                            <option value="3">Jumlah Rumah Makan</option>
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
               
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
</body>

