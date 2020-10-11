<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Master Bibit Tanaman<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Master Bibit Tanaman</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Master Bencana Alam Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input Data Master Bencana Alam</a>
        <br><br>
        <table class="table table-bordered table-striped" style="font-size:15px;" id="inputbencanan">
                <thead>
                   <tr>
                        
                        <th style="vertical-align:middle;width:25px; text-align: center;" rowspan="2">No</th>

                        <th style="width:150px; text-align: center;" rowspan="2" >Bencana Alam</th>
                        <th style="width:100px;text-align:center;" rowspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id = $a['id'];
                        $bencana=$a['bencana'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $bencana;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                            <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
        </table>
        

              <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $bencana=$a['bencana'];
                      
                      
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Bencana</h3>
                    </div>
                           <?php echo form_open_multipart('InputBencana/proses_edit_bencana_alam') ?>

                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
                    <table>
                        <tr>
                            <td width=250px><label>Jenis Bencana</label></td><td width=20px>:</td>
                            <td><input name="bencana" class="form-control" type="text" placeholder="Jenis Bencana" style="width:335px;" value="<?php echo $bencana; ?>" required></td>
                        </tr>
                       
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success pull-right" value="Update"></input>
                            
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
                <?php echo form_open_multipart('bencana/proses_delete_bencana_alam') ?>
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Master Alat Angkut</h3>
                    </div>
                    <?php echo form_open_multipart('InputBencana/proses_input_master_bencana') ?>

                    <div class="modal-body">
                
                    <table>
                       
                        <tr>
                            <td><label>Bencana</label></td><td>:</td>
                            <td><input name="bencana" class="form-control" type="text" placeholder="Jenis Bencana" style="width:335px;" required></td>
                        </tr>
                       
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>  
    </div></div><!-- /.box-->
    </section>
    <!-- /.content -->
    


</div>
</body>