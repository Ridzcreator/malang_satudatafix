<body>
<?php

	$page="Seluruh Data Jumlah Unjukrasa";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Jumlah Unjukrasa di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Unjukrasa'); ?>">Unjukrasa</a></li>
            <li class="active">Grafik Bar Data <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
        
                $periode=array();
                $jumlah=array();
                $unjukrasa=array();
                $periodee = array();
                $value1=array();
                $value2=array();
                $value3=array();
                $value4=array();
                $value5=array();
                $value6=array();
                    foreach ($datax->result_array() as $a) {
            
                        $periode[]=intval($a['periode']);
                        $jumlah[]=intval($a['jumlah']);
                        $periodee[]=$a['periode'];
                        $unjukrasa[]=$a['unjukrasa'];   
                        
     

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
        text: 'Grafik Perbandingan Unjukrasa Korban Meninggal di Kabupaten Malang'
    },
    subtitle: {
        text: 'Satuan Polisi Pamong Praja Kabupaten Malang'
    },
    xAxis: {
        categories: [<?php $arrlength = count($periode);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode($unjukrasa[$x].'('. $periodee[$x].')');
                if($x < $arrlength-1){
                echo ",";
                }
                }?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data (unjukrasa)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}</td><td>: </td>' +
                     '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
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
        name : 'Jumlah',
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
    <?php 
   
    } ?>
	
</section>
    <!-- /.content -->
</div>

</body>