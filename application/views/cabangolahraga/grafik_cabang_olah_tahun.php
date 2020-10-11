<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Jumlah Atlet & Pelatih Berprestasi di Kabupaten Malang<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('C_cabangolah'); ?>"></i> Atlet & Pelatih Berprestasi di Kabupaten Malang</a></li>
            <li class="active">Grafik Bar Data Prestasi Atlet & Pelatih</li></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        
            <?php
                    foreach ($data->result_array() as $a) {
                    $id= $a['id'];
                    $co[]=$a['cabang_olahraga'];
                    $ps[]=intval($a['prestasi']);
                    $db[]=intval($a['dibina']);
                    $jm[]=$a['jumlah'];
                    $tahun=$a['tahun'];       
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
        text: 'Grafik Atlet & Pelatih Berprestasi Tahun <?php echo $tahun ?>'
    },
    subtitle: {
        text: 'Dinas Kepemudaan dan Olahraga Kabupaten Malang'
    },
    xAxis: {
        categories: <?=json_encode($co); ?>,
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
        name: 'prestasi',
        data: <?=json_encode($ps); ?>

    }, {
        name: 'dibina',
        data: <?=json_encode($db); ?>

    }]
    <?php } ?>
});
</script>
</div>

    </section>
    <!-- /.content -->
</div>
</body>