<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Laporan Pengaduan Anak Korban Kekerasan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Tps'); ?>"></i>Laporan Pengaduan Anak Korban Kekerasan</a></li>
            <li class="active">Laporan Pengaduan Anak Korban Kekerasan</li>
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
                        $id = $a['id'];
						$periode=$a['periode'];
						$bulan=$a['bulan'];
						$keterangan[]=$a['keterangan'];
						$jumlahk[]=intval($a['jumlah_kasus']);
						$l[]=intval($a['l']);
						$p[]=intval($a['p']);
						$l06[]=intval($a['l06']);
						$p06[]=intval($a['p06']);
						$l712[]=intval($a['l712']);
						$p712[]=intval($a['p712']);
						$l1315[]=intval($a['l1315']);
						$p1315[]=intval($a['p1315']);
						$l1618[]=intval($a['l1618']);
						$p1618[]=intval($a['p1618']);
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
        text: 'Grafik Jumlah Anak Sebagai Korban Kekerasan di Kabupaten Malang'
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
							<?php echo json_encode(intval($l[$x])); ?>
						],[
							"25-44",
							<?php echo json_encode(intval($p[$x])); ?>
						],[
							"45+",
							<?php echo json_encode(intval($l06[$x])); ?>
						],[
							"Fisik & KDRT",
							<?php echo json_encode(intval($p06[$x])); ?>
						],[
							"Psikis",
							<?php echo json_encode(intval($l1315[$x])); ?>
						],[
							"Seksual",
							<?php echo json_encode(intval($p1315[$x])); ?>
						],[
							"Eksploitasi",
							<?php echo json_encode(intval($l1618[$x])); ?>
						],[
							"Penelantaran",
							<?php echo json_encode(intval($p1618[$x])); ?>
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
