<body>
<?php
if($datap=="mpu"){
    $page="Jumlah Kendaraan MPU ";
}else if($datap=="bus"){
    $page="Jumlah Bus";
}else if($datap=="barang"){
    $page="Jumlah Mobil Barang";
}else if($datap=="gandeng"){
    $page="Jumlah Kereta Gandeng";
}else if($datap=="tempel"){
    $page="Jumlah Kereta Tempel";
}else if($datap=="khusus"){
    $page="Jumlah Kendaraan Khusus";
}else if($datap=="jumlah"){
    $page="Jumlah Total";
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1>
            <b>Grafik Perbandingan Banyak Kendaraan Lulus Uji Menurut Jenis dan Status di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
           <li><a href="<?= base_url('Banyakkendaraan'); ?>">Banyak Kendaraan</a></li>
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
                        
                        $periode[]=intval($a['periode']);
                        if($datap=="mpu"){
                             $value[]=intval($a['mpu']);
                        }else if ($datap=="bus"){
                            $value[]=intval($a['bus']);
                        }else if ($datap=="barang"){
                            $value[]=intval($a['mobil']);
                        }else if ($datap=="gandeng"){
                            $value[]=intval($a['gandeng']);
                        }else if ($datap=="tempel"){
                            $value[]=intval($a['tempel']);
                        }else if ($datap=="khusus"){
                            $value[]=intval($a['khusus']);
                        }else if ($datap=="jumlah"){
                            $value[]=intval($a['jumlah']);
                        }
                        
                    
            ?>
    <div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
    <script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
    <script type="text/javascript">
    var chart = Highcharts.chart('tampilr', {

    title: {
        text: 'Grafik Perbandingan Kendaraan di Kabupaten Malang'
    },
    subtitle: {
        text: 'Dinas Perhubungan Kabupaten Malang'
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
        }
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

    series: [{
        type: 'column',
        name: "Jumlah Data ",
        colorByPoint: true,
        data: [<?php $arrlength = count($value);
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

</body>