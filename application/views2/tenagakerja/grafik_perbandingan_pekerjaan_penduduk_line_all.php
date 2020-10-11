<body>
<?php
if($datap=="all"){
    $page="Seluruh Data Pekerjaan Penduduk";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Pekerjaan Penduduk di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Pekerjaan_penduduk'); ?>">Pekerjaan Penduduk</a></li>
            <li class="active">Grafik Line <?php echo $page; ?></li>
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
                        if($datap=="all"){
                              $value[]=intval($a['jumlah']);
                        }
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
        text: 'Grafik Perbandingan <?php echo $page; ?>'
    },
    subtitle: {
        text: 'Dinas Perindustrian dan Perdagangan Kabupaten Malang'
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
    yAxis: {
        title: {
            text: 'Jumlah Data'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Jumlah Pekerjaan',
        data: [<?php $arrlength = count($value);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value[$x]));
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