<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Kelompok Ekonomi<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Lembaga</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Kelompok Ekonomi di Kabupaten Malang Tahun <?php echo $ex = $this->uri->segment(3);?></h3>
        </div>
        <div class="box-body">
            <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalInput" data-toggle="modal" title="Add">Tambah Data Tahun <?php echo $ex = $this->uri->segment(3);?></a>
            </td>
            <td>
            <a class="btn btn-danger" href="#modalCross" data-toggle="modal" title="Add">Tampil Report</a>
            </td>
            <td>
                <?php
                $periodei = $this->uri->segment(3);
                
                ?>
             <a class="btn btn-success" href="<?php echo base_url('KelompokEkonomi/grafiklembaga/'.$periodei); ?>">Tampil Grafik</a>
            </td>
        </tr>
      
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px;   text-align:center" id="detail_kelompok">
                <thead>
                    <tr>
						
                        <th style="vertical-align:middle;width:25px;   text-align:center"; >No</th>
                        <th style="vertical-align:middle; width:100px;   text-align:center;">Kecamatan</th>
                        <th style="vertical-align:middle; width:100px;   text-align:center;">Desa</th>
                        <th style="vertical-align:middle;width:100px;  text-align:center;">Jumlah</th>
                         <th style="vertical-align:middle;width:100px;  text-align:center;">Tahun</th>
                        <th style="vertical-align:middle;width:150px;text-align:center;  text-align:center;" >Aksi</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                    $no=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id_lembaga'];
                        $nama_kecamatan=$a['nama_kecamatan'];
                        $nama_desa=$a['nama_desa'];
                        $jumlah=$a['jumlah'];
                        $tahun=$a['periode'];
                    ?>  
                        <tr>
                        <td><?php echo number_format($no,0,",",".");?></td>
                        <td style="text-align:center;"><?php echo $nama_kecamatan;?></td>
                        <td style="text-align:center;"><?php echo $nama_desa; ?></td>
                        <td style="text-align:center;"><?php echo $jumlah;?></td>
                        <td style="text-align:center;"><?php echo $tahun;?></td>
                        <td>
                        <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id; ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a> | 
                        <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id; ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                        </tr>
                        
                        
                    <?php } ?>
                </tbody>
        </table>
	 <div id="modalInput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Kelompok Ekonomi</h3>
                    </div>

                    <?php echo form_open_multipart('KelompokEkonomi/proses_input_detail_lembaga/'.$this->uri->segment(3)) ?>

                    <div class="modal-body">
                    <div class="modal-body">
                    
                    <table width="90%">
                        <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td>
                            <input type="text" name="periode" class="form-control" value="<?php echo $tahun; ?>" required readonly>
                            </td>
                        </tr>
                         <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>
                                <select name="kecamatan_id" class="form-control" id="kecamatan_id"  onChange="tampilDesa()" required>
                                <option value="">Pilih Kecamatan</option>
          <?php foreach ($kecamatan->result() as $row) {
          ?>
          <option value="<?php echo $row->id_kecamatan; ?>"><?php echo $row->nama_kecamatan; ?></option>
          <?php
          }
          ?>
          </select>
                        </td>
                        </tr>
                             <tr>
                            <td><label>Desa</label></td><td>:</td>
                            <td>
                                  <select name="kelurahan_id" class="form-control" id="kelurahan_id" required>
                                <option value="Pilih Desa">- Pilih Desa -</option>
</select>
                        </td>
                        </tr>
                         <tr>
                            <td><label>Jumlah</label></td><td>:</td>
                            <td>
                               <input type="number" name="jumlah" class="form-control" placeholder="Input Jumlah ...">
                             </td>
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


             <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id_lembaga'];
                        $desa_id=$a['desa'];
                        $kecamatan_id=$a['desa'];
                        $nama_kecamatan=$a['nama_kecamatan'];
                        $nama_desa=$a['nama_desa'];
                        $jumlah=$a['jumlah'];
                        $periode=$a['periode'];
                    ?>


                       <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Kelompok Ekonomi</h3>
                    </div>
                    <?php echo form_open_multipart('KelompokEkonomi/proses_edit_detail_lembaga/'.$this->uri->segment(3)) ?>

                    <div class="modal-body">
                    <input class="form-control" id="id" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <table>
                    <tr>
                            <td width=250px><label>Periode</label></td><td width=20>:</td>
                            <td><input name="periode" class="form-control" type="text" value="<?php echo $periode;?>" style="width:335px;" ></td>
                        </tr>
                        <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>

                        <input type="text" name="kecamatan" class="form-control" value="<?php echo $nama_kecamatan; ?>" readonly>
           </td>
                        </tr>
                        <tr>
                            <td><label>Desa</label></td><td>:</td>
                            <td>

          <input type="text" name="desa" class="form-control" value="<?php echo $nama_desa; ?>" readonly>
 </td>
                        </tr>
                        
                        <tr>
                            <td width=250px><label>Jumlah</label></td><td width=20>:</td>
                            <td><input name="jumlah" class="form-control" type="number" value="<?php echo $jumlah;?>" style="width:335px;" required></td>
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
                <?php echo form_open_multipart('KelompokEkonomi/proses_delete_detail_lembaga/'.$this->uri->segment(3)) ?>
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
 
<a class="btn btn-s btn-primary" style=" margin-left: 1em; margin-top: 1em; margin-right: 1em; margin-bottom: 0.5em;display:inline-block;" href="<?= base_url('KelompokEkonomi'); ?>">Back</a>

        <div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan Report</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('KelompokEkonomi/tampil_crosstab_ekonomi')) ?>
                    <div class="modal-body">
                    <table>
  
                        <tr>
                        <td><label>Pilih Tahun Report</label></td><td>:</td>
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
                    
                            <input type="submit" class="btn btn-success pull-right" value="Lihat Crosstab"></input>
                            
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
 </div><!-- /.box -->
    </section>
    <!-- /.content -->
    </div>
</body><!-- /.body -->

<style>
p {
    text-align:left;
    text-size:15px;
}
</style>
