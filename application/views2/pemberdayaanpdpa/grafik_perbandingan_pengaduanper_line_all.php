<body>
<?php
if($datap=="all"){
	$page="Seluruh Data Jumlah Laporan Pengaduan Perempuan Korban Kekerasan";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Jumlah Laporan Pengaduan Perempuan Korban Kekerasan di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Pengaduanper'); ?>">Laporan Pengaduan Perempuan Korban Kekerasan</a></li>
            <li class="active">Grafik Line Data <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
				$periode=array();
				$value=array();
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
						$periode[]=intval($a['periode']);
						if($datap=="all"){
							$value[]=intval($a['jumlah_kasus']);
							$value1[]=intval($a['19an']);
							$value2[]=intval($a['25an']);
							$value3[]=intval($a['45an']);
							$value4[]=intval($a['kdrt']);
							$value5[]=intval($a['psikis']);
							$value6[]=intval($a['seksual']);
							$value7[]=intval($a['eksploitasi']);
							$value8[]=intval($a['penelantaran']);
							$value9[]=intval($a['lainnya']);
						}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
    Highcharts.chart('tampilr', {
     chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Perbandingan Data Jumlah Laporan Pengaduan Perempuan Korban Kekerasan di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak Kabupaten Malang'
    },
    xAxis: {
        categories: [<?php $arrlength = count($periode);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($periode[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Jumlah Pekka',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: '19-24',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: '25-44',
        data: [<?php $arrlength = count($value2);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value2[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: '45+',
        data: [<?php $arrlength = count($value3);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value3[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Fisik & Kdrt',
        data: [<?php $arrlength = count($value4);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value4[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Psikis',
        data: [<?php $arrlength = count($value5);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value5[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Seksual',
        data: [<?php $arrlength = count($value6);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value6[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Eksploitasi',
        data: [<?php $arrlength = count($value7);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value7[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Penelantaran',
        data: [<?php $arrlength = count($value8);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value8[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Lainnya',
        data: [<?php $arrlength = count($value9);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value9[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    }]
	});
	</script>
	</div>
	<?php } ?>
</section>
    <!-- /.content -->
</div>

</body>