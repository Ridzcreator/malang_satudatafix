<body>
<?php
if($datap=="all"){
    $page="Seluruh Data Jumlah Penanaman Modal";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Jumlah Penanaman Modal di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('C_penanaman'); ?>">Jumlah Penanaman Modal di Kabupaten Malang</a></li>
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
                            $value[]=intval($a['nilai_pma']);
                            $value1[]=intval($a['unit_pma']);
                            $value2[]=intval($a['nilai_pmdn']);
                            $value3[]=intval($a['unit_pmdn']);
                            $value4[]=intval($a['nilai_non']);
                            $value5[]=intval($a['unit_non']);
                            $value6[]=intval($a['tenaga_kerja']);
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
        text: 'Grafik Perbandingan Data Penanaman Modal di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Penanaman Modal Kabupaten Malang'
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
        name: 'Jumlah Unit PMA',
        data: [<?php $arrlength = count($value);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Investasi PMA',
        data: [<?php $arrlength = count($value1);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value1[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Unit PMDN',
        data: [<?php $arrlength = count($value2);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value2[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Investasi PMDN',
        data: [<?php $arrlength = count($value3);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value3[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Unit Non PMA/PMDN',
        data: [<?php $arrlength = count($value4);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value4[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Investasi non PMA PMDN',
        data: [<?php $arrlength = count($value5);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value5[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Tenaga Kerja',
        data: [<?php $arrlength = count($value6);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value6[$x]));
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