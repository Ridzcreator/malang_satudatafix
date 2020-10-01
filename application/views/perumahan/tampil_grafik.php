<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            PERUMAHAN & KAWASAN PEMUKIMAN
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?= base_url('Perumahan'); ?>"></i> Perumahan</a></li>
            <li class="active">Perumahan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
         <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        $jenis[]=$a['jenis'];
                        $volume[]=intval($a['volume']);
                      
            ?>
<div id="tampilr" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto">
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
    Highcharts.chart('tampilr', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Sampah Yang Dihasilkan Dan Yang Diolah Kabupaten Malang Tahun 2018'
    },
    subtitle: {
        text: 'Source: Kabupaten Malang Tahun 2018'
    },
    xAxis: {
        categories: <?=json_encode($jenis); ?>,
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Volume',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Volume',
        data: <?=json_encode($volume); ?>
    }]
});
</script>
</div>
<?php } ?>
    </section>
    <!-- /.content -->

</div>
