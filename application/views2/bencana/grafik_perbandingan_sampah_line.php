<body>
<?php
if($datap=="srt"){
	$page="Sampah Yang Dihasilkan Rumah Tangga";
}else if($datap=="sejenissrt"){
	$page="Sejenis Sampah Rumah Tangga";
}else if($datap=="tertangani"){
	$page="Sampah Rumah Tangga Tertangani";
}else if($datap=="beracun"){
	$page="Mengandung Bahan Berbahaya dan Beracun";
}else if($datap=="beracunterolah"){
	$page="Mengandung Bahan Berbahaya dan Beracun Terolah";
}else if($datap=="limbah"){
	$page="Limbah Mengandung Bahan Berbahaya dan Beracun";
}else if($datap=="limbahterolah"){
	$page="Limbah Mengandung Bahan Berbahaya dan Beracun Terolah";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Sampah <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Perumahan'); ?>"></i> Perumahan</a></li>
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
						if($datap=="srt"){
							$value[]=intval($a['hasilsrt']);
						}else if($datap=="sejenissrt"){
							$value[]=intval($a['sejenissrt']);
						}else if($datap=="tertangani"){
							$value[]=intval($a['tertangani']);
						}else if($datap=="beracun"){
							$value[]=intval($a['beracun']);
						}else if($datap=="beracunterolah"){
							$value[]=intval($a['beracunterolah']);
						}else if($datap=="limbah"){
							$value[]=intval($a['limbah']);
						}else if($datap=="limbahterolah"){
							$value[]=intval($a['limbahterolah']); 
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
        text: 'Perbandingan Data Sampah'
    },
    subtitle: {
        text: 'Dinas Lingkungan Hidup Kabupaten Malang'
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
            text: 'Jumlah Data (m\u00B3/hari)'
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
        name: '<?php echo $page; ?> Tiap Tahun',
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
	<table width=100%>
	<tr>
	<td></td>
	<td align="center">
	<div class="callout callout-info" style="position:relative;text-align:left;">
		<p>SRT  : Sampah Hasil Rumah Tangga</p>
	</div>
	</td><td></td>
	</tr>
	</table>
</div>
</body>