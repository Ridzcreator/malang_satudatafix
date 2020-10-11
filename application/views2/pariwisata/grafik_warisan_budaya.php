<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            <b>Grafik Data Jumlah Warisan Budaya di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('C_warisan_budaya'); ?>">Jumlah Warisan Budaya</a></li>
            <li class="active">Grafik Bar Jumlah Warisan Budaya</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        
           <?php 
           foreach ($data->result_array() as $a) {
            $budaya=$a['budaya'];
            $budaya1=$a['budaya1'];
            $budaya2=$a['budaya2'];
            $totalbudaya=$budaya+$budaya1+$budaya2;

            $museum1=$a['museum1'];
            $museum2=$a['museum2'];
            $museum3=$a['museum3'];
            $totalmuseum=$museum1+$museum2+$museum3;

            $arsitektur1=$a['arsitektur1'];
            $arsitektur2=$a['arsitektur2'];
            $arsitektur3=$a['arsitektur3'];
            $totalarsitektur=$arsitektur1+$arsitektur2+$arsitektur3;

            $bahasa1=$a['bahasa1'];
            $bahasa2=$a['bahasa2'];
            $bahasa3=$a['bahasa3'];
            $totalbahasa=$bahasa1+$bahasa2+$bahasa3;

            $kain1=$a['kain1'];
            $kain2=$a['kain2'];
            $kain3=$a['kain3'];
            $totalkain=$kain1+$kain2+$kain3;

            $kearifan1=$a['kearifan1'];
            $kearifan2=$a['kearifan2'];
            $kearifan3=$a['kearifan3'];
            $totalkearifan=$kearifan1+$kearifan2+$kearifan3;

            $kerajinan1=$a['kerajinan1'];
            $kerajinan2=$a['kerajinan2'];
            $kerajinan3=$a['kerajinan3'];
            $totalkerajinan=$kerajinan1+$kerajinan2+$kerajinan3;

            $kuliner1=$a['kuliner1'];
            $kuliner2=$a['kuliner2'];
            $kuliner3=$a['kuliner3'];
            $totalkuliner=$kuliner1+$kuliner2+$kuliner3;

            $naskah1=$a['naskah1'];
            $naskah2=$a['naskah2'];
            $naskah3=$a['naskah3'];
            $totalnaskah=$naskah1+$naskah2+$naskah3;

            $pakaian1=$a['pakaian1'];
            $pakaian2=$a['pakaian2'];
            $pakaian3=$a['pakaian3'];
            $totalpakaian=$pakaian1+$pakaian2+$pakaian3;

            $permainan1=$a['permainan1'];
            $permainan2=$a['permainan2'];
            $permainan3=$a['permainan3'];
            $totalpermainan=$permainan1+$permainan2+$permainan3;

            $seni1=$a['seni1'];
            $seni2=$a['seni2'];
            $seni3=$a['seni3'];
            $totalseni=$seni1+$seni2+$seni3; 

            $senjata1=$a['senjata1'];
            $senjata2=$a['senjata2'];
            $senjata3=$a['senjata3'];
            $totalsenjata=$senjata1+$senjata2+$senjata3;

            $teknologi1=$a['teknologi1'];
            $teknologi2=$a['teknologi2'];
            $teknologi3=$a['teknologi3'];
            $totalteknologi=$teknologi1+$teknologi2+$teknologi3;

            $lisan1=$a['lisan1'];
            $lisan2=$a['lisan2'];
            $lisan3=$a['lisan3'];
            $totallisan=$lisan1+$lisan2+$lisan3; 

            $upacara1=$a['upacara1'];
            $upacara2=$a['upacara2'];
            $upacara3=$a['upacara3'];
            $totalupacara=$upacara1+$upacara2+$upacara3; 

            $belum1=$a['belum1'];
            $belum2=$a['belum2'];
            $belum3=$a['belum3'];
            $totalbelum=$belum1+$belum2+$belum3; 

            ?> 


<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts-more.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>

<div class="box" id="tampilr" style="min-width: 310px; max-width: 100%; height: 80%; margin: 0 auto">
<script type="text/javascript">
    // Create the chart
Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Warisan Budaya'
    },
    subtitle: {
        text: 'Source: Dinas Pariwisata Dan Kebudayaan Kabupaten Malang'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Jumlah Warisan Budaya: <b>{point.y:0f}</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['Cagar Budaya', <?php echo json_encode(intval($totalbudaya)); ?>],
            ['Museum', <?php echo json_encode(intval($totalmuseum)); ?>],
            ['Arsitektur Tradisional', <?php echo json_encode(intval($totalarsitektur)); ?>],
            ['Bahasa Daerah', <?php echo json_encode(intval($totalbahasa)); ?>],
            ['Kain Tradisional', <?php echo json_encode(intval($totalkain)); ?>],
            ['Kearifan Lokal', <?php echo json_encode(intval($totalkearifan)); ?>],
            ['Kerajinan Tradisional', <?php echo json_encode(intval($totalkerajinan)); ?>],
            ['Kuliner Tradisional', <?php echo json_encode(intval($totalkuliner)); ?>],
            ['Naskah Kuno', <?php echo json_encode(intval($totalnaskah)); ?>],
            ['Pakaian Adat', <?php echo json_encode(intval($totalpakaian)); ?>],
            ['Permainan Tradisional', <?php echo json_encode(intval($totalpermainan)); ?>],
            ['Seni Tradisional', <?php echo json_encode(intval($totalseni)); ?>],
            ['Senjata Tradisional', <?php echo json_encode(intval($totalsenjata)); ?>],
            ['Teknologi Tradisional', <?php echo json_encode(intval($totalteknologi)); ?>],
            ['Tradisi Lisan', <?php echo json_encode(intval($totallisan)); ?>],
            ['Upacara/Ritus', <?php echo json_encode(intval($totalupacara)); ?>],
            ['Belum Terklarifikasi', <?php echo json_encode(intval($totalbelum)); ?>]
        ],
        dataLabels: {
            enabled: true,
            rotation: -0,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.0f}', // one decimal
            y: 0, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>
<?php } ?>

</div>

    </section>
    <!-- /.content -->
</div>
</body>