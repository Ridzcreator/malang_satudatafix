<body>
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
    	<!-- <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" style="margin-bottom:10px">Input Data</a> -->
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
            <a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a>
        </td>
        <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a>
        </td>
            <td width="15"> </td>
        
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
        </table>
            <table  class="table table-striped" id="tampilawaltower" style="text-align: center;font-size: 15px; width: 100%;">
		      <thead>
                    <th style="text-align:center; vertical-align: middle;">No</th>
                    <th style="text-align:center; vertical-align: middle;">Tahun</th>
                    <th style="text-align:center; vertical-align: middle;">Jumlah Tower</th>
                    <th style="width:130px; text-align:center; vertical-align: middle;">Aksi</th>
		      </thead>
		      <tbody>
		                        <!-- ADA DI CONTROLLER -->
		      </tbody>
		  </table>

<div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
            </div>
                <?php echo form_open_multipart('C_twr/grafik_perbandingan') ?>
                <div class="modal-body">
                <table width="90%">
                    <tr>
                        <td><label>Pilih Data</label></td><td>:</td>
                        <td>
                        <select name="datap" id="datap" class="form-control" required>
                        <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                        <option value="all">Semua Data</option>
                        <option value="1">Jumlah Tower</option>
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

    <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('C_twr/tampil_crosstab_tower')) ?>
                    <div class="modal-body">
                    <table>
  
                        <tr>
                        <td><label>Pilih Tahun Report</label></td><td>:</td>
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
                    
                            <input type="submit" class="btn btn-success pull-right" value="Lihat Crosstab"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

					<!-- Modal Tambah -->
<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Tambah Data Tower</h3>
				</div>
                    <?php echo form_open_multipart('C_twr/proses_input_awal_tower') ?>
            <div class="modal-body">
				<input class="form-control" type="hidden" name="id" readonly>
            <table>                               
                <tr>
                    <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                    <td style="padding:  10px">
                    <select name="tahun" id="tahun" class="form-control" style="width: 335px">
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
                    <td style="padding:  10px"><label>Kecamatan</label></td><td>:</td>
                    <td style="padding:  10px">
                    <select name="kecamatan" id="kecamatan" class="form-control" style="width:335px;" required>
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
                    <td style="padding:  10px"><label>Jumlah Tower</label></td><td>:</td>
                    <td style="padding:  10px"><input name="jml_tower" class="form-control" type="text" placeholder="Banyak Tower" autocomplete="off" style="width:335px;" required></td>
                </tr>
                    <?php $name=$this->session->userdata('user'); ?>
					<input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
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


		            </div>
	         	</div>
    <!-- /.box-body -->
<!-- /.box -->
		
	</section>
<!-- /.content -->
</div>
</body>
