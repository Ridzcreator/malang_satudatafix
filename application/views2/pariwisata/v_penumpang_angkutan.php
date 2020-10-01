<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>kepanjen UNGGULAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">kepanjen Unggulan</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
              <div class="box">


               <!-- /.box-header -->
               <div class="box-header">
                        <h4 class="box-title" style="margin-bottom: 10px">kepanjen Unggulan Dan singosari Wisata</h3><br>
                        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input kepanjen</a>
                    </div>
               <div class="box-body">

                  <table  class="table table-striped" id="tampil">
                    <thead >
                        <tr>
                            <th style="text-align:center;width:40px;" rowspan="2">Bulan</th>
                            <th style="text-align:center" colspan="5">Jumlah Penumpang</th>
                            <th style="text-align:center" rowspan="2">Jumlah</th>
                            <th style="width:50px;text-align:center;" rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th style="text-align:center">Stasiun Lawang</th>
                            <th style="text-align:center">Stasiun Singosari</th>
                            <th style="text-align:center">Stasiun Kepanjen</th>
                            <th style="text-align:center">Stasiun Ngebruk</th>
                            <th style="text-align:center">Stasiun Sumberpucung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($data->result_array() as $a):
                        $id=$a['id'];
                        $bulan=$a['bulan'];
                        $singosari=$a['singosari'];
                        $lawang=$a['lawang'];
                        $kepanjen=$a['kepanjen'];
                        $ngebruk=$a['ngebruk'];
                        $sumberpucung=$a['sumberpucung'];
                        $jumlah=$a['jumlah'];
                        $penginput=$a['penginput'];
                        
                        ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $bulan;?></td>
                            <td style="text-align:center;"><?php echo $lawang;?></td>
                            <td style="text-align:center;"><?php echo $singosari;?></td>
                            <td style="text-align:center;"><?php echo $kepanjen;?></td>
                            <td style="text-align:center;"><?php echo $ngebruk;?></td>
                            <td style="text-align:center;"><?php echo $sumberpucung;?></td>
                            <td style="text-align:center;"><?php echo $jumlah;?></td>
                            <td style="text-align:center;width: 130px">
                                <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                            </td>
                            
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>




            <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Tambah kepanjen Unggulan</h3>
                        </div>
                        <?php echo form_open_multipart('C_kepanjen_unggulan/proses_tambah_kepanjen_unggulan') ?>

                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                            
                            <div class="form-group">
                                <tr>
                                    <td><label class="control-label col-xs-3">bulan</label></td>
                                    <td>
                                        <select name="bulan" id="bulan" class="form-control" required>
                                        <?php 
                                        foreach ($datas->result_array() as $a){
                                            $kode=$a['id_bulan'];
                                            $ngebruk=$a['nama_bulan'];
                                            ?>
                                            <option value="<?php echo $ngebruk; ?>"> <?php echo $ngebruk; ?> </option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                            </div>
                            
                            <div class="form-group">
                                <tr>
                                    <td><label class="control-label col-xs-3">singosari</label></td>
                                    <td><input type="text" class="form-control" name="singosari" placeholder="singosari" required autocomplete="off"></td>
                                </tr>
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td><label class="control-label col-xs-3">lawang</label></td>
                                    <td><input type="text" class="form-control" name="lawang" placeholder="lawang" required autocomplete="off"></td>
                                </tr>
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td><label class="control-label col-xs-3">kepanjen Unggulan</label></td>
                                    <td><input type="text" class="form-control" name="kepanjen_unggulan" placeholder="kepanjen Unggulan" required autocomplete="off"></td>
                                </tr>
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td><label class="control-label col-xs-3">ngebruk</label></td>
                                    <td><select name="ngebruk" class="form-control">
                                        <option value="Maju">Maju</option>
                                        <option value="Berkembang">Berkembang</option>
                                        <option value="Berkepanjen">Berkepanjen</option>
                                        </select>
                                    </td>
                                </tr>
                            </div>
                            <?php $name=$this->session->userdata('user'); ?>
                            <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
                    </div>

                    <div class="modal-footer">
                        <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> &nbsp &nbsp
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>

                </div>
                <?php echo form_close(); ?>
            </div>





            
        </div>
    </div>


    <!-- /.box-body -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>