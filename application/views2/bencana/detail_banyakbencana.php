<b<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Banyak Bencana<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Banyak Bencana</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Banyaknya Bencana Menurut Jumlah Korban Tahun <?php echo $ex = $this->uri->segment(3);?> Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Banyak Bencana</a>
            </td>
            <td>
            <a class="btn btn-success" href="../grafikbanyakbencana/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a>
            </td>
            <td><div>
            </td></div>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; "   id="tampilDetailBanyakbencana">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align:center;width:1%;vertical-align:middle">No</th>                
                        <th rowspan="2" style="text-align:center;width:15%;vertical-align:middle">Kecamatan</th>
                        <th rowspan="2" style="width:8%;text-align:center;vertical-align:middle">Jumlah Bencana Alam</th>
                        <th colspan="3" style="width:8%;text-align:center;vertical-align:middle">Banyak Korban</th>
                         <th rowspan="2" style="width:10%;text-align:center;vertical-align:middle">Hancur</th>
                        <th rowspan="2" style="width:10%;text-align:center;vertical-align:middle">Rusak</th>
                        <th rowspan="2" style="width:15%;text-align:center;vertical-align:middle">Kerugian</th>
                        <th rowspan="2" style="width:5%;text-align:center;vertical-align:middle">Tahun</th>
                        <th rowspan="2" style="width:20%;text-align:center;vertical-align:middle">Aksi</th>
                    </tr>
                    <tr>
                        <th>Mati</th>
                        <th>Luka</th>
                        <th>Menderita</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $no = 0;
                foreach ($dataz->result_array() as $a) :
                        $no++;
                        $id = $a['id'];
                        $name = $a['nama_kecamatan'];
                        $jumlah_bencana=$a['jumlah_bencana'];
                        $mati=$a['mati'];
                        $luka=$a['luka'];
                        $menderita=$a['menderita'];
                        $hancur=$a['hancur'];
                        $rusak=$a['rusak'];
                        $kerugian=$a['kerugian'];
                        $periode=$a['periode'];
                         ?>
                         <tr>
                        <td><?php echo $no;?></td>
                        <td style="text-align:left;"><?php echo $name;?></td>
                        <td><?php echo $jumlah_bencana;?></td>
                        <td><?php echo $mati;?></td>
                        <td><?php echo $luka;?></td>
                        <td><?php echo $menderita;?></td>
                        <td><?php echo $hancur;?></td>
                        <td><?php echo $rusak;?></td>
                        <td><?php echo number_format($kerugian,2,".",",");?></td>
                        <td><?php echo $periode;?></td>
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>

                         
                <?php 
                         endforeach;
                         ?>
                </tbody>
                <tfoot>
                <th style="text-align:center; " colspan="2">Total</th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "></th>
                <th style="text-align:center; "colspan="2"></th>
                
                </tfoot>

        </table>
        
       <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Bencana</h3>
                    </div>
                    <?php echo form_open_multipart('banyakbencana/proses_input_detail_bencana/'.$this->uri->segment(3)) ?>

                    <div class="modal-body">
              
                    
                    <table>
                        <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                            <input name="periode" type="text" id="periode" value="<?php echo $this->uri->segment(3) ?>" class="form-control">
                           </td>
                        </tr>
                        <tr>
                            <td><label>Lokasi</label></td><td>:</td>
                            <td>
                                <select name="kecamatan" class="form-control">
                          <?php foreach ($datazx->result() as $row) {
                          ?>
                          <option value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
                          <?php
                          }
                          ?>
                          </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Bencana Alam</label></td><td>:</td>
                            <td><input name="jumlah" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Korban Meninggal</label></td><td>:</td>
                            <td><input name="mati" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Korban Luka</label></td><td>:</td>
                            <td><input name="luka" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Banyak Korban Menderita</label></td><td>:</td>
                            <td><input name="menderita" class="form-control" type="number" placeholder="Banyak Korban Menderita..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Hancur</label></td><td>:</td>
                            <td><input name="hancur" class="form-control" type="number" placeholder="Hancur..." style="width:335px;" required></td>
                           </tr>
                          <tr>
                            <td><label>Rusak</label></td><td>:</td>
                            <td><input name="rusak" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                         </tr>   
                            <tr>
                            <td><label>Kerugian (Juta Rp)</label></td><td>:</td>
                            <td><input name="rugi" class="form-control" type="number" placeholder="Jumlah Kerugian..." style="width:335px;" required></td>
                         </tr>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                         <input class="form-control" type="hidden" name="status" value="0" style="width:335px;" readonly>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
     <?php
                    $no=0;
                    foreach ($dataa->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $name=$a['kecamatan'];
                        $jumlah_bencana=$a['jumlah_bencana'];
                        $mati =$a['mati'];
                        $luka=$a['luka'];
                        $menderita=$a['menderita'];
                        $hancur=$a['hancur'];
                        $rusak=$a['rusak'];
                        $kerugian=$a['kerugian'];
                        $periode=$a['periode'];            
            ?>

    <div id="modalEdit<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Banyak Bencana</h3>
                    </div>
                    <?php echo form_open_multipart('banyakbencana/proses_edit_detail_bencana/'.$this->uri->segment(3)) ?>

                    <div class="modal-body">
                    <?php $nama = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $nama;?>" style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <input type="hidden" name="status" value="0"> 
                    <table>
                       <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $this->uri->segment(3);?>" placeholder="Tahun Periode Laporan..." style="width:335px;" readonly></td>
                        </tr>
                       <tr>
                            <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
                               <select name="kecamatan" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($datazx->result() as $key => $data){ ?>
                                <option value="<?=$data->id_kecamatan?>" <?=$data->id_kecamatan == $name ? "selected" : null?>><?=$data->nama_kecamatan?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Bencana Alam</label></td><td>:</td>
                            <td><input name="jumlah" value="<?php echo $jumlah_bencana; ?>" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Korban Meninggal</label></td><td>:</td>
                            <td><input name="mati" value="<?php echo $mati; ?>" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Banyak Korban Luka</label></td><td>:</td>
                            <td><input name="luka" value="<?php echo $luka; ?>" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Banyak Korban Menderita</label></td><td>:</td>
                            <td><input name="menderita" value="<?php echo $menderita; ?>" class="form-control" type="number" placeholder="Banyak Korban Menderita..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Hancur</label></td><td>:</td>
                            <td><input name="hancur" value="<?php echo $hancur; ?>" class="form-control" type="number" placeholder="Hancur..." style="width:335px;" required></td>
                           </tr>
                          <tr>
                            <td><label>Rusak</label></td><td>:</td>
                            <td><input name="rusak" value="<?php echo $rusak; ?>" class="form-control" type="number" placeholder="Banyak Korban Meninggal..." style="width:335px;" required></td>
                         </tr>   
                            <tr>
                            <td><label>Kerugian (Juta Rp)</label></td><td>:</td>
                            <td><input name="rugi" value="<?php echo $kerugian; ?>" class="form-control" type="number" placeholder="Jumlah Kerugian..." style="width:335px;" required></td>
                         </tr>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success" value="Update"></input>
                            
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
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
                <?php echo form_open_multipart('banyakbencana/proses_delete_detail_bencana/'.$this->uri->segment(3)) ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="kodeinput" type="hidden" value="<?php echo $id; ?>">
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
    </div>
     <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Banyakbencana'); ?>">Back</a>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
</html>
