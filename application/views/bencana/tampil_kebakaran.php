<b<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Kebakaran<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Kebakaran</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Banyaknya Kebakaran dan Korban Manusia Menurut Kecamatan Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
            <a class="btn btn-primary" href="#modalInput" data-toggle="modal" title="Add">Tambah Data Banyak Kebakaran</a>
            </td>
            <td><div>
            <select name="tahun" id="tahun" required>
                <?php 
                foreach ($periode->result_array() as $a) {
                        $tahun = $a['periode'];
                ?><option value="<?php echo $tahun; ?>"> Pilih Tahun </option>
                <?php
                }
                foreach ($datasx->result_array() as $a){
                $periode=$a['periode'];
                ?><option value="<?php echo $periode; ?>"> <?php echo $periode; ?> </option>
                <?php } ?>
                
            </select>
            </td></div>
        </tr>
        </table>
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; border-color:black;"   id="tampilKebakaran">
                <thead>
                    <tr>
                        <th style="text-align:center;width:1%;border-color:black;vertical-align:middle">No</th>                
                        <th style="text-align:center;width:8%;border-color:black;vertical-align:middle">Kecamatan</th>
                        <th style="width:8%;text-align:center;border-color:black;vertical-align:middle">Kebakaran</th>
                        <th style="width:10%;text-align:center;border-color:black;vertical-align:middle">Korban Manusia</th>

                        <th style="width:5%;text-align:center;border-color:black;vertical-align:middle">Tahun</th>
                        <th style="width:25%;text-align:center;border-color:black;vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <th style="text-align:center; border-color: black;" colspan="2">Total</th>

                <th style="text-align:center; border-color: black;"></th>
                <th style="text-align:center; border-color: black;"></th>
                <th style="text-align:center; border-color: black;" colspan="2"></th>
                
                </tfoot>
        </table>
        
 
             <?php
                    foreach ($data->result_array() as $a) {
                       $no++;
                        $id = $a['id'];
                        $name=$a['kecamatan'];
                        $kebakaran=$a['kebakaran'];
                        $korban_manusia=$a['korban_manusia'];
                        $tahun=$a['periode'];      
                    ?>
     
            <?php  echo $id; }?>



    <!-- <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Update Data Jumlah Korban</h3>
                    </div>
                    <?php echo form_open_multipart('Bencana/proses_edit_bencana') ?>

                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" placeholder="Id..." style="width:335px;" readonly>
                    <table>
                        <tr>
                            <td><label>Kecamatan</label></td><td>:</td>
                            <td>

                        <select name="kecamatan_idd" class="form-control input-sm" id="kecamatan_idd"  onChange="tampilEditDesa()">
          <?php foreach ($datazx->result() as $row) {
          ?>
          <option value="<?php echo $row->id_kecamatan; ?>" <?=$row->id_kecamatan == $kecamatann ? "selected" : null?>><?=$row->nama_kecamatan?></option>
          <?php
          }
          ?>
          </select>
           </td>
                        </tr>
                        <tr>
                            <td><label>Desa</label></td><td>:</td>
                            <td>

          <select name="kelurahan_idd" class="form-control input-sm" id="kelurahan_idd">
                                
              <option value="<?php echo $desaa; ?>"> <?php echo $desaaa; ?> </option>
          
</select>
 </td>
                        </tr>
                        <tr>
                            <td><label>Bencana Alam</label></td><td>:</td>
                            <td>
                                <select name="bencana" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($datas->result() as $key => $data){ ?>
                                <option value="<?=$data->bencana?>" <?=$data->bencana == $bencana ? "selected" : null?>><?=$data->bencana?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td width=250px><label>Banyak Bencana</label></td><td width=20>:</td>
                            <td><input name="banyak_bencana" class="form-control" type="text" value="<?php echo $banyak;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Meninggal</label></td><td width=20>:</td>
                            <td><input name="meninggal" class="form-control" type="text" value="<?php echo $meninggal;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Luka - Luka</label></td><td width=20>:</td>
                            <td><input name="luka" class="form-control" type="text" value="<?php echo $luka;?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td width=250px><label>Periode</label></td><td width=20>:</td>
                            <td><input name="tahun" class="form-control" type="text" value="<?php echo $periode;?>" style="width:335px;" required></td>
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
                <?php echo form_open_multipart('bencana/proses_delete_bencana') ?>
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
     </div> -->
    
            </div>
        </div>
        <div id="modalInput" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Input Data Jumlah Korban</h3>
                    </div>
                  <?php echo form_open_multipart('kebakaran/proses_input_kebakaran') ?>

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
                            <td><label>Kebakaran</label></td><td>:</td>
                            <td><input name="kebakaran" class="form-control" type="number" placeholder="Kebakaran..." style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td><label>Korban Manusia</label></td><td>:</td>
                            <td><input name="manusia" class="form-control" type="number" placeholder="Korban Manusia..." style="width:335px;" required></td>
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
    </div>
    </div><!-- /.box -->
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
        var start=00;
        var tp1 = $('#tampilKebakaran').DataTable( {
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
         "ajax": 'Kebakaran/get?tahun='+start,

         "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           total1 = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
            $( api.column( 3 ).footer() ).html(
                 total1 
            );
        }
    } );
        
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Kebakaran/get?tahun='+end ).load();
    });
    
} );
</script>
<style>
button.dt-button.active {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
    background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
    background: grey !important;
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
.dt-button-collection{
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
    background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    border:1px solid #057fd0;
    display:inline-block;
    cursor:pointer;
    color:black;
    font-family:Arial;
    font-size:12px;
    padding:5px 16px;
    text-decoration:none;
    margin-top: 5px;
    margin-bottom: 2px;
    margin-right: 2px;
    margin-left: 2px;
}
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
</html>
