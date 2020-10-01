<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KOMUNIKASI DAN INFORMATIKA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Akses Internet Di Rumah Sakit/Puskesmas</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Kantor Rumah Sakit/Puskesmas yang Terhubung Akses Internet Fixed Broadband (AIFB) di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a style="margin-right: 10px" class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
            </td>
            <td>
                <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik Per Tahun</a>
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
    <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%;  text-align:left;" id="tampilinternetrumahsakit">
                <thead>
                    <tr>
                        <th style="vertical-align:middle; text-align:left;">No</th>
                        <th style="vertical-align:middle; text-align:left;" >Nama Rumah Sakit</th>
                        <th style="vertical-align:middle; text-align:left;" >Terhubung Fixed</td>
                        <th style="vertical-align:middle; text-align:left;" >Kecepatan Akses Internet</th>
                        <th style="vertical-align:middle; text-align:left;" >Operator Penyedia</th>
                        <th style="vertical-align:middle; text-align:left;" >Tahun</th>
                        <th style="vertical-align:middle; text-align:left; width: 130px" >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>


             <?php
                    foreach ($data->result_array() as $a) {
                       $id = $a['id'];
                        $tahun=$a['tahun'];
                        $rm=$a['rumah_sakit'];
                        $tf=$a['terhubung_fixed'];
                        $kai=$a['kecepatan_akses_internet'];
                        $op=$a['operator_penyedia'];

                    ?>

<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Akses Internet Di Rumah Sakit/Puskesmas</h3>
                </div>
                    <?php echo form_open_multipart('internetrumahsakit/proses_edit_internet_rumahsakit') ?>

                        <div class="modal-body">
                           <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                    <table>
                        <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="tahun" id="tahun" class="form-control" readonly>
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
                            <td style="padding:  10px"> <label>Rumah Sakit</label></td><td>:</td>
                            <td style="padding:  10px"><input name="rumah_sakit" class="form-control" value="<?php echo $rm;?>" style="width:335px;" readonly></td>
                        </tr>
                        
                         <tr>
                            <td style="padding:  10px"> <label>Terhubung FIxed</label></td><td>:</td>
                            <td style="padding:  10px"><select name="terhubung_fixed" class="form-control">
                                <?php if ($tf=='Ya'):?>
                                <option value="Ya" selected>Ya</option>
                                <option value="Tidak">Tidak</option>
                                   <?php elseif ($tf=='Tidak'):?>
                                <option value="Ya">Ya</option>
                                <option value="Tidak" selected>Tidak</option>
                                   <?php else :?>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                                 <?php endif;?>
                          </select></td>

                        </tr>

                        <tr>
                            <td style="padding:  10px"> <label>Kecepatan AKses Internet</label></td><td>:</td>
                            <td style="padding:  10px"><select name="kecepatan_akses_internet" class="form-control">
                                <?php if ($kai=='5 Mbps'):?>
                                <option value="5 Mbps" selected>5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
                                   <?php elseif ($kai=='10 Mbps'):?>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps" selected>10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
                                    <?php elseif ($kai=='15 Mbps'):?>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps" selected>15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
                                    <?php elseif ($kai=='20 Mbps'):?>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps" selected>20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
                                    <?php elseif ($kai=='25 Mbps'):?>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps" selected>25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
                                    <?php elseif ($kai=='30 Mbps'):?>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps" selected>30 Mbps</option>
                                   <?php else :?>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
                                 <?php endif;?>
                          </select></td>
                        </tr>

                         <tr>
                            <td style="padding:  10px"> <label>Operator Penyedia</label></td><td>:</td>
                            <td style="padding:  10px"><input name="operator_penyedia" class="form-control" value="<?php echo $op;?>" style="width:335px;" autocomplete="off" readonly></td>
                        </tr>
                       
                        </table>     
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <input type="submit" class="btn btn-success pull-right" value="Save"></input> &nbsp &nbsp
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
                    <?php echo form_open_multipart('internetrumahsakit/tampil_grafik_rumah_sakit/') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Akses Internet Di Rumah Sakit/Puskesmas</h3>
                    </div>
                    <?php echo form_open_multipart('internetrumahsakit/proses_input_internet_rumahsakit') ?>

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
                            <td style="padding:  10px"> <label>Rumah Sakit</label></td><td>:</td>
                                <td style="padding: 10px"> <select name="rumah_sakit" id="rumah_sakit" class="form-control" style="width:335px;" required>
                                   <?php foreach ($datas->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->rumah_sakit ?>"><?php echo $row->rumah_sakit ?></option>
                                <?php
                                     }
                                ?>
                                </select>
                                </td>
                                </tr>
                                
                             <tr>
                            <td style="padding:  10px"><label>Terhubung Fixed</label></td><td>:</td>
                            <td style="padding:  10px"><select name="terhubung_fixed" id="terhubung" class="form-control" style="width:335px;" required>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                             </td>
                        </tr>
                             <tr>
                            <td style="padding:  10px"><label>Kecepatan Akses Internet</label></td><td>:</td>
                            <td style="padding:  10px"><select name="kecepatan_akses_internet" id="akses" class="form-control" style="width:335px;" required>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
                            </select></td>
                        </tr>

                           <tr>
                            <td style="padding:  10px"><label>Operator Penyedia</label></td><td>:</td>
                            <td style="padding:  10px"><select name="operator_penyedia" class="form-control" style="width:335px;" required>
                                        <?php foreach ($datay->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->operator_penyedia ?>"><?php echo $row->operator_penyedia?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select></td>
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
   

    <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data </h3>
                        </div>
                        <?php echo form_open_multipart('internetrumahsakit/proses_hapus_internet_rumahsakit') ?>
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
    </section>
    <!-- /.content -->


</div>
</body>
</html>

