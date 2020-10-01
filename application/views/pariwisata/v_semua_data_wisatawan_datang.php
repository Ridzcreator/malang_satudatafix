<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            WISATAWAN
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Wisatawan</a></li>
            <li class="active">Wisatawan Datang</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    <td>
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" style="margin-bottom:10px">Tambah Data</a>
    </td>
    <td>
        <a class="btn btn-primary" href="wisatawan/tampil_grafik_wisawatawan_datang" style="margin-bottom:10px">Lihat Grafik</a>
    </td>
                <div class="box">

                 <!-- /.box-header -->
                <div class="box-header">
                    <h4 class="box-title">Data Wisatawan Datang Ke Kabupaten Malang</h3>
                </div>
                    
                    
                    <div class="box-body">
                        <table  class="table table-striped" id="tampil" width="100%" height="100%">
                            <thead style="background-color:lightblue" >
                                <tr>
                                    <th style="text-align:center;width:40px;" rowspan="2">No</th>
                                    <th style="text-align:center;width:40px;" rowspan="2">Bulan</th>
                                    <th style="text-align:center;width:40px;" rowspan="2">Tahun</th>
                                    <th style="text-align:center" colspan="2">Wisatawan/Traveler</th>
                                    <th style="text-align:center;" rowspan="2">Jumlah</th>
                                    <th style="text-align:center;" rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th style="text-align:center">Domestik</th>
                                    <th style="text-align:center">Mancanegara</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $jd=0;
                                $jm=0;
                                $jt=0;
                                $no=0;
                                foreach ($data->result_array() as $a):
                                $no++;                                    
                                $id=$a['id'];
                                $bulan=$a['bulan'];
                                $tahun=$a['tahun'];
                                $domestik=number_format($a['domestik'],0,",",".");
                                $domestiki=$a['domestik'];
                                $mancanegara=number_format($a['mancanegara'],0,",",".");
                                $mancanegarai=$a['mancanegara'];
                                $jumlah=number_format($a['jumlah'],0,",",".");
                                $jumlahi=$a['jumlah'];
                                $penginput=$a['penginput'];
                                $jd=$jd+$domestiki;
                                $jm=$jm+$mancanegarai;
                                $jt=$jt+$jumlahi;
                                ?>
                                <tr>
                                    <td style="text-align:center"><?php echo $no;?></td>
                                    <td style="text-align:center"><?php echo $bulan;?></td>
                                    <td style="text-align:center"><?php echo $tahun;?></td>
                                    <td style="text-align:center"><?php echo $domestik;?></td>
                                    <td style="text-align:center"><?php echo $mancanegara;?></td>
                                    <td style="text-align:center"><?php echo $jumlah;?></td>
                                    <td style="text-align:center;width:130px">
                                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                    </td>
                                    
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot style="background-color:lightblue">
                                <tr>
                                    <th colspan="3" style="text-align:center">Jumlah
                                    </th>

                                    <th style="text-align:center"><?php echo number_format($jd,0,",",".");?>
                                    </th>

                                    <th style="text-align:center"><?php echo number_format($jm,0,",",".");?>
                                    </th>
                                    <th style="text-align:center"><?php echo number_format($jt,0,",",".");?>
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>



                 <!-- Modal Tambah -->

        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Dawa Wisatawan</h3>
                    </div>


                    <?php echo form_open_multipart('C_wisatawan/proses_tambah_wisatawan_menginap') ?>

                    <div class="modal-body">
                        <input class="form-control" type="hidden" name="id" readonly>
                        
                        <div class="form-group">
                            <tr>
                                <td><label class="control-label col-xs-3">Bulan</label></td>
                                <td>
                                    <select name="bulan" id="bulan" class="form-control" required>
                                        <?php 
                                        foreach ($datas->result_array() as $a){
                                            $bulan=$a['bulan'];
                                            ?>
                                            <option value="<?php echo $bulan; ?>"> <?php echo $bulan; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                            </div>
                            
                            <div class="form-group">
                                <tr>
                                    <td><label class="control-label col-xs-3">Tahun</label></td>
                                    <td><input type="text" class="form-control" name="tahun" placeholder="Tahun" required autocomplete="off"></td>
                                </tr>
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td><label class="control-label col-xs-3">Domestik</label></td>
                                    <td><input type="number" class="form-control" name="domestik" placeholder="Domestik" required autocomplete="off"></td>
                                </tr>
                            </div>
                            <div class="form-group">
                                <tr>
                                    <td><label class="control-label col-xs-3">Mancanegara</label></td>
                                    <td><input type="number" class="form-control" name="mancanegara" placeholder="mancanegara" required autocomplete="off"></td>
                                </tr>
                            </div>
                            
                            <?php $name=$this->session->userdata('user'); ?>
                            <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
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
                    $bulan=$a['bulan'];
                    $tahun=$a['tahun'];
                    $domestik=$a['domestik'];
                    $mancanegara=$a['mancanegara'];
                    $jumlah=$a['jumlah'];
                    $penginput=$a['penginput'];
                    ?>

            <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 class="modal-title" id="myModalLabel">Edit Wisatawan Menginap</h3>
                                </div>
                                <?php echo form_open_multipart('C_wisatawan/proses_ubah_wisatawan_menginap') ?>

                                <div class="modal-body">
                                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                                    <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jumlah;?>">

                                    <?php $name=$this->session->userdata('user'); ?>
                                    <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>

                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Bulan</label>
                                        <input type="text" class="form-control" name="bulan" value="<?php echo $bulan;?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Tahun</label>
                                        <input type="text" class="form-control" name="tahun" value="<?php echo $tahun;?>" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">domestik</label>
                                        <input type="number" class="form-control" name="domestik"  value="<?php echo $domestik;?>" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Mancanegara</label>
                                        <input type="number" class="form-control" name="mancanegara"  value="<?php echo $mancanegara;?>" autocomplete="off">
                                    </div>
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
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Wisatawan Menginap</h3>
                        </div>
                        <?php echo form_open_multipart('C_wisatawan/proses_hapus_wisatawan_menginap') ?>
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