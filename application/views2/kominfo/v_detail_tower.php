<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KOMUNIKASI DAN INFORMATIKA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Tower</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    <?php $page = $this->uri->segment(3);  ?>
        <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Tower Setiap Kecamatan di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
        </td>
        <td>
            <a class="btn btn-success" href="../grafikdetailtower/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
        </tr>
        </table>
                        <table  class="table table-striped" id="tampildetail" style="text-align: center;font-size: 15px; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align:center; vertical-align: middle;">No</th>
                                    <th style="text-align:center; vertical-align: middle;">Kecamatan</th>
                                    <th style="text-align:center; vertical-align: middle;">Banyak Tower</th>
                                    <th style="text-align:center; vertical-align: middle;">Tahun</th>
                                    <th style="text-align:center; vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=0;
                                $jumlah1=0;

                                foreach ($data->result_array() as $a):


                                $no++; 
                    $id = $a['id'];
                    $kec=$a['kecamatan'];
                    $jumlah=$a['jml_tower'];
                    $tahun=$a['tahun'];
                    $penginput=$a['penginput'];
                    $jumlah1=$jumlah1+$jumlah;
                                ?>
                                <tr>
                                    <td style="text-align:center"><?php echo $no;?></td>
                                    <td style="text-align:center"><?php echo $kec;?></td>
                                    <td style="text-align:center"><?php echo $jumlah;?></td>
                                    <td style="text-align:center"><?php echo $tahun;?></td>
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
            <?php $page = $this->uri->segment(3);  ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Tambah Data Banyak Tower</h3>
                        </div>


                        <?php echo form_open_multipart('C_twr/proses_input_detail_tower/'.$page) ?>

                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                            
                            
                                <div class="form-group">
                                <table>

                                 <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px"><input type="text" class="form-control" name="tahun" value="<?php echo $page; ?>" placeholder="Tahun" readonly></td>
                        </tr>
                                <tr>
                            <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                            <td style="padding:  10px"><select name="kecamatan" id="kecamatan" class="form-control" style="width:335px;" required>
                                        <?php foreach ($datas->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->nama_kecamatan ?>"><?php echo $row->nama_kecamatan ?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Banyak Tower</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jml_tower" class="form-control" type="text" placeholder="Banyak Tower" autocomplete="off" style="width:335px;" required></td>
                        </tr>
                        
                        </table>   
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
            </div>

                 <!-- modal edit -->

                <?php 

                foreach ($data->result_array() as $a){
                    $id = $a['id'];
                    $kec=$a['kecamatan'];
                    $jumlah=$a['jml_tower'];
                    $tahun=$a['tahun'];
                    ?>

<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Banyak Tower</h3>
            </div>
                <?php echo form_open_multipart('C_twr/proses_edit_tower') ?>
            <div class="modal-body">
                <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                   
                <table>
                    <tr>
                        <td style="padding:  10px"> <label>Tahun</label></td><td>:</td>
                        <td style="padding:  10px"><input name="tahun" class="form-control" value="<?php echo $tahun;?>" style="width:335px;" required readonly></td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                        <td style="padding:  10px"><input name="kecamatan" class="form-control" value="<?php echo $kec;?>" style="width:335px;" required readonly></td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Banyak Tower</label></td><td>:</td>
                        <td style="padding:  10px"><input name="jml_tower" class="form-control" type="text" placeholder="" value="<?php echo $jumlah;?>" autocomplete="off" style="width:335px;" required></td>
                    </tr>
                   
                    </table>
                    </div>
                        <div class="modal-footer">
                        <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save">&nbsp&nbsp
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>



            <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <?php $page = $this->uri->segment(3);  ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                        </div>
                        <?php echo form_open_multipart('C_twr/proses_hapus_tower/'.$page) ?>
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
<a class="btn btn-s btn-primary" style="margin-left:1em; margin-top:1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url ('C_twr'); ?> ">Back</a>

            </div><!-- /.box-body -->
            
           </div> <!-- /.box -->
        
    </section>
    <!-- /.content -->
</div>
</body>

