<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>DATA DESA WISATA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Pariwisata</a></li>
            <li class="active">Data Desa Wisata</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">


            	<div class="box">

               <!-- /.box-header -->
               		<div class="box-header">
		                <h4 class="box-title" style="margin-bottom: 10px" >Data Desa Wisata</h3><br>
		                <table>
                        <tr>
		                	<td>
		                		<a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Input Data</a>
		                	</td>
		                	<td>
		                		<select name="opt_kecamatan" id="opt_kecamatan" required>
									<option value='0000'> Pilih Kecamatan </option>
									<?php 
									foreach ($datax->result_array() as $a){
									$kecamatan=$a['kecamatan'];
									?>
									<option value="<?php echo $kecamatan; ?>"> <?php echo $kecamatan; ?> </option>
									<?php } ?>
								
							</select>
		                	</td>
		                </tr>
                        </table>
		            </div>
	                
	                
	                <div class="box-body">
		            <table  class="table table-striped" id="tampilWisata" width="100%" style="text-align:center">
		                <thead >
		                    <tr>
		                        <th style="text-align:center;width:20px;">No</th>
		                        <th style="text-align:center;width:40px;">Kecamatan</th>
		                        <th style="text-align:center">Desa</th>
		                        <th style="text-align:center;">Kelembagaan</th>
		                        <th style="text-align:center;width:100px">Aksi</th>
		                    </tr>
		                </thead>
		                <tbody>
		                        <!-- ADA DI CONTROLLER -->
		              	</tbody>
		            </table>

					<!-- Modal Tambah -->
			<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Tambah Data</h3>
                        </div>


                        <?php echo form_open_multipart('C_desa_wisata/tambah_desa_wisata') ?>

                        <div class="modal-body">
                        	<!-- INPUT TYPE HIDDEN -->
                            <input class="form-control" type="hidden" name="id" readonly>
                            <?php $name=$this->session->userdata('user'); ?>
                            <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
                            
                            <table>
                                <tr>
                                    <td><label>Kecamatan</label></td>
                                    <td>:</td>
                                    <td>
                                        <select name="kecamatan" id="kecamatan" style="width:355px" class="form-control" required>
                                        <?php 
                                        foreach ($datas->result_array() as $a){
                                            $kode=$a['id_kecamatan'];
                                            $keterangan=$a['nama_kecamatan'];
                                            ?>
                                            <option value="<?php echo $keterangan; ?>"> <?php echo $keterangan; ?> </option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Desa</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="desa" placeholder="Desa" autocomplete="off" required></td>
                                </tr>
                                <tr>
                                    <td><label>Kelembagaan</label></td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" style="width:355px" name="kelembagaan" placeholder="Kelembagaan" required autocomplete="off"></td>
                                </tr>
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



            <!-- MODAL EDIT -->

            <?php 

            foreach ($data->result_array() as $a){

                $id=$a['id'];
                $kecamatan=$a['kecamatan'];
                $desa=$a['desa'];
                $kelembagaan=$a['kelembagaan'];
                ?>

                <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title" id="myModalLabel">Ubah Desa Wisata</h3>
                            </div>
                            <?php echo form_open_multipart('C_desa_wisata/ubah_desa_wisata') ?>

                            <div class="modal-body">
                            	<!-- INPUT TYPE HIDDEN -->
                                <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                                <?php $name=$this->session->userdata('user'); ?>
                                <input type="hidden" class="form-control" name="penginput" value="<?php echo $name ?>" style="width:355px" readonly>
                                <table>
                                    <tr>
                                        <td><label>Kecamatan</label></td>
                                        <td>:</td>
                                        <td>
                                            <select name="kecamatan" id="kecamatan" class="form-control" required>
                                                <option disabled selected value> Pilih Kecamatan </option>
                                                <?php 
                                                foreach ($datas->result_array() as $a){
                                                    $nama_kecamatan=$a['nama_kecamatan'];
                                                    ?>
                                                    <option value="<?php echo $nama_kecamatan; ?>" <?=$nama_kecamatan== $kecamatan? "selected" : null ?>> <?php echo $nama_kecamatan; ?> </option>
                                                    <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Desa</label></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" style="width:335px;" name="desa" value="<?php echo $desa;?>" placeholder="Desa" required autocomplete="off"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Kelembagaan</label></td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" style="width:335px;" name="kelembagaan"  value="<?php echo $kelembagaan;?>" placeholder="Kelembagaan" autocomplete="off"></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <input style="margin-left: 10px;" type="submit" class="btn btn-success" value="Save"> &nbsp &nbsp
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            </div>

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>


                <!-- MODAL HAPUS -->
            <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Potensi Unggulan</h3>
                        </div>
                        <?php echo form_open_multipart('C_desa_wisata/hapus_desa_wisata') ?>
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


	

    		


    <!-- /.box-body -->
		
<!-- /.box -->
		</div>
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
 var end;
       
        var tp1 = $('#tampilWisata').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
         "ajax": 'C_desa_wisata/get?opt_kecamatan='+0000
    } );
       
    $("#opt_kecamatan").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_desa_wisata/get?opt_kecamatan='+end ).load();
    });
    


</script>

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
</html>
