</body>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>MALANG SATU DATA</b>
    </div>
    <strong>Copyright &copy; <?php echo $date=date('Y');?>.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;Pengaturan Layar</i></a></li>
    </ul>
    
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
<script>
   $(document).ready(function() {
 
	  $('#tampil').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},dom: 'Bfrtip',
        buttons: [
		{ extend: 'print', footer:true, className: 'btn btn-success pull-right upper'},
		{ extend: 'copy', footer:true, className: 'btn btn-warning pull-right upper'},
		{ extend: 'pdf', footer:true, className: 'btn btn-danger pull-right upper'},
        ],
		 "ajax": ''
    });
	});
</script>
<script>
   $(document).ready(function() {
 
    $('#tampil1').DataTable({
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

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    });
  });
</script>
<script type="text/javascript">
   $(document).ready(function() {
 
   $('#tampilmasterlapanganolahraga').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": ''
    });
	});
</script>
<script>
   $(document).ready(function() {
      $('#tampildesa').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": ''
    });
    });
</script>
<script>
  $(document).ready(function() {
    $('#tampilWarisan').DataTable( {
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

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );


   $(document).ready(function() {
    $('#tampilDetailCrosstabMenginap').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );

   $(document).ready(function() {
    $('#tampil_crosstab_lapangan_olahraga').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );

  $(document).ready(function() {
    $('#tampil_crosstab_penduduk_berdasarkan_agama').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );
	$(document).ready(function() {
    $('#tampil_crosstab_jumlah_tempat_ibadah').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );
  $(document).ready(function() {
    $('#tampilcrostabproduksiperikanan').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );
    $(document).ready(function() {
    $('#tampilcrostabproduksiikan ').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );


   $(document).ready(function() {
    $('#tampil_crosstab_alatangkutd').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );

   $(document).ready(function() {
    $('#tampilDetailCrosstabDatang').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );

   $(document).ready(function() {
    $('#tampilDetailCrosstabTelur').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'lfrtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],

        
         "language": {
                "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
            }
    } );
} );

</script>
<script>
   $(document).ready(function() {
 
	  $('#tampildetail').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},dom: 'frtipB',
        buttons: [
		{ extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
		 "ajax": ''
    });
	});
</script>

<script>
   $(document).ready(function() {
 
      $('#tampilcrostabklasifikasi').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },dom: 'frtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "ajax": ''
    });
    });
</script>
<script>
   $(document).ready(function() {
 
      $('#tampilDetailCrosstabTraProvinsi').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },dom: 'frtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "ajax": ''
    });
    });
</script>
<script>
   $(document).ready(function() {
 
      $('#tampilDetailCrosstabTraKecamatan').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },dom: 'frtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "ajax": ''
    });
    });
</script>
<script>
   $(document).ready(function() {
 
      $('#tampilDetailCrosstabTraBulan').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },dom: 'frtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "ajax": ''
    });
    });
</script>
<script>
   $(document).ready(function() {
 
    $('#tampilcrostabtower').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },dom: 'frtipB',
        buttons: [
    { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
     "ajax": ''
    });
  });
</script>
<script>
   $(document).ready(function() {
 
    $('#tampilcrostabpengunjung').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },dom: 'frtipB',
        buttons: [
    { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
     "ajax": ''
    });
  });
</script>
<?php $pages = $this->uri->segment(2);
if($pages=="detail_bencana"){ ?>
    <script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#detail_bencana').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        }
    
    } );
         
} );
</script>
<script type="text/javascript">
         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }

function tampilGrafik()
 {
     var tahun = document.getElementById("tahun").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/tampil_grafik/"+tahun+"",
         success: function(response){
         },
         dataType:"html"
     });
     return false;
 }
</script>
<script type="text/javascript">
  function tampilDesaCuk()
 {  
    
     var kdkec = document.getElementById("kecamatan_idd").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/pilih_edit_kelurahan/"+kdkec+"/"+kd+"",
         success: function(response){
         $("#kelurahan_idd").html(response);
         },
         dataType:"html"
     });
     return false;
 }
</script>
<?php } if($pages=="tampil_crosstab_jumlah_koleksi_buku"){
?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
     
      var tp1 = $('#tampilDetailCrosstabKoleksiBuku').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
     "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
     },
     "ajax": ''
    } );
     
 
    
} );
</script>
<?php } else if ($pages=="detail_banyakbencana") { ?>
  
<script type="text/javascript">
   $(document).ready(function() {
        var tp1 = $('#tampilDetailBanyakbencana').DataTable( {
        'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
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
            total2 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total3 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total4 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );   
            total5 = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            total6 = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );         
 
            // Total over this page
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
            $( api.column( 3 ).footer() ).html(
                 total1 
            );
            $( api.column( 4 ).footer() ).html(
                 total2 
            );
            $( api.column( 5 ).footer() ).html(
                 total3 
            );
            $( api.column( 6 ).footer() ).html(
                 total4 
            );
            $( api.column( 7 ).footer() ).html(
                 total5 
            );
             var numFormat = $.fn.dataTable.render.number( '\,', '.', 2, ).display;
            $( api.column( 8 ).footer() ).html(
                 numFormat(total6) 
            );

        }
    } );
           
} );
</script>
<?php } else if ($pages=="detail_unjukrasa") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampil1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },dom: 'Bfrtip',
        buttons: [
        { extend: 'print', footer:true, className: 'btn btn-success pull-right down'},
        { extend: 'copy', footer:true, className: 'btn btn-warning pull-right down'},
        { extend: 'pdf', footer:true, className: 'btn btn-danger pull-right down'},
        ],
         "ajax": ''
    });
    });
</script>
<?php } else if ($pages=="detail_sarana") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampila').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },dom: 'Bfrtip',
        buttons: [
        { extend: 'print', footer:true, className: 'btn btn-success pull-right down'},
        { extend: 'copy', footer:true, className: 'btn btn-warning pull-right down'},
        { extend: 'pdf', footer:true, className: 'btn btn-danger pull-right down'},
        ],
         "ajax": ''
    });
    });

</script>

<?php } else if ($pages=="tampil_crosstab") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampilDetailCrosstabKebakaran').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        dom: 'lfrtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });

</script>

<?php } else if ($pages=="tampil_crosstab_pemadam") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampilDetailCrosstabPemadam').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        dom: 'lfrtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });

</script>

<?php } else if ($pages=="tampil_crosstab_pamong") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampilDetailCrosstabPamong').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        dom: 'lfrtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });

</script>
<?php } else if ($pages=="tampil_crosstab_bibit") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampilCrosstabbibit').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        dom: 'lfrtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });

</script>

<?php } else if ($pages=="tampil_crosstab_unjukrasa") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampilDetailCrosstabUnjukrasa').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
   
         
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });
   $(document).ready(function() {
  $('#tampilDetailCrosstabUnjukrasa1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        dom: 'lfrtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
   });

</script>

<?php } else if ($pages=="tampil_bencana") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampilbcna').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      
         
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });
   

</script>

<?php } else if ($pages=="detail_jenis") { ?>
  
<script type="text/javascript">
   $(document).ready(function() {
        var tp1 = $('#tampilDetailKorban').DataTable( {
       'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
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
            total2 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total3 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total4 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );       
 
            // Total over this page
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
            $( api.column( 3 ).footer() ).html(
                 total1 
            );
            $( api.column( 4 ).footer() ).html(
                 total2 
            );
            $( api.column( 5 ).footer() ).html(
                 total3 
            );
            $( api.column( 6 ).footer() ).html(
                 total4 
            );
          

        }
    } );
           
} );
</script>
<?php } else if ($pages=="detail_jenis_kebakaran") { ?>
  
<script type="text/javascript">
   $(document).ready(function() {
        var tp1 = $('#tampilDetailKebakaran').DataTable( {
       'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
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
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
            $( api.column( 3 ).footer() ).html(
                 total1 
            );
          
          

        }
    } );
           
} );
</script>
<?php } else if ($pages=="tampil_crosstab_masyarakat") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampilcrosstablembaga').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
   
         
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });
   $(document).ready(function() {
  $('#tampilcrosstablembaga1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        dom: 'lfrtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
   });

</script>

<?php }else if($pages=="detail_lembaga"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        
        var tp1 = $('#detail_lembaga').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
     "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        }
    } );
       
    
    
} );
</script>
<script type="text/javascript">
         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>LembagaMasyarakat/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 function tampilEditDesa()
 {
     var kdkec = document.getElementById("kecamatan_idd").value;
     $.ajax({
         url:"<?php echo base_url();?>LembagaMasyarakat/pilih_edit_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_idd").html(response);
         },
         dataType:"html"
     });
     return false;
 }
function tampilGrafik()
 {
     var tahun = document.getElementById("tahun").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/tampil_grafik/"+tahun+"",
         success: function(response){
         },
         dataType:"html"
     });
     return false;
 }
</script> 

<?php }else if($pages=="detail_kelompok"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        
        var tp1 = $('#detail_kelompok').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
     "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        }
    } );
       
    
    
} );
</script>
<script type="text/javascript">
         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>KelompokEkonomi/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 function tampilEditDesa()
 {
     var kdkec = document.getElementById("kecamatan_idd").value;
     $.ajax({
         url:"<?php echo base_url();?>KelompokEkonomi/pilih_edit_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_idd").html(response);
         },
         dataType:"html"
     });
     return false;
 }
function tampilGrafik()
 {
     var tahun = document.getElementById("tahun").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/tampil_grafik/"+tahun+"",
         success: function(response){
         },
         dataType:"html"
     });
     return false;
 }
</script> 

<?php } else if ($pages=="tampil_crosstab_ekonomi") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampilcrosstabekonomi').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
   
         
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });
   $(document).ready(function() {
  $('#tampilcrosstabekonomi1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        dom: 'lfrtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
   });

</script>

<?php } else if($pages=="detail_perusahaan_limbah"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampildetailperusahaanLimbah').DataTable( {
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
         }
    } );
       
    
} );
</script>
<?php } else if($pages=="detail_kendaraan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampil_banyak_detail_kendaraan').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
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
         }
    } );
       
   
    
} );
</script>
<?php } else if($pages=="detail_penumpang"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampil_banyak_detail_penumpang').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
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
            total2 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total3 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total4 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );   
            total5 = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
 
            // Total over this page
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
            $( api.column( 3 ).footer() ).html(
                 total1 
            );
            $( api.column( 4 ).footer() ).html(
                 total2 
            );
            $( api.column( 5 ).footer() ).html(
                 total3 
            );
            $( api.column( 6 ).footer() ).html(
                 total4 
            );
            $( api.column( 7 ).footer() ).html(
                 total5 
            );
             

        }
    } );
       
   
    
} );
</script>
<?php } else if ($pages=="tampil_crosstab_alatangkutd") { ?>
<script>
   $(document).ready(function() {
 
      $('#tampil_crosstab_alatangkutd').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
	  'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        dom: 'lfrtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
          }
    });
    });

<?php }else if($pages=="detail_pasar_tra_pemerintah"){ ?>
<script>
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilDetail').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'get2'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'get2?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($pages=="detail_pasar_tradisional"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilDetail').DataTable( {
        dom: 'frtipB',
        buttons: [
       { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'get?tahun='+end ).load();
    });
        var dataCap = document.getElementById("#tahunx").value;
} );
</script>
<?php }else if($pages=="detail_pasar_tra_masyarakat"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilDetail').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'get1'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'get1?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($pages=="detail_pasar_tra_swasta"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilDetail').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'get3'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'get3?tahun='+end ).load();
    });
    
} );
</script>
<?php } ?>
<?php 
$page=$this->uri->segment(1); 
if($page=="Sarana"){
?>
    <script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilSarana').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
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
</script>
<?php }else if($page=="Kebakaran"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        
        var tp1 = $('#tampilKebakaran').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Kebakaran/get', 
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

<?php }else if($page=="Pemadam"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var start=00;
        var tp1 = $('#tampilSarana1').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
     "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
         "ajax": 'Pemadam/get?tahun='+start,

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
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           total1 = api
                .column( 2 )
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
            $( api.column( 3 ).footer() ).html(
                 total 
            );
            $( api.column( 2 ).footer() ).html(
                 total1 
            );
        }
    } );
        
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Pemadam/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="Bencana"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var start=00;
        var tp1 = $('#tampilB').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
     "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'bencana/get?tahun='+start
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'bencana/get?tahun='+end ).load();
    });
    
} );
</script>
<script type="text/javascript">
         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 function tampilEditDesa()
 {
     var kdkec = document.getElementById("kecamatan_idd").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/pilih_edit_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_idd").html(response);
         },
         dataType:"html"
     });
     return false;
 }
function tampilGrafik()
 {
     var tahun = document.getElementById("tahun").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/tampil_grafik/"+tahun+"",
         success: function(response){
         },
         dataType:"html"
     });
     return false;
 }
</script> 

<?php }else if($page=="JenisKorban"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var start=00;
        var tp1 = $('#tampilKorban').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
     "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
         "ajax": 'Jeniskorban/get',

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
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 6 ).footer() ).html(
                 total 
            );
        }
    } );
        
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Jeniskorban/get?tahun='+end ).load();
    });
    
} );
</script>


<?php }else if($page=="Pamongpraja"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var start=00;
        var tp1 = $('#tampilpamong').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
     "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
     "ajax": 'Pamongpraja/get?tahun='+start,

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
 
            // Total over this page
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
        }
    } );   
       
      $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Pamongpraja/get?tahun='+end ).load();
    });
    
} );
</script>
  
<?php }else if($page=="Banyakbencana"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampilBanyakbencana').DataTable( {
        
        'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
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
         "ajax": 'Banyakbencana/get', 
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
            total2 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total3 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total4 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );   
            total5 = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            total6 = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );         
 
            // Total over this page
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
            $( api.column( 3 ).footer() ).html(
                 total1 
            );
            $( api.column( 4 ).footer() ).html(
                 total2 
            );
            $( api.column( 5 ).footer() ).html(
                 total3 
            );
            $( api.column( 6 ).footer() ).html(
                 total4 
            );
            $( api.column( 7 ).footer() ).html(
                 total5 
            );
             var numFormat = $.fn.dataTable.render.number( '\,', '.', 2, ).display;
            $( api.column( 8 ).footer() ).html(
                 numFormat(total6) 
            );

        }
    } );   
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Banyakbencana/get?tahun='+end ).load();
    });
    
} );
</script>

<?php } else if($page=="Unjukrasa"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampilUnjukrasa').DataTable( {
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
         "ajax": 'Unjukrasa/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Unjukrasa/get?tahun='+end ).load();
    });
    
} );
</script>
<script type="text/javascript">
    function myFunction(e) {
    document.getElementById("tahun9").value = e.target.value
    document.getElementById("tahun1").value = e.target.value
    document.getElementById("tahun2").value = e.target.value
    document.getElementById("tahun3").value = e.target.value
    document.getElementById("tahun4").value = e.target.value
    document.getElementById("tahun5").value = e.target.value
    document.getElementById("tahun6").value = e.target.value
    document.getElementById("tahun7").value = e.target.value

}
</script>

<?php }else if($page=="DistribusiBibit"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampil_distribusi_bibit').DataTable( {
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
         "ajax": 'DistribusiBibit/get', 
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
            

        }
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'DistribusiBibit/get?tahun='+end ).load();
    });
    
} );
</script>

<?php } else if($page=="InputTerminal"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampilmasterterminal').DataTable( {
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
         }
    } );
       
  
    
} );
</script>
<?php } else if($page=="InputKeterangan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampilmasterketeranganterminal').DataTable( {
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
         }
    } );
       
  
    
} );
</script>
<?php }else if($page=="Diztribusi"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampil_diztribusi_bibit').DataTable( {
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
         "ajax": 'Diztribusi/get', 
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
            

        }
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Diztribusi/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="Lokasi_terminal"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampil_lokasi_terminal').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
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
         "ajax": 'Lokasi_terminal/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Lokasi_terminal/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="LembagaMasyarakat"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        
        var tp1 = $('#tampil_lembaga').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
         "ajax": 'LembagaMasyarakat/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'LembagaMasyarakat/get?tahun='+end ).load();
    });
       
    
    
} );
</script>
<script type="text/javascript">
         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>LembagaMasyarakat/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 function tampilEditDesa()
 {
     var kdkec = document.getElementById("kecamatan_idd").value;
     $.ajax({
         url:"<?php echo base_url();?>LembagaMasyarakat/pilih_edit_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_idd").html(response);
         },
         dataType:"html"
     });
     return false;
 }
function tampilGrafik()
 {
     var tahun = document.getElementById("tahun").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/tampil_grafik/"+tahun+"",
         success: function(response){
         },
         dataType:"html"
     });
     return false;
 }
</script> 

<?php }else if($page=="KelompokEkonomi"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        
        var tp1 = $('#tampil_kelompok').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
         "ajax": 'KelompokEkonomi/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'KelompokEkonomi/get?tahun='+end ).load();
    });
       
    
    
} );
</script>
<script type="text/javascript">
         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>KelompokEkonomi/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 function tampilEditDesa()
 {
     var kdkec = document.getElementById("kecamatan_idd").value;
     $.ajax({
         url:"<?php echo base_url();?>KelompokEkonomi/pilih_edit_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_idd").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 </script>
<?php }else if($page=="internetkecamatan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        
        var tp1 = $('#tampilinternetkecamatan').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
         "ajax": 'internetkecamatan/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'internetkecamatan/get?tahun='+end ).load();
    });
       
    
    
} );
</script>
<?php }else if($page=="internetrumahsakit"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        
        var tp1 = $('#tampilinternetrumahsakit').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
         "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
         },
         "ajax": 'internetrumahsakit/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'internetrumahsakit/get?tahun='+end ).load();
    });
       
    
    
} );
</script>
<script type="text/javascript">
         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>KelompokEkonomi/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }
 function tampilEditDesa()
 {
     var kdkec = document.getElementById("kecamatan_idd").value;
     $.ajax({
         url:"<?php echo base_url();?>KelompokEkonomi/pilih_edit_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_idd").html(response);
         },
         dataType:"html"
     });
     return false;
 }
function tampilGrafik()
 {
     var tahun = document.getElementById("tahun").value;
     $.ajax({
         url:"<?php echo base_url();?>bencana/tampil_grafik/"+tahun+"",
         success: function(response){
         },
         dataType:"html"
     });
     return false;
 }
</script> 

<?php }else if($page=="Lokasi_pencemaran"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampillokasiPencemaran').DataTable( {
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
         "ajax": 'Lokasi_pencemaran/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Lokasi_pencemaran/get?tahun='+end ).load();
    });
    
} );
</script>

// jika berada pada halaman Perusahaan limbah

<?php } else if($page=="Perusahaan_limbah"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampilperusahaanLimbah').DataTable( {
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
         "ajax": 'Perusahaan_limbah/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Perusahaan_limbah/get?tahun='+end ).load();
    });
    
} );
</script>

// menampilkan desa sesuai kecamatan terpilih

<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>Perusahaan_limbah/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }



</script>


<?php } else if($page=="Banyakkendaraan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampil_banyak_kendaraan').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
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
         "ajax": 'Banyakkendaraan/get',

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
            total2 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total3 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total4 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );   
            total5 = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            total6 = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );         
 
            // Total over this page
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
            $( api.column( 3 ).footer() ).html(
                 total1 
            );
            $( api.column( 4 ).footer() ).html(
                 total2 
            );
            $( api.column( 5 ).footer() ).html(
                 total3 
            );
            $( api.column( 6 ).footer() ).html(
                 total4 
            );
            $( api.column( 7 ).footer() ).html(
                 total5 
            );
             var numFormat = $.fn.dataTable.render.number( '\,', '.', 2, ).display;
            $( api.column( 8 ).footer() ).html(
                 numFormat(total6) 
            );

        }
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Banyakkendaraan/get?tahun='+end ).load();
    });
    
} );
</script>
<?php } else if($page=="Penumpangangkutan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampil_banyak_penumpang').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
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
         "ajax": 'Penumpangangkutan/get',

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
            total2 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total3 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );  
            total4 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );   
            total5 = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            
 
            // Total over this page
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
            $( api.column( 3 ).footer() ).html(
                 total1 
            );
            $( api.column( 4 ).footer() ).html(
                 total2 
            );
            $( api.column( 5 ).footer() ).html(
                 total3 
            );
            $( api.column( 6 ).footer() ).html(
                 total4 
            );
            $( api.column( 7 ).footer() ).html(
                 total5 
            );
             

        }
    
    } );
       
  
        
  $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Penumpangangkutan/get?tahun='+end ).load();
    });
    
} );
    
</script>
<?php } else if($page=="Perumahan"){
?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	   
	    var tp1 = $('#tampilPerumahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		 "language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		 },
		 "ajax": 'Perumahan/get'
    } );
	   
	$("#tahun").change(function () {
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Perumahan/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="Alatangkut"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	   
	    var tp1 = $('#tampilalatangkut').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Alatangkut/get'
		} );
	   
	$("#tahun").change(function () {
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Alatangkut/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Tps"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	   
	    var tp1 = $('#tampiltps').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Tps/get'
		} );
	   
	$("#tahun").change(function () {
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Tps/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="User"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
 
   $('#tampiluser').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": ''
    });
	});
</script>
<?php }else if($page=="Level"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
 
   $('#tampillevel').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": ''
    });
	});
</script>
<?php }else if($page=="Kecamatan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
 
   $('#tampilkecamatan').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": ''
    });
	});
</script>
<?php }else if($page=="Master_agama"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
 
   $('#tampilagama').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": ''
    });
	});
</script>
<?php }else if($page=="Master_aset"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
 
   $('#tampilaset').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": ''
    });
	});
</script>
<?php }else if($page=="Malatangkut"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
 
   $('#tampilmasteralatangkut').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": ''
    });
	});
</script>
<?php }else if($page=="Perempuankk"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampilperempuankk').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Perempuankk/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Perempuankk/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Pengaduanper"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampilpengaduanper').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pengaduanper/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pengaduanper/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Pengaduanank"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampilpengaduanank').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pengaduanank/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pengaduanank/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Pengaduanker"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampilpengaduanker').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pengaduanker/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pengaduanker/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Jumlahphk"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampiljumlahphk').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', footer: true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', footer: true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', footer: true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend: 'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Jumlahphk/get',
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
 
            // Total over this page
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                 total 
            );
		
			// Total over all pages
			total = api
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
            $( api.column( 3 ).footer() ).html(
                 total 
            );
		
			// Total over all pages
			total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                 total 
            );
        }
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Jumlahphk/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Pencariantapend"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampiltapend').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pencariantapend/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pencariantapend/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Alatangkutd"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampilalatangkutd').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Alatangkutd/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Alatangkutd/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Jenispengairan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampiljenispengairan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Jenispengairan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Jenispengairan/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Ampelgading_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Ampelgading_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Ampelgading_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Bantur_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Bantur_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Bantur_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="Bululawang_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Bululawang_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Bululawang_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Dampit_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Dampit_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Dampit_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Dau_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Dau_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Dau_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Donomulyo_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Donomulyo_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Donomulyo_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Gedangan_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Gedangan_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Gedangan_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Gondanglegi_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Gondanglegi_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Gondanglegi_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Jabung_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Jabung_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Jabung_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Kalipare_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Kalipare_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Kalipare_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Karangploso_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Karangploso_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Karangploso_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Kasembon_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Kasembon_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Kasembon_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Kepanjen_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Kepanjen_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Kepanjen_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Kromengan_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Kromengan_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Kromengan_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Lawang_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Lawang_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Lawang_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Ngajum_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Ngajum_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Ngajum_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Ngantang_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Ngantang_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Ngantang_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Pagak_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pagak_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pagak_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Pagelaran_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pagelaran_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pagelaran_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Pakis_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pakis_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pakis_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Pakisaji_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pakisaji_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pakisaji_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Poncokusumo_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Poncokusumo_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Poncokusumo_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Pujon_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pujon_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pujon_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Singosari_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Singosari_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Singosari_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Sumbermanjing_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Sumbermanjing_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Sumbermanjing_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Sumberpucung_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Sumberpucung_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Sumberpucung_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Tajinan_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Tajinan_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Tajinan_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Tirtoyudo_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Tirtoyudo_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Tirtoyudo_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Tumpang_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Tumpang_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Tumpang_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Turen_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Turen_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Turen_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Wagir_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Wagir_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Wagir_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Wajak_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Wajak_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Wajak_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script><?php }else if($page=="Wonosari_struktur_pemerintahan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampil_struktur_pemerintahan').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Wonosari_struktur_pemerintahan/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Wonosari_struktur_pemerintahan/get?tahun='+end ).load();
    });
    
	} );
</script>
</script><?php }else if($page=="Pekerjaan_penduduk"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	    var tp1 = $('#tampilPenduduk').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'Pekerjaan_penduduk/get'
		} );
		
	   
	$("#tahun").change(function () {
		
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'Pekerjaan_penduduk/get?tahun='+end ).load();
    });
    
	} );
</script>
<?php } else if($page=="Pasar_modern"){ 
?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       var start=00;
        var tp1 = $('#tampilPasarModern').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Pasar_modern/get?tahun='+start,

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

            total1 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total2 = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             total3 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ); 
 
 
            // Update footer
            $( api.column( 2 ).footer() ).html(total1);
            $( api.column( 3 ).footer() ).html(total2);
            $( api.column( 4 ).footer() ).html(total3);
        }
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Pasar_modern/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="Sarana_perdagangan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       var start=00;
        var tp1 = $('#tampilSaranaPerdagangan').DataTable( {
        dom: 'frtipB',
        buttons: [
      { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Sarana_perdagangan/get?tahun='+start,

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

            total1 = api
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total2 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             total3 = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ); 
 
 
            // Update footer
            $( api.column( 1 ).footer() ).html(total1);
            $( api.column( 2 ).footer() ).html(total2);
            $( api.column( 3 ).footer() ).html(total3);
        }


    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Sarana_perdagangan/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="Ekspor_komoditi"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilEkspor').DataTable( {
        dom: 'frtipB',
        buttons: [
       { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Ekspor_komoditi/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Ekspor_komoditi/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="Ekspor_negara_tujuan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {

       var end;
          var start=00;
        var tp1 = $('#tampilEkspor').DataTable( {
        dom: 'frtipB',
        buttons: [
       { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Ekspor_negara_tujuan/get',
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

            total1 = api
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total2 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            var numFormat = $.fn.dataTable.render.number( '\,', '.', 2, ).display;
            $( api.column( 1 ).footer() ).html(
              numFormat(total1));
            $( api.column( 2 ).footer() ).html(
              numFormat(total2));
        }

    } );

 $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Ekspor_negara_tujuan/get?tahun='+end ).load();
    });

} );
</script>
<?php }else if($page=="Perusahaan_klasifikasi"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilklasifikasi').DataTable( {
        dom: 'frtipB',
        buttons: [
       { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Perusahaan_klasifikasi/get'
    } );

 $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Perusahaan_klasifikasi/get?tahun='+end ).load();
    });

} );
</script>
<?php }else if($page=="Transmigrasi"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilTransmigrasi').DataTable( {
        dom: 'frtipB',
        buttons: [
       { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Transmigrasi/get'
    } );

 $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Transmigrasi/get?tahun='+end ).load();
    });

} );
</script>
<?php }else if($page=="Impor_negara_asal"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       var start=00;
        var tp1 = $('#tampilEkspor2').DataTable( {
        dom: 'frtipB',
        buttons: [
     { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Impor_negara_asal/get2',
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

            total1 = api
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total2 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            var numFormat = $.fn.dataTable.render.number( '\,', '.', 2, ).display;
            $( api.column( 1 ).footer() ).html(
              numFormat(total1));
            $( api.column( 2 ).footer() ).html(
              numFormat(total2));
        }
    } );
       
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Impor_negara_asal/get2?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="Industri_kecil"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilKecil').DataTable( {
        dom: 'frtipB',
        buttons: [
       { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Industri_kecil/get'
    } );

 $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Industri_kecil/get?tahun='+end ).load();
    });

} );
</script>
<?php }else if($page=="Industri_rumah_tangga"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilRumah').DataTable( {
        dom: 'frtipB',
        buttons: [
         { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Industri_rumah_tangga/get'
    } );

 $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Industri_rumah_tangga/get?tahun='+end ).load();
    });

} );
</script>
<?php }else if($page=="C_pengunjung_negara"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
     
      var tp1 = $('#tampilpengunjungnegara').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": 'C_pengunjung_negara/get'
    } );
     
  $("#tahun").change(function () {
        end = this.value;
    console.log(end);
    tp1.ajax.url( 'C_pengunjung_negara/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if($page=="Investasi_pmdn"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       var start=00;
        var tp1 = $('#tampilInvestasi').DataTable( {
        dom: 'frtipB',
        buttons: [
       { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', footer:true, className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', footer:true, className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Investasi_pmdn/get',
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

            total1 = api
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total2 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total3 = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            var numFormat = $.fn.dataTable.render.number( '\,', '.', 2, ).display;
            $( api.column( 1 ).footer() ).html(total1);
            $( api.column( 2 ).footer() ).html(
              numFormat(total2));
            $( api.column( 3 ).footer() ).html(total3);
        }
    } );

 $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Investasi_pmdn/get?tahun='+end ).load();
    });

} );
</script>
<?php }else if($page=="Banding_kembang_realisasi_ekspor"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
        var tp1 = $('#tampilPerkembangan').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Banding_kembang_realisasi_ekspor/get'
        } );
        
       
    $("#tahun").change(function () {
        
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Banding_kembang_realisasi_ekspor/get?tahun='+end ).load();
    });
    
    } );
</script>
<?php } else if($page=="C_cabangolah"){?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	   
	    var tp1 = $('#tampilcabangolahraga').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		 "language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		 },
		 "ajax": 'C_cabangolah/get',

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

            total1 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total2 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

             total3 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 ); 
 
 
            // Update footer
            $( api.column( 2 ).footer() ).html(total1);
            $( api.column( 3 ).footer() ).html(total2);
            $( api.column( 4 ).footer() ).html(total3);
        }
    } );
	$("#tahun").change(function () {
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'C_cabangolah/get?tahun='+end ).load();
    });
    
} );
</script>
<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan").value;
     $.ajax({
         url:"<?php echo base_url();?>C_cabangolah/pilih_desa/"+kdkec+"",
         success: function(response){
         $("#desa").html(response);
         },
         dataType:"html"
     });
     return false;
 }
</script>

<?php }else if($page=="C_penanaman"){ ?>
<script type="text/javascript">


   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilpenanamanmodal').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
        },
         "ajax": 'C_penanaman/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_penanaman/get?tahun='+end ).load();
    });
    
} );


   var sektor=document.getElementById("sektor").value;
  $.ajax({url: "C_penanaman/tampil_jenis_sektor?sktr="+sektor, success: function(result){
            $("#jenis_sektor").html(result);
        }});

$("#sektor").change(function () {
        var end = this.value;
        console.log(end);
        $.ajax({url: "C_penanaman/tampil_jenis_sektor?sktr="+end, success: function(result){
            $("#jenis_sektor").html(result);
            console.log(result);
        }});
        //document.getElementById("jenis_air").innerHTML = "<option value=0>TES</option>";
    });

//    var sektor=document.getElementById("sektor").value;
// console.log(sektor);
//   $.ajax({url: "C_penanaman/tampil_jenis_sektor?sktr="+sektor, success: function(result){
//             $("#jenis_sektor").html(result);
//         }});

// $("#sektor").change(function () {
//         var end = this.value;
//         console.log(end);
//         $.ajax({url: "C_penanaman/tampil_jenis_sektor?sktr="+end, success: function(result){
//             $("#jenis_sektor").html(result);
//             console.log(result);
//         }});
//         //document.getElementById("jenis_air").innerHTML = "<option value=0>TES</option>";
//     });




</script>


<?php }else if($page=="C_penanaman"){ ?>
  <script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilperkembangan').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},

        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
        },
         "ajax": 'get2'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'get2?tahun='+end ).load();
    });
    
} );

//    var sektor=document.getElementById("sektor").value;
// console.log(sektor);
//   $.ajax({url: "C_penanaman/tampil_jenis_sektor?sktr="+sektor, success: function(result){
//             $("#jenis_sektor").html(result);
//         }});

// $("#sektor").change(function () {
//         var end = this.value;
//         console.log(end);
//         $.ajax({url: "C_penanaman/tampil_jenis_sektor?sktr="+end, success: function(result){
//             $("#jenis_sektor").html(result);
//             console.log(result);
//         }});
//         //document.getElementById("jenis_air").innerHTML = "<option value=0>TES</option>";
//     });

</script>


<?php }else if($page=="C_prasarana"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	   
	    var tp1 = $('#tampilprasarana').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
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
<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan").value;
     $.ajax({
         url:"<?php echo base_url();?>C_prasarana/pilih_desa/"+kdkec+"",
         success: function(response){
         $("#desa").html(response);
         },
         dataType:"html"
     });
     return false;
 }
</script>

<?php }else if($page=="C_twr"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
     
      var tp1 = $('#tampilawaltower').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": 'C_twr/get'
    } );
     
  $("#tahun").change(function () {
        end = this.value;
    console.log(end);
    tp1.ajax.url( 'C_twr/get?tahun='+end ).load();
    });
    
  } );
</script>

<?php }else if($page=="C_kebudayaan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
     
      var tp1 = $('#tampilawalkebudayaan').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": 'C_kebudayaan/get'
    } );
     
  $("#tahun").change(function () {
        end = this.value;
    console.log(end);
    tp1.ajax.url( 'C_kebudayaan/get?tahun='+end ).load();
    });
    
  } );
</script>

<?php }else if($page=="C_kominfo"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	   
	    var tp1 = $('#tampilkominfo').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'C_kominfo/get'
		} );
	   
	$("#tahun").change(function () {
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'C_kominfo/get?tahun='+end ).load();
    });
    
	} );
</script>

<?php }else if($page=="C_kerjasama_media"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
     
      var tp1 = $('#tampilkm').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": 'C_kerjasama_media/get'
    } );
     
  $("#tahun").change(function () {
        end = this.value;
    console.log(end);
    tp1.ajax.url( 'C_kerjasama_media/get?tahun='+end ).load();
    });
    
  } );
</script>

<?php }else if($page=="C_tower"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
     
      var tp1 = $('#tampiltower').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": 'C_tower/get'
    } );
     
  $("#tahun").change(function () {
        end = this.value;
    console.log(end);
    tp1.ajax.url( 'C_tower/get?tahun='+end ).load();
    });
    
  } );
</script>

<?php }else if($page=="C_apl"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
     
      var tp1 = $('#tampilapl').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": 'C_apl/get'
    } );
     
  $("#tahun").change(function () {
        end = this.value;
    console.log(end);
    tp1.ajax.url( 'C_apl/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if($page=="C_prasarana"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
	   var end;
	   
	    var tp1 = $('#tampildetailprasarana').DataTable( {
        dom: 'frtipB',
        buttons: [
		{ extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
		"language":{
			"url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
		},
		 "ajax": 'C_prasarana/get2',

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

            total1 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            $( api.column( 4 ).footer() ).html(total1);
        }
		} );
	   
	$("#tahun").change(function () {
        end = this.value;
		console.log(end);
		tp1.ajax.url( 'C_prasarana/get2?tahun='+end ).load();
    });
    
	} );
</script>
<?php }else if($page=="C_kebudayaan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilkebudayaan').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
		{ extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
		{ extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
		{ extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
        },
         "ajax": 'C_kebudayaan/get',

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

            total1 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
       $( api.column( 2 ).footer() ).html(total1);
       }
    } );

    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_kebudayaan/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="C_pengunjung_negara"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampilpengunjungnegara').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": 'C_pengunjung_negara/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( 'C_pengunjung_negara/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if($page=="C_wisata_buatan"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilWisataBuatan').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
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
         "ajax": 'C_wisata_buatan/get?opt_kecamatan='+0000
    } );
       
    $("#opt_kecamatan").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_wisata_buatan/get?opt_kecamatan='+end ).load();
    });
    

</script>


<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>C_wisata_buatan/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }



</script>

<?php }else if($page=="C_wisata_budaya"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilWisataBudaya').DataTable( {
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
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
         "ajax": 'C_wisata_budaya/get?opt_kecamatan='+0000
    } );
       
    $("#opt_kecamatan").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_wisata_budaya/get?opt_kecamatan='+end ).load();
    });
    


</script>


<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>C_wisata_budaya/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }


</script>
<?php }else if($page=="C_wisata_alam"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilWisataAlam').DataTable( {
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
         "ajax": 'C_wisata_alam/get?opt_kecamatan='+0000
    } );
       
    $("#opt_kecamatan").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_wisata_alam/get?opt_kecamatan='+end ).load();
    });
    


</script>

<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>C_wisata_alam/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }


</script>
<?php }else if($page=="C_ternak_dipotong"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilTernakDipotong').DataTable( {
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
         "ajax": 'C_ternak_dipotong/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_ternak_dipotong/get?tahun='+end ).load();
    });
    


</script>

<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>C_ternak_dipotong/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#desa").html(response);
         },
         dataType:"html"
     });
     return false;
 }
</script>

<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan").value;
     $.ajax({
         url:"<?php echo base_url();?>C_ternak_dipotong/pilih_desa/"+kdkec+"",
         success: function(response){
         $("#desa").html(response);
         },
         dataType:"html"
     });
     return false;
 }
</script>

<?php }else if($page=="C_vaksinasi_avian"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilVaksinasi').DataTable( {
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
         "ajax": 'C_vaksinasi_avian/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_vaksinasi_avian/get?tahun='+end ).load();
    });
    
</script>

<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan").value;
     $.ajax({
         url:"<?php echo base_url();?>C_vaksinasi_avian/pilih_desa/"+kdkec+"",
         success: function(response){
         $("#desa").html(response);
         },
         dataType:"html"
     });
     return false;
 }
</script>

<?php }else if($page=="C_pelanggan_pdam"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilPelangganPDAM').DataTable( {
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
         "ajax": 'C_pelanggan_pdam/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_pelanggan_pdam/get?tahun='+end ).load();
    });
  
</script>





</script>
<?php }else if($page=="C_volume_air_minum_pdam"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilAirPDAM').DataTable( {
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
         "ajax": 'C_volume_air_minum_pdam/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_volume_air_minum_pdam/get?tahun='+end ).load();
    });
  
</script>


<?php }else if($page=="C_usaha_peternakan"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilPeternakan').DataTable( {
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
         "ajax": 'C_usaha_peternakan/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_usaha_peternakan/get?tahun='+end ).load();
    });
    
</script>
<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan").value;
     $.ajax({
         url:"<?php echo base_url();?>C_usaha_peternakan/pilih_desa/"+kdkec+"",
         success: function(response){
         $("#desa").html(response);
         },
         dataType:"html"
     });
     return false;
 }
</script>


<?php }else if($page=="C_produksi_telur"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilProduksiTelur').DataTable( {
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
         "ajax": 'C_produksi_telur/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_produksi_telur/get?tahun='+end ).load();
    });
    

</script>

<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan").value;
     $.ajax({
         url:"<?php echo base_url();?>C_produksi_telur/pilih_desa/"+kdkec+"",
         success: function(response){
         $("#desa").html(response);
         },
         dataType:"html"
     });
     return false;
 }
</script>
<?php }else if($page=="C_produksi_daging"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilDaging').DataTable( {
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
         "ajax": 'C_produksi_daging/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_produksi_daging/get?tahun='+end ).load();
    });
    

</script>
<?php }else if($page=="C_produksi_susu"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilSusu').DataTable( {
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
         "ajax": 'C_produksi_susu/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_produksi_susu/get?tahun='+end ).load();
    });
    

</script>
<?php } else if($page=="jumlahkoleksibuku"){
?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
     
      var tp1 = $('#tampiljumlahkoleksibuku').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
     "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
     },
     "ajax": 'jumlahkoleksibuku/get'
    } );
     
  $("#tahun").change(function () {
        end = this.value;
    console.log(end);
    tp1.ajax.url( 'jumlahkoleksibuku/get?tahun='+end ).load();
    });
    
} );
</script>       
<?php }else if($page=="pengunjungperpusjkel"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilpengunjungperpusjkel').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],

        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'pengunjungperpusjkel/get',
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
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                  total1 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                 total2 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                
 
            // Total over this page
           
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                 total 
            );
              $( api.column( 4 ).footer() ).html(
                 total1 
            );
              $( api.column( 5 ).footer() ).html(
                 total2 
            );
        }
    } );
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'pengunjungperpusjkel/get?tahun='+end ).load();
    });
    
</script>
<?php }else if($page=="pengunjungperpustpend"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilpengunjungperpustpend').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],

        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'pengunjungperpustpend/get'

    
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'pengunjungperpustpend/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="pengunjungperpusspekerjaan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilpengunjungperpusspekerjaan').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],

        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'pengunjungperpusspekerjaan/get',
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
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                  total1 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                 total2 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                 total3 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
           
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                 total 
            );
              $( api.column( 4 ).footer() ).html(
                 total1 
            );
              $( api.column( 5 ).footer() ).html(
                 total2 
            );
              $( api.column( 6 ).footer() ).html(
                 total3 
            );
        }
    } );
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'pengunjungperpusspekerjaan/get?tahun='+end ).load();
    });
    
</script>
<?php }else if($page=="Produksiperikanan"){ ?>
<script type="text/javascript">
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilproduksiperikanan').DataTable( {
        dom: 'frtipB',
         buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],

        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'Produksiperikanan/get',

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
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                  total1 = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
           
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                 total 
            );
              $( api.column( 4 ).footer() ).html(
                 total1 
            );
        }
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'Produksiperikanan/get?tahun='+end ).load();
    });
    
} );
</script>
<?php }else if($page=="produksiikan"){ ?>
<script type="text/javascript">
var jenis_ikan=document.getElementById("jenis_ikan").value;
  $.ajax({url: "produksiikan/tampil_jenis_air?ikan="+jenis_ikan, success: function(result){
            $("#jenis_air").html(result);
        }});

$("#jenis_ikan").change(function () {
        var end = this.value;
        console.log(end);
        $.ajax({url: "produksiikan/tampil_jenis_air?ikan="+end, success: function(result){
            $("#jenis_air").html(result);
            console.log(result);
        }});
        //document.getElementById("jenis_air").innerHTML = "<option value=0>TES</option>";
    });

    // $('tampilproduksiikan').append('<tfoot><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tfoot>');

   $(document).ready(function() {
       var end;
       
        var tp1=$('#tampilproduksiikan').DataTable( {
        dom: 'frtipB',
        buttons: [
        { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
        { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
        { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
        { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],

        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
        },
         "ajax": 'produksiikan/get',
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
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                  total1 = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
           
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                 total 
            );
              $( api.column( 5 ).footer() ).html(
                 total1 
            );
        }
    } );

      
$("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url('produksiikan/get?tahun='+end).load();
    });
}); 
</script>
<?php }else if(     $page=="Kec_banyak_lapangan_olahraga_ampelgading"
            ||$page=="Kec_banyak_lapangan_olahraga_bantur"
            ||$page=="Kec_banyak_lapangan_olahraga_bululawang"
            ||$page=="Kec_banyak_lapangan_olahraga_dampit"
            ||$page=="Kec_banyak_lapangan_olahraga_dau"
            ||$page=="Kec_banyak_lapangan_olahraga_donomulyo"
            ||$page=="Kec_banyak_lapangan_olahraga_gedangan"
            ||$page=="Kec_banyak_lapangan_olahraga_gondanglegi"
            ||$page=="Kec_banyak_lapangan_olahraga_jabung"
            ||$page=="Kec_banyak_lapangan_olahraga_kalipare"
            ||$page=="Kec_banyak_lapangan_olahraga_karangploso"
            ||$page=="Kec_banyak_lapangan_olahraga_kasembon"
            ||$page=="Kec_banyak_lapangan_olahraga_kepanjen"
            ||$page=="Kec_banyak_lapangan_olahraga_kromengan"
            ||$page=="Kec_banyak_lapangan_olahraga_lawang"
            ||$page=="Kec_banyak_lapangan_olahraga_ngajum"
            ||$page=="Kec_banyak_lapangan_olahraga_ngantang"
            ||$page=="Kec_banyak_lapangan_olahraga_pagak"
            ||$page=="Kec_banyak_lapangan_olahraga_pagelaran"
            ||$page=="Kec_banyak_lapangan_olahraga_pakis"
            ||$page=="Kec_banyak_lapangan_olahraga_pakisaji"
            ||$page=="Kec_banyak_lapangan_olahraga_poncokusumo"
            ||$page=="Kec_banyak_lapangan_olahraga_pujon"
            ||$page=="Kec_banyak_lapangan_olahraga_singosari"
            ||$page=="Kec_banyak_lapangan_olahraga_sumbermanjing"
            ||$page=="Kec_banyak_lapangan_olahraga_sumberpucung"
            ||$page=="Kec_banyak_lapangan_olahraga_tajinan"
            ||$page=="Kec_banyak_lapangan_olahraga_tirtoyudo"
            ||$page=="Kec_banyak_lapangan_olahraga_tumpang"
            ||$page=="Kec_banyak_lapangan_olahraga_turen"
            ||$page=="Kec_banyak_lapangan_olahraga_wagir"
            ||$page=="Kec_banyak_lapangan_olahraga_wajak"
            ||$page=="Kec_banyak_lapangan_olahraga_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampilbanyaklapangan').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if(     $page=="Kec_penduduk_berdasarkan_agama_ampelgading"
            ||$page=="Kec_penduduk_berdasarkan_agama_bantur"
            ||$page=="Kec_penduduk_berdasarkan_agama_bululawang"
            ||$page=="Kec_penduduk_berdasarkan_agama_dampit"
            ||$page=="Kec_penduduk_berdasarkan_agama_dau"
            ||$page=="Kec_penduduk_berdasarkan_agama_donomulyo"
            ||$page=="Kec_penduduk_berdasarkan_agama_gedangan"
            ||$page=="Kec_penduduk_berdasarkan_agama_gondanglegi"
            ||$page=="Kec_penduduk_berdasarkan_agama_jabung"
            ||$page=="Kec_penduduk_berdasarkan_agama_kalipare"
            ||$page=="Kec_penduduk_berdasarkan_agama_karangploso"
            ||$page=="Kec_penduduk_berdasarkan_agama_kasembon"
            ||$page=="Kec_penduduk_berdasarkan_agama_kepanjen"
            ||$page=="Kec_penduduk_berdasarkan_agama_kromengan"
            ||$page=="Kec_penduduk_berdasarkan_agama_lawang"
            ||$page=="Kec_penduduk_berdasarkan_agama_ngajum"
            ||$page=="Kec_penduduk_berdasarkan_agama_ngantang"
            ||$page=="Kec_penduduk_berdasarkan_agama_pagak"
            ||$page=="Kec_penduduk_berdasarkan_agama_pagelaran"
            ||$page=="Kec_penduduk_berdasarkan_agama_pakis"
            ||$page=="Kec_penduduk_berdasarkan_agama_pakisaji"
            ||$page=="Kec_penduduk_berdasarkan_agama_poncokusumo"
            ||$page=="Kec_penduduk_berdasarkan_agama_pujon"
            ||$page=="Kec_penduduk_berdasarkan_agama_singosari"
            ||$page=="Kec_penduduk_berdasarkan_agama_sumbermanjing"
            ||$page=="Kec_penduduk_berdasarkan_agama_sumberpucung"
            ||$page=="Kec_penduduk_berdasarkan_agama_tajinan"
            ||$page=="Kec_penduduk_berdasarkan_agama_tirtoyudo"
            ||$page=="Kec_penduduk_berdasarkan_agama_tumpang"
            ||$page=="Kec_penduduk_berdasarkan_agama_turen"
            ||$page=="Kec_penduduk_berdasarkan_agama_wagir"
            ||$page=="Kec_penduduk_berdasarkan_agama_wajak"
            ||$page=="Kec_penduduk_berdasarkan_agama_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampil_jumlah_penduduk_berdasarkan_agama').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if(     
			$page=="Kec_jumlah_tempat_ibadah_ampelgading"
            ||$page=="Kec_jumlah_tempat_ibadah_bantur"
            ||$page=="Kec_jumlah_tempat_ibadah_bululawang"
            ||$page=="Kec_jumlah_tempat_ibadah_dampit"
            ||$page=="Kec_jumlah_tempat_ibadah_dau"
            ||$page=="Kec_jumlah_tempat_ibadah_donomulyo"
            ||$page=="Kec_jumlah_tempat_ibadah_gedangan"
            ||$page=="Kec_jumlah_tempat_ibadah_gondanglegi"
            ||$page=="Kec_jumlah_tempat_ibadah_jabung"
            ||$page=="Kec_jumlah_tempat_ibadah_kalipare"
            ||$page=="Kec_jumlah_tempat_ibadah_karangploso"
            ||$page=="Kec_jumlah_tempat_ibadah_kasembon"
            ||$page=="Kec_jumlah_tempat_ibadah_kepanjen"
            ||$page=="Kec_jumlah_tempat_ibadah_kromengan"
            ||$page=="Kec_jumlah_tempat_ibadah_lawang"
            ||$page=="Kec_jumlah_tempat_ibadah_ngajum"
            ||$page=="Kec_jumlah_tempat_ibadah_ngantang"
            ||$page=="Kec_jumlah_tempat_ibadah_pagak"
            ||$page=="Kec_jumlah_tempat_ibadah_pagelaran"
            ||$page=="Kec_jumlah_tempat_ibadah_pakis"
            ||$page=="Kec_jumlah_tempat_ibadah_pakisaji"
            ||$page=="Kec_jumlah_tempat_ibadah_poncokusumo"
            ||$page=="Kec_jumlah_tempat_ibadah_pujon"
            ||$page=="Kec_jumlah_tempat_ibadah_singosari"
            ||$page=="Kec_jumlah_tempat_ibadah_sumbermanjing"
            ||$page=="Kec_jumlah_tempat_ibadah_sumberpucung"
            ||$page=="Kec_jumlah_tempat_ibadah_tajinan"
            ||$page=="Kec_jumlah_tempat_ibadah_tirtoyudo"
            ||$page=="Kec_jumlah_tempat_ibadah_tumpang"
            ||$page=="Kec_jumlah_tempat_ibadah_turen"
            ||$page=="Kec_jumlah_tempat_ibadah_wagir"
            ||$page=="Kec_jumlah_tempat_ibadah_wajak"
            ||$page=="Kec_jumlah_tempat_ibadah_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampil_jumlah_tempat_ibadah').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if(     $page=="Kec_luas_wilayah_ampelgading"
            ||$page=="Kec_luas_wilayah_bantur"
            ||$page=="Kec_luas_wilayah_bululawang"
            ||$page=="Kec_luas_wilayah_dampit"
            ||$page=="Kec_luas_wilayah_dau"
            ||$page=="Kec_luas_wilayah_donomulyo"
            ||$page=="Kec_luas_wilayah_gedangan"
            ||$page=="Kec_luas_wilayah_gondanglegi"
            ||$page=="Kec_luas_wilayah_jabung"
            ||$page=="Kec_luas_wilayah_kalipare"
            ||$page=="Kec_luas_wilayah_karangploso"
            ||$page=="Kec_luas_wilayah_kasembon"
            ||$page=="Kec_luas_wilayah_kepanjen"
            ||$page=="Kec_luas_wilayah_kromengan"
            ||$page=="Kec_luas_wilayah_lawang"
            ||$page=="Kec_luas_wilayah_ngajum"
            ||$page=="Kec_luas_wilayah_ngantang"
            ||$page=="Kec_luas_wilayah_pagak"
            ||$page=="Kec_luas_wilayah_pagelaran"
            ||$page=="Kec_luas_wilayah_pakis"
            ||$page=="Kec_luas_wilayah_pakisaji"
            ||$page=="Kec_luas_wilayah_poncokusumo"
            ||$page=="Kec_luas_wilayah_pujon"
            ||$page=="Kec_luas_wilayah_singosari"
            ||$page=="Kec_luas_wilayah_sumbermanjing"
            ||$page=="Kec_luas_wilayah_sumberpucung"
            ||$page=="Kec_luas_wilayah_tajinan"
            ||$page=="Kec_luas_wilayah_tirtoyudo"
            ||$page=="Kec_luas_wilayah_tumpang"
            ||$page=="Kec_luas_wilayah_turen"
            ||$page=="Kec_luas_wilayah_wagir"
            ||$page=="Kec_luas_wilayah_wajak"
            ||$page=="Kec_luas_wilayah_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampil_luas_wilayah').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if(     
			$page=="Kec_wisata_lokal_ampelgading"
            ||$page=="Kec_wisata_lokal_bantur"
            ||$page=="Kec_wisata_lokal_bululawang"
            ||$page=="Kec_wisata_lokal_dampit"
            ||$page=="Kec_wisata_lokal_dau"
            ||$page=="Kec_wisata_lokal_donomulyo"
            ||$page=="Kec_wisata_lokal_gedangan"
            ||$page=="Kec_wisata_lokal_gondanglegi"
            ||$page=="Kec_wisata_lokal_jabung"
            ||$page=="Kec_wisata_lokal_kalipare"
            ||$page=="Kec_wisata_lokal_karangploso"
            ||$page=="Kec_wisata_lokal_kasembon"
            ||$page=="Kec_wisata_lokal_kepanjen"
            ||$page=="Kec_wisata_lokal_kromengan"
            ||$page=="Kec_wisata_lokal_lawang"
            ||$page=="Kec_wisata_lokal_ngajum"
            ||$page=="Kec_wisata_lokal_ngantang"
            ||$page=="Kec_wisata_lokal_pagak"
            ||$page=="Kec_wisata_lokal_pagelaran"
            ||$page=="Kec_wisata_lokal_pakis"
            ||$page=="Kec_wisata_lokal_pakisaji"
            ||$page=="Kec_wisata_lokal_poncokusumo"
            ||$page=="Kec_wisata_lokal_pujon"
            ||$page=="Kec_wisata_lokal_singosari"
            ||$page=="Kec_wisata_lokal_sumbermanjing"
            ||$page=="Kec_wisata_lokal_sumberpucung"
            ||$page=="Kec_wisata_lokal_tajinan"
            ||$page=="Kec_wisata_lokal_tirtoyudo"
            ||$page=="Kec_wisata_lokal_tumpang"
            ||$page=="Kec_wisata_lokal_turen"
            ||$page=="Kec_wisata_lokal_wagir"
            ||$page=="Kec_wisata_lokal_wajak"
            ||$page=="Kec_wisata_lokal_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampil_wisata_lokal').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if(     
			$page=="Kec_jumlah_aset_ampelgading"
            ||$page=="Kec_jumlah_aset_bantur"
            ||$page=="Kec_jumlah_aset_bululawang"
            ||$page=="Kec_jumlah_aset_dampit"
            ||$page=="Kec_jumlah_aset_dau"
            ||$page=="Kec_jumlah_aset_donomulyo"
            ||$page=="Kec_jumlah_aset_gedangan"
            ||$page=="Kec_jumlah_aset_gondanglegi"
            ||$page=="Kec_jumlah_aset_jabung"
            ||$page=="Kec_jumlah_aset_kalipare"
            ||$page=="Kec_jumlah_aset_karangploso"
            ||$page=="Kec_jumlah_aset_kasembon"
            ||$page=="Kec_jumlah_aset_kepanjen"
            ||$page=="Kec_jumlah_aset_kromengan"
            ||$page=="Kec_jumlah_aset_lawang"
            ||$page=="Kec_jumlah_aset_ngajum"
            ||$page=="Kec_jumlah_aset_ngantang"
            ||$page=="Kec_jumlah_aset_pagak"
            ||$page=="Kec_jumlah_aset_pagelaran"
            ||$page=="Kec_jumlah_aset_pakis"
            ||$page=="Kec_jumlah_aset_pakisaji"
            ||$page=="Kec_jumlah_aset_poncokusumo"
            ||$page=="Kec_jumlah_aset_pujon"
            ||$page=="Kec_jumlah_aset_singosari"
            ||$page=="Kec_jumlah_aset_sumbermanjing"
            ||$page=="Kec_jumlah_aset_sumberpucung"
            ||$page=="Kec_jumlah_aset_tajinan"
            ||$page=="Kec_jumlah_aset_tirtoyudo"
            ||$page=="Kec_jumlah_aset_tumpang"
            ||$page=="Kec_jumlah_aset_turen"
            ||$page=="Kec_jumlah_aset_wagir"
            ||$page=="Kec_jumlah_aset_wajak"
            ||$page=="Kec_jumlah_aset_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampil_jumlah_aset').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if(     
			$page=="Kec_jumlah_pembinaan_ampelgading"
            ||$page=="Kec_jumlah_pembinaan_bantur"
            ||$page=="Kec_jumlah_pembinaan_bululawang"
            ||$page=="Kec_jumlah_pembinaan_dampit"
            ||$page=="Kec_jumlah_pembinaan_dau"
            ||$page=="Kec_jumlah_pembinaan_donomulyo"
            ||$page=="Kec_jumlah_pembinaan_gedangan"
            ||$page=="Kec_jumlah_pembinaan_gondanglegi"
            ||$page=="Kec_jumlah_pembinaan_jabung"
            ||$page=="Kec_jumlah_pembinaan_kalipare"
            ||$page=="Kec_jumlah_pembinaan_karangploso"
            ||$page=="Kec_jumlah_pembinaan_kasembon"
            ||$page=="Kec_jumlah_pembinaan_kepanjen"
            ||$page=="Kec_jumlah_pembinaan_kromengan"
            ||$page=="Kec_jumlah_pembinaan_lawang"
            ||$page=="Kec_jumlah_pembinaan_ngajum"
            ||$page=="Kec_jumlah_pembinaan_ngantang"
            ||$page=="Kec_jumlah_pembinaan_pagak"
            ||$page=="Kec_jumlah_pembinaan_pagelaran"
            ||$page=="Kec_jumlah_pembinaan_pakis"
            ||$page=="Kec_jumlah_pembinaan_pakisaji"
            ||$page=="Kec_jumlah_pembinaan_poncokusumo"
            ||$page=="Kec_jumlah_pembinaan_pujon"
            ||$page=="Kec_jumlah_pembinaan_singosari"
            ||$page=="Kec_jumlah_pembinaan_sumbermanjing"
            ||$page=="Kec_jumlah_pembinaan_sumberpucung"
            ||$page=="Kec_jumlah_pembinaan_tajinan"
            ||$page=="Kec_jumlah_pembinaan_tirtoyudo"
            ||$page=="Kec_jumlah_pembinaan_tumpang"
            ||$page=="Kec_jumlah_pembinaan_turen"
            ||$page=="Kec_jumlah_pembinaan_wagir"
            ||$page=="Kec_jumlah_pembinaan_wajak"
            ||$page=="Kec_jumlah_pembinaan_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampiljumlahPembinaan').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<script type="text/javascript">
    function myFunction(e) {
    document.getElementById("tahun1").value = e.target.value
    document.getElementById("tahun2").value = e.target.value
    document.getElementById("tahun3").value = e.target.value
    document.getElementById("tahun4").value = e.target.value
    document.getElementById("tahun5").value = e.target.value
    document.getElementById("tahun6").value = e.target.value
}
</script>
<?php }else if(     $page=="Kec_prestasi_yang_diraih_ampelgading"
            ||$page=="Kec_prestasi_yang_diraih_bantur"
            ||$page=="Kec_prestasi_yang_diraih_bululawang"
            ||$page=="Kec_prestasi_yang_diraih_dampit"
            ||$page=="Kec_prestasi_yang_diraih_dau"
            ||$page=="Kec_prestasi_yang_diraih_donomulyo"
            ||$page=="Kec_prestasi_yang_diraih_gedangan"
            ||$page=="Kec_prestasi_yang_diraih_gondanglegi"
            ||$page=="Kec_prestasi_yang_diraih_jabung"
            ||$page=="Kec_prestasi_yang_diraih_kalipare"
            ||$page=="Kec_prestasi_yang_diraih_karangploso"
            ||$page=="Kec_prestasi_yang_diraih_kasembon"
            ||$page=="Kec_prestasi_yang_diraih_kepanjen"
            ||$page=="Kec_prestasi_yang_diraih_kromengan"
            ||$page=="Kec_prestasi_yang_diraih_lawang"
            ||$page=="Kec_prestasi_yang_diraih_ngajum"
            ||$page=="Kec_prestasi_yang_diraih_ngantang"
            ||$page=="Kec_prestasi_yang_diraih_pagak"
            ||$page=="Kec_prestasi_yang_diraih_pagelaran"
            ||$page=="Kec_prestasi_yang_diraih_pakis"
            ||$page=="Kec_prestasi_yang_diraih_pakisaji"
            ||$page=="Kec_prestasi_yang_diraih_poncokusumo"
            ||$page=="Kec_prestasi_yang_diraih_pujon"
            ||$page=="Kec_prestasi_yang_diraih_singosari"
            ||$page=="Kec_prestasi_yang_diraih_sumbermanjing"
            ||$page=="Kec_prestasi_yang_diraih_sumberpucung"
            ||$page=="Kec_prestasi_yang_diraih_tajinan"
            ||$page=="Kec_prestasi_yang_diraih_tirtoyudo"
            ||$page=="Kec_prestasi_yang_diraih_tumpang"
            ||$page=="Kec_prestasi_yang_diraih_turen"
            ||$page=="Kec_prestasi_yang_diraih_wagir"
            ||$page=="Kec_prestasi_yang_diraih_wajak"
            ||$page=="Kec_prestasi_yang_diraih_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampilbanyakprestasi').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<script type="text/javascript">
    function myFunction(e) {
    document.getElementById("tahun9").value = e.target.value
    document.getElementById("tahun1").value = e.target.value
    document.getElementById("tahun2").value = e.target.value
    document.getElementById("tahun3").value = e.target.value
    document.getElementById("tahun4").value = e.target.value
    document.getElementById("tahun5").value = e.target.value
    document.getElementById("tahun6").value = e.target.value
    document.getElementById("tahun7").value = e.target.value

}
</script>
<?php }else if(     
			$page=="Kec_jumlah_aset_dihapus_ampelgading"
            ||$page=="Kec_jumlah_aset_dihapus_bantur"
            ||$page=="Kec_jumlah_aset_dihapus_bululawang"
            ||$page=="Kec_jumlah_aset_dihapus_dampit"
            ||$page=="Kec_jumlah_aset_dihapus_dau"
            ||$page=="Kec_jumlah_aset_dihapus_donomulyo"
            ||$page=="Kec_jumlah_aset_dihapus_gedangan"
            ||$page=="Kec_jumlah_aset_dihapus_gondanglegi"
            ||$page=="Kec_jumlah_aset_dihapus_jabung"
            ||$page=="Kec_jumlah_aset_dihapus_kalipare"
            ||$page=="Kec_jumlah_aset_dihapus_karangploso"
            ||$page=="Kec_jumlah_aset_dihapus_kasembon"
            ||$page=="Kec_jumlah_aset_dihapus_kepanjen"
            ||$page=="Kec_jumlah_aset_dihapus_kromengan"
            ||$page=="Kec_jumlah_aset_dihapus_lawang"
            ||$page=="Kec_jumlah_aset_dihapus_ngajum"
            ||$page=="Kec_jumlah_aset_dihapus_ngantang"
            ||$page=="Kec_jumlah_aset_dihapus_pagak"
            ||$page=="Kec_jumlah_aset_dihapus_pagelaran"
            ||$page=="Kec_jumlah_aset_dihapus_pakis"
            ||$page=="Kec_jumlah_aset_dihapus_pakisaji"
            ||$page=="Kec_jumlah_aset_dihapus_poncokusumo"
            ||$page=="Kec_jumlah_aset_dihapus_pujon"
            ||$page=="Kec_jumlah_aset_dihapus_singosari"
            ||$page=="Kec_jumlah_aset_dihapus_sumbermanjing"
            ||$page=="Kec_jumlah_aset_dihapus_sumberpucung"
            ||$page=="Kec_jumlah_aset_dihapus_tajinan"
            ||$page=="Kec_jumlah_aset_dihapus_tirtoyudo"
            ||$page=="Kec_jumlah_aset_dihapus_tumpang"
            ||$page=="Kec_jumlah_aset_dihapus_turen"
            ||$page=="Kec_jumlah_aset_dihapus_wagir"
            ||$page=="Kec_jumlah_aset_dihapus_wajak"
            ||$page=="Kec_jumlah_aset_dihapus_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampil_jumlah_aset_dihapus').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script><?php }else if(     
      $page=="Kec_jamkesmas_ampelgading"
            ||$page=="Kec_jamkesmas_bantur"
            ||$page=="Kec_jamkesmas_bululawang"
            ||$page=="Kec_jamkesmas_dampit"
            ||$page=="Kec_jamkesmas_dau"
            ||$page=="Kec_jamkesmas_donomulyo"
            ||$page=="Kec_jamkesmas_gedangan"
            ||$page=="Kec_jamkesmas_gondanglegi"
            ||$page=="Kec_jamkesmas_jabung"
            ||$page=="Kec_jamkesmas_kalipare"
            ||$page=="Kec_jamkesmas_karangploso"
            ||$page=="Kec_jamkesmas_kasembon"
            ||$page=="Kec_jamkesmas_kepanjen"
            ||$page=="Kec_jamkesmas_kromengan"
            ||$page=="Kec_jamkesmas_lawang"
            ||$page=="Kec_jamkesmas_ngajum"
            ||$page=="Kec_jamkesmas_ngantang"
            ||$page=="Kec_jamkesmas_pagak"
            ||$page=="Kec_jamkesmas_pagelaran"
            ||$page=="Kec_jamkesmas_pakis"
            ||$page=="Kec_jamkesmas_pakisaji"
            ||$page=="Kec_jamkesmas_poncokusumo"
            ||$page=="Kec_jamkesmas_pujon"
            ||$page=="Kec_jamkesmas_singosari"
            ||$page=="Kec_jamkesmas_sumbermanjing"
            ||$page=="Kec_jamkesmas_sumberpucung"
            ||$page=="Kec_jamkesmas_tajinan"
            ||$page=="Kec_jamkesmas_tirtoyudo"
            ||$page=="Kec_jamkesmas_tumpang"
            ||$page=="Kec_jamkesmas_turen"
            ||$page=="Kec_jamkesmas_wagir"
            ||$page=="Kec_jamkesmas_wajak"
            ||$page=="Kec_jamkesmas_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampil_kec_jaminan_kesehatan').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>
<?php }else if(     
        $page=="Kec_jumlah_jenis_pelayanan_ampelgading"
      ||$page=="Kec_jumlah_jenis_pelayanan_bantur"
      ||$page=="Kec_jumlah_jenis_pelayanan_bululawang"
      ||$page=="Kec_jumlah_jenis_pelayanan_dampit"
      ||$page=="Kec_jumlah_jenis_pelayanan_dau"
      ||$page=="Kec_jumlah_jenis_pelayanan_donomulyo"
      ||$page=="Kec_jumlah_jenis_pelayanan_gedangan"
      ||$page=="Kec_jumlah_jenis_pelayanan_gondanglegi"
      ||$page=="Kec_jumlah_jenis_pelayanan_jabung"
      ||$page=="Kec_jumlah_jenis_pelayanan_kalipare"
      ||$page=="Kec_jumlah_jenis_pelayanan_karangploso"
      ||$page=="Kec_jumlah_jenis_pelayanan_kasembon"
      ||$page=="Kec_jumlah_jenis_pelayanan_kepanjen"
      ||$page=="Kec_jumlah_jenis_pelayanan_kromengan"
      ||$page=="Kec_jumlah_jenis_pelayanan_lawang"
      ||$page=="Kec_jumlah_jenis_pelayanan_ngajum"
      ||$page=="Kec_jumlah_jenis_pelayanan_ngantang"
      ||$page=="Kec_jumlah_jenis_pelayanan_pagak"
      ||$page=="Kec_jumlah_jenis_pelayanan_pagelaran"
      ||$page=="Kec_jumlah_jenis_pelayanan_pakis"
      ||$page=="Kec_jumlah_jenis_pelayanan_pakisaji"
      ||$page=="Kec_jumlah_jenis_pelayanan_poncokusumo"
      ||$page=="Kec_jumlah_jenis_pelayanan_pujon"
      ||$page=="Kec_jumlah_jenis_pelayanan_singosari"
      ||$page=="Kec_jumlah_jenis_pelayanan_sumbermanjing"
      ||$page=="Kec_jumlah_jenis_pelayanan_sumberpucung"
      ||$page=="Kec_jumlah_jenis_pelayanan_tajinan"
      ||$page=="Kec_jumlah_jenis_pelayanan_tirtoyudo"
      ||$page=="Kec_jumlah_jenis_pelayanan_tumpang"
      ||$page=="Kec_jumlah_jenis_pelayanan_turen"
      ||$page=="Kec_jumlah_jenis_pelayanan_wagir"
      ||$page=="Kec_jumlah_jenis_pelayanan_wajak"
      ||$page=="Kec_jumlah_jenis_pelayanan_wonosari"){ ?>
<?php $idx = $this->uri->segment(1);?>
<script type="text/javascript">
   $(document).ready(function() {
     var end;
      var tp1 = $('#tampil_jumlah_jenis_pelayanan').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},
        ],
    "language":{
      "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json" 
    },
     "ajax": '<?php echo $idx; ?>/get'
    } );
    
     
  $("#tahun").change(function () {
    
        end = this.value;
    console.log(end);
    tp1.ajax.url( '<?php echo $idx; ?>/get?tahun='+end ).load();
    });
    
  } );
</script>



<?php }else if($page=="C_potensi_unggulan"){ ?>
<script type="text/javascript">
 var end;
       
        var tp1 = $('#tampilPotensi').DataTable( {
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
         "ajax": 'C_potensi_unggulan/get'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'C_potensi_unggulan/get?tahun='+end ).load();
    });
    


</script>

<script type="text/javascript">

         function tampilDesa()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>C_potensi_unggulan/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }

 function tampilDesaPerusahaanLimbah()
 {
     var kdkec = document.getElementById("kecamatan_id").value;
     $.ajax({
         url:"<?php echo base_url();?>Perusahaan_limbah/pilih_kelurahan/"+kdkec+"",
         success: function(response){
         $("#kelurahan_id").html(response);
         },
         dataType:"html"
     });
     return false;
 }

 
</script>
<?php } ?>
		<style>
		.container-fluid {
          overflow-x: scroll;
        }
		</style>
</html>