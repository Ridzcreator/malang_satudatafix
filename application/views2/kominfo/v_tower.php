<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            KOMUNIKASI DAN INFORMATIKA
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Komunikasi dan informatika</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Tower Setiap Kecamatan di Kabupaten Malang</h3>
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
        <table class="table table-bordered table-striped" style="font-size:11px;" id="tampiltower">
            <thead>
                <tr>
                    <th style="vertical-align:middle; text-align:center;">No</th>
                    <th style="vertical-align:middle; text-align:center;">Kecamatan</th>
                    <th style="vertical-align:middle; text-align:center;">Total Tower</th>
                    <td style="vertical-align:middle; text-align:center;">Tahun</td>
                    <th style="vertical-align:middle; text-align:center;" >Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=0;
                    $jumlah1=0;
                    $jumlah2=0;
                    $jumlah3=0;
                    $persentase=0;
                    $persentase1=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
                        $penginput=$a['penginput'];
                        $periode=$a['periode'];
                        $kecamatan=$a['kecamatan'];
                        $pekka_jumlah=$a['pekka_jumlah'];
                        $usiapro_kerja=$a['usiapro_jumlah'];
                        $pekka_rentan=$a['pekka_rentan'];
                        $persentase=($usiapro_kerja/$pekka_jumlah)*100;
                        $persentase1=($pekka_rentan/$pekka_jumlah)*100;
                        $jumlah1=$jumlah1+$pekka_jumlah;
                        $jumlah2=$jumlah2+$usiapro_kerja;
                        $jumlah3=$jumlah3+$pekka_rentan;
                    ?>  
                        <tr>
                        <td><?php echo number_format($no,0,",",".");?></td>
                        <td style="text-align:left;"><?php echo $kecamatan ;?></td>
                        <td><?php echo number_format($pekka_jumlah,0,",",".");?></td>
                        <td><?php echo number_format($usiapro_kerja,0,",",".");?></td>
                        <td><?php echo number_format($persentase,2,",",".");?> %</td>
                        <td><?php echo number_format($pekka_rentan,0,",",".");?></td>
                        <td><?php echo number_format($persentase1,2,",",".");?> %</td>
                        <td><?php echo $periode;?></td>
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>
                        
                        
                    <?php } ?>
            </tbody>
            </table>

            <?php
                    foreach ($data->result_array() as $a) {
                        
                        $id = $a['id'];
                        $kec=$a['kecamatan'];
                        $jml=$a['jml_tower'];
                        $tahun=$a['tahun'];
                ?>

<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Banyak Tower </h3>
            </div>
                <?php echo form_open_multipart('C_tower/proses_edit_tower') ?>
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                   
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tahun" id="" class="form-control" value="<?php echo $tahun; ?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                            <td style="padding:  10px"><input name="kecamatan" id="" class="form-control" value="<?php echo $kec; ?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Total Tower</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jml_tower" id="" class="form-control" value="<?php echo $jml; ?>" style="width:335px;" required>
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
        
     <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                    </div>
                   <?php echo form_open_multipart('C_tower/proses_hapus_tower') ?>
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

<div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan CrossTab Mode</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('C_tower/tampil_crosstab_tower')) ?>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Banyak Towers</h3>
            </div>
                <?php echo form_open_multipart('C_tower/proses_input_tower') ?>
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
                            <td style="padding:  10px"> <label>Nama Kecamatan</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="kecamatan" class="form-control" style="width:335px;" required>
                                <?php foreach ($datas->result() as $row) {
                                    ?>
                                    <option value="<?php echo $row->nama_kecamatan ?>"><?php echo $row->nama_kecamatan ?>   
                                    </option>
                                <?php
                                    }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Total Tower</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jml_tower" type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" style="width:335px;" required>
                             </td>
                        </tr>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </table>
                    
                    <div class="modal-footer">
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
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
