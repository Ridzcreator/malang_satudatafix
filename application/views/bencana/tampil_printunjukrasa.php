<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Data Unjukrasa</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/cs/laporan.css')?>"/>

           <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/cust/cust.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dataTables/datatables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        
        <script type="text/javascript" .src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body onload="window.print()">
<div id="laporan">
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><p align="center">Data Unjuk Rasa Tiap Tahun di Kabupaten Malang</p></h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <!-- <td>
            <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Tambah Data Banyak Bencana</a>
            </td> -->
            <td><div>
            </td></div>
        </tr>
        </table>
        <?php  
        $array_tahun=array();
        foreach ($tahun->result_array() as $row1) {
           
            array_push($array_tahun, $row1['periode']);
        }
         $array_unjukrasa=array();
        foreach ($unjukrasa->result_array() as $row2) {
           
            array_push($array_unjukrasa, $row2['unjukrasa']);
        }

        $array_data_1=array();
        $array_data_2=array();
        $array_data_3=array();
        $array_data_4=array();
        $array_data_5=array();
        $array_data_6=array();
        foreach ($data->result_array() as $row4) {
        array_push($array_data_1, $row4['unjukrasa']);
        array_push($array_data_2, $row4['jumlah']); 
        array_push($array_data_3, $row4['periode']);
        }

        foreach ($jumlah->result_array() as $row5) {
        array_push($array_data_5, $row5['jumlah']);

        }
        foreach ($jumlah1->result_array() as $row6) {
        array_push($array_data_6, $row6['jumlah']);

        }

        $jumlah = array();
        $temp = 0;  
        for ($i=0; $i < count($array_unjukrasa) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_unjukrasa[$i]==$array_data_1[$x]&& $array_tahun[$j]==$array_data_3[$x]) {
                        $isinya = $array_data_2[$x];
                        
                        $temp = 1;
                        break;
                    } else {
                        $temp=0;
                    }
                } 


                if ($temp != 0 ){
                    $array_hasil[$i][$j]=$isinya;
                    $jumlah[$i][$j] = $array_hasil[$i][$j];
                 
                } else {
                    $array_hasil[$i][$j]="0";
                    $jumlah[$i][$j] = $array_hasil[$i][$j];
                 
                    
                }
            } 

       }   


        ?>

        

        <div class="col-md-10">
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; border-color: black;" id="tampilDetailCrosstabUnjukrasa">
                <thead>
                   <tr>
                 <th rowspan="2" style="text-align: center; padding-bottom: 20px; border-color: black;">Unjukrasa</th>
                 <th colspan="<?php echo count($array_tahun); ?>" style="text-align: center; padding-bottom: 20px; border-color: black;">Tahun</th>
                 
                </tr>
                <tr>
                <?php 
                for ($i=0; $i <count($array_tahun) ; $i++) { 
                     echo "<th style=\"text-align:center;border-color:black;\">$array_tahun[$i]</th>";
                }
                ?>
               
            </tr>
                <tbody>
             
                <?php
                $no = 0;
                    for ($i=0; $i <count($array_unjukrasa); $i++) { 
                    echo "<tr>";
                    echo "<td>".$array_unjukrasa[$i]."</td>";
                    for ($j=0; $j < (count($array_tahun)); $j++) { 
                    echo "<td>".$array_hasil[$i][$j]."</td>";

                }    
            
            
                echo"</tr>";
                }
                    
                
                ?>
                
                </tbody>

                <tfoot style="border-color: black;">
                <tr>
                <th style="text-align: center;">Jumlah</th>


   <?php 
    for ($i=count($array_tahun)-1; $i >=0; $i--) {
        
        echo "<th style=\"text-align:center;\">".$array_data_5[$i]."</th>";
       

    }
    ?>
</tr>
                </tfoot>

        </table>
        </div>
        <div class="col-md-2" style="padding-top: 0px; padding-left: -40px;">
       <table class="table table-bordered table-striped compact cell-border" style="border-color:black; font-size:15px; width:100%; text-align:center;" id="tampilDetailCrosstabUnjukrasa1">
       <thead>
            <tr></tr>
             <th style="text-align: center; height: 53px; padding-bottom: 20px; padding-top: 49px; border-color: black;">Jumlah</th>
             </thead>
             <tbody>
                  <?php 
         for ($x=0; $x < count($array_unjukrasa) ; $x++) { 
                echo "<tr>";
                    for ($a=0; $a <count($array_unjukrasa) ; $a++) { 
                       $jml[$a]=array_sum($jumlah[$a]);
                        echo "<td>".$jml[$a]."</td><tr>";                        
                    }
             
                    break;
                    } 
                    ?>
             </tbody>
           <tfoot>
               <?php 
        foreach ($jumlah1->result_array() as $row6) {
        echo "<th style=\"text-align:center;\">".$row6['jumlah']."</th>";

        }
        
        
       

     ?>
           </tfoot>


        </table>

        <div style="margin-top: 10px;" align="right">
            <?php 
    for ($i=0; $i < count($array_tahun); $i++) { 
        $x=count($array_tahun)-1;
        $tahun1=$array_tahun[0];
        $tahun2=$array_tahun[$x];
    }
    ?>
     
        </div>
             
        </div>
       
        
    </div>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/datatables.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
<script type="text/javascript" .src=https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js></script>
<script type="text/javascript" .src=https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js></script>
<script type="text/javascript" .src=https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js></script>
<script type="text/javascript" .src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js></script>
<script type="text/javascript" .src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js></script>
<script type="text/javascript" .src=https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js></script>
<script type="text/javascript" .src=https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js></script>
<script src="<?php echo base_url(); ?>assets/dataTables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/datatables.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.print.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.colVis.min.js"></script> 
</html>
