<body>
<?php

    $page="Data Seluruh Pemberangkatan Penumpang Kereta Api ";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Pemberangkatan Penumpang Kereta Api di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
           <li><a href="<?= base_url('Penumpangangkutan'); ?>">Penumpang</a></li>
            <li class="active">Grafik Bar <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
                $periode=array();
                $lawang=array();
                $singosari=array();
                $kepanjen=array();
                $ngebruk=array();
                $sumberpucung=array();
               
                $jumlah=array();
                    foreach ($data->result_array() as $a) {
                        $periode[]=intval($a['periode']);
                        $lawang[]=intval($a['lawang']);
                        $singosari[]=intval($a['singosari']);
                        $kepanjen[]=intval($a['kepanjen']);
                        $ngebruk[]=intval($a['ngebruk']);
                        $sumberpucung[]=intval($a['sumberpucung']);
                       
                        $jumlah[]=intval($a['jumlah']);
                       
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
        text: 'Grafik Banyaknya Pemberangkatan Penumpang Kereta Api di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Perhubungan Kabupaten Malang'
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
        name: 'Stasiun Lawang',
        data: [<?php $arrlength = count($lawang);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($lawang[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>]
    },{
        name: 'Stasiun Singosari',
        data: [<?php $arrlength = count($singosari);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($singosari[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Stasiun Kepanjen',
        data: [<?php $arrlength = count($kepanjen);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($kepanjen[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Stasiun Ngebruk',
        data: [<?php $arrlength = count($ngebruk);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($ngebruk[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Stasiun Sumberpucung',
        data: [<?php $arrlength = count($sumberpucung);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($sumberpucung[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Jumlah Total',
        data: [<?php $arrlength = count($jumlah);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($jumlah[$x]));
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