<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Jenis Korban di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Jeniskorban'); ?>"></i>Laporan Jumlah Jenis Korban</a></li>
            <li class="active">Laporan Jumlah Jenis Korban</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php	
			$table=array();
			$jumlah = array();
                    foreach ($data->result_array() as $a) {
                      
						$periode=$a['periode'];
						$jenis[]=$a['jeniskorban'];
						$nol[]=intval($a['nol']);
						$sepuluh[]=intval($a['sepuluh']);
						$duapuluh[]=intval($a['duapuluh']);
						$tigalima[]=intval($a['tigalima']);
                        $jumlah[]=intval($a['jumlah']);
					
					}
            ?>
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts-more.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/drilldown.js"></script>

<div id="tampilr" class="box" style="min-width: 310px; max-width: 90%; height: 80&; margin: 0 auto;">
<script type="text/javascript">
Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Jenis Korban di Kabupaten Malang'
    },
    subtitle: {
        text: 'Badan Penanggulangan Bencana Tahun <?php echo $periode; ?>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
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
                format: '{point.y:.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: Total : <b>{point.y:0f}</b><br/>'
    },

    series: [
        {
            name: "Grafik",
            colorByPoint: true,
            data: [
                
				<?php $arrlength = count($jumlah);
				for($x = 0; $x < $arrlength; $x++) {?>
				{
                    name: <?php echo json_encode($jenis[$x]); ?>,
                    y: <?php echo json_encode(intval($jumlah[$x])); ?>,
                    drilldown: <?php echo json_encode($jenis[$x]); ?>
                }
				<?php
				if($x < $arrlength-1){
				echo ",";
				}
				}?>
				
            ]
        }
    ],
    drilldown: {
        series: [
			<?php $arrlength = count($jumlah);
				for($x = 0; $x < $arrlength; $x++) {?>
				{
                name: <?php echo json_encode($jenis[$x]); ?>,
                id: <?php echo json_encode($jenis[$x]); ?>,
					data: [
                        
						[
							"Usia 0 - 10 Tahun",
							<?php echo json_encode(intval($nol[$x])); ?>
						],[
							"Usia 10 - 20 Tahun",
							<?php echo json_encode(intval($sepuluh[$x])); ?>
						],[
							"Usia 20 - 35 Tahun",
							<?php echo json_encode(intval($duapuluh[$x])); ?>
						],[
							"Lebih Dari 35 Tahun",
							<?php echo json_encode(intval($tigalima[$x])); ?>
						]
					]
				}
				<?php
				if($x < $arrlength-1){
				echo ",";
				}
				}?>
        ]
    }
});

</script>
</div>
    </section>
    <!-- /.content -->

</div>
