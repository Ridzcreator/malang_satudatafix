<body>
<?php
if($datap=="1"){
	$page="Jumlah Total Kasus";
}else if($datap=="2"){
	$page="Total Kasus Laki-laki Usia 0-6 Tahun";
}else if($datap=="3"){
	$page="Total Kasus Perempuan Usia 0-6 Tahun";
}else if($datap=="4"){
	$page="Total Kasus Laki-laki Usia 7-12 Tahun";
}else if($datap=="5"){
	$page="Total Kasus Perempuan Usia 7-12 Tahun";
}else if($datap=="6"){
	$page="Total Kasus Laki-laki Usia 13-15 Tahun";
}else if($datap=="7"){
	$page="Total Kasus Perempuan Usia 13-15 Tahun";
}else if($datap=="8"){
	$page="Total Kasus Laki-laki Usia 16-18 Tahun";
}else if($datap=="9"){
	$page="Total Kasus Perempuan Usia 16-18 Tahun";
}else if($datap=="10"){
	$page="Total Kasus Laki-laki Seluruh Usia";
}else if($datap=="11"){
	$page="Total Kasus Perempuan Seluruh Usia";
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
						if($datap=="1"){
							$value[]=intval($a['jumlah_kasus']);
						}else if($datap=="2"){
							$value[]=intval($a['l06']);
						}else if($datap=="3"){
							$value[]=intval($a['p06']);
						}else if($datap=="4"){
							$value[]=intval($a['l712']);
						}else if($datap=="5"){
							$value[]=intval($a['p712']);
						}else if($datap=="6"){
							$value[]=intval($a['l1315']);
						}else if($datap=="7"){
							$value[]=intval($a['p1315']);
						}else if($datap=="8"){
							$value[]=intval($a['l1618']);
						}else if($datap=="9"){
							$value[]=intval($a['p1618']);
						}else if($datap=="10"){
							$value[]=intval($a['l']);
						}else if($datap=="11"){
							$value[]=intval($a['p']);
						}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
	var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Perbandingan Jumlah Data Laporan Pengaduan Anak Korban Kekerasan'
    },

    subtitle: {
        text: 'Dinas Lingkungan Hidup Kabupaten Malang'
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
        }
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

    series: [{
        type: 'column',
		name: "Jumlah Data ",
        colorByPoint: true,
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>],
        showInLegend: false
    }]

	});
	</script>
	</div>
	<?php } ?>
</section>
    <!-- /.content -->
</div>

</body>