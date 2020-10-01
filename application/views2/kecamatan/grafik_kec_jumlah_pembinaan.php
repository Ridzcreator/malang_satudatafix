<?php 
$hal=$datakec;
$idx = $this->uri->segment(1);
foreach ($data->result_array() as $a) {
$kecamatan=$a['keterangan'];
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <b>JUMLAH PEMBINAAN / SOSIALISASI MASYARAKAT<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url($idx); ?>">Jumlah Pembinaan / Sosialisasi Masyarakat</a></li>
            <li class="active">Grafik <?php echo $kecamatan;?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        $keterangan[]=$a['jenis_pembinaan'];
						$value[]=intval($a['jumlah']);
						$periode=intval($a['periode']);
            ?>
	<div class="box" id="tampilr" style="min-width: 310px; max-width: 90%; height: 100%; margin: 0 auto">
	<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
	<script type="text/javascript">
	var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Grafik Jumlah Pembinaan / Sosialisasi Masyarakat Tahun <?php echo $periode;?>'
    },

    subtitle: {
        text: 'Kecamatan <?php echo $kecamatan;?> Kabupaten Malang'
    },
    tooltip: {
        valueSuffix: ''
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
        }
    },

    xAxis: {
        categories: [<?php $arrlength = count($keterangan);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode($keterangan[$x]);
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },

    series: [{
        type: 'column',
		name: "Jumlah Data ",
        colorByPoint: true,
        data: [<?php $arrlength = count($keterangan);
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
