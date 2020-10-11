<body>
<?php
if($datap=="all"){
    $page="Seluruh Data Ekspor Komoditi";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Ekspor Komoditi di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Ekspor_komoditi'); ?>">Ekspor Komoditi</a></li>
            <li class="active">Grafik Bar <?php echo $page; ?></li>
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
                            $value[]=intval($a['volume_ekspor']);
                            $value1[]=intval($a['nilai_ekspor']);
                        }
            ?>
	<div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
  title: {
        text: 'Grafik Perbandingan <?php echo $page; ?>'
    },
    subtitle: {
        text: 'Dinas Perindustrian dan Perdagangan Kabupaten Malang'
    },
    xAxis: {
        categories: [<?php $arrlength = count($periode);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($periode[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}</td><td>: </td>' +
					 '<td style="padding:0"><b>{point.y:,.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Volume Ekspor',
        data: [<?php $arrlength = count($value);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($value[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Nilai Ekspor',
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