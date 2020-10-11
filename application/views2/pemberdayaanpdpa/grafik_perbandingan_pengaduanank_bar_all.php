<body>
<?php
if($datap=="all"){
	$page="Seluruh Laporan Pengaduan Anak Korban Kekerasan";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Jumlah Laporan Pengaduan Anak Korban Kekerasan di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Pengaduanank'); ?>">Laporan Pengaduan Anak Korban Kekerasan</a></li>
            <li class="active">Grafik Bar Data <?php echo $page; ?></li>
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
							$value1[]=intval($a['l06']);
							$value2[]=intval($a['p06']);
							$value3[]=intval($a['l712']);
							$value4[]=intval($a['p712']);
							$value5[]=intval($a['l1315']);
							$value6[]=intval($a['p1315']);
							$value7[]=intval($a['l1618']);
							$value8[]=intval($a['p1618']);
							$value9[]=intval($a['l']);
							$value10[]=intval($a['p']);
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
        text: 'Grafik Perbandingan Jumlah Laporan Pengaduan Anak Korban Kekerasan di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak'
    },
    xAxis: {
        categories: [<?php $arrlength = count($periode);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($periode[$x]));
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
        name: 'Jumlah Kasus',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Laki laki 0-6',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Perempuan 0-6',
        data: [<?php $arrlength = count($value2);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value2[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Laki laki 7-12',
        data: [<?php $arrlength = count($value3);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value3[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Perempuan 7-12',
        data: [<?php $arrlength = count($value4);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value4[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Laki laki 13-15',
        data: [<?php $arrlength = count($value5);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value5[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Perempuan 13-15',
        data: [<?php $arrlength = count($value6);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value6[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Laki laki 16-18',
        data: [<?php $arrlength = count($value7);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value7[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Perempuan 16-18',
        data: [<?php $arrlength = count($value8);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value8[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Laki laki',
        data: [<?php $arrlength = count($value9);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value9[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Perempuan',
        data: [<?php $arrlength = count($value10);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value10[$x]));
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