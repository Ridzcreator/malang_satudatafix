<body>
<?php
if($datap=="1"){
	$page="Jumlah Stadion";
}else if($datap=="2"){
	$page="Jumlah Sepak Bola";
}else if($datap=="3"){
	$page="Jumlah Bola Voli";
}else if($datap=="4"){
	$page="Jumlah Bola Basket";
}else if($datap=="5"){
	$page="Jumlah Tenis";
}else if($datap=="6"){
	$page="Jumlah Bulu Tangkis";
}else if($datap=="7"){
	$page="Jumlah Futsal";
}else if($datap=="8"){
	$page="Jumlah Gor";
}else if($datap=="9"){
	$page="Jumlah Aula";
}else if($datap=="10"){
	$page="Jumlah Kolam Renang";
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Jumlah Prasarana Olahraga di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('C_prasarana'); ?>">Jumlah Prasarana Olahraga di Kabupaten Malang</a></li>
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
						$periode[]=intval($a['tahun']);
						if($datap=="1"){
							$value[]=intval($a['stadion']);
						}else if($datap=="2"){
							$value[]=intval($a['sb']);
						}else if($datap=="3"){
							$value[]=intval($a['bv']);
						}else if($datap=="4"){
							$value[]=intval($a['bb']);
						}else if($datap=="5"){
							$value[]=intval($a['tenis']);
						}else if($datap=="6"){
							$value[]=intval($a['bt']);
						}else if($datap=="7"){
							$value[]=intval($a['futsal']);
						}else if($datap=="8"){
							$value[]=intval($a['gor']);
						}else if($datap=="9"){
							$value[]=intval($a['aula']);
						}else if($datap=="10"){
							$value[]=intval($a['kr']);
						}
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
	var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Grafik Perbandingan Data Jumlah Prasarana Olahraga di Kabupaten Malang'
    },

    subtitle: {
        text: 'Dinas Kepemudaan Dan Olahraga Kabupaten Malang'
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