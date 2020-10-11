<style type="text/css">
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


input[type="number"] {
    min-width: 50px;
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
            <li class="active">Grafik Pie Data <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
				$periode=array();
				$value=array();
                //$this->input->get('name');
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode[]=intval($a['tahun']);
                        if($datap=="1"){
							$value[]=intval($a['domestik']);
						}else if($datap=="2"){
							$value[]=intval($a['mancanegara']);
						}else if($datap=="3"){
                            $value[]=intval($a['name']);
                        }
                    }
                        // echo '<pre>';
                        // print_r($periode);
                        // print_r($value);
                        // print_r($data->result_array);
                        // echo "</pre>";
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
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Grafik Perbandingan Data Jumlah Wisatawan Datang di Kabupaten Malang' 
    },
    subtitle: {
        text: 'Dinas Pariwisata dan Kebudayaan Kabupaten Malang'
    },
    tooltip: {
        valueSuffix: 'orang'
    },
    accessibility: {
        point: {
            valueSuffix: 'orang'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
            }
        }
    },
    series: [{
        name: 'jumlah Wisatawan',
        colorByPoint: true,
        data: [
            <?php foreach($value as $keyV=>$valV)
            { ?>
                { name: '<?php echo $periode[$keyV] ?>',
                y: <?php echo $value[$keyV] ?>,
         
            <?php echo $keyV==0 ? 'sliced: true,selected: true':"" ?> },
        <?php } ?>
        ]
        
    }]
});
	</script>
	</div>
	
</section>
    <!-- /.content -->
</div>

</body>