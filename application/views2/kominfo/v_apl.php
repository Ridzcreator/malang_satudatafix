<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KOMUNIKASI DAN INFORMATIKA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Aplikasi Terselesaikan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Jumlah Aplikasi Yang Terselesaikan di Kabupaten Malang</h3>
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
        <table class="table table-bordered table-striped" style="text-align: center;font-size: 15px; width: 100%;" id="tampilapl">
            <thead>
                <tr>
                    <th style="vertical-align:middle; text-align:center;">No</th>
                    <th style="vertical-align:middle; text-align:center;">Nama Aplikasi</th>
                    <th style="vertical-align:middle; text-align:center;">Status Terselesaikan</th>
                    <td style="vertical-align:middle; text-align:center;">Tahun</td>
                    <th style="vertical-align:middle; text-align:center;" >Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>

            <?php
                    foreach ($data->result_array() as $a) {
                        
                        $id = $a['id'];
                        $nama=$a['nama_apl'];
                        $stts=$a['stts'];
                        $tahun=$a['tahun'];
                ?>

<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Aplikasi Terselesaikan</h3>
            </div>
                <?php echo form_open_multipart('C_apl/proses_edit_apl') ?>
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                   
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tahun" id="" class="form-control" value="<?php echo $tahun; ?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"> <label>Nama Aplikasi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nama_apl" class="form-control" value="<?php echo $nama; ?>" style="width:335px;" readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Status Terselesaikan</label></td><td>:</td>
                            <td style="padding:  10px"><select name="stts" class="form-control" required="">
                                <?php if ($stts=='Selesai'):?>
                                <option value="Selesai" selected>Selesai</option>
                                <option value="Belum Selesai">Belum Selesai</option>
                                   <?php elseif ($stts=='Belum Selesai'):?>
                                <option value="Selesai">Selesai</option>
                                <option value="Belum Selesai" selected>Belum Selesai</option>
                                   <?php else :?>
                                <option value="Selesai">Selesai</option>
                                <option value="Belum Selesai">Belum Selesai</option>
                                 <?php endif;?>
                          </select>
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

    <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('C_apl/tampil_crosstab_apl')) ?>
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
        
     <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                    </div>
                   <?php echo form_open_multipart('C_apl/proses_hapus_apl') ?>
                        <div class="modal-body">
                            <p>Selesaikin mau menghapus data ini..?</p>
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
                    <h3 class="modal-title" id="myModalLabel">Tambah Data Aplikasi Terselesaikan</h3>
            </div>
                <?php echo form_open_multipart('C_apl/proses_input_apl') ?>
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
                            <td style="padding:  10px"> <label>Nama Aplikasi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nama_apl" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Status Terselesaikan</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="stts" id="stts" class="form-control" style="width:335px;" required>
                                <option value="Selesai">Selesai</option>
                                <option value="Belum Selesai">Belum Selesai</option>
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
		</div></div>
    </section>
    <!-- /.content -->

</div>
</body>