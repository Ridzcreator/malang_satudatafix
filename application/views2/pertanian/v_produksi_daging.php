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
            <li class="active">Produksi Daging</li>
        </ol>
     <!-- Main content -->

     <section class="content">
        <div class="box">

         <!-- /.box-header -->
         <div class="box-header">
            <h4 class="box-title">Tabel Produksi Daging</h3>
            </div>


            <div class="box-body">
                <table>
                    <tr>
                        <td><a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input Data</a></td>
                        <td><a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a></td>
                        <td><a class="btn btn-primary" href="#modalAdd2" data-toggle="modal" title="Add">Grafik Per Tahun</a></td>
                     <td>
                        <select style=" margin-left: 5px;" name="tahun" id="tahun" required>
                            <option value="0000"> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
                                $periode=$a['tahun'];
                                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                                <?php } ?>

                            </select>
                        </td>
                    </tr>

                </table>
                <table  class="table table-bordered table-striped" id="tampilDaging" style="text-align: center; font-size:15px; width: 100%;">
                    <thead >
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">Jenis Produksi (Daging)</th>
                            <th style="text-align: center; vertical-align: middle;"">Satuan</th>
                            <th style="text-align: center; vertical-align: middle;"">Total Produksi</th>
                            <th style="text-align: center; vertical-align: middle;">Tahun</th>
                            <th style="width:130px; text-align:center; vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <?php 

            foreach ($data->result_array() as $a){

                $no=$a['id'];
                $jenis_daging=$a['jenis_daging'];
                $satuan=$a['satuan'];
                $total_produksi=$a['total_produksi'];
                $tahun=$a['tahun'];
                $penginput=$a['penginput'];
                $timestamp=$a['timestamp'];
                $status=$a['status'];

                ?>

                <div id="modalEdit<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Edit Data Produksi Daging</h3>
                            </div>
                            <?php echo form_open_multipart('C_produksi_daging/proses_edit_produksi_daging') ?>

                            <div class="modal-body">
                                <input class="form-control" type="hidden" name="no" value="<?php echo $no;?>" readonly>


                                <table>
                                    <tr>
                                      <td  ><label>Jenis Daging</label></td>
                                      <td>:</td>
                                      <td><input type="text" style="width:355px" class="form-control" name="jenis_daging" value="<?php echo $jenis_daging;?>" required readonly></td>
                                  </tr>
                                  <tr>
                                     <td  ><label>Satuan</label></td>
                                     <td>:</td>
                                     <td><input type="text" style="width:355px" class="form-control" name="satuan" value="<?php echo $satuan;?>" required readonly></td>
                                 </tr>
                                 <tr>
                                     <td  ><label>Total Produksi</label></td>
                                     <td>:</td>
                                     <td><input type="number" style="width:355px" min="0" step="0.01" class="form-control" name="total_produksi" value="<?php echo $total_produksi;?>" required></td>
                                 </tr>
                                 <tr>
                                    <td  ><label>Tahun</label></td>
                                    <td>:</td>
                                    <td><input type="number" style="width:355px" class="form-control" name="tahun"  value="<?php echo $tahun;?>" placeholder="Tahun" autocomplete="off" readonly></td>
                                </tr>
                                </table>
                            </div>
                        
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <div class="modal-footer">
                            <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> 
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
            </div>

            <div id="modalHapus<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Produksi Daging</h3>
                        </div>
                        <?php echo form_open_multipart('C_produksi_daging/proses_hapus_produksi_daging') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data ini..?</p>
                            <input name="no" type="hidden" value="<?php echo $no; ?>">
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
                            <h3 class="modal-title" id="myModalLabel">Tambah Data Produksi Daging</h3>
                        </div>
                        <?php echo form_open_multipart('C_produksi_daging/proses_tambah_produksi_daging') ?>
                        <div class="modal-body">

                        <table>
                          <tr>
                             <td  ><label>Jenis Daging</label></td>
                             <td  >:</td>
                             <td> 
                                <select name="jenis_daging" class="form-control">
                                 <?php foreach ($datas->result() as $a) {
                                    ?>
                                    <option value="<?php echo $a->daging_hewan ?>"><?php echo $a->daging_hewan ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <td  ><label>Satuan</label></td>
                        <td  >:</td>
                             <td>
                                <select name="satuan" class="form-control" style="width:335px;">
                                    <option value="kg">kg</option>
                                    <option value="gram">gram</option>
                                    <option value="ons">ons</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td  ><label>Total Produksi</label></td>
                            <td  >:</td>
                            <td><input type="number" min="0" class="form-control" name="total_produksi" placeholder="Total Produksi" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td  ><label>Tahun</label></td>
                            <td  >:</td>
                            <td>
                                <select name="tahun" id="tahun" class="form-control">
                                    <?php
                                    $tg_awal= date('Y')-10;
                                    $tgl_akhir= date('Y');
                                    for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                                    {
                                        echo "
                                        <option value='$i'";
                                        if(date('Y')==$i){echo "selected";}
                                        echo">$i</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        </table>
                        </div>

                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <div class="modal-footer">
                             <input style="margin-left: 10px;" type="submit" class="btn btn-success" name="add" value="Save">
                             <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
         <?php echo form_close(); ?>
     </div>
 </div>
</div>

<div id="modalAdd2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
            </div>
            <?php echo form_open_multipart('C_produksi_daging/tampil_produksi_daging/') ?>
            <div class="modal-body">


                <table width="90%">
                    <tr>
                        <td style="padding:  10px"><label>Periode</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                            <select name="tahunx" id="tahunx" class="form-control">
                                <option value="0000"> Pilih Tahun </option>
                                <?php 
                                foreach ($datax->result_array() as $a){
                                    $periode=$a['tahun'];
                                    ?>
                                    <option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                 <input  type="submit" class="btn btn-success" name="add" value="Lihat Grafik">
                </div>

             <?php echo form_close(); ?>
         </div>
     </div>
 </div>
 <!-- /.box-body -->

 <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
            </div>
            <?php echo form_open_multipart(base_url('C_produksi_daging/tampil_crosstab_produksi_daging')) ?>
            <div class="modal-body">
                <table>

                    <tr>
                        <td  ><label>Pilih Tahun Report</label></td>
                        <td  >:</td>
                        <td>
                            <select name="tahun1" id="tahun1" required>
                                <option disabled selected value> Pilih Tahun </option>
                                <?php 
                                foreach ($datax->result_array() as $a){
                                    $periode=$a['tahun'];
                                    ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                                    <?php } ?>  
                                </select> - 
                                <select name="tahun2" id="tahun2"  required>
                                    <option disabled selected value> Pilih Tahun </option>
                                    <?php 
                                    foreach ($datax->result_array() as $a){
                                        $periode=$a['tahun'];
                                        ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                                        <?php } ?>  
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">

                        <input type="submit" class="btn btn-success pull-right" value="Lihat Report"></input>

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
</body>
