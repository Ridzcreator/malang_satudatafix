<style type="text/css">
#container {
    height: 410px; 
}

.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>
<body>
<?php
if($datap=="1"){
	$page="Jumlah Total Domestik";
}else if($datap=="2"){
	$page="Jumlah Total Mancanegara";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Jumlah Wisatawan di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('C_wisatawan'); ?>">Wisatawan Datang</a></li>
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
						$periode[]=intval($a['tahun']);
						if($datap=="1"){
							$value[]=intval($a['domestik']);
						}else if($datap=="2"){
							$value[]=intval($a['mancanegara']);
						}
            ?>
    
	<div class="box" id="container" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
    <script src="../../code/modules/export-data.js"></script>
    <script src="../../code/modules/accessibility.js"></script>

	<script type="text/javascript">
	Highcharts.chart('container', {
    chart: {
        type: 'area',
        inverted: true
    },
    title: {
        text: 'Grafik Perbandingan Data Jumlah Wisatawan Datang di Kabupaten Malang'
    },
     subtitle: {
        text: 'Dinas Pariwisata dan Kebudayaan Kabupaten Malang'
    },
    accessibility: {
        keyboardNavigation: {
            seriesNavigation: {
                mode: 'serialize'
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -250,
        y: 100,
        floating: true,
        borderWidth: 2,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#22e322'
    },
    xAxis: {
        categories: [
            <?php $arrlength = count($periode);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($periode[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>
        ]
    },
    yAxis: {
        title: {
            text: 'jumlah data'
        },
        allowDecimals: false,
        min: 0
    },
    plotOptions: {
        area: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: "jumlah data ",
        name: '<?php echo $page; ?> tiap tahun ',
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