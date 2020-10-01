<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Jumlah Banyak Bencana di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Banyakbencana'); ?>"></i>Laporan Jumlah Banyak Bencana</a></li>
            <li class="active">Laporan Jumlah Banyak Bencana</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php	
			$table=array();
			$jumlahk = array();
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        
						$periode=$a['periode'];
						$kecamatan[]=$a['nama_kecamatan'];
						$jumlahk[]=intval($a['jumlah_bencana']);
						$mati[]=intval($a['mati']);
						$luka[]=intval($a['luka']);
						$menderita[]=intval($a['menderita']);
                        $jumlah[]=intval($a['jumlah']);
						$hancur[]=intval($a['hancur']);
						$rusak[]=intval($a['rusak']);
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
        text: 'Grafik Jumlah Banyak Bencana di Kabupaten Malang'
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
                
				<?php $arrlength = count($jumlahk);
				for($x = 0; $x < $arrlength; $x++) {?>
				{
                    name: <?php echo json_encode($kecamatan[$x]); ?>,
                    y: <?php echo json_encode(intval($jumlahk[$x])); ?>,
                    drilldown: <?php echo json_encode($kecamatan[$x]); ?>
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
			<?php $arrlength = count($jumlahk);
				for($x = 0; $x < $arrlength; $x++) {?>
				{
                name: <?php echo json_encode($kecamatan[$x]); ?>,
                id: <?php echo json_encode($kecamatan[$x]); ?>,
					data: [
                        
						[
							"Mati",
							<?php echo json_encode(intval($mati[$x])); ?>
						],[
							"Luka",
							<?php echo json_encode(intval($luka[$x])); ?>
						],[
							"Menderita",
							<?php echo json_encode(intval($menderita[$x])); ?>
						],[
							"Hancur",
							<?php echo json_encode(intval($hancur[$x])); ?>
						],[
							"Rusak",
							<?php echo json_encode(intval($rusak[$x])); ?>
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
