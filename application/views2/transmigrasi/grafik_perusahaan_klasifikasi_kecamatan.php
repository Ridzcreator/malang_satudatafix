<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <b>Grafik Data Pemberangkatan Transmigran di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Transmigrasi'); ?>">Transmigrasi</a></li>
            <li class="active">Grafik Bar Data Pemberangkatan Transmigran</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        
            <?php
                    foreach ($data->result_array() as $a) {
                    $kecamatan[]=$a['kecamatan'];
                    $tahun=$a['tahun'];
                    $laki_laki[]=intval($a['laki_laki']);
                    $perempuan[]=intval($a['perempuan']);
                    $rumah_tangga[]=intval($a['rumah_tangga']);
                    $jiwa[]=intval($a['jiwa']);

                      
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
        text: 'Grafik Pemberangkatan Transmigran Menurut Kecamatan Tahun <?php echo $tahun ?>'
    },
    subtitle: {
        text: 'Source: Departemen of industry and Trade Of Malang Regency'
    },
    xAxis: {
        categories: <?=json_encode($kecamatan); ?>,
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
        name: 'Laki-laki',
        data: <?=json_encode($laki_laki); ?>

    }, {
        name: 'Perempuan',
        data: <?=json_encode($perempuan); ?>

     }, {
        name: 'Rumah Tangga',
        data: <?=json_encode($rumah_tangga); ?>

     }, {
        name: 'Jiwa',
        data: <?=json_encode($jiwa); ?>

    }]
    <?php } ?>
});
</script>
</div>

    </section>
    <!-- /.content -->
</div>
</body>