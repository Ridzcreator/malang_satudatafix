<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            KEPEMUDAAN & OLAHRAGA
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Atlet & Pelatih Berprestasi</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Jumlah Prasarana Olahraga di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">ITambah Data</a>
        <a class="btn btn-primary" href="#" data-toggle="modal" title="Add">Lihat Grafik</a>
        </td><td width="15"> </td>
        
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
         <table class="table table-bordered table-striped" style="font-size:11px;" id="tampilprasarana">
              <thead>
                    <tr>
                        <th style="text-align:center; vertical-align: middle;">No</th>
                        <th style="text-align:center; vertical-align: middle;">Kecamatan</th>
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
                        <th style="text-align:center; vertical-align: middle;">Tahun</th>
                        <th style="text-align:center; vertical-align: middle;">Jumlah</th>
                        <th style="width:130px; text-align:center; vertical-align: middle;">Aksi</th>
                    </tr>   
                </thead>
                <tbody>
                
                </tbody>
            </table>

                <?php
                foreach ($data->result_array() as $a) {
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
                    <?php echo form_open_multipart('C_prasarana/proses_edit_prasarana') ?>
                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                            <input class="form-control" type="hidden" name="tahun" value="<?php echo $tahun;?>" readonly>
                            <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jumlah;?>">
                   
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                            <td style="padding:  10px"><input name="kecamatan" class="form-control" value="<?php echo $kec;?>" style="width:335px;" required readonly></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Stadion</label></td><td>:</td>
                            <td style="padding:  10px"><input name="stadion" class="form-control" type="text" placeholder="" value="<?php echo $stadion;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Sepak Bola</label></td><td>:</td>
                            <td style="padding:  10px"><input name="sb" class="form-control" type="text" placeholder="" value="<?php echo $spkbola;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Bola Voly</label></td><td>:</td>
                            <td style="padding:  10px"><input name="bv" class="form-control" type="text" placeholder="" value="<?php echo $voly;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Bola Basket</label></td><td>:</td>
                            <td style="padding:  10px"><input name="bb" class="form-control" type="text" placeholder="" value="<?php echo $basket;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tenis</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tenis" class="form-control" type="text" placeholder="" value="<?php echo $tenis;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Bulu Tangkis</label></td><td>:</td>
                            <td style="padding:  10px"><input name="bt" class="form-control" type="text" placeholder="" value="<?php echo $badminton;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Futsal</label></td><td>:</td>
                            <td style="padding:  10px"><input name="futsal" class="form-control" type="text" placeholder="" value="<?php echo $futsal;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Gor</label></td><td>:</td>
                            <td style="padding:  10px"><input name="gor" class="form-control" type="text" placeholder="" value="<?php echo $gor;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Aula</label></td><td>:</td>
                            <td style="padding:  10px"><input name="aula" class="form-control" type="text" placeholder="" value="<?php echo $aula;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Kolam Renang</label></td><td>:</td>
                            <td style="padding:  10px"><input name="kr" class="form-control" type="text" placeholder="" value="<?php echo $kolam;?>" style="width:335px;" required></td>
                        </tr>
                   </table>     
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <input type="submit" class="btn btn-success pull-right" value="Save"></input> &nbsp &nbsp
                     </div>
                <?php echo form_close(); ?>
                </div>
           </div>
        </div>
   
    
           

    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Prasarana Olahraga</h3>
                    </div>
                    <?php echo form_open_multipart('C_prasarana/proses_input_prasarana') ?>

                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Kecamatan</label></td><td>:</td>
                            <td style="padding:  10px"><select name="kecamatan" id="kecamatan" class="form-control" style="width:335px;" required>
                                        <?php foreach ($datas->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->kecamatan ?>"><?php echo $row->kecamatan ?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Stadion</label></td><td>:</td>
                            <td style="padding:  10px"><input name="stadion" class="form-control" type="text" placeholder="Banyak Stadion" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Sepak Bola</label></td><td>:</td>
                            <td style="padding:  10px"><input name="sb" class="form-control" type="text" placeholder="Banyak Lapangan Bola" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Bola Voly</label></td><td>:</td>
                            <td style="padding:  10px"><input name="bv" class="form-control" type="text" placeholder="Banyak Lapangan Bola Voly" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Bola Basket</label></td><td>:</td>
                            <td style="padding:  10px"><input name="bb" class="form-control" type="text" placeholder="Banyak Lapangan Bola Basket" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tenis</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tenis" class="form-control" type="text" placeholder="Banyak Lapangan Tenis" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Bulu Tangkis</label></td><td>:</td>
                            <td style="padding:  10px"><input name="bt" class="form-control" type="text" placeholder="Banyak Lapangan Bulu Tangkis" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Futsal</label></td><td>:</td>
                            <td style="padding:  10px"><input name="futsal" class="form-control" type="text" placeholder="Banyak Lapangan Futsal" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Gor</label></td><td>:</td>
                            <td style="padding:  10px"><input name="gor" class="form-control" type="text" placeholder="Banyak Gedung Olahraga" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Aula</label></td><td>:</td>
                            <td style="padding:  10px"><input name="aula" class="form-control" type="text" placeholder="Banyak Aula" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Kolam Renang</label></td><td>:</td>
                            <td style="padding:  10px"><input name="kr" class="form-control" type="text" placeholder="Banyak Kolam Renang" style="width:335px;" required></td>
                        </tr>
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
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </table>
                    
                    <div class="modal-footer">
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
                    </div>
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
                            <h3 class="modal-title" id="myModalLabel">Hapus Data Prasarana Olahraga</h3>
                        </div>
                        <?php echo form_open_multipart('C_prasarana/proses_hapus_prasarana') ?>
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


    <!-- /.content -->

<?php } ?>

    </section>
    <!-- /.content -->
</div>
</body>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>MALANG SATU DATA</b>
    </div>
    <strong>Copyright &copy; 2019.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;Pengaturan Layar</i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">

        </div>
        <!-- /.tab-pane -->

    </div>
    
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/datatables.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
<script type="text/javascript" .src=https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js></script>
<script type="text/javascript" .src=https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js></script>
<script type="text/javascript" .src=https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js></script>
<script type="text/javascript" .src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js></script>
<script type="text/javascript" .src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js></script>
<script type="text/javascript" .src=https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js></script>
<script type="text/javascript" .src=https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js></script>
<script src="<?php echo base_url(); ?>assets/dataTables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/datatables.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.print.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.colVis.min.js"></script>  
  
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilprasarana').DataTable( {
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
         "ajax": 'C_prasarana/get'
        
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_prasarana/get?tahun='+end ).load();
    });
    
} );
</script>
<!--
$('.buttons-copy').each(function() {
        $(this).removeClass('btn-default').addClass('btn-success')
})
-->
<style>
.button-data{
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
    background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
    background-color:#33bdef;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    border:1px solid #057fd0;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:12px;
    padding:5px 16px;
    text-decoration:none;
    margin-top: 5px;
    margin-bottom: 2px;
    margin-right: 2px;
    margin-left: 2px;
}
.button-data: hover{
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
    background:-moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background:-webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background:-o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background:-ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef',GradientType=0);
    background-color:#019ad2;
}
.button-data:active {
    position:relative;
    top:1px;
}
.dataTables_wrapper .dt-buttons {
  float:none;  
  text-align:center;
}
</style>
</body>
</html>


