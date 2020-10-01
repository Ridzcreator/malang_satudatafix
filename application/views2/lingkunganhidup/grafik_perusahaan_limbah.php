<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <b>Grafik Data Perusahaan Limbah di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Perusahaan_limbah'); ?>">Perusahaan Limbah</a></li>
            <li class="active">Grafik Bar Data Perusahaan Limbah</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        
            <?php
                    foreach ($data->result_array() as $a) {
                    $id=$a['id'];
                   $kecamatan[]=$a['kecamatan'];
            $memiliki_limbah[]=intval($a['memiliki_limbah']);
            $tidak_memiliki_limbah[]=intval($a['tidak_memiliki_limbah']);
            $jumlah=$a['jumlah'];
            $tahun=$a['tahun'];
            $penginput=$a['penginput'];
            $timestamp=$a['timestamp'];
            $status=$a['status'];
                      
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
        text: 'Grafik Perusahaan Limbah Tahun <?php echo $tahun ?>'
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
        name: 'Memiliki Limbah',
        data: <?=json_encode($memiliki_limbah); ?>

    }, {
        name: 'Tidak Memiliki Limbah',
        data: <?=json_encode($tidak_memiliki_limbah); ?>
    }]
    <?php } ?>
});
</script>
</div>

    </section>
    <!-- /.content -->
</div>
</body>