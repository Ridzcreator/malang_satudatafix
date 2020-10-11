<body>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1>
            <b>PEKERJAAN PENDUDUK<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
             <li><a href="<?= base_url('Pekerjaan_penduduk'); ?>">Pekerjaan Penduduk</a></li>
            <li class="active">Grafik Detail Pekerjaan Penduduk</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
            <?php
                $periode=array();
                $value=array();
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $periode=$a['tahun'];
                            $nama_pekerjaan[]=$a['nama_pekerjaan'];
                            $value[]=intval($a['jumlah']);
                        
            ?>
    <div class="box" id="tampilr" style="min-width: 10%; max-width: 90%; height: 100%; margin: 0 auto;">
    <script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
    <script type="text/javascript">
Highcharts.chart('tampilr', {
    chart: {
        type: 'column'
    },
  title: {
        text: 'Grafik Banyaknya Penduduk Berdasarkan Pekerjaannya di Kabupaten Malang <?php echo $periode; ?>'
    },
    subtitle: {
        text: 'Dinas Perindustrian dan Perdagangan Kabupaten Malang'
    },
    xAxis: {
        categories: <?=json_encode($nama_pekerjaan); ?>,
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
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}</td><td>: </td>' +
                     '<td style="padding:0"><b>{point.y:,.0f}</b></td></tr>',
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
        name: 'Jumlah Pekerjaan',
        data: [<?php $arrlength = count($value);
                for($x = 0; $x < $arrlength; $x++) {
                echo json_encode(intval($value[$x]));
                if($x < $arrlength-1){
                echo ",";
                }
                }?>]
    }]
        <?php } ?>
});
    </script>
    </div>

</section>
    <!-- /.content -->
</div>

</body>