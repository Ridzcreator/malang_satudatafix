<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>PERTANIAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Master Daging</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    
                <div class="box">

                 <!-- /.box-header -->
                <div class="box-header">
                    <h4 class="box-title" style="margin-bottom:10px">Data Master Daging</h3><br>
                    <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" style="margin-bottom:10px">Input Data</a>
                </div>
                    
                    
                    <div class="box-body">
                        <table  class="table table-striped" id="tampil1" width="100%" height="100%">
                            <thead >
                                <tr>
                                    <th style="text-align:center;width:40px;">No</th>
                                   <!--  <th style="text-align:center;width:40px;">Id Hewan Ternak</th> -->
                                    <th style="text-align:center;width:40px;">Hewan Ternak</th>
                                    <th style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=0;
                                foreach ($data->result_array() as $a):
                                $no++;                                    
                                $id=$a['id'];
                                $daging_hewan=$a['daging_hewan'];
                                ?>
                                <tr>
                                    <td style="text-align:center"><?php echo $no;?></td>
                                <!--     <td style="text-align:center"><?php echo $id;?></td> -->
                                    <td style="text-align:center"><?php echo $daging_hewan;?></td>
                                    <td style="text-align:center;width:130px">
                                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                    </td>
                                    
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>

                   
                

            <!-- Modal Tambah -->
                        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 class="modal-title" id="myModalLabel">Tambah Data</h3>
                                    </div>


                                    <?php echo form_open_multipart('C_master_daging/tambah_data') ?>

                                    <div class="modal-body">
                                        <input class="form-control" type="hidden" name="id" readonly>
                                        
                                            <table>
                                                <tr>
                                                    <td><label>Nama Hewan</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" class="form-control" style="width:335px;" name="nama_hewan" placeholder="Nama Hewan" required autocomplete="off"></td>
                                                </tr>
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


                        <!-- modal edit -->

                <?php 

                foreach ($data->result_array() as $a){

                    $id=$a['id'];
                    $daging_hewan=$a['daging_hewan'];
                    ?>

            <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 class="modal-title" id="myModalLabel">Edit Data</h3>
                                </div>
                                <?php echo form_open_multipart('C_master_daging/ubah_data') ?>

                                <div class="modal-body">
                                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>

                                    <table>
                                    
                                    <tr>
                                        <td><label>Nama Hewan</label></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="nama_hewan" style="width:355px"  value="<?php echo $daging_hewan;?>" required></td>
                                    </tr>
                                    
                                    </table>
                                </div>

                                <div class="modal-footer">
                                    <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> &nbsp &nbsp
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
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
                            <h3 class="modal-title" id="myModalLabel">Hapus Data </h3>
                        </div>
                        <?php echo form_open_multipart('C_master_daging/hapus_data') ?>
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

            <?php } ?>

         






            </div><!-- /.box-body -->
            
           </div> <!-- /.box -->
        
    </section>
    <!-- /.content -->
</div>
</body>