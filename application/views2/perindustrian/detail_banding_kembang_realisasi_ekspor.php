<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
            <b>PERBANDINGAN DAN PERKEMBANGAN REALISASI EKSPOR<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
             <li><a href="<?= base_url('Banding_kembang_realisasi_ekspor'); ?>">Realisasi Ekspor</a></li>
            <li class="active">Detail Realisasi Ekspor</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Perbandingan dan Perkembangan Realisasi Ekspor 
            <?php echo $ex = $this->uri->segment(3);?></h3>          
        </div>
		<div class="box-body">
		<table>
		<tr>
			<td>
						<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data <?php echo $ex = $this->uri->segment(3);?></a>
                         <a class="btn btn-success" href="../grafik_banding_kembang_realisasi_ekspor/<?php echo $ex = $this->uri->segment(3);?>">Lihat Grafik</a><br><br>
            </td>
		</tr>
		</table>
                <table class="table table-bordered table-striped compact cell-border  display" style="font-size:15px; width:100%;  text-align:center"  id="tampildetail">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle;">Komoditi</th>
                        <th style="text-align:center;width:4%;vertical-align:middle;">Volum</th>
                        <th style="text-align:center;width:4%;vertical-align:middle;">Nilai (US$)</th>
                        <th style="text-align:center;width:4%;vertical-align:middle;">% Perkomoditi thd Total Ekspor</th>
                        <th style="text-align:center;width:4%;vertical-align:middle;">Kenaikan/Penurunan US$</th>
                        <th style="text-align:center;width:4%;vertical-align:middle;">% Kenaikan/Penurunan Nilai US$</th>
                        <th style="text-align:center;width:4%;vertical-align:middle;">Tahun</th>
                        <th style="text-align:center;width:10%;vertical-align:middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datab->result_array() as $a) {
                        $id = $a['id'];
                        $komoditi=$a['komoditi'];
                        $volum=number_format($a['volum'],2,".",",");
                        $nilai=number_format($a['nilai'],2,".",",");
                        $total_ekspor=number_format($a['total_ekspor'],2,".",",");
                        $naik_turun=number_format($a['naik_turun'],2,".",",");
                        $naik_turun_nilai=number_format($a['naik_turun_nilai'],2,".",",");
                        $tahun=$a['tahun'];
                   
                    ?>
                        <tr>
                        <td><?php echo $komoditi; ?></td>
                        <td><?php echo $volum; ?></td>
                        <td><?php echo $nilai; ?></td>
                        <td><?php echo $total_ekspor; ?></td>
                        <td><?php echo $naik_turun; ?></td>
                        <td><?php echo $naik_turun_nilai; ?></td>
                        <td><?php echo $tahun; ?></td>
                        
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
        </table>

         <?php
                    foreach ($datab->result_array() as $a) {
                        $id = $a['id'];
                        $komoditi=$a['komoditi'];
                        $volum=$a['volum'];
                        $nilai=$a['nilai'];
                        $total_ekspor=$a['total_ekspor'];
                        $naik_turun=$a['naik_turun'];
                        $naik_turun_nilai=$a['naik_turun_nilai'];
                        $tahun=$a['tahun'];
                        $penginput=$a['penginput'];
                        $timestamp=$a['timestamp'];
                        $status=$a['status'];
                   
                    ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Realisasi Ekspor</h3>
                    </div>
                    <?php echo form_open_multipart('Banding_kembang_realisasi_ekspor/proses_edit_detail_banding_kembang_realisasi_ekspor/'.$tahun) ?>

                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly hidden>
                    <table width="80%">
                        <tr>
                    <td style="padding:  10px"><label>Tahun</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" class="form-control" name="tahun"  value="<?php echo $tahun;?>" placeholder="Tahun" autocomplete="off" readonly></td>
                        </tr>
                        <tr>
                    <td style="padding:  10px"><label>Komoditi</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="text" class="form-control" name="komoditi"  value="<?php echo $komoditi;?>" placeholder="Komoditi" autocomplete="off" readonly></td>
                        </tr>
                        <tr>
                    <td style="padding:  10px"><label>Volum</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" min="0" step="0.01" class="form-control" name="volum"  value="<?php echo $volum;?>" placeholder="Volum" autocomplete="off"></td>
                        </tr>
                        <tr>
                    <td style="padding:  10px"><label>Nilai(US$)</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" min="0" step="0.01" class="form-control" name="nilai"  value="<?php echo $nilai;?>" placeholder="Nilai(US$)" autocomplete="off"></td>
                        </tr>
                        <tr>
                    <td style="padding:  10px"><label>Total Ekspor</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" min="0" step="0.01" class="form-control" name="total_ekspor"  value="<?php echo $total_ekspor;?>" placeholder="Total Ekspor" autocomplete="off"></td>
                        </tr>
                        <tr>
                    <td style="padding:  10px"><label>Kenaikan/Penuruna US$</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" min="0" step="0.01" class="form-control" name="naik_turun"  value="<?php echo $naik_turun;?>" placeholder="Kenaikan/Penuruna US$" autocomplete="off"></td>
                        </tr>
                        <tr>
                    <td style="padding:  10px"><label>Kenaikan/Penurunan Nilai US$</label></td>
                    <td style="padding:  10px">:</td>
                    <td><input type="number" min="0" step="0.01" class="form-control" name="naik_turun_nilai"  value="<?php echo $naik_turun_nilai;?>" placeholder="Kenaikan/Penurunan Nilai US$" autocomplete="off"></td>
                        </tr>
                        
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </table>
                    </div>
                    <div class="modal-footer">
                    
                            <input type="submit" class="btn btn-success pull-right" value="Update"></input>
                            
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
                <?php echo form_open_multipart('Banding_kembang_realisasi_ekspor/proses_hapus_banding_kembang_realisasi_ekspor/'.$tahun) ?>
            <div class="modal-body">
                <p>Yakin mau menghapus data ini..?</p>
                <input name="id" type="hidden" value="<?php echo $id; ?>">
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
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Realisasi Ekspor</h3>
                    </div>
                    <?php echo form_open_multipart('Banding_kembang_realisasi_ekspor/proses_input_detail_banding_kembang_realisasi_ekspor/'.$ex) ?>

                    <div class="modal-body">
					<table width="80%">
						<tr>
               				<td style="padding:  10px"><label>Komoditi</label></td>
               				<td style="padding:  10px">:</td>
               				<td> 
                		<select name="komoditi" class="form-control">
                   				<?php foreach ($datas->result() as $a) {
                    				?>
                    	<option value="<?php echo $a->nama_komoditi ?>"><?php echo $a->nama_komoditi ?></option>
                    		<?php
                				}
                				?>
                		</select>
               				</td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Volum</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="volum" placeholder="Volum" autocomplete="off"></td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Nilai (US$)</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="nilai" placeholder="Nilai" autocomplete="off"></td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Total Ekspor</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="total_ekspor" placeholder="Total Ekspor" autocomplete="off"></td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Kenaikan/Penurunan (US$)</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="naik_turun" placeholder="Kenaikan/Penurunan" autocomplete="off"></td>
                		</tr>
						<tr>
                    		<td style="padding:  10px"><label>Kenaikan/Penurunan Nilai</label></td>
                    		<td style="padding:  10px">:</td>
                    		<td><input type="number" min="0" step="0.01" class="form-control" name="naik_turun_nilai" placeholder="Kenaikan/Penurunan Nilai" autocomplete="off"></td>
                		</tr>
						<tr>
                        <td style="padding:  10px"><label>Tahun</label></td>
                        <td style="padding:  10px">:</td>
                        <td><input type="number" class="form-control" name="tahun" placeholder="Tahun.." value="<?php echo $ex = $this->uri->segment(3);?>" readonly></td>
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

    <a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('Banding_kembang_realisasi_ekspor'); ?>">Back</a>

	</div><!-- /.box body -->
    </section>
    <!-- /.content -->

</div>	
</body><!-- /.body -->