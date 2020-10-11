<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Laporan Pengaduan Perempuan Korban Kekerasan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Tps'); ?>"></i> Laporan Pengaduan Perempuan Korban Kekerasan</a></li>
            <li class="active">Laporan Pengaduan Perempuan Korban Kekerasan</li>
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
						$jumlahk[] = intval($a['jumlah_kasus']);
						$muda[] = intval($a['19an']);
						$sedang[] = intval($a['25an']);
						$tua[] = intval($a['45an']);
						$kdrt[] = intval($a['kdrt']);
						$psikis[] = intval($a['psikis']);
						$seksual[] = intval($a['seksual']);
						$eksploitasi[] = intval($a['eksploitasi']);
						$penelantaran[] = intval($a['penelantaran']);
						$lainnya[] = intval($a['lainnya']);
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
        text: 'Grafik Jumlah Perempuan Sebagai Korban Kekerasan di Kabupaten Malang'
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
							"19-24 ",
							<?php echo json_encode(intval($muda[$x])); ?>
						],[
							"25-44",
							<?php echo json_encode(intval($sedang[$x])); ?>
						],[
							"45+",
							<?php echo json_encode(intval($tua[$x])); ?>
						],[
							"Fisik & KDRT",
							<?php echo json_encode(intval($kdrt[$x])); ?>
						],[
							"Psikis",
							<?php echo json_encode(intval($psikis[$x])); ?>
						],[
							"Seksual",
							<?php echo json_encode(intval($seksual[$x])); ?>
						],[
							"Eksploitasi",
							<?php echo json_encode(intval($eksploitasi[$x])); ?>
						],[
							"Penelantaran",
							<?php echo json_encode(intval($penelantaran[$x])); ?>
						],[
							"Lainnya",
							<?php echo json_encode(intval($lainnya[$x])); ?>
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
