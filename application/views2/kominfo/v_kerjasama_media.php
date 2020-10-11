<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KOMUNIKASI DAN INFORMATIKA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Kerjasama Media</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Kerjasama Media Berdasarkan Media di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
            <tr>
                <td>
                    <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
                </td>
                <td>
                    <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik Per Tahun</a>
                </td>
                <td>
                    <a class="btn btn-success" href="#modalgrafik2" data-toggle="modal" title="Add">Pilih Grafik Perbandingan</a>
                </td>
                <td width="15"> </td>
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
        <table class="table table-bordered table-striped" style="font-size:15px; width: 100%; text-align: center;" id="tampilkm">
            <thead>
                <tr>
                    <th style="vertical-align:middle; text-align:center;">No</th>
                    <th style="vertical-align:middle; text-align:center;">Nama Media</th>
                    <th style="vertical-align:middle; text-align:center;">Jumlah Kerjasama</th>
                    <th style="vertical-align:middle; text-align:center;">Kategori</th>
                    <td style="vertical-align:middle; text-align:center;">Tahun</td>
                    <th style="vertical-align:middle; text-align:center; width: 130px;" >Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>

            <?php
                    foreach ($data->result_array() as $a) {
                        
                        $id = $a['id'];
                        $nama=$a['nm_media'];
                        $jml=$a['jumlah_krjsm'];
                        $kategori=$a['kategori'];
                        $tahun=$a['tahun'];
                ?>

<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Kerjasama Media</h3>
            </div>
                <?php echo form_open_multipart('C_kerjasama_media/proses_edit_km') ?>
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                    <input class="form-control" type="hidden" name="tahun" value="<?php echo $tahun;?>" readonly>
                           <!--  <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jumlah;?>"> -->
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tahun" id="" class="form-control" value="<?php echo $tahun; ?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"> <label>Nama Media</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nm_media" id="" class="form-control" value="<?php echo $nama; ?>" style="width:335px;" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Kerjasama</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jumlah_krjsm" id="" class="form-control" value="<?php echo $jml; ?>" style="width:335px;" required>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Kategori</label></td><td>:</td>
                            <td style="padding:  10px"><input name="kategori" id="" class="form-control" value="<?php echo $kategori; ?>" style="width:335px;" readonly>
                            </td>
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
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Kerjasama Media</h3>
                    </div>
                    <?php echo form_open_multipart('C_kerjasama_media/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Kerjasama Media</option>
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
                        <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                    </div>
                   <?php echo form_open_multipart('C_kerjasama_media/proses_hapus_km') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
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

<?php  
} 
?>   


<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Data  Kerjasama Media</h3>
            </div>
                <?php echo form_open_multipart('C_kerjasama_media/proses_input_km') ?>
                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                    <table>
                        <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="tahun" id="tahun" class="form-control" style="width: 335px">
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
                            <td style="padding:  10px"><label>Nama Media</label></td><td>:</td>
                            <td style="padding:  10px"><select name="nm_media" class="form-control" required>
                                        <?php foreach ($datas->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->nama_media ?>"><?php echo $row->nama_media?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </td>
                        </tr>
                        <tr>
                        <td style="padding:  10px"><label>Banyak Kerjasama</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jumlah_krjsm" placeholder="Banyak Kerjasama" type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" style="width: 170px; height: 35px" required>
                            <select name="kategori" id="jumlah_krjsm" style="width: 165px; height: 35px" required>
                            <option value="Tayang Cetak">Tayang Cetak</option>
                            <option value="Tayang Online">Tayang Online</option>
                            <option value="Tayang TV">Tayang TV</option>
                        </td>
                        </tr>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </table>
                    
                    <div class="modal-footer">
                    <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> 
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>
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
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
                    </div>
                    <?php echo form_open_multipart('C_kerjasama_media/tampil_grafik_kerjasama/') ?>
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
        

    </section>
    <!-- /.content -->

</div>
</body>


</html>
