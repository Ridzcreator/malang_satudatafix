<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Alat Angkut Sampah <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Alatangkut'); ?>"></i> Alatangkut</a></li>
            <li class="active">Alat Angkut</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        $alatangkut[]=$a['keterangan'];
						$unit[]=intval($a['jumlah']);
						$periode=intval($a['periode']);
            ?>
	<div class="box" id="tampilr" style="min-width: 310px; max-width: 90%; height: 100%; margin: 0 auto">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
    Highcharts.chart('tampilr', {
     chart: {
        type: 'bar'
    },
    title: {
        text: 'Alat Angkut Sampah Yang Tersedia Di Kabupaten Malang'
    },
    subtitle: {
        text: 'Tahun <?=json_encode($periode); ?>'
    },
    xAxis: {
        categories: [<?php $arrlength = count($alatangkut);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode($alatangkut[$x]);
				if($x < $arrlength-1){
				echo ",";
				}
				}?>],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Banyaknya Alat Angkut Sampah',
            align: 'middle'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' Unit'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Year <?=json_encode($periode); ?>',
        data: [<?php $arrlength = count($alatangkut);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($unit[$x]));
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
