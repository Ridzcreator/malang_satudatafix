<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KOMUNIKASI DAN INFORMATIKA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Pengunjung Website Resmi</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Pengunjung Website Resmi Kabupaten Malang Berdasarkan Negara</h3>
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
                    <a class="btn btn-success" href="#modalgrafik2" data-toggle="modal" title="Add">Pilih Grafik Per Tahun</a>
                </td>
                <td width="15"> </td>
                <td>
                    <select name="tahun" id="tahun" required>
                        <?php 
						foreach ($dataxi->result_array() as $a){
                        $max=$a['max'];
						}
                        foreach ($datax->result_array() as $a){
                        $periode=$a['tahun'];
                        ?><option value="<?php echo $periode; ?>" <?php if($periode==$max){echo "selected";}?>> <?php echo $periode; ?> </option>
                        <?php } ?>   
                    </select>
                </td>
            </tr>
        </table>
        <table class="table table-bordered table-striped" style="text-align: center;font-size: 15px; width: 100%;" id="tampilpengunjungnegara">
            <thead>
                <tr>
                    <th style="vertical-align:middle; text-align:center;">No</th>
                    <th style="vertical-align:middle; text-align:center;">Negara</th>
                    <th style="vertical-align:middle; text-align:center;">Total</th>
                    <th style="vertical-align:middle; text-align:center;">Persentase</th>
                    <td style="vertical-align:middle; text-align:center;">Tahun</td>
                    <th style="vertical-align:middle; text-align:center;" >Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>

            <?php
                    foreach ($pengunjung->result_array() as $a) {
                        
                        $id = $a['id'];
                        $ngr=$a['negara'];
                        $jml=$a['total'];
                        $per=$a['persentase'];
                        $tahun=$a['tahun'];
                ?>

<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Pengunjung</h3>
            </div>
                <?php echo form_open_multipart('C_pengunjung_negara/proses_edit_pengunjung_negara') ?>
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                   
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tahun" class="form-control" value="<?php echo $tahun; ?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"> <label>Negara</label></td><td>:</td>
                            <td style="padding:  10px"><input name="negara" class="form-control" value="<?php echo $ngr; ?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Total</label></td><td>:</td>
                            <td style="padding:  10px"><input name="total" class="form-control" value="<?php echo $jml; ?>" style="width:335px;" required>
                            </td>
                        </tr> 
                        <tr>
                            <td style="padding:  10px"><label>Persentase</label></td><td>:</td>
                            <td style="padding:  10px"><input name="persentase" class="form-control" value="<?php echo $persentase1; ?>" style="width:335px;" required>
                            </td>
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
       


        
        
     <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                    </div>
                   <?php echo form_open_multipart('C_pengunjung_negara/proses_hapus_pengunjung_negara') ?>
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
</div>

    <!-- /.content -->

<?php  
} 
?>

    <div id="modalgrafik2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
                    </div>
                    <?php echo form_open_multipart('C_pengunjung_negara/tampil_grafik_pengunjung_ngr/') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('C_pengunjung_negara/tampil_crosstab_pengunjung_ngr')) ?>
                    <div class="modal-body">
                    <table>
  
                        <tr>
                        <td><label>Pilih Tahun Report</label></td><td>:</td>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah Pengunjung</h3>
            </div>
                <?php echo form_open_multipart('C_pengunjung_negara/proses_input_pengunjung_negara') ?>
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
                            <td style="padding:  10px"><label>Negara</label></td><td>:</td>
                            <td style="padding:  10px"><select name="negara" class="form-control" style="width:335px;" required>
                                        <?php foreach ($datay->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->nama_negara ?>"><?php echo $row->nama_negara?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                            
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Total</label></td><td>:</td>
                            <td style="padding:  10px"><input name="total" type="text" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control" style="width:335px;" required>
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
