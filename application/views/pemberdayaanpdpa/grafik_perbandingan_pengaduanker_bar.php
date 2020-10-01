<body>
<?php
if($datap=="1"){
	$page="Jumlah Kasus Fisik dan KDRT Laki laki";
}else if($datap=="2"){
	$page="Jumlah Kasus Fisik dan KDRT Perempuan";
}else if($datap=="3"){
	$page="Jumlah Kasus Psikis Laki laki";
}else if($datap=="4"){
	$page="Jumlah Kasus Psikis Perempuan";
}else if($datap=="5"){
	$page="Jumlah Kasus Seksual Laki laki";
}else if($datap=="6"){
	$page="Jumlah Kasus Seksual Perempuan";
}else if($datap=="7"){
	$page="Jumlah Kasus Eksploitasi Laki laki";
}else if($datap=="8"){
	$page="Jumlah Kasus Ekploitasi Perempuan";
}else if($datap=="9"){
	$page="Jumlah Kasus Penelantaran Laki laki";
}else if($datap=="10"){
	$page="Jumlah Kasus Penelantaran Perempuan";
}else if($datap=="11"){
	$page="Jumlah Kasus Lainnya Laki laki";
}else if($datap=="12"){
	$page="Jumlah Kasus Lainnya Perempuan";
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
							$value[]=intval($a['lfisik']);
						}else if($datap=="2"){
							$value[]=intval($a['pfisik']);
						}else if($datap=="3"){
							$value[]=intval($a['lpsikis']);
						}else if($datap=="4"){
							$value[]=intval($a['ppsikis']);
						}else if($datap=="5"){
							$value[]=intval($a['lseksual']);
						}else if($datap=="6"){
							$value[]=intval($a['pseksual']);
						}else if($datap=="7"){
							$value[]=intval($a['leksploitasi']);
						}else if($datap=="8"){
							$value[]=intval($a['peksploitasi']);
						}else if($datap=="9"){
							$value[]=intval($a['lpenelantaran']);
						}else if($datap=="10"){
							$value[]=intval($a['ppenelantaran']);
						}else if($datap=="11"){
							$value[]=intval($a['llainnya']);
						}else if($datap=="12"){
							$value[]=intval($a['plainnya']);
						}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
	var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Perbandingan Jumlah Data Laporan Pengaduan Korban Kekerasan di Kabupaten Malang'
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