<body>
<?php

	$page="Seluruh Data Jumlah Polisi Pamong Praja";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Jumlah Polisi Pamong Praja di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('Pamongpraja'); ?>">Pamongpraja</a></li>
            <li class="active">Grafik Bar Data <?php echo $page; ?></li>
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
         $array_kelamin=array();
        foreach ($jeniskelamin->result_array() as $row2) {
           
            array_push($array_kelamin, $row2['jeniskelamin']);
        }

        $array_data_1=array();
        $array_data_2=array();
        $array_data_3=array();
        $array_data_4=array();
        $array_data_5=array();
        $array_data_6=array();
        foreach ($dataz->result_array() as $row4) {
        array_push($array_data_1, $row4['jeniskelamin']);
        array_push($array_data_2, $row4['jumlah']);
      
        array_push($array_data_3, $row4['periode']);
        }

        foreach ($jumlah->result_array() as $row5) {
        array_push($array_data_5, $row5['jumlah']);

        }


        $temp = 0;  
        for ($i=0; $i < count($array_kelamin) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_kelamin[$i]==$array_data_1[$x]&& $array_tahun[$j]==$array_data_3[$x]) {
                        $isinya = $array_data_2[$x];
                        $temp = 1;
                        break;
                    } else {
                        $temp=0;
                    }
                } 


                if ($temp != 0 ){
                    $array_hasil[$i][$j]=$isinya;
                 
                } else {
                    $array_hasil[$i][$j]="0";
                    
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
        text: 'Banyaknya Polisi Pamong Praja Menurut Jenis Kelamin di Kabupaten Malang'
    },
    subtitle: {
        text: 'Satuan Polisi Pamongpraja Kabupaten Malang'
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
    $arrlength1 = count($array_kelamin);
    for ($i=0; $i < $arrlength1; $i++) { ?>
    {
        <?php echo "name :".json_encode($array_kelamin[$i]) ?> ,
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
    <?php if($x < $arrlength+1){
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