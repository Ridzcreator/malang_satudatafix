<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Produksi Ikan<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Produksi Ikan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        
            <?php
                    foreach ($data->result_array() as $a) {
                     $id = $a['id'];
                        $tahun=$a['tahun'];
                        $ji[]=$a['jenis_ikan'];
                        $ja[]=$a['jenis_air'];
                        $prod[]=intval($a['produksi']);
                        $nprod[]=intval($a['nilai_produksi']);   
            ?>       

<div class="box" id="tampilr" style="min-width: 310px; max-width: 100%; height: 80%; margin: 0 auto">
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
    Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Produksi Ikan Tahun <?php echo $tahun ?>'
    },
    subtitle: {
        text: 'Source: Departemen of industry and Trade Of Malang Regency'
    },
    xAxis: {
        categories: <?=json_encode($ji); ?>,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
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
        name: 'produksi',
        data: <?=json_encode($prod); ?>

    }, {
        name: 'nilai_produksi',
        data: <?=json_encode($nprod); ?>

    }]
    <?php } ?>
});
</script>
</div>

    </section>
    <!-- /.content -->
</div>
</body>