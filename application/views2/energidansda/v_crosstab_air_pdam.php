<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Energi Dan Sumber Daya Manusia<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Volume Air Minum PDAM</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crosstab Volume Air Minum PDAM Menurut Bulan Di Kabupaten Malang</h3>
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
         $array_bulan=array();
        foreach ($bulan->result_array() as $row2) {
           
            array_push($array_bulan, $row2['bulan']);
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
        array_push($array_data_1, $row4['bulan']);
        array_push($array_data_2, $row4['tahun']);
        array_push($array_data_7, $row4['jumlah']);
        }

        foreach ($jumlah->result_array() as $row5) {
        array_push($array_data_10, $row5['jumlah']);

        }


        $temp = 0;  
        for ($i=0; $i < count($array_bulan) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_bulan[$i]==$array_data_1[$x]&& $array_tahun[$j]==$array_data_2[$x]) {
                        $isinya2 = $array_data_7[$x];
                        $temp = 1;
                        break;
                    } else {
                        $temp=0;
                    }
                } 


                if ($temp != 0 ){
                    $array_hasil2[$i][$j]=$isinya2;
                } else {
                    $array_hasil2[$i][$j]="0";
                }
            } 

       }   

        ?>

        


        <table class="table table-striped compact cell-border" style="font-size:13px; width:100%; text-align:center; border-color:black;" id="tampilDetailCrosstabMenginap">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align: center;">Bulan</th>
                            <?php 
                            for ($i=0; $i<count($array_tahun) ; $i++) { 
                            echo "<th style=\"text-align:center;\">$array_tahun[$i]</th>";
                            }
                            ?>
                    </tr>
                    <tr>
                        <?php 
                        for ($i=0; $i <count($array_tahun) ; $i++) { 
                            echo "<th style=\"text-align:center;\">Jumlah</th>";
                        }
                        ?>
                    </tr>
                <tbody>
                <?php
                    for ($i=0; $i <count($array_bulan); $i++) { 
                    echo "<tr>";
                    echo "<td>".$array_bulan[$i]."</td>";
                    for ($j=0; $j < (count($array_tahun)); $j++) { 
                    echo "<td>".number_format($array_hasil2[$i][$j],0,",",".")."</td>";
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
