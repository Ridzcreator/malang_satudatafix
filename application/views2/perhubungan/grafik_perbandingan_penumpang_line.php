<body>
<?php
if($datap=="lawang"){
    $page="Jumlah Penumpang Stasiun Lawang ";
}else if($datap=="singosari"){
    $page="Jumlah Penumpang Stasiun Singosari ";
}else if($datap=="kepanjen"){
    $page="Jumlah Penumpang Stasiun Kepanjen ";
}else if($datap=="ngebruk"){
   $page="Jumlah Penumpang Stasiun Ngebruk ";
}else if($datap=="sumberpucung"){
  $page="Jumlah Penumpang Stasiun Sumberpucung ";
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Banyak Penumpang Menurut Stasiun di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
           <li><a href="<?= base_url('Penumpangangkutan'); ?>">Banyak Penumpang</a></li>
            <li class="active">Grafik Line <?php echo $page; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
            <?php
                $periode=array();
                $value=array();
                    foreach ($data->result_array() as $a) {
                        
                        $periode[]=intval($a['periode']);
                        if($datap=="lawang"){
                             $value[]=intval($a['lawang']);
                        }else if ($datap=="singosari"){
                            $value[]=intval($a['singosari']);
                        }else if ($datap=="kepanjen"){
                            $value[]=intval($a['kepanjen']);
                        }else if ($datap=="ngebruk"){
                            $value[]=intval($a['ngebruk']);
                        }else if ($datap=="sumberpucung"){
                            $value[]=intval($a['sumberpucung']);
                        }else if ($datap=="jumlah"){
                            $value[]=intval($a['jumlah']);
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
        text: 'Grafik Perbandingan Data Penumpang di Kabupaten Malang'
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