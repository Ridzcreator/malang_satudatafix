<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>TRANSMIGRASI<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pemberangkatan Transmigrasi</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
                <div class="box">

               <!-- /.box-header -->
                    <div class="box-header">
                        <h4 class="box-title">Pemberangkatan Transmigrasi</h3>
                    </div>
                    
                    
                    <div class="box-body">
                    <table>
                    <tr>
                        <td>
                         <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
                        </td>
                        <td>
                         <a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a>
                        </td>
                        <td>
                         <a class="btn btn-primary" href="#modalAdd2" data-toggle="modal" title="Add">Pilih Grafik Per Tahun</a>
                        </td>
                        <td>
                         <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik Perbandingan</a>
      
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
                         <table  class="table table-bordered table-striped" id="tampilTransmigrasi" style="text-align: center; font-size:15px; width: 100%;">
                <thead >
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">Kecamatan</th>
                        <th style="text-align: center; vertical-align: middle;"">Provinsi</th>
                        <th style="text-align: center; vertical-align: middle;">Bulan</th>
                        <th style="text-align: center; vertical-align: middle;">Laki-laki</th>
                        <th style="text-align: center; vertical-align: middle;">Perempuan</th>
                        <th style="text-align: center; vertical-align: middle;">Rumah Tangga</th>
                        <th style="text-align: center; vertical-align: middle;">Jiwa</th>
                        <th style="text-align: center; vertical-align: middle;">Tahun</th>
                        <th style="width:130px; text-align:center; vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                    </table>
                    </div>
        <?php 

        foreach ($data->result_array() as $a){

                    $no=$a['id'];
                    $kecamatan=$a['kecamatan'];
                    $provinsi=$a['provinsi'];
                    $bulan=$a['bulan'];
                    $tahun=$a['tahun'];
                    $laki_laki=$a['laki_laki'];
                    $perempuan=$a['perempuan'];
                    $rumah_tangga=$a['rumah_tangga'];
                    $jiwa=$a['jiwa'];
                    $penginput=$a['penginput'];
                    $timestamp=$a['timestamp'];
                    $status=$a['status'];

            ?>
            
            <div id="modalEdit<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Edit Data Transmigrasi</h3>
                        </div>
                        <?php echo form_open_multipart('Transmigrasi/proses_edit_transmigrasi') ?>

                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="no" value="<?php echo $no;?>" readonly>

                        </div>
                        <table width="80%">
                <tr>
                    <td style="padding:  10px"><label>Tahun</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" class="form-control" name="tahun"  value="<?php echo $tahun;?>" placeholder="Tahun" autocomplete="off" readonly></td>
                </tr>
                <tr>
                  <td style="padding:  10px"><label>Kecamatan</label></td>
                  <td style="padding:  10px">:</td>
                  <td><input type="text" class="form-control" name="kecamatan" value="<?php echo $kecamatan;?>" required readonly></td>
                </tr>
                <tr>
                  <td style="padding:  10px"><label>Provinsi</label></td>
                  <td style="padding:  10px">:</td>
                  <td><input type="text" class="form-control" name="provinsi" value="<?php echo $provinsi;?>" required readonly></td>
                </tr>
                <tr>
                  <td style="padding:  10px"><label>Bulan</label></td>
                  <td style="padding:  10px">:</td>
                  <td><input type="text" class="form-control" name="bulan" value="<?php echo $bulan;?>" required readonly></td>
                </tr>
                <tr>
                   <td style="padding:  10px"><label>Laki-laki</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" min="0" class="form-control" name="laki_laki" value="<?php echo $laki_laki;?>" placeholder="Jumlah Laki-laki" required autocomplete="off"></td>
                </tr>
                <tr>
                   <td style="padding:  10px"><label>Perempuan</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" min="0" class="form-control" name="perempuan" value="<?php echo $perempuan;?>" placeholder="Jumlah Perempuan" required autocomplete="off"></td>
                </tr>
                <tr>
                   <td style="padding:  10px"><label>Rumah Tangga</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" min="0" class="form-control" name="rumah_tangga" value="<?php echo $rumah_tangga;?>" placeholder="Jumlah Rumah Tangga" required autocomplete="off"></td>
                </tr>
                        </table>
                         <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>

                        <input style="margin-left: 525px;margin-bottom: 10px" type="submit" class="btn btn-success" value="Save"> 

                    </div>
                    <?php echo form_close(); ?>
                   
                </div>
            </div>
         <div id="modalHapus<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Transmigrasi</h3>
                        </div>
                        <?php echo form_open_multipart('Transmigrasi/proses_hapus_transmigrasi') ?>
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
                                <h3 class="modal-title" id="myModalLabel">Tambah Data Transmigrasi</h3>
                            </div>
                                 <?php echo form_open_multipart('Transmigrasi/proses_tambah_transmigrasi') ?>

                        <table width="80%">
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
            <tr>
               <td style="padding:  10px"><label>Kecamatan</label></td>
               <td style="padding:  10px">:</td>
               <td> 
                <select name="kecamatan" class="form-control">
                   <?php foreach ($datas->result() as $a) {
                    ?>
                    <option value="<?php echo $a->nama_kecamatan ?>"><?php echo $a->nama_kecamatan ?></option>
                    <?php
                }
                ?>
                </select>
               </td>
            </tr>
            <tr>
               <td style="padding:  10px"><label>Provinsi</label></td>
               <td style="padding:  10px">:</td>
               <td> 
                <select name="provinsi" class="form-control">
                   <?php foreach ($datal->result() as $a) {
                    ?>
                    <option value="<?php echo $a->nama_provinsi ?>"><?php echo $a->nama_provinsi ?></option>
                    <?php
                }
                ?>
                </select>
               </td>
            </tr>
            <tr>
               <td style="padding:  10px"><label>Bulan</label></td>
               <td style="padding:  10px">:</td>
               <td> 
                <select name="bulan" class="form-control">
                   <?php foreach ($datak->result() as $a) {
                    ?>
                    <option value="<?php echo $a->keterangan ?>"><?php echo $a->keterangan ?></option>
                    <?php
                }
                ?>
                </select>
               </td>
            </tr>
            <tr>
                   <td style="padding:  10px"><label>Jumlah Laki-laki</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" min="0" class="form-control" name="laki_laki" placeholder="Jumlah Laki-laki" required autocomplete="off"></td>
           </tr>
           <tr>
                   <td style="padding: 10px"><label>Jumlah Perempuan</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" min="0" class="form-control" name="perempuan" placeholder="Jumlah Perempuan" required autocomplete="off"></td>
           </tr>
           <tr>
                   <td style="padding:  10px"><label>Jumlah Rumah Tangga</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" min="0" class="form-control" name="rumah_tangga" placeholder="Jumlah Rumah Tangga" required autocomplete="off"></td>
           </tr>
                
                        </table>

                        <?php $name = $this->session->userdata('user');?>
                            <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <div>
                           <input style="margin-left: 525px;margin-bottom: 10px;margin-top: 10px" type="submit" class="btn btn-success" name="add" value="Save"> &nbsp &nbsp 

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
                    <?php echo form_open_multipart('Transmigrasi/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td style="padding:  10px"><label>Pilih Data</label></td>
                            <td style="padding:  10px">:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Total Laki-laki</option>
                            <option value="2">Total Perempuan</option>
                            <option value="3">Total Rumah Tangga</option>
                            <option value="4">Total Jiwa</option>
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

                <div id="modalAdd2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
                    </div>
                    <?php echo form_open_multipart('Transmigrasi/tampil_grafik_transmigrasi/') ?>
                    <div class="modal-body">
                                
                            
                <table width="90%">
                  <tr>
                            <td style="padding:  10px"><label>Pilih Data</label></td>
                            <td style="padding:  10px">:</td>
                            <td>
                            <select name="dataw" id="dataw" class="form-control" required>
                            <option disabled selected value>Pilih Data</option>
                            <option value="1">Menurut Provinsi</option>
                            <option value="2">Menurut Bulan</option>
                            <option value="3">Menurut Kecamatan</option>
                            </select></td>
                        </tr>
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

            <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('Transmigrasi/tampil_crosstab_transmigrasi')) ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td style="padding:  10px"><label>Pilih Data Report</label></td>
                            <td style="padding:  10px">:</td>
                            <td>
                            <select name="dataq" id="dataq" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Ditampilkan</option>
                            <option value="1">Pemberangkatan Transmigran Menurut Provinsi</option>
                            <option value="2">Pemberangkatan Transmigran Menurut Bulan</option>
                            <option value="3">Pemberangkatan Transmigran Menurut Kecamatan</option>
                            </select></td>
                        </tr>
                        <tr>
                        <td style="padding:  10px"><label>Pilih Tahun Report</label></td>
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
                    
                            <input type="submit" class="btn btn-success pull-right" value="Lihat Crosstab"></input>
                            
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
