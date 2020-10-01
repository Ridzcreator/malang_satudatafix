<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>PENANAMAN MODAL<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Perkembangan Investasi</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Penanaman Modal di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
        <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
        </td>
        <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
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
        <table class="table table-bordered table-striped" style="font-size:13px;" id="tampilpenanamanmodal">
                <thead>
                    <tr>
                        <th style="vertical-align:middle; text-align:center;" rowspan=2>No</th>
                        <th style="vertical-align:middle; text-align:center;" rowspan=2>Nama Sektor</th>
                        <th style="vertical-align:middle; text-align:center;" rowspan=2>Jenis Sektor</th>
                        <th style="vertical-align:middle; text-align:center;" colspan=2>Jumlah Penanaman Modal Asing</th>
                        <th style="vertical-align:middle; text-align:center;" colspan=2>Jumlah Penanaman Modal Dalam Negeri</th>
                        <th style="vertical-align:middle; text-align:center;" colspan=2>Jumlah Penanaman Modal Non PMA / PMDN</th>
                        <th style="vertical-align:middle; text-align:center;" rowspan=2>Tenaga Kerja Indonesia</td>
                        <th style="vertical-align:middle; text-align:center;" rowspan=2>Tahun</th>
                        <th style="vertical-align:middle; text-align:center;" rowspan=2>Aksi</th>
                    </tr>
                    <tr>
                        
                        <th>Jumlah Nilai Investasi</th>
                        <th>Jumlah Unit Usaha</th>
                        <th>Jumlah Nilai Investasi</th>
                        <th >Jumlah Unit Usaha</th>
                        <th>Jumlah Nilai Investasi</th>
                        <th>Jumlah Unit Usaha</th>
                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $sektor=$a['sektor'];
                        $jns=$a['jenis_sektor'];
                        $nilaipma=$a['nilai_pma'];
                        $unitpma=$a['unit_pma'];
                        $nilaipmdn=$a['nilai_pmdn'];
                        $unitpmdn=$a['unit_pmdn'];
                        $nilai=$a['nilai_non'];
                        $unit=$a['unit_non'];
                        $tng=$a['tenaga_kerja'];
                        $tahun=$a['tahun'];
                    ?>


     <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Penanaman Modal</h3>
                </div>
                    <?php echo form_open_multipart('C_penanaman/proses_edit_penanaman') ?>
                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                            <input class="form-control" type="hidden" name="tahun" value="<?php echo $tahun;?>" readonly>
                   
                    <table width="90%">
                       <tr>
                            <td style="padding:  10px"> <label>Nama Sektor</label></td><td>:</td>
                            <td style="padding:  10px">
                            <input name="sektor" id="" class="form-control" value="<?php echo $sektor; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jenis Sektor</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jenis_sektor" class="form-control" type="text" placeholder="" value="<?php echo $jns; ?>" style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Modal Asing</label></td><td>:</td>
                            <td style="padding:  10px">
                            <input name="nilai_pma" class="form-control" type="text" placeholder="" value="<?php echo $nilaipma; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Modal Asing</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_pma" class="form-control" type="text" placeholder="" value="<?php echo $unitpma; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Modal Dalam Negeri</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_pmdn" class="form-control" type="text" placeholder="" value="<?php echo $nilaipmdn; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Modal Dalam Negeri</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_pmdn" class="form-control" type="text" placeholder="" value="<?php echo $unitpmdn; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Non-PMA/Non-PMDN</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_non" class="form-control" type="text" placeholder="" value="<?php echo $nilai; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Non-PMA/Non-PMDN</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_non" class="form-control" type="text" placeholder="" value="<?php echo $unit; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tenaga Kerja Indonesia</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tenaga_kerja" class="form-control" type="text" placeholder="" value="<?php echo $tng; ?>" style="width:335px;" required></td>
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

    <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
            </div>
                <?php echo form_open_multipart('C_penanaman/grafik_perbandingan') ?>
                <div class="modal-body">
                <table>
                    <tr>
                        <td><label>Pilih Data</label></td><td>:</td>
                        <td>
                        <select name="datap" id="datap" class="form-control" required>
                        <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                        <option value="all">Semua Data</option>
                        <option value="1">Jumlah Investasi Penanaman Modal Asing (PMA)</option>
                        <option value="2">Jumlah Investasi Penanaman Modal Dalam Negeri (PMDN)</option>
                        <option value="3">Jumlah Investasi Non PMA/Non PMDN</option>
                        <option value="4">Jumlah Tenaga Kerja Indonesia</option>
                        </select></td>
                        </tr>
                        <tr>
                        <td><label>Model Grafik</label></td><td>:</td>
                        <td>
                        <select name="grafikp" id="grafikp" class="form-control" required>
                        <option disabled selected value>Pilih Model Grafik</option>
                        <option value="bar">Grafik Bar</option>
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


    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Penanaman Modal</h3>
                    </div>
                    <?php echo form_open_multipart('C_penanaman/proses_input_penanaman') ?>

                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                
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
                            <td style="padding:  10px"> <label>Nama Sektor</label></td><td>:</td>
                            <td style="padding:  10px"><select name="sektor" id="sektor" class="form-control" required>
                                        <?php foreach ($datas->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->sektor ?>"><?php echo $row->sektor ?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jenis Sektor</label></td><td>:</td>
                            <td style="padding:  10px"><select name="jenis_sektor" id="jenis_sektor"  class="form-control" type="text" required></select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Modal Asing</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_pma" class="form-control" type="number_format" placeholder="Nilai Investasi Penanaman Modal Asing" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Modal Asing</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_pma" class="form-control" type="text" placeholder="Unit Usaha Penanaman Modal Asing" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Modal Dalam Negeri</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_pmdn" class="form-control" type="number_format" placeholder="Nilai Investasi Penanaman Modal Dalam Negeri" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Modal Dalam Negeri</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_pmdn" class="form-control" type="text" placeholder="Unit Usaha Penanaman Modal Dalam Negeri" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Non-PMA/Non-PMDN</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_non" class="form-control" type="number_format" placeholder="Nilai Investasi Penanaman Non-PMA/Non-PMDN" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Investasi Penanaman Non-PMA/Non-PMDN</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_non" class="form-control" type="text" placeholder="Unit Investasi Penanaman Non-PMA/Non-PMDN" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Tenaga Kerja Indonesia</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tenaga_kerja" class="form-control" type="text" placeholder="Tenaga Kerja Indonesia" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                       
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                   
                    <div class="modal-footer">
                        <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            </div>
                </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
   


        
     <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    </div>
                   <?php echo form_open_multipart('C_penanaman/proses_hapus_penanaman') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
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

<?php  
} 
?>

    </section>
    <!-- /.content -->

</div>


