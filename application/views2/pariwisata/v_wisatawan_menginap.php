<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>WISATAWAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Wisatawan Menginap</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    	
        <div class="row">
            <div class="col-xs-12">


            	<div class="box">

               <!-- /.box-header -->
               		<div class="box-header">
               		
               			<h4 class="box-title" style="margin-bottom:10px ">Wisatawan Menginap Di Hotel Kabupaten Malang</h3>
               		<table>
               		<tr>
			            <td><a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add" >Tambah Data</a></td>
	    				<td><a class="btn btn-danger" href="#modalCross" data-toggle="modal" >Tampil Report</a></td>
            			<td><a class="btn btn-success" href="#modalgrafik" data-toggle="modal" title="Add">Pilih Grafik</a></td>
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
		            </div>
	                
	                
	                <div class="box-body">
		            <table  class="table table-striped" id="tampilDatang" width="100%" style="text-align:center; font-size:15px;">
		                <thead >
		                    <tr>
		                        <th style="text-align:center;width:20px;" rowspan="2">No</th>
		                        <th style="text-align:center;width:40px;" rowspan="2">Tahun</th>
		                        <th style="text-align:center" colspan="2">Wisatawan/Traveler</th>
		                        <th style="text-align:center;" rowspan="2">Jumlah</th>
		                        <th style="text-align:center;width:50px" rowspan="2">Aksi</th>
		                    </tr>
		                    <tr>
		                        <th style="text-align:center">Domestik</th>
		                        <th style="text-align:center;">Mancanegara</th>
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
										<h3 class="modal-title" id="myModalLabel">Tambah Data Wisatawan</h3>
									</div>


									<?php echo form_open_multipart('C_wisatawan_menginap/proses_tambah_wisatawan') ?>

									<div class="modal-body">
										<input class="form-control" type="hidden" name="id" readonly>
										
											<table>
										
											<tr>
												<td><label>Bulan</label></td>
												<td>:</td>
												<td>
													<select name="bulan" id="bulan" class="form-control" style="width:335px;" required>
													<option disabled selected value> Pilih Bulan </option>
														<?php 
														foreach ($datas->result_array() as $a){
															$bulan=$a['keterangan'];
															?>
															
															<option value="<?php echo $bulan; ?>"> <?php echo $bulan; ?> </option>
															<?php } ?>
														</select>
													</td>
												</tr>
											
												<tr>
													<td><label>Tahun</label></td>
													<td>:</td>
													<td><select name="tahun" id="tahun" style="width:335px;" class="form-control">
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
													<td><label>Domestik</label></td>
													<td>:</td>
													<td><input type="number" class="form-control" style="width:335px;" name="domestik" placeholder="Domestik" required autocomplete="off"></td>
												</tr>
												<tr>
													<td><label>Mancanegara</label></td>
													<td>:</td>
													<td><input type="number" class="form-control" style="width:335px;" name="mancanegara" placeholder="mancanegara" required autocomplete="off"></td>
												</tr>
												<tr>
													<td><label>Jenis Wisatawan</label></td>
													<td>:</td>
													<td><select name="jenis_wisatawan" style="width:335px;" id="jenis_wisatawan" class="form-control" required>
															<option disabled selected value> Jenis Wisatawan </option>
															<option value="wisatawan_datang">Wisatawan Datang</option>
															<option value="wisatawan_menginap">Wisatawan Menginap</option>
														</select>
													</td>
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



	<div id="modalCross" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tampilan CrossTab Mode</h3>
                    </div>
                    <?php echo form_open_multipart(base_url('C_wisatawan_menginap/tampil_crosstab_menginap')) ?>
                    <div class="modal-body">
                    <table>
  
                        <tr>
                        <td><label>Pilih Tahun Crosstab</label></td><td>:</td>
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


    <div id="modalgrafik" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Grafik Perbandingan Data</h3>
                    </div>
					<?php echo form_open_multipart('C_wisatawan_menginap/grafik_perbandingan') ?>
					<div class="modal-body">
					<table>
						<tr>
                            <td><label>Pilih Data</label></td><td>:</td>
                            <td>
							<select name="datap" id="datap" class="form-control" required>
							<option disabled selected value>Pilih Data Yang Akan Dibandingkan</option>
							<option value="all">Semua Data</option>
							<option value="1">Jumlah Total Domestik</option>
							<option value="2">Jumlah Total Mancanegara</option>
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
       
        var tp1 = $('#tampilDatang').DataTable( {
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
         "ajax": 'C_wisatawan_menginap/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_wisatawan_menginap/get?tahun='+end ).load();
    });
    


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
</html>
