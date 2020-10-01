<body>
<?php

	$page="Seluruh Data Mobil Pemadam Kebakaran";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Data Pemadam Kebakaran <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Pemadam'); ?>"></i> Pemadam</a></li>
            <li class="active">Grafik Bar Data <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
		
				$periode=array();
                $layak=array();
                $tidak=array();
				
				$value1=array();
				$value2=array();
				$value3=array();
				$value4=array();
				$value5=array();
				$value6=array();
                    foreach ($data->result_array() as $a) {
            
						$periode[]=intval($a['periode']);
						$layak[]=intval($a['layak']);
                        $tidak[]=intval($a['tidak']);
	

                    
             

                 
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
        text: 'Banyaknya Unit Mobil Pemadam Kebakaran Menurut Keadaannya di Kabupaten Malang'
    },
    subtitle: {
        text: 'Badan Penanggulangan Bencana Alam Daerah Kabupaten Malang'
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
            text: 'Jumlah Data (Lokasi)'
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
        name: 'Layak Pakai',
        data: [<?php $arrlength = count($layak);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($layak[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    },{
        name: 'Tidak Layak',
        data: [<?php $arrlength = count($tidak);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($tidak[$x]));
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
		<table width=100%>
	<tr>
	<td></td>
	<td align="center">
	
	</td><td></td>
	</tr>
	</table>
</div>

</body>


<!-- <?php $arrlength = count($bencana);
				for($x = 0; $x < $arrlength; $x++) {?>
				{
                name: <?php echo json_encode($bencana[$x]); ?>,
                id: <?php echo json_encode($bencana[$x]); ?>,
					data: [

						[
						<?php echo json_encode($kecamatan[$x]); ?>,
						<?php echo json_encode(intval($banyak[$x])); ?>
						]
						
					

					]
				}
				<?php
				if($x < $arrlength-1){
				echo ",";
				}
				}?>
       -->