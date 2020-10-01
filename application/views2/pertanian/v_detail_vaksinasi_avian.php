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
            <li class="active">Detail Vaksinasi Avian</li>
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
                    
                            <h4 class="box-title" style="margin-bottom:10px ">Detail Jumlah Vaksinasi Avian Influenza Di Kabupaten Malang</h3><br>
                    <table>
                    <tr>
                        <td><a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Input Data <?php echo $page ?></a>
                            
                        </td>
                    </tr>
                    </table>
                    </div>
                    
                    
                    <div class="box-body">
                    <table  class="table table-striped" id="tampil1" width="100%" style="text-align:center; font-size:15px;">
                        <thead >
                            <tr>
                                <th style="text-align:center">Kecamatan</th>
                                <th style="text-align:center">Nama Ternak</th>
                                <th style="text-align:center">Jumlah</th>
                                <th style="text-align:center">Tahun</th>
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach ($data->result_array() as $a):  
                                $id=$a['id'];
                                $kecamatan=$a['kecamatan'];
                                $nama_ternak=$a['nama_ternak'];
                                $jumlah=$a['jumlah'];
                                $tahun=$a['tahun'];
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $kecamatan;?></td>
                                <td style="text-align:center"><?php echo $nama_ternak;?></td>
                                <td style="text-align:center"><?php echo number_format($jumlah,0,",",".");?></td>
                                <td style="text-align:center"><?php echo $tahun;?></td>
                                <td style="text-align:center;width:130px">
                                    <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                    <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                                
                        </tbody>
                    </table>


                    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <?php $kcmtn = $this->uri->segment(4);  ?>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 class="modal-title" id="myModalLabel">Tambah Data Vaksinasi Avian</h3>
                                    </div>


                                    <?php echo form_open_multipart('C_vaksinasi_avian/tambah_detail_vaksinasi/'.$page.'/'.$kcmtn) ?>

                                    <div class="modal-body">
                                        <input class="form-control" type="hidden" name="id" readonly>
                                            <table>
                                                <tr>
                                                    <td><label >Tahun</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:335px;"  class="form-control" name="tahun" value="<?php echo $page ?>" placeholder="Tahun" required readonly autocomplete="off"></td>
                                                </tr>
                                                <tr>
                                                    <td><label >Kecamatan</label></td>
                                                    <td>:</td>
                                                    <td><input type="text" style="width:335px;"  class="form-control" name="kecamatan" value="<?php echo $kcmtn ?>" placeholder="Kecamatan" required readonly autocomplete="off"></td>
                                                </tr>
                                                <tr>
                                                    <td><label >Nama Ternak</label></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="nama_ternak" style="width:335px;"  id="nama_ternak" class="form-control" required>
                                                        <option disabled selected value> Pilih Hewan Ternak </option>
                                                        <?php 
                                                        foreach ($datam->result_array() as $a){
                                                            $hewan_ternak=$a['hewan_ternak'];
                                                            ?>
                                                            <option value="<?php echo $hewan_ternak; ?>"> <?php echo $hewan_ternak; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label >Jumlah</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:335px;"  class="form-control" name="jumlah" placeholder="Jumlah" required autocomplete="off"></td>
                                                </tr>
                                            </table>
                                            
                                            <?php $name=$this->session->userdata('user'); ?>
                                            <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>"  readonly>
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
                        $tahun=$a['tahun'];
                        $kecamatan=$a['kecamatan'];
                        $nama_ternak=$a['nama_ternak'];
                        $jumlah=$a['jumlah'];
                        $penginput=$a['penginput'];
                        ?>

                        <?php $page=$this->uri->segment(3); ?>
                        <?php $kcmtn = $this->uri->segment(4);  ?>

                <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Hapus Data Vaksinasi Avian</h3>
                            </div>
                            <?php echo form_open_multipart('C_vaksinasi_avian/proses_hapus_vaksinasi/'.$page.'/'.$kcmtn) ?>
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
                                        <h3 class="modal-title" id="myModalLabel">Edit Vaksinasi Avian</h3>
                                    </div>
                                    <?php echo form_open_multipart('C_vaksinasi_avian/ubah_vaksinasi/'.$page.'/'.$kcmtn) ?>

                                    <div class="modal-body">
                                        <input class="form-control" type="hidden" name="id" value="<?php echo $id ?>" readonly>
                                        <?php $name=$this->session->userdata('user'); ?>
                                        <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>"  readonly>

                                            <table>
                                                <tr>
                                                    <td><label >Tahun</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:335px;"  class="form-control" name="tahun" value="<?php echo $tahun ?>" placeholder="Tahun" required readonly autocomplete="off"></td>
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
                                                            <option value="<?php echo $nama_kecamatan; ?>" <?=$nama_kecamatan== $kecamatan? "selected" : null ?>> <?php echo $nama_kecamatan; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label >Nama Ternak</label></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="nama_ternak" style="width:335px;"  id="nama_ternak" class="form-control" required>
                                                        <option disabled selected value> Pilih Hewan Ternak </option>
                                                        <?php 
                                                        foreach ($datam->result_array() as $a){
                                                            $id=$a['id'];
                                                            $hewan_ternak=$a['hewan_ternak'];
                                                            ?>
                                                            <option value="<?php echo $hewan_ternak; ?>" <?=$hewan_ternak== $nama_ternak? "selected" : null ?>> <?php echo $hewan_ternak; ?> </option>
                                                        <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label >Jumlah</label></td>
                                                    <td>:</td>
                                                    <td><input type="number" style="width:335px;"  class="form-control" name="jumlah" placeholder="Jumlah" value="<?php echo $jumlah ?>" required autocomplete="off"></td>
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



                

                





                    

                <?php } ?>




                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div> <!-- col -->
        </div> <!-- row -->


    </section>
<!-- /.content -->
</div>
</body>





