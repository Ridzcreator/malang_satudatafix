<!-- Content Wrapper. Contains page content -->
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
            <li><a href="#"><i class="fa fa-dashboard"></i> Pertanian</a></li>
            <li class="active">Detail Usaha Peternakan</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">


                <div class="box">

               <!-- /.box-header -->
                    <div class="box-header">
                    <?php $page=$this->uri->segment(3); ?>
                    <tr>
                        <td>
                            <h4 class="box-title" style="margin-bottom:10px ">Jumlah Usaha Peternakan Di Kabupaten Malang</h3><br>
                            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Input Data <?php echo $page ?></a>
                            <a class="btn btn-success" href="../grafik_peternakan/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
                            
                        </td>
                    </tr>
                    </div>
                    
                    
                    <div class="box-body">
                    <table  class="table table-striped" id="tampil1" width="100%" style="text-align:center; font-size:15px">
                        <thead >
                            <tr>
                                <th style="text-align:center">Kecamatan</th>
                                <th style="text-align:center">Desa</th>
                                <th style="text-align:center">Tahun</th>
                                <th style="text-align:center">Jumlah Usaha Peternakan Hewan Besar</th>
                                <th style="text-align:center">Jumlah Usaha Peternakan Hewan Kecil</th>
                                <th style="text-align:center">Jumlah Usaha Peternakan Unggas</th>
                                <th style="text-align:center;width:50px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach ($data->result_array() as $a):  
                                $id=$a['id'];
                                $kecamatan=$a['kecamatan'];
                                $desa_id=$a['desa'];
                                $where = array('id_desa' => $desa_id);
                                $desa = $this->m_usaha_peternakan->getNamaDesaWhere($where)->row()->nama_desa;
                                $tahun=$a['tahun'];
                                $hewan_besar=$a['hewan_besar'];
                                $hewan_kecil=$a['hewan_kecil'];
                                $unggas=$a['unggas'];
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $kecamatan;?></td>
                                <td style="text-align:center"><?php echo $desa;?></td>
                                <td style="text-align:center"><?php echo $tahun;?></td>
                                <td style="text-align:center"><?php echo number_format($hewan_besar,0,",",".");?></td>
                                <td style="text-align:center"><?php echo number_format($hewan_kecil,0,",",".");?></td>
                                <td style="text-align:center"><?php echo number_format($unggas,0,",",".");?></td>
                                <td style="text-align:center;width:130px">
                                    <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                    <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                                
                        </tbody>
                    </table>


                    <!-- Modal Tambah -->

                    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 class="modal-title" id="myModalLabel">Tambah Data Usaha Peternakan</h3>
                                </div>


                                <?php echo form_open_multipart('C_usaha_peternakan/proses_tambah_detail_peternakan/'.$page) ?>

                                <div class="modal-body">
                                    <input class="form-control" type="hidden" name="id" readonly>
                                    <?php $name=$this->session->userdata('user'); ?>
                                    <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>

                                    <table>
                                        <tr>
                                            <td><label >Tahun</label></td>
                                            <td>:</td>
                                            <td><input type="number" style="width:335px;"  class="form-control" value="<?php echo $page ?>" name="tahun" placeholder="Tahun" required readonly autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label >Kecamatan</label></td>
                                            <td>:</td>
                                            <td>
                                                <select name="kecamatan" style="width:335px;"  id="kecamatan" class="form-control" required>
                                                    <option disabled selected value> Pilih Kecamatan </option>
                                                    <?php 
                                                    foreach ($datas->result_array() as $a){
                                                        $nama_kecamatan=$a['nama_kecamatan'];
                                                        ?>
                                                    <option value="<?php echo $nama_kecamatan; ?>"> <?php echo $nama_kecamatan; ?> </option>
                                                        <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label >Jumlah Peternakan Hewan Besar</label></td>
                                            <td>:</td>
                                            <td><input type="number" style="width:335px;"  class="form-control" name="hewan_besar" placeholder="Jumlah Peternakan Hewan Besar" required autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label >Jumlah Peternakan Hewan Kecil</label></td>
                                            <td>:</td>
                                            <td><input type="number" style="width:335px;"  class="form-control" name="hewan_kecil" placeholder="Jumlah Peternakan Hewan Kecil" required autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label >Jumlah Peternakan Unggas</label></td>
                                            <td>:</td>
                                            <td><input type="number" style="width:335px;"  class="form-control" name="unggas" placeholder="Jumlah Peternakan Unggas" required autocomplete="off"></td>
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
                    $kecamatan=$a['kecamatan'];
                    $tahun=$a['tahun'];
                    $hewan_kecil=$a['hewan_kecil'];
                    $hewan_besar=$a['hewan_besar'];
                    $unggas=$a['unggas'];
                    $jumlah=$a['jumlah'];
                    $penginput=$a['penginput'];
                    ?>

                    <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 class="modal-title" id="myModalLabel">Hapus Data Usaha Peternakan</h3>
                                </div>
                                <?php echo form_open_multipart('C_usaha_peternakan/proses_hapus_peternakan/'.$page) ?>
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

                    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 class="modal-title" id="myModalLabel">Edit Wisatawan Menginap</h3>
                                        </div>
                                        <?php echo form_open_multipart('C_usaha_peternakan/proses_ubah_peternakan/'.$page) ?>

                                        <div class="modal-body">
                                            <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                                            <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jumlah;?>" readonly>
                                            <?php $name=$this->session->userdata('user'); ?>
                                            <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>

                                            <table>
                                                <tr>
                                                    <td><label >Kecamatan</label></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="kecamatan" style="width:335px;"  id="kecamatan" class="form-control" required>
                                                        <?php 
                                                        foreach ($datas->result_array() as $a){
                                                            $id=$a['id'];
                                                            $nama_kecamatan=$a['nama_kecamatan'];
                                                            ?>
                                                            <option value="<?php echo $nama_kecamatan; ?>" <?=$nama_kecamatan== $kecamatan? "selected" : null ?>> <?php echo $nama_kecamatan; ?> </option>
                                                        <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label >Tahun</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" style="width:335px;"  class="form-control" name="tahun" value="<?php echo $tahun;?>" required readonly></td>
                                                </tr>
                                                <tr>
                                                    <td><label >Jumlah Peternakan Hewan Besar</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:335px;"  class="form-control" name="hewan_besar"  value="<?php echo $hewan_besar;?>" autocomplete="off"></td>
                                                </tr>
                                                <tr>
                                                    <td><label >Jumlah Peternakan Hewan Kecil</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:335px;"  class="form-control" name="hewan_kecil"  value="<?php echo $hewan_kecil;?>" autocomplete="off"></td>
                                                </tr>
                                                <tr>
                                                    <td><label >Jumlah Peternakan Unggas</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:335px;"  class="form-control" name="unggas"  value="<?php echo $unggas;?>" autocomplete="off"></td>
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



                    

                    <?php } ?>



                        



                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div> <!-- col -->
        </div> <!-- row -->


    </section>
<!-- /.content -->
</div>
</body>





