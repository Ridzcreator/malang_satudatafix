<body>
<?php
	$page="Semua Data Alat Angkut";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Alat Angkut<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Alatangkutd'); ?>"></i> Alat Angkut</a></li>
            <li class="active">Grafik Bar <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
				$array_tahun=array();
        foreach ($tahun->result_array() as $row1) {
           
            array_push($array_tahun, $row1['periode']);
        }
         $array_keterangan=array();
        foreach ($keterangan->result_array() as $row2) {
           
            array_push($array_keterangan, $row2['keterangan1']);
        }
		
        $array_data_1=array();
        $array_data_2=array();
        $array_data_3=array();
        $array_data_4=array();
        $array_data_5=array();
        $array_data_6=array();
        foreach ($datax->result_array() as $row4) {
        array_push($array_data_1, $row4['keterangan1']);
        array_push($array_data_2, $row4['jumlah']); 
        array_push($array_data_3, $row4['periode']);
        }

        foreach ($jumlah->result_array() as $row5) {
        array_push($array_data_5, $row5['jumlah']);

        }
        foreach ($jumlah1->result_array() as $row6) {
        array_push($array_data_6, $row6['jumlah']);

        }

        $jumlah = array();
        $temp = 0;  
        for ($i=0; $i < count($array_keterangan) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_keterangan[$i]==$array_data_1[$x]&& $array_tahun[$j]==$array_data_3[$x]) {
                        $isinya = $array_data_2[$x];
                        
                        $temp = 1;
                        break;
                    } else {
                        $temp=0;
                    }
                } 

                if ($temp != 0 ){
                    $array_hasil[$i][$j]=$isinya;
                    $jumlah[$i][$j] = $array_hasil[$i][$j];
                 
                } else {
                    $array_hasil[$i][$j]="0";
                    $jumlah[$i][$j] = $array_hasil[$i][$j];
                }
            } 
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
        text: 'Perbandingan Data Alat Angkut'
    },
    subtitle: {
        text: 'Dinas Lingkungan Hidup Kabupaten Malang'
    },
    xAxis: {
        categories: [
				<?php $arrlength = count($array_tahun);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($array_tahun[$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}?>
		],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data (Unit)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}</td><td>: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Unit</b></td></tr>',
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
    series: [
	<?php 
	$arrlength1 = count($array_keterangan);
	for ($i=0; $i < $arrlength1; $i++) { ?>
	{
	    <?php echo "name :".json_encode($array_keterangan[$i]) ?> ,
		<?php echo "data: [";
				$arrlength = count($array_tahun);
				for($x = 0; $x < $arrlength; $x++) {
				echo json_encode(intval($array_hasil[$i][$x]));
				if($x < $arrlength-1){
				echo ",";
				}
				}
		echo "]"; ?>
	}
	<?php if($x < $arrlength1-1){
				echo ",";
				}
	} ?>
	]
});
</script>
	</div>
</section>
    <!-- /.content -->
</div>

</body>