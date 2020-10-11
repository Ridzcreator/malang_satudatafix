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
            <b>Grafik Perbandingan Data Jumlah Laporan Pengaduan Korban Kekerasan di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Pengaduanker'); ?>">Laporan Pengaduan Korban Kekerasan</a></li>
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
							$value[]=intval($a['lfisik']);
							$value1[]=intval($a['pfisik']);
							$value2[]=intval($a['lpsikis']);
							$value3[]=intval($a['ppsikis']);
							$value4[]=intval($a['lseksual']);
							$value5[]=intval($a['pseksual']);
							$value6[]=intval($a['leksploitasi']);
							$value7[]=intval($a['peksploitasi']);
							$value8[]=intval($a['lpenelantaran']);
							$value9[]=intval($a['ppenelantaran']);
							$value10[]=intval($a['llainnya']);
							$value11[]=intval($a['plainnya']);
						}
            ?>
	<div class="box  table-responsive" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
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
        name: 'KDRT & Fisik Laki laki',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'KDRT & Fisik Perempuan',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Psikis Laki laki',
        data: [<?php $arrlength = count($value2);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value2[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Psikis Perempuan',
        data: [<?php $arrlength = count($value3);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value3[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Seksual Laki laki',
        data: [<?php $arrlength = count($value4);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value4[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Seksual Perempuan',
        data: [<?php $arrlength = count($value5);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value5[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Eksploitasi Laki laki',
        data: [<?php $arrlength = count($value6);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value6[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Eksploitasi Perempuan',
        data: [<?php $arrlength = count($value7);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value7[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Penelantaran Laki laki',
        data: [<?php $arrlength = count($value8);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value8[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Penelantaran Perempuan',
        data: [<?php $arrlength = count($value9);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value9[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Lainnya Laki laki',
        data: [<?php $arrlength = count($value10);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value10[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Lainnya Perempuan',
        data: [<?php $arrlength = count($value11);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value11[$x]));
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