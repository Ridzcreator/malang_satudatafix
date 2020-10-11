<section class="content">
        <br>
		    <?php
                    foreach ($grafik->result_array() as $a) {
                        $idd = $a['id'];
                        $bencanaa[]=$a['bencana_alam'];
                        $banyakk[]=intval($a['banyak_bencana']);
                        $meninggall=$a['meninggal'];
                        $lukaa=$a['luka'];
                        $periodee=$a['periode'];
            ?>

<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<script type="text/javascript">
    Highcharts.chart('tampilrr', {
     chart: {
        type: 'bar'
    },
    title: {
        text: 'Jumlah Korban Bencana Tahun'
    },
    subtitle: {
        text: 'Tahun <?=json_encode($periodee); ?>'
    },
    xAxis: {
        categories: <?=json_encode($bencanaa); ?>,
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Badan Penanggulangan Bencana Alam Daerah Kabupaten Malang',
            align: 'middle'
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
        name: 'Year <?=json_encode($periodee); ?>',
        data: <?=json_encode($banyakk); ?>
    }]
});
</script>
</div>
<?php } ?>
    </section>