<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Energi Dan Sumber Daya Alam<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Grafik Volume Air Minum PDAM Pertahun</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        <?php $page = $this->uri->segment(3);  ?>
        
            <?php
                    foreach ($data->result_array() as $a) {
                    $id=$a['id'];
                    $bulan[]=$a['bulan'];
                    $tahun[]=$a['tahun'];
                    $jumlah[]=intval($a['jumlah']);
                      
            ?>       

<div id="tampilr" style="min-width: 310px; max-width: 1000px; height: 400px; margin: 0 auto">
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
    Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Volume Air Minum PDAM Tahun <?=json_encode($page); ?>'
    },
    subtitle: {
        text: 'Source: PDAM Kabupaten Malang'
    },
    xAxis: {
        categories: <?=json_encode($bulan); ?>,
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
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        name: 'Jumlah',
        data: <?=json_encode($jumlah); ?>

    }, ]
});
</script>
</div>
<?php } ?>
    </section>
    <!-- /.content -->

</div>
