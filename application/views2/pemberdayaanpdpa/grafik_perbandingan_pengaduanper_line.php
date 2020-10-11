<body>
<?php
if($datap=="1"){
	$page="Jumlah Total Kasus";
}else if($datap=="2"){
	$page="Jumlah Usia 19 - 24";
}else if($datap=="3"){
	$page="Jumlah Usia 25 - 44";
}else if($datap=="4"){
	$page="Jumlah Usia 45+";
}else if($datap=="5"){
	$page="Fisik dan Kdrt";
}else if($datap=="6"){
	$page="Psikis";
}else if($datap=="7"){
	$page="Seksual";
}else if($datap=="8"){
	$page="Eksplotasi";
}else if($datap=="9"){
	$page="Penelantaran";
}else if($datap=="10"){
	$page="Lainnya";
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
						if($datap=="1"){
							$value[]=intval($a['jumlah_kasus']);
						}else if($datap=="2"){
							$value[]=intval($a['muda']);
						}else if($datap=="3"){
							$value[]=intval($a['sedang']);
						}else if($datap=="4"){
							$value[]=intval($a['tua']);
						}else if($datap=="5"){
							$value[]=intval($a['kdrt']);
						}else if($datap=="6"){
							$value[]=intval($a['psikis']);
						}else if($datap=="7"){
							$value[]=intval($a['seksual']);
						}else if($datap=="8"){
							$value[]=intval($a['eksploitasi']);
						}else if($datap=="9"){
							$value[]=intval($a['penelantaran']);
						}else if($datap=="10"){
							$value[]=intval($a['lainnya']);
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
        name: '<?php echo $page; ?>',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
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