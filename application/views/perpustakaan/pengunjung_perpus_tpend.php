<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Perpustakaan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pengunjung Perpustakaan Menurut Tingkat Pendidikan</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">


                <div class="box">

               <!-- /.box-header -->
                    <div class="box-header">
                    <tr>
                        <td>
                            <h4 class="box-title" style="margin-bottom:10px ">Pengunjung Perpustakaan Menurut Tingkat Pendidikan Kabupaten Malang</h3><br>
                        <td>
                            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Tambah Data</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
                        </td>
                        </td>
                        <td>
                            <select name="tahun" id="tahun" required>
                            <option value="0000"> Pilih Tahun </option>
                                <?php 
                                foreach ($datax->result_array() as $a){
                                $periode=$a['tahun'];
                                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                                <?php } ?>
                                
                            </select>
                        </td>
                    </tr>
                    </div>
                    
                    
                    <div class="box-body">
                    <table  class="table table-striped" id="tampilpengunjungperpustpend" width="100%" style="text-align:center">
                      <thead>
                    <tr>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2 >No</th>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2>Tahun</th>
                        <th style="text-align:center;text-align:center;width:50px;" colspan=3>Jenjang Pendidikan</td>
                        <th style="text-align:center;text-align:center;width:50px;" rowspan=2>Jumlah</th>
                        <th style="text-align:center;width:80px;text-align:center;" rowspan=2>Aksi</th>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle; text-align:center;width:40px ">SMP</th>
                        <th style="vertical-align: middle; text-align:center;width:40px ">SMA</th>
                        <th style="vertical-align: middle; text-align:center;width:40px ">Perguruan Tinggi</th>
                    
                    </tr>
                </thead>
                        <tbody>
                                <!-- ADA DI CONTROLLER -->
                        </tbody>
                    </table>





                    <!-- Modal Tambah -->

                        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pengunjung Perpustakaan</h3>
                                    </div>


                                    <?php echo form_open_multipart('pengunjungperpustpend/proses_input_pengunjung_perpus_tpend') ?>

                                     <div class="modal-body">
                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                
                     <table>
                        <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px">
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

                                  <tr>
                            <td style="padding:  10px"> <label>Bulan</label></td><td>:</td>
                                <td style="padding: 10px"> <select name="bulan" id="bulan" class="form-control" style="width:335px;" required reado>
                                   <?php foreach ($datas->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->keterangan ?>"><?php echo $row->keterangan ?></option>
                                <?php
                                     }
                                ?>
                                </select>
                                </td>
                                </tr>
                                
                             <tr>
                            <td style="padding:  10px"><label>Jumlah SMP</label></td><td>:</td>
                            <td style="padding:  10px"><input name="smp" class="form-control" type="text" placeholder="Massukan Jumlah SMP" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                             <tr>
                            <td style="padding:  10px"><label>Jumlah SMA</label></td><td>:</td>
                            <td style="padding:  10px"><input name="sma" class="form-control" type="text" placeholder="Massukan Jumlah SMA" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                          <tr>
                            <td style="padding:  10px"><label>Jumlah Perguruan Tinggi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="perguruan_tinggi" class="form-control" type="text" placeholder="Massukan Jumlah Perguruan Tinggi" style="width:335px;" required autocomplete="off"></td>
                        </tr>

                            </table>            
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


<div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
                    </div>
                    <?php echo form_open_multipart('pengunjungperpustpend/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Total SMP</option>
                            <option value="2">Jumlah Total SMA</option>
                            <option value="3">Jumlah Total Perguruan Tinggi</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><label>Model Grafik</label></td><td>:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>
                            <option value="line">Grafik Line</option>
                            </select></td>
                        </tr>
                        <tr>
                        <td><label>Tahun Grafik</label></td><td>:</td>
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
                    
                            <input type="submit" class="btn btn-success pull-right" value="Lihat Grafik"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    






                    </div>
                </div>
            </div>



            


    <!-- /.box-body -->
        
<!-- /.box -->
        </div>
    </section>
<!-- /.content -->
</div>
</body>





</html>
