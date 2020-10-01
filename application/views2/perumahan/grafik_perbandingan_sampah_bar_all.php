<body>
<?php
if($datap=="all"){
	$page="Seluruh Data Sampah";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Sampah <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Perumahan'); ?>"></i> Perumahan</a></li>
            <li class="active">Grafik Bar Data <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
				$periode=array();
				$value=array();
				$value1=array();
				$value2=array();
				$value3=array();
				$value4=array();
				$value5=array();
				$value6=array();
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode[]=intval($a['periode']);
						if($datap=="all"){
							$value[]=intval($a['hasilsrt']);
							$value1[]=intval($a['sejenissrt']);
							$value2[]=intval($a['tertangani']);
							$value3[]=intval($a['beracun']);
							$value4[]=intval($a['beracunterolah']);
							$value5[]=intval($a['limbah']);
							$value6[]=intval($a['limbahterolah']); 
						}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perbandingan Data Sampah'
    },
    subtitle: {
        text: 'Dinas Lingkungan Hidup Kabupaten Malang'
    },
    xAxis: {
        categories: [<?php $arrlength = count($periode);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($periode[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data (Kg/Tahun)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}</td><td>: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Kg/Tahun</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'SRT',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'SSRT',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'Tertangani',
        data: [<?php $arrlength = count($value2);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value2[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'Beracun',
        data: [<?php $arrlength = count($value3);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value3[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'Beracun Terolah',
        data: [<?php $arrlength = count($value4);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value4[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'Limbah',
        data: [<?php $arrlength = count($value5);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value5[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'Limbah Terolah',
        data: [<?php $arrlength = count($value6);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value6[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

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
	<td align="center">
	<div class="callout callout-info pull-middle" style="position:relative;text-align:left;">
		<p>SRT  : Sampah Hasil Rumah Tangga</p>
	</div>
	</td><td></td>
	</tr>
	</table>
</div>

</body>