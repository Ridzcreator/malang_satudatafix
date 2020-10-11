<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Pencari Kerja Yang Terdaftar Menurut Tingkat Pendidikan Yang Ditamatka di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Tps'); ?>"></i> Jumlah Pencari Kerja Yang Terdaftar Menurut Tingkat Pendidikan Yang Ditamatka di Kabupaten Malang</a></li>
            <li class="active">Grafik Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php	
			$value = array();
			$value1 = array();
			$value2 = array();
			$value3 = array();
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        $id = $a['id'];
						$periode=$a['periode'];
						$value[]=$a['keterangan'];
						$value1[]=$a['l'];
						$value2[]=$a['p'];
						$value3[]=intval($a['jumlah']);
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
        text: 'Grafik Pencari Kerja Yang Terdaftar Menurut Tingkat Pendidikan Yang Ditamatka di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Tenaga Kerja Tahun <?php echo $periode; ?>'
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
                
				<?php $arrlength = count($value3);
				for($x = 0; $x < $arrlength; $x++) {?>
				{
                    name: <?php echo json_encode($value[$x]); ?>,
                    y: <?php echo json_encode(intval($value3[$x])); ?>,
                    drilldown: <?php echo json_encode($value[$x]); ?>
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
			<?php $arrlength = count($value3);
				for($x = 0; $x < $arrlength; $x++) {?>
				{
                name: <?php echo json_encode($value[$x]); ?>,
                id: <?php echo json_encode($value[$x]); ?>,
					data: [
						[
							"Laki Laki",
							<?php echo json_encode(intval($value1[$x])); ?>
						],[
							"Perempuan",
							<?php echo json_encode(intval($value2[$x])); ?>
						],[
							"Jumlah",
							<?php echo json_encode(intval($value3[$x])); ?>
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
