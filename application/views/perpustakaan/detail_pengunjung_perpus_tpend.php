<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Pengunjung Perpustakaan Menurut Tingkat Pendidikan di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('pengunjungperpustpend'); ?>">Pengunjung Perpustakaan  Menurut Tingkat Pendidikan di Kabupaten Malang</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Pengunjung Perpustakaan Menurut Tingkat Pendidikan di Kabupaten Malang  <b><?php echo $ex = $this->uri->segment(3);?><b> </h3>           
        </div>
        <div class="box-body table-responsive">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
            </td>
            <td>
            <a class="btn btn-success" href="../grafik_detail_pengunjung_tpend/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                  
                      <thead>
                    <tr>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2 >No</th>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2>Tahun</th>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2>Bulan</th>
                        <th style="text-align:center;text-align:center;width:50px;" colspan=3>Jenjang Pendidikan</td>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2>Jumlah</th>
                        <th style="text-align:center;width:80px;text-align:center;" rowspan=2>Aksi</th>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle; text-align:center;width:40px ">SMP</th>
                        <th style="vertical-align: middle; text-align:center;width:40px ">SMA</th>
                        <th style="vertical-align: middle; text-align:center;width:40px ">Perguruan Tinggi</th>
                    
                    </tr>
                </thead>

                 <tbody>
                    <?php
                    $no=0;
                    $jp=0;
                    $ja=0;
                    $jt=0;
                    $jj=0;

                
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id']; 
                        $tahun=$a['tahun']; 
                        $bln=$a['bulan'];
                        $sp=$a['smp'];
                        $sa=$a['sma'];
                        $pt=$a['perguruan_tinggi'];
                        $jml=$a['jumlah'];
                        $penginput=$a['penginput'];  
                 
                    

                        $jp=$jp+$sp;
                        $ja=$ja+$sa;
                        $jt=$jt+$pt;
                        $jj=$jj+$jml;
                    ?>  
                       <tr>
                                    <td style="text-align:center"><?php echo $no;?></td>
                                    <td style="text-align:center"><?php echo $tahun;?></td>
                                    <td style="text-align:center"><?php echo $bln;?></td>
                                    <td style="text-align:center"><?php echo number_format($sp,2,'.','.');?></td>
                                    <td style="text-align:center"><?php echo number_format($sa,2,'.','.');?></td>
                                    <td style="text-align:center"><?php echo number_format($pt,2,'.','.');?></td>
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
                <th style="text-align:center; "><?php echo number_format($jp,2,'.','.'); ?></th>
                <th style="text-align:center; "><?php echo number_format($ja,2,'.','.'); ?></th>
                <th style="text-align:center; "><?php echo number_format($jt,2,'.','.'); ?></th>
                <th style="text-align:center; "><?php echo number_format($jj,2,'.','.'); ?></th>
                 <th style="text-align:center;"></th>

        </tfoot>
        </table>
        

             <?php
                       foreach ($data->result_array() as $a) {
                        $id = $a['id']; 
                        $tahun=$a['tahun']; 
                        $bln=$a['bulan'];
                        $sp=$a['smp'];
                        $sa=$a['sma'];
                        $pt=$a['perguruan_tinggi'];
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
                    <?php echo form_open_multipart('pengunjungperpustpend/proses_edit_pengunjung_perpus_tpend/'.$tahun) ?>

                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
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
                            <td style="padding:  10px"> <label>Jumlah SMP</label></td><td>:</td>
                            <td style="padding:  10px"><input name="smp" class="form-control" value="<?php echo $sp;?>" style="width:335px;" required autocomplete="off" ></td>
                        </tr>

                        <tr>
                            <td style="padding:  10px"> <label>Jumlah SMA</label></td><td>:</td>
                            <td style="padding:  10px"><input name="sma" class="form-control" value="<?php echo $sa;?>" style="width:335px;" required autocomplete="off" ></td>
                        </tr>

                          <tr>
                            <td style="padding:  10px"> <label>Jumlah Perguruan Tinngi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="perguruan_tinggi" class="form-control" value="<?php echo $pt;?>" style="width:335px;" required autocomplete="off" ></td>
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
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart('pengunjungperpustpend/proses_hapus_pengunjung_perpus_tpend/'.$tahun) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pengunjung Perpustakaan</h3>
                    </div>
                    <?php echo form_open_multipart('pengunjungperpustpend/proses_input_detail_pengunjung_perpus_tpend/'.$tahun) ?>

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
                            <td style="padding:  10px"><label>Jumlah SMP</label></td><td>:</td>
                            <td style="padding:  10px"><input name="smp" class="form-control" type="text" placeholder="Massukan Jumlah SMP" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                             <tr>
                            <td style="padding:  10px"><label>Jumlah SMA</label></td><td>:</td>
                            <td style="padding:  10px"><input name="sma" class="form-control" type="text" placeholder="Massukan Jumlah SMA" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                          <tr>
                            <td style="padding:  10px"><label>Jumlah Perguruan Tinggi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="perguruan_tinggi" class="form-control" type="text" placeholder="Massukan Jumlah Perguruan Tinggi" style="width:335px;" required autocomplete="off"></td>
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
    <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('pengunjungperpustpend'); ?>">Back</a>
    </div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>  
</body><!-- /.body -->