<body>
<?php
if($datap=="all"){
    $page="Seluruh Data Jumlah Produksi Perikanan";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Jumlah  Produksi Perikanan di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('C_cabangolah'); ?>">Jumlah Produksi Perikanan  di Kabupaten Malang</a></li>
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
                            $value[]=intval($a['perikanan_laut']);
                            $value1[]=intval($a['perikanan_umum']);
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
        text: 'Grafik Perbandingan Data Jumlah Produksi Perikanan di Kabupaten Malang'
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
        name: 'Jumlah perikanan_laut',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Jumlah perikanan_umum',
        data: [<?php $arrlength = count($value1);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value1[$x]));
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