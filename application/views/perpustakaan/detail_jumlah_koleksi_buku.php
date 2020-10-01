<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Jumlah Koleksi Buku di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('jumlahkoleksibuku'); ?>">Jumlah Koleksi Buku di Kabupaten Malang</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Koleksi Buku di Kabupaten Malang  <b><?php echo $ex = $this->uri->segment(3);?><b> </h3>           
        </div>
        <div class="box-body table-responsive">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
            </td>
            <td>
            <a class="btn btn-success" href="../grafik_jumlah_buku/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                    
                    <thead>
                    <tr>
                        <th style="text-align:center;text-align:center;width:50px;"  >No</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Tahun</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Tajuk Buku</th>
                        <th style="text-align:center;text-align:center;width:50px;" >Judul</td>
                        <th style="text-align:center;text-align:center;width:50px;" >Exempplar</th>
                        <th style="text-align:center;width:80px;text-align:center;" >Aksi</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php
                    $no=0;
                    $jj=0;
                    $je=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id']; 
                        $tahun=$a['tahun']; 
                        $tb=$a['tajuk_buku'];
                        $jl=$a['judul'];
                        $er=$a['exemplar'];
                        $penginput=$a['penginput']; 

                        $jj=$jj+$jl;
                        $je=$je+$er;
                    ?>  
                       <tr>
                                    <td style="text-align:center"><?php echo $no;?></td>
                                    <td style="text-align:center"><?php echo $tahun;?></td>
                                    <td style="text-align:center"><?php echo $tb;?></td>
                                    <td style="text-align:center"><?php echo number_format($jl,2,'.','.');?></td>
                                    <td style="text-align:center"><?php echo number_format($er,2,'.','.');?></td>
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
                <th style="text-align:center; "><?php echo number_format($jj,2,'.','.'); ?></th>
                <th style="text-align:center; "><?php echo number_format($je,2,'.','.'); ?></th>
                 <th style="text-align:center;"></th>
        </tfoot>
        </table>
        

             <?php
                    foreach ($data->result_array() as $a) {
                       $id = $a['id']; 
                        $tahun=$a['tahun']; 
                        $tb=$a['tajuk_buku'];
                        $jl=$a['judul'];
                        $er=$a['exemplar']; 

                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Jumlah Koleksi Buku</h3>
                    </div>
                    <?php echo form_open_multipart('jumlahkoleksibuku/proses_edit_jumlah_koleksi_buku/'.$tahun) ?>

                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
                    <table>
                        <tr>
                            <td style="padding:  10px"> <label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tahun" class="form-control" value="<?php echo $tahun;?>" style="width:335px;" readonly autocomplete="off"></td>
                        </tr>
                      <tr>
                            <td style="padding:  10px"> <label>Tajuk Buku</label></td><td>:</td>
                                <td style="padding: 10px"> <input type="text" class="form-control"  name="tajuk_buku" value="<?php echo $tb; ?>" readonly>
                                </td>
                                </tr>
                        
                         <tr>
                        
                         <tr>
                            <td style="padding:  10px"> <label>Jumlah judul</label></td><td>:</td>
                            <td style="padding:  10px"><input name="judul" class="form-control" value="<?php echo $jl;?>" style="width:335px;" required autocomplete="off"></td>
                        </tr>

                        <tr>
                            <td style="padding:  10px"> <label>Jumlah Exemplar</label></td><td>:</td>
                            <td style="padding:  10px"><input name="exemplar" class="form-control" value="<?php echo $er;?>" style="width:335px;" required autocomplete="off"></td>
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
                <?php echo form_open_multipart('jumlahkoleksibuku/proses_hapus_jumlah_koleksi_buku/'.$tahun) ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Jumlah Koleksi Buku</h3>
                    </div>
                    <?php echo form_open_multipart('jumlahkoleksibuku/proses_input_detail_jumlah_koleksi_buku/'.$tahun) ?>

                    <div class="modal-body">
                     <table>
                       <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tahun" class="form-control" type="text"  value="<?php echo $tahun ?>" placeholder=" " style="width:335px;" readonly autocomplete="off"></td>
                        </tr>
                        
                                <tr>
                            <td style="padding:  10px"> <label>Tajuk Buku</label></td><td>:</td>
                                <td style="padding: 10px"> <select name="tajuk_buku" id="tajuk_buku" class="form-control" style="width:335px;" required autocomplete="off">
                                   <?php foreach ($datas->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->tajuk_buku ?>"><?php echo $row->tajuk_buku ?></option>
                                <?php
                                     }
                                ?>
                                </select>
                                </td>
                                </tr>
                                
                             <tr>
                            <td style="padding:  10px"><label>Jumlah Judul</label></td><td>:</td>
                            <td style="padding:  10px"><input name="judul" class="form-control" type="text" placeholder="Massukan Jumlah Judul" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                             <tr>
                            <td style="padding:  10px"><label>Jumlah Exemplar</label></td><td>:</td>
                            <td style="padding:  10px"><input name="exemplar" class="form-control" type="text" placeholder="Massukan Jumlah Exemplar" style="width:335px;" required autocomplete="off"></td>
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
    <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('jumlahkoleksibuku'); ?>">Back</a>
    </div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>  
</body><!-- /.body -->