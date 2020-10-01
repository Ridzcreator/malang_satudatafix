<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Sarana<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Sarana</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Sarana Dan Prasarana Keamanan dan Ketertiban Umum Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Sarana</a>
            </td>
            <td>
            <a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Grafik">Pilih Grafik</a>
            </td>
            <td><div>
            <select name="tahun" id="tahun" required>
            <option value="0000"> Pilih Tahun </option>
                <?php 
                foreach ($datax->result_array() as $a){
                $periode=$a['periode'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center"  id="tampilSarana">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;vertical-align:middle">No</th>                
                        <th style="text-align:center;width:8%;vertical-align:middle">Aparat PP</th>
                        <th style="width:8%;text-align:center;vertical-align:middle">Aparat Linmas</th>
                        <th style="width:10%;text-align:center;vertical-align:middle">Petugas Satpol PP</th>
                        <th style="width:5%;text-align:center;vertical-align:middle">PPM</th>
                        <th style="width:10%;text-align:center;vertical-align:middle">Pos Keamanan</th>
                        <th style="width:5%;text-align:center;vertical-align:middle">Pos Kamling</th>
                        <th style="width:10%;text-align:center;vertical-align:middle">KO Roda 2</th>
                        <th style="width:10%;text-align:center;vertical-align:middle">KO Roda 4</th>
                        <th style="width:5%;text-align:center;vertical-align:middle">Tahun</th>
                        <th style="width:25%;text-align:center;vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
        
 
             <?php
                    $no=0;
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $id = $a['id'];
                        $penginput=$a['penginput'];
                        $periode=$a['periode'];
                        $aparatpp=$a['aparatpp'];
                        $aparatlinmas=$a['aparat_linmas'];
                        $petugas_satpol=$a['petugas_satpol'];
                        $petugaspp=$a['petugas_pp'];
                        $poskeamanan=$a['pos_keamanan'];
                        $poskamling=$a['pos_kamling'];
                        $roda2=$a['roda2'];
                        $roda4=$a['roda4'];                     
            ?>

    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Sarana</h3>
                    </div>
                    <?php echo form_open_multipart('Sarana/proses_edit_sarana') ?>

                    <div class="modal-body">
                    <?php $name = $this->session->userdata('user');?>
                    <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    <input class="form-control" type="text" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <input class="form-control" type="hidden" name="status" value="0" placeholder="Id..." style="width:335px;" readonly>
                    <table>
                       <tr>
                            <td><label>Periode</label></td><td>:</td>
                            <td><input name="periode" class="form-control" type="number" value="<?php echo $periode;?>" placeholder="Tahun Periode Laporan..." style="width:335px;" required></td>
                        </tr>
                       <tr>
                            <td><label>Aparat Pamong Praja</label></td><td>:</td>
                            <td><input name="aparatpp" class="form-control" type="number"  value="<?php echo $aparatpp;?>" placeholder="Aparat Pamong Praja..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Aparat Linmas</label></td><td>:</td>
                            <td><input name="aparatlinmas" class="form-control" type="number"  value="<?php echo $aparatlinmas;?>" placeholder="Aparat Linmas..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Petugas Patroli Satpol PP</label></td><td>:</td>
                            <td><input name="ppspp" class="form-control" type="number"  value="<?php echo $petugas_satpol;?>" placeholder="Petugas Satpol PP..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Petugas Perlindungan Masyarakat</label></td><td>:</td>
                            <td><input name="ppm" class="form-control" type="number"  value="<?php echo $petugaspp;?>" placeholder="Petugas Perlindungan..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Pos Keamanan</label></td><td>:</td>
                            <td><input name="pk" class="form-control" type="number"  value="<?php echo $poskeamanan;?>" placeholder="Pos Keamanan..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Pos Kamling</label></td><td>:</td>
                            <td><input name="pkml" class="form-control" type="number"  value="<?php echo $poskamling;?>" placeholder="Pos Kamling..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Kendaraan Operasional Roda 2</label></td><td>:</td>
                            <td><input name="roda2" class="form-control" type="number"  value="<?php echo $roda2;?>" placeholder="Kendaraan Roda 2..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Kendaraan Operasional Roda 4</label></td><td>:</td>
                            <td><input name="roda4" class="form-control" type="number"  value="<?php echo $roda4;?>" placeholder="Kendaraan Roda 4..." style="width:335px;" required></td>
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
                <?php echo form_open_multipart('Sarana/proses_delete_sarana') ?>
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

    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Sarana</h3>
                    </div>
                    <?php echo form_open_multipart('sarana/proses_input_sarana') ?>

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
                            <td><label>Aparat Pamong Praja</label></td><td>:</td>
                            <td><input name="aparatpp" class="form-control" type="number" placeholder="Aparat Pamong Praja..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Aparat Linmas</label></td><td>:</td>
                            <td><input name="aparatlinmas" class="form-control" type="number" placeholder="Aparat Linmas..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Petugas Patroli Satpol PP</label></td><td>:</td>
                            <td><input name="ppspp" class="form-control" type="number" placeholder="Petugas Satpol PP..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Petugas Perlindungan Masyarakat</label></td><td>:</td>
                            <td><input name="ppm" class="form-control" type="number" placeholder="Petugas Perlindungan..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Pos Keamanan</label></td><td>:</td>
                            <td><input name="pk" class="form-control" type="number" placeholder="Pos Keamanan..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Pos Kamling</label></td><td>:</td>
                            <td><input name="pkml" class="form-control" type="number" placeholder="Pos Kamling..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Kendaraan Operasional Roda 2</label></td><td>:</td>
                            <td><input name="roda2" class="form-control" type="number" placeholder="Kendaraan Roda 2..." style="width:335px;" required></td>
                        </tr>
                         <tr>
                            <td><label>Kendaraan Operasional Roda 4</label></td><td>:</td>
                            <td><input name="roda4" class="form-control" type="number" placeholder="Kendaraan Roda 4..." style="width:335px;" required></td>
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
    </div>
    <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data Unjukrasa</h3>
                    </div>
                    <?php echo form_open_multipart('Sarana/grafik_perbandingan') ?>
                    <div class="modal-body">
                    <table>
                        <tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
                            <select name="datap" id="datap" class="form-control" required>
                            <option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
                            <option value="all">Semua Data</option>
                            <option value="aparatpp">Aparat Pamong Praja</option>
                            <option value="aparatlinmas">Aparat Linmas</option>
                            <option value="ppspp">Petugas Satpol PP</option>
                            <option value="ppm">Petugas Perlindungan Masyarakat</option>
                            <option value="poskeamanan">Pos Keamanan</option>
                            <option value="poskamling">Pos Kamling</option>
                            <option value="roda2">Kendaraan Operasional Roda 2</option>
                            <option value="roda4">Kendaraan Operasional Roda 4</option>
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
                            foreach ($datax->result_array() as $a){
                            $periode=$a['periode'];
                            ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                            <?php } ?>
                            </select> - 
                            <select name="tahun2" id="tahun2"  required>
                            <option disabled selected value> Pilih Tahun </option>
                            <?php 
                            foreach ($datax->result_array() as $a){
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
    <table width=100%>
    <tr>
    <td></td>
    <td>
    <div class="callout callout-info pull-middle" style="position:relative;text-align:left;">
                    <p>Aparat PP           : Aparat Pamong Praja.<p>
                    <p>Aparat Linmas       : Aparat Linmas.<p>
                    <p>Petugas Satpol PP   : Petugas Patroli Satpol PP.<p>
                    <p>PPM                 : Petugas Perlindungan Masyarakat.<p>
                    <p>KO Roda 2           : Kendaraan Operasional Roda 2.<p>
                    <p>KO Roda 4           : Kendaraan Operasional Roda 4.<p>

    </div>
    </td><td>
        
    </td>
    </tr>
    </table>

</div>
</body>

  
<!-- <script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilSarana').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', className: 'button-data'},
        { extend: 'pdf', className: 'button-data'},
        { extend: 'print', className: 'button-data',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'button-data'},
        ],
         "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
         "ajax": 'Sarana/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Sarana/get?tahun='+end ).load();
    });
    
} );
</script> -->

</html>
