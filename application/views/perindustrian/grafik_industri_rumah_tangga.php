<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <b>Grafik Data Industri Rumah Tangga di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Industri_rumah_tangga'); ?>">Industri Rumah Tangga</a></li>
            <li class="active">Grafik Bar Data Industri Rumah Tangga</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        
            <?php
                    foreach ($data->result_array() as $a) {
                    $id=$a['id'];
                    $jenis[]=$a['jenis_industri'];
                    $j_unit[]=intval($a['jumlah_unit_produksi']);
                    $j_tenaga[]=intval($a['jumlah_tenaga_kerja']);
                    $j_produksi=$a['jumlah_produksi'];
                    $nilai_produksi[]=intval($a['nilai_produksi']);
                    $tahun=$a['tahun'];
                    $penginput=$a['penginput'];
                    $timestamp=$a['timestamp'];
                    $status=$a['status'];
                    $kategori=$a['kategori'];

                      
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
        text: 'Grafik Jenis Industri Rumah Tangga Tahun <?php echo $tahun ?>'
    },
    subtitle: {
        text: 'Source: Departemen of industry and Trade Of Malang Regency'
    },
    xAxis: {
        categories: <?=json_encode($jenis); ?>,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:,.0f} </b></td></tr>',
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
        name: 'Jumlah Unit Produksi',
        data: <?=json_encode($j_unit); ?>

    }, {
        name: 'Jumlah Tenaga Kerja',
        data: <?=json_encode($j_tenaga); ?>
    }, {
        name: 'Nilai Produksi',
        data: <?=json_encode($nilai_produksi); ?>
    }]
    <?php } ?>
});
</script>
</div>

    </section>
    <!-- /.content -->
</div>
</body>