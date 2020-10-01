<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Jumlah Pengaduan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Jumlah Pengaduan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Jumlah Pengaduan</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a style="margin-right: 10px" class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Jumlah Pengaduan</a>
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
    <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%;  text-align:center" id="tampiljumlahpengaduan">
               <thead>
                    <tr>
                        <th style="text-align:center;text-align:center;width:50px;"  >No</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Tahun</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Bulan</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Surat Warga</td>
                        <th style="text-align:center;text-align:center;width:50px;" >PPID</td>
                        <th style="text-align:center;text-align:center;width:50px;" >E-Lapor</td>
                        <th style="text-align:center;text-align:center;width:50px;" >Jumlah</th>
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
                 <th style="text-align:center; border-color: black;"></th>
                 <th style="text-align:center; border-color: black;"></th>
                 
            
            </tr>
        </tfoot>
        </table>

             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $tahun=$a['tahun'];
                        $bln=$a['bulan'];
                        $sw=$a['surat_warga'];
                        $pd=$a['ppid'];
                        $el=$a['e_lapor'];
                        $j=$a['jumlah'];
                        $penginput=$a['penginput'] 
                    ?>


                     <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Jumlah Pengaduan</h3>
                </div>
                    <?php echo form_open_multipart('jumlahpengaduan/proses_edit_jumlah_pengaduan') ?>

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
                            <td style="padding:  10px"> <label>Bulan</label></td><td>:</td>
                                <td style="padding: 10px"> <select name="bulan" id="bulan" class="form-control" style="width:335px;" required>
                                   <?php foreach ($datas->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->bulan ?>"><?php echo $row->bulan ?></option>
                                <?php
                                     }
                                ?>
                                </select>
                                </td>
                            </tr>
                       <tr>
                            <td style="padding:  10px"> <label>Jumlah Surat Warga</label></td><td>:</td>
                            <td style="padding:  10px"><input name="surat_warga" class="form-control" value="<?php echo $sw;?>" style="width:335px;" required></td>
                        </tr>
                        
                         <tr>
                            <td style="padding:  10px"> <label>Jumlah PPID</label></td><td>:</td>
                            <td style="padding:  10px"><input name="ppid" class="form-control" value="<?php echo $pd;?>" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"> <label>Jumlah E-Lapor</label></td><td>:</td>
                            <td style="padding:  10px"><input name="e_lapor" class="form-control" value="<?php echo $el;?>" style="width:335px;" required autocomplete="off"></td>
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
   
                    
     <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Akses Internet Jumlah Pengaduan</h3>
                    </div>
                    <?php echo form_open_multipart('jumlahpengaduan/proses_input_jumlah_pengaduan') ?>

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
                            <td style="padding:  10px"> <label>Bulan</label></td><td>:</td>
                                <td style="padding: 10px"> <select name="bulan" id="bulan" class="form-control" style="width:335px;" required>
                                   <?php foreach ($datas->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->bulan ?>"><?php echo $row->bulan ?></option>
                                <?php
                                     }
                                ?>
                                </select>
                                </td>
                                </tr>
                                
                             <tr>
                            <td style="padding:  10px"><label>Jumlah Surat Warga</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jumlah_kerjasama" class="form-control" type="text" placeholder=" " style="width:335px;" required autocomplete="off"></td>
                        </tr>
                         <tr>
                            <td style="padding:  10px"><label>Jumlah PPID</label></td><td>:</td>
                            <td style="padding:  10px"><input name="ppid" class="form-control" type="text" placeholder=" " style="width:335px;" required autocomplete="off"></td>
                        </tr>
                         <tr>
                            <td style="padding:  10px"><label>Jumlah E-lapor</label></td><td>:</td>
                            <td style="padding:  10px"><input name="e_lapor" class="form-control" type="text" placeholder=" " style="width:335px;" required autocomplete="off"></td>
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
    </div>
    </div>

    <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data </h3>
                        </div>
                        <?php echo form_open_multipart('jumlahpengaduan/proses_hapus_jumlah_pengaduan') ?>
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

