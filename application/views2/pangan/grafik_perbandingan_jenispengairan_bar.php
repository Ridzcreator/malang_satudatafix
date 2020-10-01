<body>
<?php
if($datap=="1"){
	$page="Jumlah Irigasi";
}else if($datap=="2"){
	$page="Jumlah Tadah Hujan";
}else if($datap=="3"){
	$page="Jumlah Rawa Pasang Surut";
}else if($datap=="4"){
	$page="Jumlah Rawa Lebak";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Jumlah Perempuan Sebagai Kepala Keluarga di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Jenispengairan'); ?>">Jumlah Perempuan Sebagai Kepala Keluarga di Kabupaten Malang</a></li>
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
						$value[]=$a['irigasi'];
						}else if($datap=="2"){
						$value[]=$a['tadah'];
						}else if($datap=="3"){
						$value[]=$a['rawa_pasang'];
						}else if($datap=="4"){
						$value[]=$a['rawa_lebak'];
						}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
	var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Grafik Perbandingan Data Luas Lahan Sawah Dirinci Menurut Pengairan di Kabupaten Malang'
    },

    subtitle: {
        text: 'Dinas Tanaman Pangan, Hortikultura dan Perkebunan Kabupaten Malang'
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