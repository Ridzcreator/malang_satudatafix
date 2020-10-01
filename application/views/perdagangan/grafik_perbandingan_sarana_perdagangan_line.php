<body>
<?php
if($datap=="1"){
    $page="Jumlah Pasar Umum";
}else if($datap=="2"){
    $page="Jumlah Toko";
}else if($datap=="3"){
    $page="Jumlah Rumah Makan";
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Sarana Perdagangan di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Sarana_perdagangan'); ?>">Sarana Perdagangan</a></li>
            <li class="active">Grafik Bar Line <?php echo $page; ?></li>
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
                            $value[]=intval($a['pasar_umum']);
                        }else if($datap=="2"){
                            $value[]=intval($a['toko']);
                        }else if($datap=="3"){
                            $value[]=intval($a['rumah_makan']);
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
        text: 'Grafik Bar Perbandingan Sarana Perdagangan <?php echo $page; ?>'
    },
    subtitle: {
        text: 'Dinas Perindustrian, Perdagangan dan Pertambangan Kabupaten Malang'
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