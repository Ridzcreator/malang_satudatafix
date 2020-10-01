<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KEPEMUDAAN DAN OLAHRAGA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Atlet dan Pelatih Berprestasi</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tabel Jumlah Atlet dan Pelatih Berprestasi di Kabupaten Malang</h3>
            </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
                <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
            </td>
            <td>
            <a class="btn btn-success" href="#modalgrafik2" data-toggle="modal" title="Add">Pilih Grafik Per Tahun</a>
            </td>
            <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Lihat Grafik Perbandingan</a>
            </td>
           
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

         <table class="table table-bordered table-striped" style="font-size: 15px;" id="tampilcabangolahraga">
              <thead>
                    <tr>
                        <th>No</th>
                        <th>Cabang Olahraga</th>
                        <td>Prestasi</td>
                        <td>Dibina</td>
                        <td>Jumlah</td>
                        <td>Tahun</td>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <th style="text-align:center;  " colspan="2">Jumlah</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="text-align:center; " colspan="2" ></th>
                </tfoot>
                
            </table>

             <?php
                foreach ($data->result_array() as $a) {
                    $id = $a['id'];
                    $co=$a['cabang_olahraga'];
                    $ps=$a['prestasi'];
                    $db=$a['dibina'];
                    $jm=$a['jumlah'];
                    $tahun=$a['tahun'];   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Jumlah Prestasi Atlet & Pelatih</h3>
                </div>
                    <?php echo form_open_multipart('C_cabangolah/proses_edit_cabang_olah') ?>
                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                            <input class="form-control" type="hidden" name="tahun" value="<?php echo $tahun;?>" readonly>
                            <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jm;?>">
                   
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Cabang Olahraga</label></td><td>:</td>
                            <td style="padding:  10px"><input name="cabang_olahraga" class="form-control" value="<?php echo $co;?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Prestasi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="prestasi" class="form-control" type="text" placeholder="" value="<?php echo $ps; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Dibina</label></td><td>:</td>
                            <td style="padding:  10px"><input name="dibina" class="form-control" type="text" placeholder="" value="<?php echo $db; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding: 10px"><input type="" class="form-control" name="tahun"  value="<?php echo $tahun;?>" placeholder="Tahun" autocomplete="off" readonly></td>
                        </tr>
                   </table>     
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <input type="submit" class="btn btn-success pull-right" value="Save"></input> &nbsp &nbsp
                    </div>
                <?php echo form_close(); ?>
                </div>
           </div>
        </div>

    <div id="modalgrafik2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
                    </div>
                    <?php echo form_open_multipart('C_cabangolah/tampil_grafik_cabangolah/') ?>
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
                           <input style="margin-left: 485px;margin-bottom: 10px;margin-top: 5px" type="submit" class="btn btn-success" name="add" value="Lihat Grafik"> &nbsp &nbsp 
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            <!-- /.box-body -->
        </div>
        
    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Atlet & Pelatih Berprestasi</h3>
                    </div>
                    <?php echo form_open_multipart('C_cabangolah/proses_input_cabang_olah') ?>

                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                
                    <table width="90%">
                       <tr>
                            <td style="padding:  10px"> <label>Cabang Olahraga</label></td><td>:</td>
                            <td style="padding:  10px"><select name="cabang_olahraga" class="form-control" style="width:335px;" required>
                                        <?php foreach ($datas->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->cabang_olahraga ?>"><?php echo $row->cabang_olahraga ?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Prestasi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="prestasi" class="form-control" type="text" placeholder="Jumlah Prestasi" style="width:335px;" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Dibina</label></td><td>:</td>
                            <td style="padding:  10px"><input name="dibina" class="form-control" type="text" placeholder="Jumlah Dibina" style="width:335px;" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px">
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
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
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

      <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Prestasi Atletik</h3>
                    </div>
                    <?php echo form_open_multipart('C_cabangolah/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Prestasi</option>
                            <option value="2">Jumlah Dibina</option>
                        </tr>
                        <tr>
                            <td><label>Model Grafik</label></td><td>:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>]
                            <option value="line">Grafik Line</option>
                            </select></td>
                        </tr>
                        <tr>
                        <td><label>Tahun Grafik</label></td><td>:</td>
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
    

     <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus data Prestasi Atlet</h3>
                    </div>
                   <?php echo form_open_multipart('C_cabangolah/proses_hapus_cabang_olah') ?>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus data ini?</p>
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


    <!-- /.content -->

<?php } ?>
                </div>  
        </div>
    </section>
    <!-- /.content -->

</div>
</body>


