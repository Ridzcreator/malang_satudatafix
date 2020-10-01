<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Perikanan Dan Kelautan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Produksi Ikan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Produksi Ikan Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data</a>
            </td>
             <td>
            <a class="btn btn-success" href="#modalgrafik2" data-toggle="modal" title="Add">Pilih Grafik Per Tahun</a>
            </td>
            <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik Perbandingan</a>
            </td>
             <td><a class="btn btn-danger" href="#modalCross" data-toggle="modal" >Tampil Report</a></td>
            <td><div>
            <select name="tahun" id="tahun" required>
            <option value="0000"> Pilih Tahun </option>
                <?php 
                foreach ($dataz->result_array() as $a){
                $tahun=$a['tahun'];
                ?><option value="<?php echo $tahun; ?>"> <?php echo $tahun; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>

        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%;  text-align:center" id="tampilproduksiikan">

                <thead>
                    <tr>
                        <th style="text-align:center;width:25px;">No</th>                          
                        <th style="text-align:center;text-align:center;width:50px;">Tahun</th>             
                        <th style="text-align:center;width:50px;">Jenis Ikan</th>
                        <th style="text-align:center;width:50px;">Jenis Air</th>
                        <th style="text-align:center;width:50px;">Jumlah Produksi</th>
                        <th style="text-align:center;width:50px;">Jumlah Nilai Produksi</th>
                        <th style="text-align:center;width:80px;text-align:center;">Aksi</th>
                    </tr>
                   
                </thead>
                <tbody>
                </tbody>
                <tfoot>
            <tr>
                <th style="text-align:center; border-color: black;" colspan="4">Total</th>
          <!--       <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th>
                <th style="text-align:right; border-color: black;"></th> -->
              
                 <th style="text-align:center; border-color: black;"></th>
                <th style="text-align:center; border-color: black;"></th>
                <th style="text-align:center; border-color: black;"></th>

                 
            
            </tr>
            </tfoot>
            </table>
            
             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $tahun=$a['tahun'];
                        $ji=$a['jenis_ikan'];
                        $ja=$a['jenis_air'];
                        $prod=$a['produksi'];
                        $nprod=$a['nilai_produksi'];
                        $penginput=$a['penginput'];
                       
                        
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Produksi Ikan</h3>
                </div>
                    <?php echo form_open_multipart('produksiikan/proses_edit_produksi_ikan') ?>

                        <div class="modal-body">
                           <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
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
                            if($tahun==$i){echo "selected";}
                            echo">$i</option>";
                            }
                            ?>
                            </select>
                            </td>
                        </tr>
                       <tr>
                            <td style="padding:  10px"> <label>Jenis Ikan</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jenis_ikan" class="form-control" value="<?php echo $ji;?>" style="width:335px;" required readonly></td>
                        </tr>
                        
                         <tr>
                            <td style="padding:  10px"> <label>Jenis Air</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jenis_air" class="form-control" value="<?php echo $ja;?>" style="width:335px;" required readonly autocomplete="off"></td>
                        </tr>

                        <tr>
                            <td style="padding:  10px"> <label>Jumlah Produksi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="produksi" class="form-control" value="<?php echo $prod;?>" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                         <tr>
                            <td style="padding:  10px"> <label>Jumlah Nilai Produksi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_produksi" class="form-control" value="<?php echo $nprod;?>" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                       
                        
                       
                        </table>     
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <input type="submit" class="btn btn-success pull-right" value="Save"></input> &nbsp &nbsp
                <?php echo form_close(); ?>
                </div>
           </div>
        </div>
    </div>
	

		<div id="modalgrafik2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Pilih Tahun Untuk Grafik</h3>
                    </div>
                    <?php echo form_open_multipart('produksiikan/tampil_grafik_produksi_ikan/') ?>
                    <div class="modal-body">           
                <table width="90%">
                    <tr>
                        <td style="padding:  10px"><label>Periode</label></td>
                        <td style="padding:  10px">:</td>
                        <td>
                        <select name="tahunx" id="tahunx" class="form-control">
                        <option value="0000"> Pilih Tahun </option>
                            <?php 
                            foreach ($dataz->result_array() as $a){
                            $periode=$a['tahun'];
                            ?>
                            <option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                                    </select>
                                    </td>
                                </tr>
                </table>
                    </div>
                         <div>
                           <input style="margin-left: 485px;margin-bottom: 10px;margin-top: 5px" type="submit" class="btn btn-success" name="add" value="Lihat Grafik"> &nbsp &nbsp 
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            <!-- /.box-body -->
        </div>
   
                    
     <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Produksi Ikan</h3>
                    </div>
                    <?php echo form_open_multipart('produksiikan/proses_input_produksi_ikan') ?>

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
                            <td style="padding:  10px"> <label>Jenis Ikan</label></td><td>:</td>
                                <td style="padding: 10px"> <select name="jenis_ikan" id="jenis_ikan" class="form-control" style="width:335px;" required autocomplete="off">
                                   <?php foreach ($datas->result() as $row) {
                                    ?>
                                <option value="<?php echo $row->jenis_ikan ?>"><?php echo $row->jenis_ikan ?></option>
                                <?php
                                     }
                                ?>
                                </select>
                                </td>
                                </tr>

                                <tr>
                                <td style="padding:10px"> <label class="control-label col-xs-5" >Jenis Air</label></td><td width=20> : </td>
                                <td style="padding:10px;"> <select name="jenis_air" id="jenis_air" class="form-control" value="jenis_air" style="width: 335px;" required autocomplete="off">
                                   
                                </select>
                                </td>
                                </tr>
                                

                             <tr>
                            <td style="padding:  10px"><label>Jumlah Produksi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="produksi" class="form-control" type="text" placeholder="Massukan Jumlah Produksi" style="width:335px;" required autocomplete="off"></td>
                        </tr>
                             <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Produksi</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_produksi" class="form-control" type="text" placeholder="Massukan Jumlah Nilai Produksi" style="width:335px;" required autocomplete="off"></td>
                        </tr>

                      
                            </table>            
                        </div>
                     
                        </tr>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </table>
                    </div>
                    <div class="modal-footer">
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
       <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Produksi ikan</h3>
                    </div>
                    <?php echo form_open_multipart('produksiikan/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table width="90%">
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="1">Jumlah Produksi</option>
                            <option value="2">Jumlah Nilai Produksi</option>
                        </tr>
                        <tr>
                            <td><label>Model Grafik</label></td><td>:</td>
                            <td>
                            <select name="grafikp" id="grafikp" class="form-control" required>
                            <option disabled selected value>Pilih Model Grafik</option>
                            <option value="bar">Grafik Bar</option>]
                            <option value="line">Grafik Line</option>
                            </select></td>
                        </tr>
                        <tr>
                        <td><label>Tahun Grafik</label></td><td>:</td>
                            <td>
                            <select name="tahun1" id="tahun1" required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($dataz->result_array() as $a){
                            $periode=$a['tahun'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($dataz->result_array() as $a){
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

    <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                                    </div>
                                    <?php echo form_open_multipart(base_url('produksiikan/tampil_crosstab_ikan')) ?>
                                    <div class="modal-body">
                                        <table>
                                        <tr>
                                        <td><label>Pilih Data</label></td><td>:</td>
                                        <td>
                                        <select name="datap" id="datap" class="form-control" required>
                                        <option disabled selected value>Pilih Data</option>         
                                        <option value="1">Jumlah Produksi</option>
                                        <option value="2">Jumlah Nilai Produksi</option>
                                        </tr>
                                        <tr>
                                        <td><label>Model Grafik</label></td><td>:</td>
                                        <td>
                                        <select name="air" id="air" class="form-control" required>
                                        <option disabled selected value>Pilih Jenis Air</option>
                                        <option value="Air Tawar">Air Tawar</option>]
                                        <option value="Air Laut">Air Laut</option>
                                        </select></td>
                                        </tr>
                        
                                            <tr>
                                                <td><label>Pilih Tahun Report</label></td><td>:</td>
                                                <td>
                                                    <select name="tahun1" id="tahun1" required>
                                                        <option disabled selected value> Pilih Tahun </option>

                                                        <?php 
                                                        foreach ($dataz->result_array() as $a){
                                                            $periode=$a['tahun'];
                                                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                                                            <?php } ?>
                                                    </select> - 
                                                    <select name="tahun2" id="tahun2"  required>
                                                        <option disabled selected value> Pilih Tahun </option>
                                                            <?php 
                                                            foreach ($dataz->result_array() as $a){
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


	<div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
						<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Produksi Ikan</h3>
                        </div>
                        <?php echo form_open_multipart('produksiikan/proses_hapus_produksi_ikan') ?>
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
</div>
</div>
    </section>
    <!-- /.content -->
  
</div>
</body>