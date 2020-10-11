<!-- Content Wrapper. Contains page content -->
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            WISATAWAN
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Wisatawan</a></li>
            <li class="active">Wisatawan Menginap</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    <?php $page = $this->uri->segment(3);  ?>
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" style="margin-bottom:10px">Input Data <?php echo $page ?></a>
        <a class="btn btn-primary" href="../tampil_grafik_wisatawan_menginap/<?php echo $page ?>" style="margin-bottom:10px">Lihat Grafik</a>
        <a class="btn btn-success" style="margin-bottom:10px" href="../grafik_menginap/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            
                <div class="box">

                 <!-- /.box-header -->
                <div class="box-header">
                    <h4 class="box-title">Detail Wisatawan Menginap Di Kabupaten Malang</h3>
                </div>
                    
                    
                    <div class="box-body">
                        <table  class="table table-striped" id="tampil1" width="100%" height="100%">
                            <thead  >
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
                            <tfoot >
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
            <?php $page = $this->uri->segment(3);  ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Tambah Data Wisatawan</h3>
                        </div>


                        <?php echo form_open_multipart('C_wisatawan_menginap/tambah_detail_wisatawan_menginap/'.$page) ?>

                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                            <input type="hidden" class="form-control" name="jenis_wisatawan" name="id" readonly value="wisatawan_menginap">
                            
                                <table>
                                        
                                    <tr>
                                        <td><label>Bulan</label></td>
                                        <td>:</td>
                                        <td>
                                            <select name="bulan" id="bulan" class="form-control" style="width:335px;" required>
                                                <option disabled selected value> Pilih Bulan </option>
                                                <?php 
                                                foreach ($datas->result_array() as $a){
                                                    $bulan=$a['keterangan'];
                                                    ?>

                                                    <option value="<?php echo $bulan; ?>"> <?php echo $bulan; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label>Tahun</label></td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control" name="tahun" value="<?php echo $page; ?>" placeholder="Tahun" required readonly autocomplete="off">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Domestik</label></td>
                                            <td>:</td>
                                            <td><input type="number" class="form-control" style="width:335px;" name="domestik" placeholder="Domestik" required autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label>Mancanegara</label></td>
                                            <td>:</td>
                                            <td><input type="number" class="form-control" style="width:335px;" name="mancanegara" placeholder="mancanegara" required autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label>Jenis Wisatawan</label></td>
                                            <td>:</td>
                                            <td><select name="jenis_wisatawan" style="width:335px;" id="jenis_wisatawan" class="form-control" required>
                                                <option disabled selected value> Jenis Wisatawan </option>
                                                <option value="wisatawan_datang">Wisatawan Datang</option>
                                                <option value="wisatawan_menginap">Wisatawan Menginap</option>
                                            </select>
                                        </td>
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
                                <?php echo form_open_multipart('C_wisatawan_menginap/proses_ubah_wisatawan_menginap/'.$page) ?>

                                <div class="modal-body">
                                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                                    <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jumlah;?>">
                                    <input type="hidden" class="form-control" name="jenis_wisatawan" name="id" readonly value="wisatawan_menginap">

                                    <?php $name=$this->session->userdata('user'); ?>
                                    <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>

                                    <table>
                                    <tr>
                                        <td><label>Bulan</label></td>
                                        <td>:</td>
                                        <td><select name="bulan" id="bulan" class="form-control" style="width:355px"  required>
                                            <option disabled selected value> Pilih Bulan </option>
                                            <?php 
                                                foreach ($datas->result_array() as $a){
                                                    $bulan1=$a['keterangan'];
                                                    ?>
                                                <option value="<?php echo $bulan1; ?>" <?=$bulan1== $bulan? "selected" : null ?>> <?php echo $bulan1; ?> </option>
                                            <?php } ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td><label>Tahun</label></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="tahun" style="width:355px"  value="<?php echo $tahun;?>" required readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label>domestik</label></td>
                                        <td>:</td>
                                        <td><input type="number" class="form-control" name="domestik" style="width:355px"   value="<?php echo $domestik;?>" autocomplete="off"></td>
                                    </tr>
                                        <td><label>Mancanegara</label></td>
                                        <td>:</td>
                                        <td><input type="number" class="form-control" name="mancanegara" style="width:355px"   value="<?php echo $mancanegara;?>" autocomplete="off"></td>
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
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Wisatawan Menginap</h3>
                        </div>
                        <?php echo form_open_multipart('C_wisatawan_menginap/proses_hapus_wisatawan_menginap/'.$page) ?>
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