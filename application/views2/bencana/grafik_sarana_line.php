<body>
<?php

	$page="Seluruh Data Sarana Keamanan";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Sarana Dan Prasarana Keamanan di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Sarana'); ?>">Jumlah Sarana Keamanan di Kabupaten Malang</a></li>
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
                $value7=array();


                    foreach ($data->result_array() as $a) {
                        
						    $periode[]=intval($a['periode']);
							$value[]=intval($a['aparatpp']);
							$value1[]=intval($a['aparat_linmas']);
							$value2[]=intval($a['petugas_satpol']);
                            $value3[]=intval($a['petugas_pp']);
                            $value4[]=intval($a['pos_keamanan']);
                            $value5[]=intval($a['pos_kamling']);
                            $value6[]=intval($a['roda2']);
                            $value7[]=intval($a['roda4']);

						
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
Highcharts.chart('tampilr', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Perbandingan Data Sarana di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Ketertiban Umum Kabupaten Malang'
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
            text: 'Sarana Dan Prasarana'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}</td><td>: </td>' +
					 '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
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
        name: 'Aparat Pamong Praja',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Aparat Linmas',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Petugas Patroli Satpol PP',
        data: [<?php $arrlength = count($value2);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value2[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Petugas Perlindungan Masyarakat',
        data: [<?php $arrlength = count($value3);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Pos Keamanan',
        data: [<?php $arrlength = count($value4);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Pos Kamling',
        data: [<?php $arrlength = count($value5);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Kendaraan Operasional Roda 2',
        data: [<?php $arrlength = count($value6);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Kendaraan Operasional Roda 4',
        data: [<?php $arrlength = count($value7);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
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
</div>

</body>