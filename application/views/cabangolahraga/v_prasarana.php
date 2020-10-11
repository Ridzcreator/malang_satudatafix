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
    	<!-- <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" style="margin-bottom:10px">Input Data</a> -->
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
		            <table  class="table table-striped" id="tampilprasarana" width="100%" style="text-align:center">
		                <thead>
		                    		<th style="text-align:center; vertical-align: middle;">No</th>
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
                <?php echo form_open_multipart('C_prasarana/grafik_perbandingan') ?>
                <div class="modal-body">
                <table width="90%">
                    <tr>
                        <td><label>Pilih Data</label></td><td>:</td>
                        <td>
                        <select name="datap" id="datap" class="form-control" required>
                        <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                        <option value="all">Semua Data</option>
                        <option value="1">Jumlah Stadion</option>
                        <option value="2">Jumlah Sepak Bola</option>
                        <option value="3">Jumlah Bola Voli</option>
                        <option value="4">Jumlah Bola Basket</option>
                        <option value="5">Jumlah Tenis</option>
                        <option value="6">Jumlah Bulu Tangkis</option>
                        <option value="7">Jumlah Futsal</option>
                        <option value="8">Jumlah Gor</option>
                        <option value="9">Jumlah Aula</option>
                        <option value="10">Jumlah Kolam Renang</option>
                        </select></td>
                        </tr>
                        <tr>
                        <td><label>Model Grafik</label></td><td>:</td>
                        <td>
                        <select name="grafikp" id="grafikp" class="form-control" required>
                        <option disabled selected value>Pilih Model Grafik</option>
                        <option value="bar">Grafik Bar</option>
                        <option value="line">Grafik Line</option>
                        <option value="area">Grafik Area</option>
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

					<!-- Modal Tambah -->
<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title" id="myModalLabel">Tambah Data Prasarana</h3>
		</div>
            <?php echo form_open_multipart('C_prasarana/proses_input_semua_prasarana') ?>
        <div class="modal-body">
		  <input class="form-control" type="hidden" name="id" readonly>
        <div class="form-group">
        <table width="90%">
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
                            <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                            <td style="padding:  10px"><select name="kecamatan" id="kecamatan" class="form-control" required onChange="tampilDesa()">
                                        <?php foreach ($datas->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->nama_kecamatan ?>"><?php echo $row->nama_kecamatan ?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select></td>
                        </tr>
                        <tr>
				<td style="padding:  10px"><label >Desa</label></td>
					<td>:</td>
					<td style="padding:  10px">
						<select name="desa" class="form-control" id="desa">
                            <option value="Pilih Desa">- Pilih Desa -</option>
                        </select>
					</td>
			    </tr>
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
                            <td style="padding:  10px"><input name="aula" class="form-control" type="text" placeholder="Banyak Aula" ;" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off" required></td>
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
