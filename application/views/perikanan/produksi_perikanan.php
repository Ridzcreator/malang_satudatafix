<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Perikanan Dan Kelautan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Produksi Perikanan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Produksi Perikanan Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a style="margin-right: 10px" class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Produksi Perikanan</a>
            </td>
             <td>
            <a class="btn btn-success" href="#modalgrafik2" data-toggle="modal" title="Add">Grafik Per Tahun</a>
            </td>
            <td>
            <a class="btn btn-danger" href="#modalCross" data-toggle="modal" >Tampil Crosstab</a>
            </td>
            <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Lihat Grafik Perbandingan</a>
            </td>
            <td><div>
            <select name="tahun" id="tahun" required>
            <option value="0000"> Pilih Tahun </option>
                <?php 
                foreach ($data->result_array() as $a){
                $tahun=$a['tahun'];
                ?><option value="<?php echo $tahun; ?>"> <?php echo $tahun; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
    <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%;  text-align:center" id="tampilproduksiperikanan">
                <thead>
                    <tr>
                        <th style="text-align:center;text-align:center;width:50px;"  >No</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Tahun</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Kecamatan</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Jumlah Perikanan Laut</td>
                        <th style="text-align:center;text-align:center;width:50px;" >Jumlah Perikanan Umum</th>
                        <th style="text-align:center;width:80px;text-align:center;" >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
            <tr>
                <th style="text-align:center; border-color: black;" colspan="3">Total</th>
          <!--       <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th> -->
              
                 <th style="text-align:center; border-color: black;"></th>
                <th style="text-align:center; border-color: black;"></th>
                <th style="text-align:center; border-color: black;"></th>
                 
            
            </tr>
        </tfoot>
        </table>

             <?php
                    foreach ($data->result_array() as $a) {
                       $id = $a['id'];
                        $tahun=$a['tahun'];
                        $kec=$a['kecamatan'];
                        $laut=$a['perikanan_laut'];
                        $umum=$a['perikanan_umum'];
                        $penginput=$a['penginput'];
                    ?>

                     <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Produksi Perikanan</h3>
                </div>
                    <?php echo form_open_multipart('Produksiperikanan/proses_edit_produksi_perikanan') ?>

                        <div class="modal-body">
                           <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                    <table>
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
                            if($tahun==$i){echo "selected";}
                            echo">$i</option>";
                            }
                            ?>
                            </select>
                            </td>
                        </tr>
                       <tr>
                            <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                            <td style="padding:  10px"><input name="kecamatan" class="form-control" value="<?php echo $kec;?>" style="width:335px;" readonly></td>
                        </tr>
                        
                         <tr>
                            <td style="padding:  10px"> <label>Jumlah Perikanan Laut</label></td><td>:</td>
                            <td style="padding:  10px"><input name="perikanan_laut" class="form-control" value="<?php echo $laut;?>" style="width:335px;" required autocomplete="off"></td>
                        </tr>

                        <tr>
                            <td style="padding:  10px"> <label>Jumlah Perikanan Umum</label></td><td>:</td>
                            <td style="padding:  10px"><input name="perikanan_umum" class="form-control" value="<?php echo $umum;?>" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                       
                        </table>     
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <input type="submit" class="btn btn-success pull-right" value="Save"></input> &nbsp &nbsp
                <?php echo form_close(); ?>
                </div>
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
                    <?php echo form_open_multipart('Produksiperikanan/tampil_grafik_produksi_perikanan/') ?>
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


        <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan CrossTab Mode</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('Produksiperikanan/tampil_crosstab_produksi_perikanan')) ?>
                    <div class="modal-body">
                    <table>
  
                        <tr>
                        <td><label>Pilih Tahun Crosstab</label></td><td>:</td>
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

   
                    
     <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Produksi Perikanan</h3>
                    </div>
                    <?php echo form_open_multipart('Produksiperikanan/proses_input_produksi_perikanan') ?>

                       <div class="modal-body">
                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                
                    <table>
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

                                <tr>
                            <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                                <td style="padding: 10px"> <select name="kecamatan" id="kecamatan" class="form-control" style="width:335px;" required>
                                   <?php foreach ($datas->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->nama_kecamatan ?>"><?php echo $row->nama_kecamatan ?></option>
                                <?php
                                     }
                                ?>
                                </select>
                                </td>
                                </tr>
                                
                             <tr>
                            <td style="padding:  10px"><label>Jumlah Perikanan Laut</label></td><td>:</td>
                            <td style="padding:  10px"><input name="perikanan_laut" class="form-control" type="text" placeholder="Massukan Jumlah Perikanan Laut" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                             <tr>
                            <td style="padding:  10px"><label>Jumlah Perikanan Umum</label></td><td>:</td>
                            <td style="padding:  10px"><input name="perikanan_umum" class="form-control" type="text" placeholder="Massukan Jumlah Perikanan Umum" style="width:335px;" required autocomplete="off"></td>
                        </tr>

                             </table>            
                        </div>
                     
                        </tr>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </table>
                    </div>
                    <div class="modal-footer">
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
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
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Produksi Perikanan</h3>
                    </div>
                    <?php echo form_open_multipart('Produksiperikanan/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Perikanan Laut</option>
                            <option value="2">Jumlah Perikanan Umum</option>
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
                            <h3 class="modal-title" id="myModalLabel">Hapus Data </h3>
                        </div>
                        <?php echo form_open_multipart('Produksiperikanan/proses_hapus_produksi_perikanan') ?>
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


    <!-- /.content -->

<?php } ?>
</div>
    </div>
    </section>
    <!-- /.content -->


</div>
</body>

