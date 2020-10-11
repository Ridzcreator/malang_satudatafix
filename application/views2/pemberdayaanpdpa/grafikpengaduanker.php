<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Laporan Pengaduan Korban Kekerasan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Tps'); ?>"></i> Laporan Pengaduan Korban Kekerasan</a></li>
            <li class="active">Laporan Pengaduan Korban Kekerasan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php	
			$table=array();
			$jumlahk = array();
			$keterangan = array();
			$muda = array();
			$sedang = array();
			$tua = array();
			$kdrt = array();
			$psikis = array();
			$seksual = array();
			$eksploitasi = array();
			$penelantaran = array();
			$lainnya = array();
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode = $a['periode'];
						$keterangan[] = $a['keterangan'];
						$lkdrt[] = intval($a['lfisik']);
						$pkdrt[] = intval($a['pfisik']);
						$lpsikis[] = intval($a['lpsikis']);
						$ppsikis[] = intval($a['ppsikis']);
						$lseksual[] = intval($a['lseksual']);
						$pseksual[] = intval($a['pseksual']);
						$leksploitasi[] = intval($a['leksploitasi']);
						$peksploitasi[] = intval($a['peksploitasi']);
						$lpenelantaran[] = intval($a['lpenelantaran']);
						$ppenelantaran[] = intval($a['ppenelantaran']);
						$llainnya[] = intval($a['llainnya']);
						$plainnya[] = intval($a['plainnya']);
						$jumlahk[] = $a['lfisik']+$a['pfisik']+$a['lpsikis']+$a['ppsikis']+$a['lseksual']+$a['pseksual']+$a['leksploitasi']+$a['peksploitasi']+$a['lpenelantaran']+$a['ppenelantaran']+$a['llainnya']+$a['plainnya'];
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
        text: 'Grafik Jumlah Korban Kekerasan di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak Tahun <?php echo $periode; ?>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah Data ( Kasus )'
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
							"Jumlah Pekka",
							<?php echo json_encode(intval($jumlahk[$x])); ?>
						],[
							"Laki laki Fisik & KDRT",
							<?php echo json_encode(intval($lkdrt[$x])); ?>
						],[
							"Perempuan Fisik & KDRT",
							<?php echo json_encode(intval($pkdrt[$x])); ?>
						],[
							"Laki laki Psikis",
							<?php echo json_encode(intval($lpsikis[$x])); ?>
						],[
							"Perempuan Psikis",
							<?php echo json_encode(intval($ppsikis[$x])); ?>
						],[
							"Laki laki Seksual",
							<?php echo json_encode(intval($lseksual[$x])); ?>
						],[
							"Perempuan Seksual",
							<?php echo json_encode(intval($pseksual[$x])); ?>
						],[
							"Laki laki Eksploitasi",
							<?php echo json_encode(intval($leksploitasi[$x])); ?>
						],[
							"Perempuan Eksploitasi",
							<?php echo json_encode(intval($peksploitasi[$x])); ?>
						],[
							"Laki laki Penelantaran",
							<?php echo json_encode(intval($lpenelantaran[$x])); ?>
						],[
							"Perempuan Penelantaran",
							<?php echo json_encode(intval($ppenelantaran[$x])); ?>
						],[
							"Laki laki Lainnya",
							<?php echo json_encode(intval($llainnya[$x])); ?>
						],[
							"Perempuan Lainnya",
							<?php echo json_encode(intval($plainnya[$x])); ?>
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
