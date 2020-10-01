<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Pemberangkatan Penumpang Kereta Api<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Penumpang</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Pemberangkatan Penumpang Kereta Api Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Penumpang Kereta Api</a>
            </td>
          
            <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
            </td>
            <td><div>
            <select name="tahun" id="tahun" required>
                <option value="0000"> Pilih Tahun </option>
                <?php
                foreach ($datasx->result_array() as $a){
                $periode=$a['periode'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px;  text-align:center" id="tampil_banyak_penumpang">
                <thead>
                    <tr>
                        
                        <th style="vertical-align:middle;width:25px;  text-align:center;" rowspan="2">No</th>
                      <!--   <th style="vertical-align:middle; width:100px;   text-align:center; " rowspan="2" >Kecamatan</th> -->
                           <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Tahun</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;" colspan="5">Jumlah Penumpang</th>
                   
                        <th style="vertical-align:middle;width:100px;  text-align:center;" rowspan="2">Jumlah</th>
                      
                        <th style="vertical-align:middle;width:150px;text-align:center;  text-align:center;" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th style="width:100px;  text-align:center;" >Stasiun Lawang</th>
                        <th style="width:100px;  text-align:center;" >Stasiun Singosari</th>
                        <th style="width:100px;  text-align:center;" >Stasiun Kepanjen</th>
                        <th style="width:100px;  text-align:center;" >Stasiun Ngebruk</th>
                        <th style="width:100px;  text-align:center;" >Stasiun Sumberpucung</th>

                    </tr>
                </thead>
                <tbody>
        
                </tbody>
                <tfoot>
                <th style="vertical-align:middle;width:100px;  text-align:center;" colspan="2">Jumlah</th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>
                <th style="vertical-align:middle;width:100px;  text-align:center;" ></th>


                </tfoot>
        </table>
        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Pemberangkatan Penumpang Angkutan Kereta Api </h3>
                    </div>
                    <?php echo form_open_multipart('Penumpangangkutan/proses_input_penumpang') ?>

                    <div class="modal-body">
                    <div class="modal-body">
                    
                    <table>
                        <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                            <select name="periode" id="periode" class="form-control">
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
                            </select></td>
                        </tr>
                        <tr>
                            <td><label>Bulan</label></td><td>:</td>
                            <td>
                              <select name="bulan" class="form-control">
                          <?php foreach ($datax->result() as $row) {
                          ?>
                          <option value="<?php echo $row->kode; ?>"><?php echo $row->keterangan; ?></option>
                          <?php
                          }
                          ?>
                          </select>
                             </td>
                        </tr>
                        
                        <tr>
                            <td><label>Stasiun Lawang</label></td><td>:</td>
                            <td><input name="lawang" class="form-control" type="number" placeholder="Stasiun Lawang..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Singosari</label></td><td>:</td>
                            <td><input name="singosari" class="form-control" type="number" placeholder="Stasiun Singosari..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Kepanjen</label></td><td>:</td>
                            <td><input name="kepanjen" class="form-control" type="number" placeholder="Stasiun Kepanjen..." style="width:335px;" required></td>
                        </tr> 
                         <tr>
                            <td><label>Stasiun Ngebruk</label></td><td>:</td>
                            <td><input name="ngebruk" class="form-control" type="number" placeholder="Stasiun Ngebruk..." style="width:335px;" required></td>
                        </tr> 
                        <tr>
                            <td><label>Stasiun Sumberpucung</label></td><td>:</td>
                            <td><input name="sumberpucung" class="form-control" type="number" placeholder="Stasiun Sumberpucung..." style="width:335px;" required></td>
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
    </div>

    <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Penumpang</h3>
                    </div>
                    <?php echo form_open_multipart('Penumpangangkutan/grafik_perbandinganx') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="lawang">Data Stasiun Lawang</option>
                            <option value="singosari">Data Stasiun Singosari</option>
                            <option value="kepanjen">Data Stasiun Kepanjen</option>
                            <option value="ngebruk">Data Stasiun Ngebruk</option>
                            <option value="sumberpucung">Data Stasiun Sumberpucung</option>
                            
                          
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Model Grafik</label></td><td>:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>
                            <option value="line">Grafik Line</option>
                            
                            </select></td></tr>
                            <tr>
                            <td><label>Pilih Tahun Grafik</label></td><td>:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datasx->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datasx->result_array() as $a){
                            $periode=$a['periode'];
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
    
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
