<?php 
$hal=$datakec;
$idx = $this->uri->segment(1);
foreach ($data->result_array() as $a) {
$kecamatan=$a['nama_kecamatan'];
}
?>
<body>
<?php
	$page="Semua Data Jumlah Tempat Wisata Kecamatan ".$kecamatan;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Jumlah Tempat Wisata<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url($idx); ?>"></i> Jumlah Tempat Wisata</a></li>
            <li class="active">Grafik Bar <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
				$periode=array();
				$value=array();
				$value1=array();
				$value2=array();
				$value3=array();
				$value4=array();
				$value5=array();
				$value6=array();
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode[]=intval($a['periode']);
						if($datap=="all"){
							$value[]=intval($a['wisata_alam']);
							$value1[]=intval($a['wisata_buatan']);
							$value2[]=intval($a['wisata_edukasi']);
							$value3[]=intval($a['wisata_budaya']);
						}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Jumlah Tempat Wisata Tiap Tahun'
    },
    subtitle: {
        text: 'Kecamatan <?php echo $kecamatan;?> Kabupaten Malang'
    },
    xAxis: {
        categories: [<?php $arrlength = count($periode);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode("Data Tahun ".intval($periode[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data'
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
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Wisata Alam',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'Wisata Buatan',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'Wisata Edukasi',
        data: [<?php $arrlength = count($value2);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value2[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }, {
        name: 'Wisata Budaya',
        data: [<?php $arrlength = count($value3);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value3[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]

    }]
});
				</script><?php } ?>
	</div>
</section>
    <!-- /.content -->
</div>

</body>