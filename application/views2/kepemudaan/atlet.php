<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            KELOLA DATA KEPEMUDAAN & OLAHRAGA
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kepemudaan & Olahraga</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
            <a class="btn btn-primary" href="Atlet/tampil_atlet">Input Jumlah Prestasi</a>

        <table class="table table-bordered table-striped" style="font-size:11px;" id="tampil">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;" rowspan=2>No</th>
                    </tr>
                    <tr>
                        <th>Cabang Olahraga</th>
                        <th>Berprestasi</th>
                        <th>Dibina</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                        <th style="width:50px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id = $a['id'];
                        $c=$a['cabang'];
                        $p=$a['prestasi'];
                        $bina=$a['dibina'];
                        $tahun=$a['tahun'];
                        $jml=$a['jumlah'];      
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $c;?></td>
                        <td><?php echo $p;?></td>
                        <td><?php echo $bina;?></td>
                        <td><?php echo $tahun;?></td>
                        <td><?php echo $jml;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                            <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $c=$a['cabang'];
                        $p=$a['prestasi'];
                        $bina=$a['dibina'];
                        $tahun=$a['tahun'];
                        $jml=$a['jumlah'];   
                    ?>

               <!--  <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                    </div>
                    <?php echo form_open_multipart('Atlet/proses_edit_atlet') ?>

                        <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-4" >Bidang Usaha</label>
                            <div class="col-xs-16">
                                <input name="id" class="form-control" type="hidden" value="<?php echo $id;?>" style="width:335px;" required>
                                <input name="bidang_usaha" class="form-control" type="text" value="<?php echo $bidang;?>" placeholder="Bidang Usaha" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-4" >Unit Usaha</label>
                            <div class="col-xs-16">
                                <input name="unit_usaha" class="form-control" type="text" value="<?php echo $unit;?>" placeholder="Unit Usaha" style="width:335px;" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-xs-4" >Realisai Investasi</label>
                            <div class="col-xs-16">
                                <input name="realisasi_investasi" class="form-control" type="text" value="<?php echo $Realisasi;?>" placeholder="Realisasi Investasi" style="width:335px;" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-xs-4" >Tenaga Kerja Indonesia</label>
                            <div class="col-xs-16">
                                <input name="tki" class="form-control" type="text" value="<?php echo $indo;?>" placeholder="" style="width:335px;" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-labe col-xs-4" >Tenaga kerja Asing</label>
                            <div class="col-xs-16">
                                <input name="tka" class="form-control" type="text" value="<?php echo $asing;?>" placeholder="" style="width:335px;" required>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-xs-4" >Sumber data</label>
                            <div class="col-xs-16">
                                <input name="sumber_data" class="form-control" type="text" value="<?php echo $sumber;?>" placeholder="" style="width:335px;" required>
                            </div>
                        </div>
                     </div>
                        <div>
                            <input type="submit" class="btn btn-success" name="add" value="Save"> &nbsp &nbsp 
                      
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
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    </div>
                   <?php echo form_open_multipart('Penanaman/proses_hapus_tanam') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
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

    <!-- /.content --> -->

<?php } ?>

    </section>
    <!-- /.content -->

</div>

