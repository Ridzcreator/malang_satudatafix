<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Tempat Pengelolahan Sampah<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Tps'); ?>"></i> Tempat Pengelolahan Sampah</a></li>
            <li class="active">Tempat Pengelolahan Sampah</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        $tps=intval($a['TPS']);
                        $tpst=intval($a['TPST']);
						$tps=intval($a['TPS']);
                        $tpst=intval($a['TPST']);
						$tpal=intval($a['TPAlokal']);
						$tpar=intval($a['TPAregional']);
						$periode=intval($a['periode']);
            ?>
<div id="tampilr" class="box" style="min-width: 310px; max-width: 90%; height: 80%; margin: 0 auto">
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/data.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/drilldown.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script type="text/javascript">
    Highcharts.chart('tampilr', {
     chart: {
        type: 'column'
    },
    title: {
        text: 'Tempat Pengelolahan Sampah Yang Tersedia Di Kabupaten Malang Tahun <?=json_encode($periode); ?>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Banyak Tempat Pengolagan Sampah'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: [
                {
                    name: "TPS",
                    y: <?=json_encode($tps); ?>,
                },
                {
                    name: "TPST",
                    y: <?=json_encode($tpst); ?>,
                },
                {
                    name: "TPA Lokal",
                    y: <?=json_encode($tpal); ?>,
                },
                {
                    name: "TPA Regional",
                    y: <?=json_encode($tpar); ?>,
                },         
            ]
        }
    ],
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
