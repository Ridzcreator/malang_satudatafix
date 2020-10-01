<body>
<?php
if($datap=="tps"){
	$page="Tempat Penampungan Sementara (TPS)";
}else if($datap=="tpst"){
	$page="Tempat Pengelahan Sampah Terpadu (TPST)";
}else if($datap=="tpalokal"){
	$page="Tempat Pemrosesan Akhir (TPA) Lokal";
}else if($datap=="tparegional"){
	$page="Tempat Pemrosesan Akhir (TPA) Regional";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data TPS <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Tps'); ?>"></i> Tps</a></li>
            <li class="active">Grafik Area Data <?php echo $page; ?></li>
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
						if($datap=="tps"){
							$value[]=intval($a['TPS']);
						}else if($datap=="tpst"){
							$value[]=intval($a['TPST']);
						}else if($datap=="tpalokal"){
							$value[]=intval($a['TPAlokal']);
						}else if($datap=="tparegional"){
							$value[]=intval($a['TPAregional']);
						}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Perbandingan Data Tps'
    },

    subtitle: {
        text: 'Dinas Lingkungan Hidup Kabupaten Malang'
    },
    tooltip: {
        valueSuffix: ' Lokasi'
    },
    yAxis: {
        title: {
            text: 'Jumlah Data (Lokasi)'
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
        type: 'area',
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
	<table width=100%>
	<tr>
	<td></td>
	<td>
	<div class="callout callout-info pull-middle" style="position:relative;text-align:left;">
					<p>TPS   : Tempat Penampungan Sementara.<p>
					<p>TPST  : Tempat Pengelolahan Sampah Terpadu.<p>
					<p>TPA   : Tempat Pemrosesan Akhir.<p>
	</div>
	</td><td></td>
	</tr>
	</table>
</div>

</body>