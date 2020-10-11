<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Jumlah Banyak Kendaraan Menurut Jenis di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Banyakkendaraan'); ?>"></i>Laporan Jumlah Banyak Kendaraan</a></li>
            <li class="active">Laporan Jumlah Banyak Kendaraan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php	
			$table=array();
            $periode=array();
            $bulan=array();
             $mpu=array();
                $bus=array();
                $mobil=array();
                $gandeng=array();
                $tempel=array();
                $khusus=array();
                $jumlah=array();
			$jumlah = array();
                    foreach ($data->result_array() as $a) {
                        $periodee=intval($a['periode']);
                        $periode[]=intval($a['periode']);
                        $bulan[]=$a['keterangan'];
                        $mpu[]=intval($a['mpu']);
                        $bus[]=intval($a['bus']);
                        $mobil[]=intval($a['mobil']);
                        $gandeng[]=intval($a['gandeng']);
                        $tempel[]=intval($a['tempel']);
                        $khusus[]=intval($a['khusus']);
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
        text: 'Grafik Jumlah Banyak Kendaraan Menurut Jenis di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Perhubungan Tahun <?php echo $periodee; ?>'
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
                    name: <?php echo json_encode($bulan[$x]); ?>,
                    y: <?php echo json_encode(intval($jumlah[$x])); ?>,
                    drilldown: <?php echo json_encode($bulan[$x]); ?>
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
                name: <?php echo json_encode($bulan[$x]); ?>,
                id: <?php echo json_encode($bulan[$x]); ?>,
					data: [
                        
						[
							"Jumlah MPU",
							<?php echo json_encode(intval($mpu[$x])); ?>
						],[
							"Jumlah Bus",
							<?php echo json_encode(intval($bus[$x])); ?>
						],[
							"Jumlah Mobil",
							<?php echo json_encode(intval($mobil[$x])); ?>
						],[
							"Jumlah Kereta Gandeng",
							<?php echo json_encode(intval($gandeng[$x])); ?>
						],[
							"Jumlah Kereta Tempel",
							<?php echo json_encode(intval($tempel[$x])); ?>
						],[
                            "Jumlah Kereta Khusus",
                            <?php echo json_encode(intval($khusus[$x])); ?>
                        ],[
                            "Jumlah Total",
                            <?php echo json_encode(intval($jumlah[$x])); ?>
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
