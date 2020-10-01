<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Jumlah Prasarana Olahraga di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('C_prasarana'); ?>"></i> Jumlah Prasarana di Kabupaten Malang</a></li>
            <li class="active">Jumlah Prasarana Olahraga di Kabupaten Malang</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
						$periode=$a['tahun'];
                        $keterangan[]=$a['kcmtn'];
                        $jumlahk[]=intval($a['jumlah']);
						$stadion[]=$a['stadion'];
                        $spkbola[]=$a['sb'];
                        $voly[]=$a['bv'];
                        $basket[]=$a['bb'];
                        $tenis[]=$a['tenis'];
                        $badminton[]=$a['bt']; 
                        $futsal[]=$a['futsal']; 
                        $gor[]=$a['gor']; 
                        $aula[]=$a['aula']; 
                        $kolam[]=$a['kr'];
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
        text: 'Grafik Jumlah Prasarana Olahraga di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Kepemudaan dan Olahraga Tahun <?php echo $periode; ?>'
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
                    name: <?php echo json_encode($keterangan[$x]); ?>,
                    y: <?php echo json_encode(intval($jumlahk[$x])); ?>,
                    drilldown: <?php echo json_encode($keterangan[$x]); ?>
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
                name: <?php echo json_encode($keterangan[$x]); ?>,
                id: <?php echo json_encode($keterangan[$x]); ?>,
					data: [
						[
							"Jumlah Prasarana",
							<?php echo json_encode(intval($jumlahk[$x])); ?>
						],[
							"Jumlah Stadion",
							<?php echo json_encode(intval($stadion[$x])); ?>
						],[
							"Jumlah Sepak bola",
							<?php echo json_encode(intval($spkbola[$x])); ?>
						],[
                            "Jumlah Bola Voly",
                            <?php echo json_encode(intval($voly[$x])); ?>
                        ],[
                            "Jumlah Basket",
                            <?php echo json_encode(intval($basket[$x])); ?>
                        ],[
                            "Jumlah Tenis",
                            <?php echo json_encode(intval($tenis[$x])); ?>
                        ],[
                            "Jumlah Bulutangkis",
                            <?php echo json_encode(intval($badminton[$x])); ?>
                        ],[
                            "Jumlah Futsal",
                            <?php echo json_encode(intval($futsal[$x])); ?>
                        ],[
                            "JJumlah Gor",
                            <?php echo json_encode(intval($gor[$x])); ?>
                        ],[
                            "Jumlah Aula",
                            <?php echo json_encode(intval($aula[$x])); ?>
                        ],[
                            "Jumlah Kolam Renang",
                            <?php echo json_encode(intval($kolam[$x])); ?>
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
