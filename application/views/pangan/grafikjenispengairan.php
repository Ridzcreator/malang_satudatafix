<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Data Luas Lahan Sawah Dirinci Menurut Pengairan di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Jenispengairan'); ?>"></i> Data Luas Lahan Sawah Dirinci Menurut Pengairan di Kabupaten Malang</a></li>
            <li class="active">Grafik Detail</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php	
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode=$a['periode'];
						$keterangan[]=$a['kecamatan'];
						$value[]=$a['irigasi'];
						$value1[]=$a['tadah'];
						$value2[]=$a['rawa_pasang'];
						$value3[]=$a['rawa_lebak'];
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
        text: 'Grafik Data Luas Lahan Sawah Dirinci Menurut Pengairan di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Tanaman Pangan, Hortikultura dan Perkebunan Tahun <?php echo $periode; ?>'
    },
    xAxis: {
        categories: [<?php $arrlength = count($keterangan);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode($keterangan[$x]);
				if($x < $arrlength-1){
				echo ",";
				}
				}?>],
        crosshair: true
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
        }

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
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}</td><td>: </td>' +
					 '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },

    series: [{
        name: 'Irigasi',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Tadah Hujan',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Rawa Pasang Surut',
        data: [<?php $arrlength = count($value2);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value2[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Rawa Lebak',
        data: [<?php $arrlength = count($value3);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value3[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    }
    ]
});

</script>
</div>
    </section>
    <!-- /.content -->

</div>
