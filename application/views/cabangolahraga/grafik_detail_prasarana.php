<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            PRASARANA OLAHRAGA
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Prasarana Olahraga</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        
            <?php
                    foreach ($data->result_array() as $a) {
                    $id[] = $a['id'];
                    $kec[]=$a['kcmtn'];
                    $tahun[]]=$a['tahun'];
                    $stadion[]=intval($a['stadion']);
                    $spkbola[]=intval($a['sb']);
                    $voly[]=intval($a['bv']);
                    $basket[]=intval($a['bb']);
                    $tenis[]=intval($a['tenis']);
                    $badminton[]=intval($a['bt']); 
                    $futsal[]=intval($a['futsal']); 
                    $gor[]=intval($a['gor']); 
                    $aula[]=intval($a['aula']); 
                    $kolam[]=intval($a['kr']);    
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
        text: 'Grafik Jenis Warisan Budaya Tahun <?=json_encode($tahun); ?>'
    },
    subtitle: {
        text: 'Source: Departemen of industry and Trade Of Malang Regency'
    },
    xAxis: {
        categories: <?=json_encode($kec); ?>,
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
        name: 'stadion',
        data: <?=json_encode($stadion); ?>

    }]
     series: [{
        name: 'sb',
        data: <?=json_encode($spkbola); ?>

    }]
     series: [{
        name: 'bv',
        data: <?=json_encode($voly); ?>

    }]
     series: [{
        name: 'bb',
        data: <?=json_encode($basket); ?>

    }]
     series: [{
        name: 'tenis',
        data: <?=json_encode($tenis); ?>

    }]
     series: [{
        name: 'bt',
        data: <?=json_encode($badminton); ?>

    }]
     series: [{
        name: 'futsal',
        data: <?=json_encode($futsal); ?>

    }]
     series: [{
        name: 'gor',
        data: <?=json_encode($gor); ?>

    }]
     series: [{
        name: 'aula',
        data: <?=json_encode($aula); ?>

    }]
     series: [{
        name: 'kr',
        data: <?=json_encode($kolam); ?>

    }]
    <?php } ?>
});
</script>
</div>

    </section>
    <!-- /.content -->
</div>
</body>