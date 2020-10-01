<body>
<?php
if($datap=="all"){
	$page="Seluruh Data Jumlah Prasara Olahraga";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Prasarana Olahraga di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('C_prasarana'); ?>">Jumlah Prasarana Olahraga di Kabupaten Malang</a></li>
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
                        $periode[]=intval($a['tahun']);
                        if($datap=="all"){
                            $value[]=intval($a['stadion']);
                            $value1[]=intval($a['sb']);
                            $value2[]=intval($a['bv']);
                            $value3[]=intval($a['bb']);
                            $value4[]=intval($a['tenis']);
                            $value5[]=intval($a['bt']);
                            $value6[]=intval($a['futsal']);
                            $value7[]=intval($a['gor']);
                            $value8[]=intval($a['aula']);
                            $value9[]=intval($a['kr']);
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
        text: 'Grafik Perbandingan Data Prasara Olahraga di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Kepemudaan dan Olahraga Kabupaten Malang'
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
        name: 'Jumlah Stadion',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Jumlah Sepak Bola',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Jumlah Bola Volly',
        data: [<?php $arrlength = count($value2);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value2[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Jumlah Bola Basket',
        data: [<?php $arrlength = count($value3);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Tenis',
        data: [<?php $arrlength = count($value4);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Bulu Tangkis',
        data: [<?php $arrlength = count($value5);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Futsal',
        data: [<?php $arrlength = count($value6);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Gor',
        data: [<?php $arrlength = count($value7);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Aula',
        data: [<?php $arrlength = count($value8);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Kolam Renang',
        data: [<?php $arrlength = count($value9);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
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