<body>
<?php
if($datap=="bencana"){
    $page="Jumlah Bencana Alam";
}else if($datap=="mati"){
    $page="Jumlah Korban Meninggal";
}else if($datap=="luka"){
    $page="Jumlah Korban Luka";
}else if($datap=="menderita"){
    $page="Jumlah Korban Menderita";
}else if($datap=="hancur"){
    $page="Jumlah Hancur";
}else if($datap=="kerusakan"){
    $page="Jumlah Kerusakan";
}else if($datap=="kerugian"){
    $page="Jumlah Kerugian";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Sarana<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Banyakbencana'); ?>"></i> Banyak Bencana</a></li>
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
                    if($datap=="bencana"){
                        $value[]=intval($a['jumlah_bencana']);
                    }else if($datap=="mati"){
                        $value[]=intval($a['mati']);
                    }else if($datap=="luka"){
                        $value[]=intval($a['luka']);
                    }else if($datap=="menderita"){
                        $value[]=intval($a['menderita']);
                    }else if($datap=="hancur"){
                        $value[]=intval($a['hancur']);
                    }else if($datap=="kerusakan"){
                        $value[]=intval($a['rusak']);
                    }else if($datap=="kerugian"){
                        $value[]=intval($a['kerugian']);
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
        text: 'Perbandingan Data Banyak Bencana'
    },

    subtitle: {
        text: 'Dinas Penanggulangan Bencana Alam Kabupaten Malang'
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