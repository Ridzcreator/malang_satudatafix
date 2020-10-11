<body>
<?php
if($datap=="aparatpp"){
	$page="Data Aparat Pamong Praja";
}else if($datap=="aparatlinmas"){
	$page="Data Aparat Linmas";
}else if($datap=="ppspp"){
	$page="Data Petugas Satpol PP";
}else if($datap=="ppm"){
	$page="Data Petugas Perlindungan Masyarakat";
}else if($datap=="poskeamanan"){
	$page="Data Pos Keamanan";
}else if($datap=="poskamling"){
	$page="Data Pos Kamling";
}else if($datap=="roda2"){
	$page="Data Unit Kendaraan Operasional Roda 2";
}else if($datap=="roda4"){
	$page="Data Unit Kendaraan Operasional Roda 4";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Sarana<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Sarana'); ?>"></i> Sarana</a></li>
            <li class="active">Grafik Bar <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
				$periode=array();
				$value=array();
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode[]=intval($a['periode']);
						if($datap=="aparatpp"){
						$value[]=intval($a['aparatpp']);
					}else if($datap=="aparatlinmas"){
						$value[]=intval($a['aparat_linmas']);
					}else if($datap=="ppspp"){
						$value[]=intval($a['petugas_satpol']);
					}else if($datap=="ppm"){
						$value[]=intval($a['petugas_pp']);
					}else if($datap=="poskeamanan"){
						$value[]=intval($a['pos_keamanan']);
					}else if($datap=="poskamling"){
						$value[]=intval($a['pos_kamling']);
					}else if($datap=="roda2"){
						$value[]=intval($a['roda2']);
					}else if($datap=="roda4"){
						$value[]=intval($a['roda4']);
					}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Perbandingan Data Sarana dan Prasarana Keamanan'
    },

    subtitle: {
        text: 'Dinas Ketertiban Umum Kabupaten Malang'
    },
    tooltip: {
        valueSuffix: ' Unit'
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
        }
    },

    xAxis: {
        categories: [<?php $arrlength = count($periode);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($periode[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },

    series: [{
        type: 'column',
		name: "Jumlah Data ",
        colorByPoint: true,
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>],
        showInLegend: false
    }]

});

</script>
	</div>
	<?php } ?>
</section>
    <!-- /.content -->
</div>

</body>