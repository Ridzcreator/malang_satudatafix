<!-- Content Wrapper. Contains page content -->
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KEPEMUDAAN DAN OLAHRAGA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Prasarana Olahraga</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    <?php $page = $this->uri->segment(3);  ?>
        <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Prasarana Olahraga di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
        </td>
        <td>
            <a class="btn btn-success" href="../grafikdetailprasarana/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
        </tr>
        </table>
                        <table  class="table table-striped" id="tampildetail" style="font-size: 14px;">
                            <thead >
                                <tr>
                                    <th style="text-align:center; vertical-align: middle;">No</th>
                                    <th style="text-align:center; vertical-align: middle;">Kecamatan</th>
                                    <th style="text-align:center; vertical-align: middle;">Tahun</th>
                                    <th style="text-align:center; vertical-align: middle;">Stadion</th>
                                    <th style="text-align:center; vertical-align: middle;">SB</th>
                                    <th style="text-align:center; vertical-align: middle;">BV</th>
                                    <th style="text-align:center; vertical-align: middle;">BB</th>
                                    <th style="text-align:center; vertical-align: middle;">Tenis</th>
                                    <th style="text-align:center; vertical-align: middle;">Bulu Tangkis</th>
                                    <th style="text-align:center; vertical-align: middle;">Futsal</th>
                                    <th style="text-align:center; vertical-align: middle;">Gor</th>
                                    <th style="text-align:center; vertical-align: middle;">Aula</th>
                                    <th style="text-align:center; vertical-align: middle;">Kolam Renang</th>
                                    <th style="text-align:center; vertical-align: middle;">Jumlah</th>
                                    <th style="text-align:center; width: 130px; vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=0;
                                $stadion1=0;
                                $spkbola1=0;
                                $voly1=0;
                                $basket1=0;
                                $tenis1=0;
                                $badminton1=0;
                                $futsal1=0;
                                $gor1=0;
                                $aula1=0;
                                $kolam1=0;
                                $jumlah1=0;

                                foreach ($data->result_array() as $a):


                                $no++; 
                    $id = $a['id'];
                    $kec=$a['kcmtn'];
                    $tahun=$a['tahun'];
                    $stadion=$a['stadion'];
                    $spkbola=$a['sb'];
                    $voly=$a['bv'];
                    $basket=$a['bb'];
                    $tenis=$a['tenis'];
                    $badminton=$a['bt']; 
                    $futsal=$a['futsal']; 
                    $gor=$a['gor']; 
                    $aula=$a['aula']; 
                    $kolam=$a['kr'];  
                    
                    $jumlah=$a['jumlah'];
                    $penginput=$a['penginput'];
                                $stadion1=$stadion1+$stadion;
                                $spkbola1=$spkbola1+$spkbola;
                                $voly1=$voly1+$voly;
                                $basket1=$basket1+$basket;
                                $tenis1=$tenis1+$tenis;
                                $badminton1=$badminton1+$badminton;
                                $futsal1=$futsal1+$futsal;
                                $gor1=$gor1+$gor;
                                $aula1=$aula1+$aula;
                                $kolam1=$kolam1+$kolam;
                                $jumlah1=$jumlah1+$jumlah;
                                ?>
                                <tr>
                                    <td style="text-align:center"><?php echo $no;?></td>
                                    <td style="text-align:center"><?php echo $kec;?></td>
                                    <td style="text-align:center"><?php echo $tahun;?></td>
                                    <td style="text-align:center"><?php echo $stadion;?></td>
                                    <td style="text-align:center"><?php echo $spkbola;?></td>
                                    <td style="text-align:center"><?php echo $voly;?></td>
                                    <td style="text-align:center"><?php echo $basket;?></td>
                                    <td style="text-align:center"><?php echo $tenis;?></td>
                                    <td style="text-align:center"><?php echo $badminton;?></td>
                                    <td style="text-align:center"><?php echo $futsal;?></td>
                                    <td style="text-align:center"><?php echo $gor;?></td>
                                    <td style="text-align:center"><?php echo $aula;?></td>
                                    <td style="text-align:center"><?php echo $kolam;?></td>
                                    <td style="text-align:center"><?php echo $jumlah;?></td>
                                    <td style="text-align:center;width:130px">
                                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                    </td>
                                    
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                    
                                
                            </tfoot>
                        </table>

                   
                
            



            <!-- Modal Tambah -->

<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <?php $page = $this->uri->segment(3);  ?>
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 class="modal-title" id="myModalLabel">Tambah Data Prasarana</h3>
    </div>
    <?php echo form_open_multipart('C_prasarana/proses_input_detail_prasarana/'.$page) ?>

    <div class="modal-body">
        <input class="form-control" type="hidden" name="id" readonly>
    <div class="form-group">
        <table width="90%">
            <tr>
                <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                <td style="padding:  10px"><input type="text" class="form-control" name="tahun" value="<?php echo $page; ?>" placeholder="Tahun" readonly></td>
            </tr>
            <tr>
                <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                <td style="padding:  10px">
                <select name="kecamatan" id="kecamatan" class="form-control" required>
                <?php foreach ($datas->result() as $row) {
                    ?>
                <option value="<?php echo $row->nama_kecamatan ?>"><?php echo $row->nama_kecamatan ?>   
                </option>
                    <?php
                                            }
                        ?>
                </select>
                </td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Stadion</label></td><td>:</td>
                <td style="padding:  10px"><input name="stadion" class="form-control" type="text" placeholder="Banyak Stadion" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Sepak Bola</label></td><td>:</td>
                <td style="padding:  10px"><input name="sb" class="form-control" type="text" placeholder="Banyak Lapangan Bola" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Bola Voly</label></td><td>:</td>
                <td style="padding:  10px"><input name="bv" class="form-control" type="text" placeholder="Banyak Lapangan Bola Voly" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Bola Basket</label></td><td>:</td>
                <td style="padding:  10px"><input name="bb" class="form-control" type="text" placeholder="Banyak Lapangan Bola Basket" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Tenis</label></td><td>:</td>
                <td style="padding:  10px"><input name="tenis" class="form-control" type="text" placeholder="Banyak Lapangan Tenis" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Bulu Tangkis</label></td><td>:</td>
                <td style="padding:  10px"><input name="bt" class="form-control" type="text" placeholder="Banyak Lapangan Bulu Tangkis" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Futsal</label></td><td>:</td>
                <td style="padding:  10px"><input name="futsal" class="form-control" type="text" placeholder="Banyak Lapangan Futsal" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Gor</label></td><td>:</td>
                <td style="padding:  10px"><input name="gor" class="form-control" type="text" placeholder="Banyak Gedung Olahraga" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Aula</label></td><td>:</td>
                <td style="padding:  10px"><input name="aula" class="form-control" type="text" placeholder="Banyak Aula" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
            </tr>
            <tr>
                <td style="padding:  10px"><label>Kolam Renang</label></td><td>:</td>
                <td style="padding:  10px"><input name="kr" class="form-control" type="text" placeholder="Banyak Kolam Renang" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
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
                    $kec=$a['kcmtn'];
                    $stadion=$a['stadion'];
                    $spkbola=$a['sb'];
                    $voly=$a['bv'];
                    $basket=$a['bb'];
                    $tenis=$a['tenis'];
                    $badminton=$a['bt']; 
                    $futsal=$a['futsal']; 
                    $gor=$a['gor']; 
                    $aula=$a['aula']; 
                    $kolam=$a['kr'];  
                    $tahun=$a['tahun'];
                    $jumlah=$a['jumlah'];
                    ?>

<div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Prasarana Olahraga</h3>
            </div>
                <?php echo form_open_multipart('C_prasarana/proses_edit_prasarana/'.$page) ?>
            <div class="modal-body">
                <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jumlah;?>">
                   
                <table width="90%">
                    <tr>
                        <td style="padding:  10px"> <label>Tahun</label></td><td>:</td>
                        <td style="padding:  10px"><input name="tahun" class="form-control" value="<?php echo $tahun;?>"  required readonly></td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                        <td style="padding:  10px"><input name="kecamatan" class="form-control" value="<?php echo $kec;?>" required readonly></td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Stadion</label></td><td>:</td>
                        <td style="padding:  10px"><input name="stadion" class="form-control" type="text" placeholder="" value="<?php echo $stadion;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Sepak Bola</label></td><td>:</td>
                        <td style="padding:  10px"><input name="sb" class="form-control" type="text" placeholder="" value="<?php echo $spkbola;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td style="padding:  10px"><label>Bola Voly</label></td><td>:</td>
                        <td style="padding:  10px"><input name="bv" class="form-control" type="text" placeholder="" value="<?php echo $voly;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Bola Basket</label></td><td>:</td>
                            <td style="padding:  10px"><input name="bb" class="form-control" type="text" placeholder="" value="<?php echo $basket;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tenis</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tenis" class="form-control" type="text" placeholder="" value="<?php echo $tenis;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Bulu Tangkis</label></td><td>:</td>
                            <td style="padding:  10px"><input name="bt" class="form-control" type="text" placeholder="" value="<?php echo $badminton;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Futsal</label></td><td>:</td>
                            <td style="padding:  10px"><input name="futsal" class="form-control" type="text" placeholder="" value="<?php echo $futsal;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Gor</label></td><td>:</td>
                            <td style="padding:  10px"><input name="gor" class="form-control" type="text" placeholder="" value="<?php echo $gor;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Aula</label></td><td>:</td>
                            <td style="padding:  10px"><input name="aula" class="form-control" type="text" placeholder="" value="<?php echo $aula;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Kolam Renang</label></td><td>:</td>
                            <td style="padding:  10px"><input name="kr" class="form-control" type="text" placeholder="" value="<?php echo $kolam;?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
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
            <?php $page = $this->uri->segment(3);  ?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
                        </div>
                        <?php echo form_open_multipart('C_prasarana/proses_hapus_prasarana/'.$page) ?>
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

