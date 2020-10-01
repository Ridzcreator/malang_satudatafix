<body>
<?php
if($datap=="atletik"){
	$page="Data Prestasi dan Pembinaan Atletik";
}else if($datap=="tenis"){
	$page="Data Prestasi dan Pembinaan Tenis Lapangan";
}else if($datap=="senam"){
	$page="Data Prestasi dan Pembinaan Senam";
}else if($datap=="penahan"){
	$page="Data Prestasi dan Pembinaan Penahan";
}else if($datap=="tenismeja"){
	$page="Data Prestasi dan Pembinaan Tenis Meja";
}else if($datap=="catur"){
	$page="Data Prestasi dan Pembinaan Catur";
}else if($datap=="takraw"){
	$page="Data Prestasi dan Pembinaan Takraw";
}else if($datap=="silat"){
	$page="Data Prestasi dan Pembinaan Silat";
}else if($datap=="renang"){
	$page="Data Prestasi dan Pembinaan Renang";
}else if($datap=="volimini"){
	$page="Data Prestasi dan Pembinaan Bola Volly Mini";
}else if($datap=="bulutangkis"){
	$page="Data Prestasi dan Pembinaan Bulu Tangkis";
}else if($datap=="basket"){
	$page="Data Prestasi dan Pembinaan Basket";
}else if($datap=="voli"){
	$page="Data Prestasi dan Pembinaan Bola Volly";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Prestasi Atlet<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('C_cabangolah'); ?>"></i> Alat Angkut</a></li>
            <li class="active">Grafik Line <?php echo $page; ?></li>
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
						if($datap=="truk"){
							$value[]=intval($a['truk']);
						}else if($datap=="gerobak"){
							$value[]=intval($a['gerobak']);
						}else if($datap=="motor"){
							$value[]=intval($a['motor']);
						}else if($datap=="pickup"){
							$value[]=intval($a['pickup']);
						}else if($datap=="beco"){
							$value[]=intval($a['beco']);
						}else if($datap=="Buldozer"){
							$value[]=intval($a['Buldozer']);
						}else if($datap=="wheelloader"){
							$value[]=intval($a['wheelloader']); 
						}    
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Perbandingan Data Unit Alat Angkut'
    },

    subtitle: {
        text: 'Dinas Lingkungan Hidup Kabupaten Malang'
    },
    tooltip: {
        valueSuffix: ' Unit'
    },
    yAxis: {
        title: {
            text: 'Jumlah Data (Unit)'
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