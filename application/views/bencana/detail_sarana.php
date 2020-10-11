<body>
<?php 
    foreach ($data->result_array() as $a):
    $periodee=$a['periode'];
    endforeach;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>
            <b>Kelola Data Sarana dan Prasarana<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
         <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Sarana'); ?>"></i> Sarana</a></li>
            <li class="active">Detail Sarana dan Prasarana Keamanan</li> <b><?php echo $periodee; ?></b>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-body">
        <div class="box-header">
            <h3 class="box-title">Detail Tabel Unjuk Rasa di Malang Tiap Tahun di Kabupaten Malang</h3>
        </div>
        <table class="table table-bordered table-striped cell-border display" style="width:100%;" id="tampila">
        
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id = $a['id'];
                        $penginput=$a['penginput'];
                        $periode=$a['periode'];
                        $aparatpp=$a['aparatpp'];
                        $aparatlinmas=$a['aparat_linmas'];
                        $petugas_satpol=$a['petugas_satpol'];
                        $petugaspp=$a['petugas_pp'];
                        $poskeamanan=$a['pos_keamanan'];
                        $poskamling=$a['pos_kamling'];
                        $roda2=$a['roda2'];
                        $roda4=$a['roda4'];                              
                ?>
                <thead>
                    <tr role="row" class="parent">
                        <th colspan="4" style="text-align:center;">Unjuk Rasa di Malang Tiap Tahun di Kabupaten Malang</th>
                        <th colspan="4" style="text-align:center;">Periode <?php echo $periode;?></th>
                    
                    </tr>
                </thead>
       <tbody>
                    <tr>
                        <td style="text-align:center;"  colspan=4 >Fasilitas/<em>Facility</em></td>
                        <td style="text-align:center;" >Jenis Fasilitas/<em>Type of Facility</em></td>
                        <td style="text-align:center;" >Jumlah/<em>Total</em></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4></td>
                        <td style="text-align:center;" >Aparat Pamong Praja</td>
                        <td style="text-align:center;" ><?php echo $aparatpp;?></td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4>Aparat Keamanan dan Ketertiban Umum</td>
                        <td style="text-align:center;" >Aparat Linmas</td>
                        <td style="text-align:center;" ><?php echo $aparatlinmas;?></td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4></td>
                        <td style="text-align:center;" >Petugas Patroli Satpol PP</td>
                        <td style="text-align:center;" ><?php echo $petugas_satpol;?></td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4></td>
                        <td style="text-align:center;" >Petugas Perlindungan Masyarakat</td>
                        <td style="text-align:center;" ><?php echo $petugaspp;?></td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4>Sarana Keamanan dan Ketertiban Umum</td>
                        <td style="text-align:center;" >Pos Keamanan</td>
                        <td style="text-align:center;" ><?php echo $poskeamanan;?></td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4></td>
                        <td style="text-align:center;" >Pos Kamling</td>
                        <td style="text-align:center;" ><?php echo $poskamling;?></td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4></td>
                        <td style="text-align:center;" >Kendaraan Operasional Roda 2</td>
                        <td style="text-align:center;" ><?php echo $roda2;?></td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:left;"  colspan=4>Kendaraan Operasional</td>
                        <td style="text-align:center;" >Kendaraan Operasional Roda 4</td>
                        <td style="text-align:center;" ><?php echo $roda4;?></td>
                        
                    </tr>
                <?php endforeach;?>
                </tbody>
        </table>

  <?php 
            $no=0;
            $total=0;
            foreach ($data->result_array() as $a):
            $id=$a['id'];
        ?>
        <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="<?= base_url('Sarana'); ?>">Back</a>
        <a class="btn btn-s btn-warning pull-right" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
     
        <?php 
            endforeach;
        ?>
 <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
                       
                        $penginput=$a['penginput'];
                        $periode=$a['periode'];
                       
                        $aparatpp=$a['aparatpp'];
                        $aparatlinmas=$a['aparat_linmas'];
                        $petugas_satpol=$a['petugas_satpol'];
                        $petugaspp=$a['petugas_pp'];
                        $poskeamanan=$a['pos_keamanan'];
                        $poskamling=$a['pos_kamling'];
                        $roda2=$a['roda2'];
                        $roda4=$a['roda4'];                       
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Sarana</h3>
                    </div>
                    <?php echo form_open_multipart('Sarana/proses_edit_sarana') ?>

                    <div class="modal-body">
                    <?php $name = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    
                    <table>
                       <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $periode;?>" placeholder="Tahun Periode Laporan..." style="width:335px;" required></td>
                        </tr>
                       <tr>
                            <td><label>Aparat Pamong Praja</label></td><td>:</td>
                            <td><input name="aparatpp" class="form-control" type="text"  value="<?php echo $aparatpp;?>" placeholder="Aparat Pamong Praja..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Aparat Linmas</label></td><td>:</td>
                            <td><input name="aparatlinmas" class="form-control" type="text"  value="<?php echo $aparatlinmas;?>" placeholder="Aparat Linmas..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Petugas Patroli Satpol PP</label></td><td>:</td>
                            <td><input name="ppspp" class="form-control" type="text"  value="<?php echo $petugas_satpol;?>" placeholder="Petugas Satpol PP..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Petugas Perlindungan Masyarakat</label></td><td>:</td>
                            <td><input name="ppm" class="form-control" type="text"  value="<?php echo $petugaspp;?>" placeholder="Petugas Perlindungan..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Pos Keamanan</label></td><td>:</td>
                            <td><input name="pk" class="form-control" type="text"  value="<?php echo $poskeamanan;?>" placeholder="Pos Keamanan..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Pos Kamling</label></td><td>:</td>
                            <td><input name="pkml" class="form-control" type="text"  value="<?php echo $poskamling;?>" placeholder="Pos Kamling..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Kendaraan Operasional Roda 2</label></td><td>:</td>
                            <td><input name="roda2" class="form-control" type="text"  value="<?php echo $roda2;?>" placeholder="Kendaraan Roda 2..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Kendaraan Operasional Roda 4</label></td><td>:</td>
                            <td><input name="roda4" class="form-control" type="text"  value="<?php echo $roda4;?>" placeholder="Kendaraan Roda 4..." style="width:335px;" required></td>
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success" value="Update"></input>
                            
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
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart('sarana/proses_delete_sarana') ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="kodeinput" type="hidden" value="<?php echo $id; ?>">
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
                <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    
<?php } ?>  
    </div>
    </div><!-- /.box-->
    </section>
    <!-- /.content -->
<br>
<br>
</div>
</body>

