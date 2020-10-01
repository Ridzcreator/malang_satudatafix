<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KOMUNIKASI DAN INFORMATIKA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Kantor Perangkat Daerah yang Terhubung Akses Internet Fixed Broadband</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Kantor Perangkat Daerah yang Terhubung Akses Internet Fixed Broadband (AIFB) di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
            <tr>
                <td>
                    <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
                </td>
                <td>
                <a class="btn btn-success" href="#modalgrafik2" data-toggle="modal" title="Add">Pilih Grafik Per Tahun</a>
                <td>
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
        <table class="table table-bordered table-striped" style="font-size:15px; width: 100%; text-align: left;" id="tampilkominfo">
            <thead>
                <tr>
                    <th style="vertical-align:middle; text-align:left;">No</th>
                    <th style="vertical-align:middle; text-align:left;">Nama Perangkat Daerah</th>
                    <th style="vertical-align:middle; text-align:left;">Status Terhubung</th>
                    <td style="vertical-align:middle; text-align:left;">Kecepatan Akses Internet</td>
                    <td style="vertical-align:middle; text-align:left;">Operator Penyedia</td>
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
                        $nama=$a['nama_perda'];
                        $stts=$a['terhubung'];
                        $akses=$a['akses'];
                        $oprtr=$a['operator'];
                        $tahun=$a['tahun'];
                ?>

<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Kantor Perangkat yang Terhubung</h3>
            </div>
                <?php echo form_open_multipart('C_kominfo/proses_edit_perda') ?>
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
                            <td style="padding:  10px"> <label>Nama Perangkat</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nama_perda" id="" class="form-control" value="<?php echo $nama; ?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Terhubung</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="terhubung" class="form-control">
                                <?php if ($stts=='Ya'):?>
                                <option value="Ya" selected>Ya</option>
                                <option value="Tidak">Tidak</option>
                                   <?php elseif ($stts=='Tidak'):?>
                                <option value="Ya">Ya</option>
                                <option value="Tidak" selected>Tidak</option>
                                   <?php else :?>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                                 <?php endif;?>
                          </select></td>
                        </tr> 
                        <tr>
                            <td style="padding:  10px"><label>Kecepatan Akses</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="akses" class="form-control">
                                <?php if ($kai=='< 1 Mbps'):?>
								<option value="< 1 Mbps" selected> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
								<?php elseif ($kai=='< 2 Mbps'):?>
								<option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps" selected> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
								<?php elseif ($kai=='3 Mbps'):?>
								<option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps" selected>3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
								<?php elseif ($kai=='5 Mbps'):?>
								<option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps" selected>5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
                                   <?php elseif ($kai=='10 Mbps'):?>
                                <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps" selected>10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
                                    <?php elseif ($kai=='15 Mbps'):?>
                                 <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps"10 Mbps</option>
                                <option value="15 Mbps" selected>>15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
                                    <?php elseif ($kai=='20 Mbps'):?>
                                 <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps" selected>20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
                                    <?php elseif ($kai=='25 Mbps'):?>
                                 <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps" selected>25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
                                    <?php elseif ($kai=='30 Mbps'):?>
                                 <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps" selected>30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
								<?php elseif ($kai=='50 Mbps'):?>
                                 <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps" selected>50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
								<?php elseif ($kai=='410 Mbps'):?>
                                 <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps" selected>410 Mbps</option>
                                   <?php else :?>
                                 <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
                                 <?php endif;?>
                          </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Operator Penyedia</label></td><td>:</td>
                            <td style="padding:  10px"><input name="operator" class="form-control" type="text" placeholder="" value="<?php echo $oprtr; ?>" style="width:335px;" readonly></td>
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
                    <?php echo form_open_multipart('C_kominfo/tampil_grafik_perda/') ?>
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
        
     <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Data Kantor Perangkat Daerah</h3>
                    </div>
                   <?php echo form_open_multipart('C_kominfo/proses_hapus_perda') ?>
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
<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Kantor Perangkat yang Terhubung</h3>
            </div>
                <?php echo form_open_multipart('C_kominfo/proses_input_perda') ?>
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
                            <td style="padding:  10px"> <label>Nama Perangkat Daerah</label></td><td>:</td>
                            <td style="padding:  10px"><select name="nama_perda" class="form-control" style="width:335px;" required>
                                        <?php foreach ($datas->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->nm_perda ?>"><?php echo $row->nm_perda?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Terhubung</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="terhubung" id="terhubung" class="form-control" style="width:335px;" required>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                             </td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Kecepatan Akses</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="akses" id="akses" class="form-control" style="width:335px;" required>
                                <option value="< 1 Mbps"> < 1 Mbps</option>
								<option value="< 2 Mbps"> < 2 Mbps</option>
								<option value="3 Mbps">3 Mbps</option>
                                <option value="5 Mbps">5 Mbps</option>
                                <option value="10 Mbps">10 Mbps</option>
                                <option value="15 Mbps">15 Mbps</option>
                                <option value="20 Mbps">20 Mbps</option>
                                <option value="25 Mbps">25 Mbps</option>
                                <option value="30 Mbps">30 Mbps</option>
								<option value="50 Mbps">50 Mbps</option>
								<option value="410 Mbps">410 Mbps</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Operator Penyedia</label></td><td>:</td>
                            <td style="padding:  10px"><select name="operator" class="form-control" style="width:335px;" required>
                                        <?php foreach ($dataz->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->operator_penyedia ?>"><?php echo $row->operator_penyedia?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
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

    </section>
    <!-- /.content -->

</div>
</body>


</html>
