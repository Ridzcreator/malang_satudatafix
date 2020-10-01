<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1>
            <b>EKSPOR & IMPOR NEGARA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Ekspor Negara</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
                <div class="box">

               <!-- /.box-header -->
                    <div class="box-header">
                        <h4 class="box-title">Tabel Jumlah Ekspor Menurut Negara Tujuan</h3>
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
                         <table  class="table table-bordered table-striped" id="tampilEkspor" style="text-align: left; font-size:15px; width: 100%;">
                <thead >
                    <tr>
                        <th style="text-align: left; vertical-align: middle;">Negara-Negara Tujuan</th>
                        <th style="text-align: left; vertical-align: middle;"">Volum Ekspor</th>
                        <th style="text-align: left; vertical-align: middle;">Nilai Ekspor</th>
                        <th style="text-align: left; vertical-align: middle;">Tahun</th>
                        <th style="width:130px; text-align:left; vertical-align: middle;">Aksi</th>
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
                <th style="text-align:left;"></th>
                <th style="text-align:left;"></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
                    </table>
                    </div>
        <?php 

        foreach ($data->result_array() as $a){

                    $no=$a['id'];
                    $negara=$a['nama_negara_ekspor_impor'];
                    $volum=$a['volume_ekspor_impor'];
                    $nilai=$a['nilai_ekspor_impor'];
                    $tahun=$a['tahun'];
                    $penginput=$a['penginput'];
                    $timestamp=$a['timestamp'];
                    $status=$a['status'];
                    $kategori=$a['kategori'];

            ?>
            
            <div id="modalEdit<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Edit Data Ekspor Komoditi</h3>
                        </div>
                        <?php echo form_open_multipart('Ekspor_negara_tujuan/proses_edit_ekspor_impor_negara') ?>

                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="no" value="<?php echo $no;?>" readonly>

                        </div>
                        <table width="80%">
                <tr>
                  <td style="padding:  10px"><label>Nama Negara</label></td>
                  <td style="padding:  10px">:</td>
                  <td><input type="text" class="form-control" name="nama_negara_ekspor_impor" value="<?php echo $negara;?>" required readonly></td>
                </tr>
                <tr>
                   <td style="padding:  10px"><label>Volum Ekspor</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" min="0" step="0.01" class="form-control" name="volume_ekspor_impor" value="<?php echo $volum;?>" placeholder="Volum Ekspor" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td style="padding:  10px"><label>Nilai Ekspor</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" min="0" step="0.01" class="form-control" name="nilai_ekspor_impor"  value="<?php echo $nilai;?>" placeholder="Nilai Ekspor" autocomplete="off"></td>
                </tr>
                <tr>
                    <td style="padding:  10px"><label>Tahun</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" class="form-control" name="tahun"  value="<?php echo $tahun;?>" placeholder="Tahun" autocomplete="off" readonly></td>
                </tr>
                <tr>
                    <td style="padding:  10px"><label>Kategori</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="text" class="form-control" name="kategori"  value="<?php echo $kategori;?>" placeholder="Tahun" autocomplete="off" readonly></td>
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
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Ekspor Komoditi</h3>
                        </div>
                        <?php echo form_open_multipart('Ekspor_negara_tujuan/proses_hapus_ekspor_impor_negara') ?>
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
                                <h3 class="modal-title" id="myModalLabel">Tambah Data Ekspor Komoditi</h3>
                            </div>
                                 <?php echo form_open_multipart('Ekspor_negara_tujuan/proses_tambah_ekspor_impor_negara') ?>

                           <table width="80%">
              <tr>
               <td style="padding:  10px"><label>Nama Negara</label></td>
               <td style="padding:  10px">:</td>
               <td> 
                 <select name="nama_negara_ekspor_impor" class="form-control">
                   <?php foreach ($datas->result() as $a) {
                    ?>
                    <option value="<?php echo $a->nama_negara ?>"><?php echo $a->nama_negara ?></option>
                    <?php
                }
                ?>
            </select>
               </td>
                </tr>
                <tr>
                   <td style="padding:  10px"><label>Volum Ekspor</label></td>
                   <td style="padding:  10px">:</td>
                   <td><input type="number" min="0" step="0.01" class="form-control" name="volume_ekspor_impor" placeholder="Volum Ekspor" required autocomplete="off"></td>
               </tr>
               <tr>
                        <td style="padding:  10px"><label>Nilai Ekspor</label></td>
                        <td style="padding:  10px">:</td>
                        <td><input type="number" min="0"  step="0.01" class="form-control" name="nilai_ekspor_impor" placeholder="Nilai Ekspor" autocomplete="off"></td>
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
                <tr>
                        <td style="padding:  10px"><label>Kategori</label></td>
                        <td style="padding:  10px">:</td>
                        <td> 
                             <input type="text" class="form-control" name="kategori"  value="Ekspor Menurut Negara Tujuan" placeholder="Tahun" autocomplete="off" readonly>
                        </td>
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

            <div id="modalAdd2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
                    </div>
                    <?php echo form_open_multipart('Ekspor_negara_tujuan/tampil_grafik_negara_tujuan/') ?>
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
                    <?php echo form_open_multipart('Ekspor_negara_tujuan/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td style="padding:  10px"><label>Pilih Data</label></td>
                            <td style="padding:  10px">:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Volume Ekspor</option>
                            <option value="2">Jumlah Nilai Ekspor</option>
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
