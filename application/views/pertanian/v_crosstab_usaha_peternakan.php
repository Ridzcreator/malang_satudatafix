<b<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>PERTANIAN</b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Crosstab Usaha Peternakan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crosstab Usaha Peternakan Di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td><div>
            </td></div>
        </tr>
        </table>
        <?php  
        $array_tahun=array();
        foreach ($tahun->result_array() as $row1) {
           
            array_push($array_tahun, $row1['tahun']);
        }
         $array_kecamatan=array();
        foreach ($kecamatan->result_array() as $row2) {
           
            array_push($array_kecamatan, $row2['kecamatan']);
        }

        $array_data_1=array();
        $array_data_2=array();
        $array_data_3=array();
        $array_data_4=array();
        $array_data_5=array();
        $array_data_6=array();
        $array_data_7=array();
        $array_data_8=array();
        $array_data_9=array();
        $array_data_10=array();
        foreach ($data->result_array() as $row4) {
        array_push($array_data_1, $row4['kecamatan']);
        array_push($array_data_2, $row4['tahun']);
        array_push($array_data_3, $row4['hewan_besar']);
        array_push($array_data_4, $row4['hewan_kecil']);
        array_push($array_data_7, $row4['unggas']);
        }

        foreach ($jumlah->result_array() as $row5) {
        array_push($array_data_8, $row5['hewan_besar']);
        array_push($array_data_9, $row5['hewan_kecil']);
        array_push($array_data_10, $row5['unggas']);

        }


        $temp = 0;  
        for ($i=0; $i < count($array_kecamatan) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_kecamatan[$i]==$array_data_1[$x]&& $array_tahun[$j]==$array_data_2[$x]) {
                        $isinya = $array_data_3[$x];
                        $isinya1 = $array_data_4[$x];
                        $isinya2 = $array_data_7[$x];
                        $temp = 1;
                        break;
                    } else {
                        $temp=0;
                    }
                } 


                if ($temp != 0 ){
                    $array_hasil[$i][$j]=$isinya;
                    $array_hasil1[$i][$j]=$isinya1;
                    $array_hasil2[$i][$j]=$isinya2;
                } else {
                    $array_hasil[$i][$j]="0";
                    $array_hasil1[$i][$j]="0";
                    $array_hasil2[$i][$j]="0";
                }
            } 

       }   

        ?>

        


        <table class="table table-striped compact cell-border" style="font-size:13.5px; width:100%; text-align:center; border-color:black;" id="tampilDetailCrosstabDatang">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align: center; vertical-align: middle">kecamatan</th>
                            <?php 
                            for ($i=0; $i<count($array_tahun) ; $i++) { 
                            echo "<th style=\"text-align:center;\" colspan=\"3\">$array_tahun[$i]</th>";
                            }
                            ?>
                    </tr>
                    <tr>
                        <?php 
                        for ($i=0; $i <count($array_tahun) ; $i++) { 
                            echo "<th style=\"text-align:center;\">Usaha Peternakan Hewan Hesar</th>
                                  <th style=\"text-align:center;\">Usaha Peternakan Hewan Kecil</th>
                                  <th style=\"text-align:center;\">Usaha Peternakan Unggas</th>";
                        }
                        ?>
                    </tr>
                <tbody>
                <?php
                    for ($i=0; $i <count($array_kecamatan); $i++) { 
                    echo "<tr>";
                    echo "<td>".$array_kecamatan[$i]."</td>";
                    for ($j=0; $j < (count($array_tahun)); $j++) { 
                    echo "<td>".number_format($array_hasil[$i][$j],0,",",".")."</td><td>".number_format($array_hasil1[$i][$j],0,",",".")."</td><td>".number_format($array_hasil2[$i][$j],0,",",".")."</td>";
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
                                
                                echo "<th style=\"text-align:center;\">".number_format($array_data_8[$i],0,",",".")."</th>";
                                echo "<th style=\"text-align:center;\">".number_format($array_data_9[$i],0,",",".")."</th>";
                                echo "<th style=\"text-align:center;\">".number_format($array_data_10[$i],0,",",".")."</th>";
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
