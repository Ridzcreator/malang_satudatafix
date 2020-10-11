<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Grafik Data Ekspor Negara di Kabupaten Malang <b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= base_url('Ekspor_negara_tujuan'); ?>">Ekspor Negara</a></li>
            <li class="active">Grafik Bar Data Ekspor Negara</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <br>
        
            <?php
                     foreach ($data->result_array() as $a) {
                    $no=$a['id'];
                    $negara[]=$a['nama_negara_ekspor_impor'];
                    $volum[]=intval($a['volume_ekspor_impor']);
                    $nilai[]=intval($a['nilai_ekspor_impor']);
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
        type: 'bar'
    },
    title: {
        text: 'Grafik Jumlah Ekspor Menurut Negara Tujuan di Kabupaten Malang Tahun <?php echo $tahun ?>'
    },
    xAxis: {
        categories: <?=json_encode($negara); ?>
    },
    yAxis: {
       min: 0,
       title: {
            text: 'Jumlah Data'
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Volum Ekspor',
        data: <?=json_encode($volum); ?>
    }, {
       name: 'Nilai Ekspor',
        data: <?=json_encode($nilai); ?>
    }]
});

     <?php
}
?>
</script>
</div>

    </section>
    <!-- /.content -->
</div>
</body>