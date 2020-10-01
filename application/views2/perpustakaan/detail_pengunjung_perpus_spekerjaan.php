<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Pengunjung Perpustakaan Menurut Status Pekerjaan di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('pengunjungperpusspekerjaan'); ?>">Pengunjung Perpustakaan  Menurut Status pekerjaan Kabupaten Malang</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Pengunjung Perpustakaan Menurut Status pekerjaan di Kabupaten Malang  <b><?php echo $ex = $this->uri->segment(3);?><b> </h3>           
        </div>
        <div class="box-body table-responsive">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
            </td>
            <td>
            <a class="btn btn-success" href="../grafik_detail_pengunjung_spekerjaan/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                  
                     <thead>
                    <tr>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2 >No</th>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2>Tahun</th>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2>Bulan</th>
                        <th style="text-align:center;text-align:center;width:50px;" colspan=3>Status Pekerjaan</td>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2>Jumlah</th>
                        <th style="text-align:center;width:80px;text-align:center;" rowspan=2>Aksi</th>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle; text-align:center;width:40px ">Tidak Bekerja</th>
                        <th style="vertical-align: middle; text-align:center;width:40px ">Pelajar</th>
                        <th style="vertical-align: middle; text-align:center;width:40px ">Karyawan</th>
                    
                    </tr>
                </thead>

                 <tbody>
                    <?php
                    $no=0;
                    $jb=0;
                    $jr=0;
                    $jk=0;
                    $jj=0;

                
                     foreach ($data->result_array() as $a) {
                        $no++;
                         $id = $a['id'];
                        $tahun=$a['tahun'];
                        $bln=$a['bulan'];
                        $tb=$a['tidak_bekerja'];
                        $pr=$a['pelajar'];
                        $kr=$a['karyawan'];
                        $jml=$a['jumlah'];
                        $penginput=$a['penginput'];  
                     
                 
                    

                        $jb=$jb+$tb;
                        $jr=$jr+$pr;
                        $jk=$jk+$kr;
                        $jj=$jj+$jml;
                    ?>  
                       <tr>
                                    <td style="text-align:center"><?php echo $no;?></td>
                                    <td style="text-align:center"><?php echo $tahun;?></td>
                                    <td style="text-align:center"><?php echo $bln;?></td>
                                    <td style="text-align:center"><?php echo number_format($tb,2,'.','.');?></td>
                                    <td style="text-align:center"><?php echo number_format($pr,2,'.','.');?></td>
                                    <td style="text-align:center"><?php echo number_format($kr,2,'.','.');?></td>
                                    <td style="text-align:center"><?php echo number_format($jml,2,'.','.');?></td>
                                    <td style="text-align:center;width:130px">
                                     
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>
                        
                        
                    <?php } ?>
                                              
            
             </tbody>
                <tfoot style="text-align: center">
            <tr>
                <th style="text-align:center; " colspan="3">Total</th>
                <th style="text-align:center; "><?php echo number_format($jb,2,'.','.'); ?></th>
                <th style="text-align:center; "><?php echo number_format($jr,2,'.','.'); ?></th>
                <th style="text-align:center; "><?php echo number_format($jk,2,'.','.'); ?></th>
                <th style="text-align:center; "><?php echo number_format($jj,2,'.','.'); ?></th>
                 <th style="text-align:center;"></th>

        </tfoot>
        </table>
        

             <?php
                       foreach ($data->result_array() as $a) {
                         $id = $a['id'];
                        $tahun=$a['tahun'];
                        $bln=$a['bulan'];
                        $tb=$a['tidak_bekerja'];
                        $pr=$a['pelajar'];
                        $kr=$a['karyawan'];
                        $jml=$a['jumlah'];
                        $penginput=$a['penginput'];
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Pengunjung Pepustakaan</h3>
                    </div>
                    <?php echo form_open_multipart('pengunjungperpusspekerjaan/proses_edit_pengunjung_perpus_spekerjaan/'.$tahun) ?>

                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
                     <table>
                         <table>
                        <tr>
                            <td style="padding:  10px"> <label>Tahun</label></td><td>:</td>
                          <td style="padding:  10px"><input name="tahun" class="form-control" value="<?php echo $tahun;?>" style="width:335px;" readonly autocomplete="off" ></td>
                        </tr>

                          <tr>
                            <td style="padding:  10px"> <label>Bulan</label></td><td>:</td>
                                <td style="padding: 10px"> <input type="text" class="form-control"  name="bulan" value="<?php echo $bln; ?>" readonly>
                                </td>
                                </tr>
                        
                         <tr>

                         <tr>
                            <td style="padding:  10px"> <label>Jumlah Tidak Bekerja</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tidak_bekerja" class="form-control" value="<?php echo $tb;?>" style="width:335px;" required autocomplete="off" ></td>
                        </tr>

                        <tr>
                            <td style="padding:  10px"> <label>Jumlah Pelajar</label></td><td>:</td>
                           <td style="padding:  10px"><input name="pelajar" class="form-control" value="<?php echo $pr;?>" style="width:335px;" required autocomplete="off" ></td>
                        </tr>

                          <tr>
                            <td style="padding:  10px"> <label>Jumlah Karyawan</label></td><td>:</td>
                          <td style="padding:  10px"><input name="karyawan" class="form-control" value="<?php echo $kr;?>" style="width:335px;" required autocomplete="off" ></td>
                        </tr>
                            <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </table>
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
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart('pengunjungperpusspekerjaan/proses_hapus_pengunjung_perpus_spekerjaan/'.$tahun) ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
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
    <?php } ?>
    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pengunjung Perpustaan</h3>
                    </div>
                    <?php echo form_open_multipart('pengunjungperpusspekerjaan/proses_input_detail_pengunjung_perpus_spekerjaan/'.$tahun) ?>

                    <div class="modal-body">
                      <table>
                            <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="tahun" id="tahun" class="form-control" style="width: 335px;" readonly>
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

                                  <tr>
                            <td style="padding:  10px"> <label>Bulan</label></td><td>:</td>
                                <td style="padding: 10px"> <select name="bulan" id="bulan" class="form-control" style="width:335px;" required>
                                   <?php foreach ($datas->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->keterangan ?>"><?php echo $row->keterangan ?></option>
                                <?php
                                     }
                                ?>
                                </select>
                                </td>
                                </tr>
                                
                             <tr>
                            <td style="padding:  10px"><label>Jumlah Tidak Bekerja</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tidak_bekerja" class="form-control" type="text" placeholder="Massukan Jumlah Tidak Bekerja" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                             <tr>
                            <td style="padding:  10px"><label>Jumlah Pelajar</label></td><td>:</td>
                            <td style="padding:  10px"><input name="pelajar" class="form-control" type="text" placeholder="Massukan Jumlah Pelajar " style="width:335px;" required autocomplete="off"></td>
                        </tr>
                          <tr>
                            <td style="padding:  10px"><label>Jumlah Karyawan</label></td><td>:</td>
                            <td style="padding:  10px"><input name="karyawan" class="form-control" type="text" placeholder="Massukan Jumlah Karyawan" style="width:335px;" required autocomplete="off"></td>
                        </tr>

                           

                                            <?php $name=$this->session->userdata('user'); ?>
                                            <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
                                    </div>
                         </table>            
                        </div>

                                        <div class="modal-footer">
                                            <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> 
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        </div>

                        </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('pengunjungperpusspekerjaan'); ?>">Back</a>
    </div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>  
</body><!-- /.body -->