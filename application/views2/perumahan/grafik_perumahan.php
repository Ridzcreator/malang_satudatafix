<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Sampah <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Perumahan'); ?>"></i> Perumahan</a></li>
            <li class="active">Grafik Detail Data Perumahan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode=intval($a['periode']);
						$hasilsrt=intval($a['hasilsrt']);
						$sejenissrt=intval($a['sejenissrt']);
						$tertangani=intval($a['tertangani']);
						$beracun=intval($a['beracun']);
						$beracunterolah=intval($a['beracunterolah']);
						$limbah=intval($a['limbah']);
						$limbahterolah=intval($a['limbahterolah']);      
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
    Highcharts.chart('tampilr', {
     chart: {
        type: 'bar'
    },
    title: {
        text: 'Data Sampah Di Kabupaten Malang'
    },
    subtitle: {
        text: 'Tahun <?=json_encode($periode); ?>'
    },
    xAxis: {
        categories: ['Hasil SRT', 'Sejenis SRT', 'Sampah Terolah', 'Beracun', 'Beracun Terolah','Limbah','Limbah Terolah'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Banyaknya Data Sampah',
            align: 'middle'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' Kg/Tahun'
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
        data: [<?=json_encode($hasilsrt); ?>, <?=json_encode($sejenissrt); ?>, <?=json_encode($tertangani); ?>, <?=json_encode($beracun); ?>, <?=json_encode($beracunterolah); ?>, <?=json_encode($limbah); ?>, <?=json_encode($limbahterolah); ?>]
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