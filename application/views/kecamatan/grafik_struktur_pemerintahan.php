<?php 
	foreach ($data->result_array() as $a) {
	$keterangan=($a['keterangan']);
	}
	$idx = $this->uri->segment(1);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Struktur Pemerintahan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url($idx); ?>"></i> Struktur Pemerintahan</a></li>
            <li class="active">Grafik Struktur Pemerintahan Kecamatan <?php echo $keterangan; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$value=intval($a['desa']);
						$value1=intval($a['dusun']);
						$value2=intval($a['rw']);
						$value3=intval($a['rt']);
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
        text: 'Grafik Struktur Pemerintahan Kecamatan <?php echo $keterangan; ?> Di Kabupaten Malang Tahun <?=json_encode($periode); ?>'
    },
    xAxis: {
        type: 'category',
        crosshair: true
    },
    yAxis: {
        title: {
            text: 'Grafik Struktur Pemerintahan'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
			pointPadding: 0.2,
            dataLabels: {
                enabled: true,
                format: '{point.y:f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
    },

    series: [
        {
            name: "<?php echo $keterangan; ?>",
            colorByPoint: true,
            data: [
                {
                    name: "Desa",
                    y: <?=json_encode($value); ?>,
                },
                {
                    name: "Dusun",
                    y: <?=json_encode($value1); ?>,
                },
                {
                    name: "RW",
                    y: <?=json_encode($value2); ?>,
                },
                {
                    name: "RT",
                    y: <?=json_encode($value3); ?>,
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

</div>
