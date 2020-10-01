<b<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Banyak Mobil Pemadam Kebakaran<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Banyak Mobil Pemadam Kebakaran</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Banyaknya Mobil Pemadam Kebakaran Kabupaten Malang</h3>
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
         $array_lokasi=array();
        foreach ($lokasi->result_array() as $row2) {
           
            array_push($array_lokasi, $row2['lokasi']);
        }

        $array_data_1=array();
        $array_data_2=array();
        $array_data_3=array();
        $array_data_4=array();
        $array_data_5=array();
        $array_data_6=array();
        foreach ($data->result_array() as $row4) {
        array_push($array_data_1, $row4['lokasi']);
        array_push($array_data_2, $row4['layak']);
        array_push($array_data_3, $row4['tidak']);
        array_push($array_data_4, $row4['periode']);
        }

        foreach ($jumlah->result_array() as $row5) {
        array_push($array_data_5, $row5['layak']);
        array_push($array_data_6, $row5['tidak']);

        }


        $temp = 0;  
        for ($i=0; $i < count($array_lokasi) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_lokasi[$i]==$array_data_1[$x]&& $array_tahun[$j]==$array_data_4[$x]) {
                        $isinya = $array_data_2[$x];
                        $isinya1 = $array_data_3[$x];
                        $temp = 1;
                        break;
                    } else {
                        $temp=0;
                    }
                } 


                if ($temp != 0 ){
                    $array_hasil[$i][$j]=$isinya;
                    $array_hasil1[$i][$j]=$isinya1;
                } else {
                    $array_hasil[$i][$j]="0";
                    $array_hasil1[$i][$j]="0";
                }
            } 

       }   

        ?>

        


        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; " id="tampilDetailCrosstabPemadam">
                <thead>
                   <tr>
                 <th rowspan="2" style="text-align: center; padding-bottom: 20px;">Lokasi</th>
                 <?php 
                    for ($i=0; $i<count($array_tahun) ; $i++) { 
                    echo "<th style=\"text-align:center;\" colspan=\"2\">$array_tahun[$i]</th>";
                    }
                    ?>
                </tr>
                <tr>
                <?php 
                for ($i=0; $i <count($array_tahun) ; $i++) { 
                    echo "<th style=\"text-align:center;\">Layak Pakai</th>
                          <th style=\"text-align:center;\">Tidak Layak</th>";
                }
                ?>
            </tr>
                <tbody>
                <?php
                    for ($i=0; $i <count($array_lokasi); $i++) { 
                    echo "<tr>";
                    echo "<td>".$array_lokasi[$i]."</td>";
                    for ($j=0; $j < (count($array_tahun)); $j++) { 
                    echo "<td>".$array_hasil[$i][$j]."</td><td>".$array_hasil1[$i][$j]."</td>";
                }
                echo"</tr>";
                }
                ?>
                </tbody>

                <tfoot>
                <tr>
                <th style="text-align: center;">Jumlah</th>
   <?php 
    for ($i=0; $i <count($array_tahun); $i++) {
        
        echo "<th style=\"text-align:center;\">".$array_data_5[$i]."</th>";
        echo "<th style=\"text-align:center;\">".$array_data_6[$i]."</th>";

    }
    ?>
</tr>
                </tfoot>

        </table>
        
    </div>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
</html>
