<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Jumlah Koleksi Buku di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('jumlahkoleksibuku'); ?>"></i> Jumlah Koleksi Buku di Kabupaten Malang</a></li>
            <li class="active">Jumlah Koleksi Buku di Kabupaten Malang</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
            <?php   
            $table=array();
           
           
             $jumlahk = array();
                    foreach ($data->result_array() as $a) {
                        

                        $tb[]=$a['tajuk_buku'];
                        $periode=$a['tahun'];
                        $jl[]=intval($a['judul']);
                        $el[]=intval($a['exemplar']);
                        $jumlahk[]=intval($a['jumlah']);
                    }
            ?>    

<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts-more.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/drilldown.js"></script>

<div id="tampilr" class="box" style="min-width: 310px; max-width: 90%; height: 80&; margin: 0 auto;">
<script type="text/javascript">
Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Jumlah Koleksi Buku di Kabupaten Malang Tahun <?php echo $periode; ?>'
    },
    subtitle: {
        text: 'Dinas Perpustakaan Dan Kearsipan Tahun <?php echo $periode; ?>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah Data'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: Total : <b>{point.y:0f}</b><br/>'
    },

    series: [
        {
            name: "Grafik",
            colorByPoint: true,
            data: [
                
                <?php $arrlength = count($jumlahk);
                for($x = 0; $x < $arrlength; $x++) {?>
                {
                    name: <?php echo json_encode($tb[$x]); ?>,
                    y: <?php echo json_encode(intval($jumlahk[$x])); ?>,
                    drilldown: <?php echo json_encode($tb[$x]); ?>
                }
                <?php
                if($x < $arrlength-1){
                echo ",";
                }
                }?>
                
            ]
        }
    ],
    drilldown: {
        series: [
            <?php $arrlength = count($jumlahk);
                for($x = 0; $x < $arrlength; $x++) {?>
                {
                name: <?php echo json_encode($tb[$x]); ?>,
                id: <?php echo json_encode($tb[$x]); ?>,
                    data: [
                       [
                            "judul",
                            <?php echo json_encode(intval($jl[$x])); ?>
                        ],[
                            "exemplar",
                            <?php echo json_encode(intval($el[$x])); ?>
                        ]
                    ]
                }
                <?php
                if($x < $arrlength-1){
                echo ",";
                }
                }?>
        ]
    }
});

</script>
</div>
    </section>
    <!-- /.content -->

</div>