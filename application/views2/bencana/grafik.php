<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Grafik Jumlah Korban <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Bencana</li>
        
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
		    <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $bencana_alam[]=$a['bencana_alam'];
                        $bencana[]=$a['bencana'];
                        $bencanaa= $a['bencana'];
                        $banyak[]=intval($a['banyak_bencana']);
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $kecamatan[]=$a['nama_kecamatan'];
                        $desa[]=$a['nama_desa'];
                        $periode=$a['periode'];
            ?>
<div id="tampilr" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto">
    <script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/data.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/drilldown.js"></script>
<script type="text/javascript">// Create the chart
Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Data <?=json_encode($bencanaa);?> Tahun <?=json_encode($periode);?>'
    },
    subtitle: {
        text: 'Badan Penanggulangan Bencana Alam Kabupaten Malang'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Jumlah Bencana'
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
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
    },

    series: [
        {
            name: <?php echo json_encode($bencanaa); ?>,
            colorByPoint: true,
            data: [
                
                <?php $arrlength = count($bencana);
                for($x = 0; $x < $arrlength; $x++) {?>
                {
                    name: <?php echo json_encode($kecamatan[$x]); ?>,
                    y: <?php echo json_encode(intval($banyak[$x])); ?>,
                    drilldown: <?php echo json_encode($bencana[$x]); ?>
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
            
        ]
    }
});

</script>
</div>
<?php } ?>
    </section>
    <!-- /.content -->

</div>
