<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>   
            <b>PERIKANAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Produksi Ikan Laut</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Jumlah Produksi Ikan Laut Menurut Kecamatan Di Kabupaten Malang</h3>
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
         $array_ikan=array();
        foreach ($ikan->result_array() as $row2) {
           
            array_push($array_ikan, $row2['jenis_ikan']);
        }

        $array_data_1=array();
        $array_data_2=array();
        $array_data_3=array();
        $array_data_4=array();
        $array_data_5=array();
        $array_data_6=array();
        $array_data_8=array();
        $array_data_9=array();

        foreach ($data->result_array() as $row4) {
        array_push($array_data_1, $row4['jenis_ikan']);
        array_push($array_data_2, $row4['tahun']);
        array_push($array_data_3, $row4['produksi']);
        }

        foreach ($jumlah->result_array() as $row5) {
        array_push($array_data_8, $row5['produksi']);

        }


        $temp = 0; 
        $jumlah=array(); 
        for ($i=0; $i < count($array_ikan) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_ikan[$i]==$array_data_1[$x]&& $array_tahun[$j]==$array_data_2[$x]) {
                        $isinya = $array_data_3[$x];
                        $temp = 1;
                        break;
                    } else {
                        $temp=0;
                    }
                } 


                if ($temp != 0 ){
                    $array_hasil[$i][$j]=$isinya;
                    $jumlah[$j][$i] = $array_hasil[$i][$j];
                } else {
                    $array_hasil[$i][$j]="0";
                    $jumlah[$j][$i] = $array_hasil[$i][$j];
                }
            } 

       }   

        ?>

        


        <table class="table table-striped compact cell-border" style="font-size:13px; width:100%; text-align:center; border-color:black;" id="tampilcrostabproduksiikan">
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align: center;">Jenis Ikan</th>
                            <?php 
                            for ($i=0; $i<count($array_tahun) ; $i++) { 
                            echo "<th style=\"text-align:center;\">$array_tahun[$i]</th>";
                            }
                            ?>
                    </tr>
                    <tr>
                        <?php 
                        for ($i=0; $i <count($array_tahun) ; $i++) { 
                            echo "<th style=\"text-align:center;\">produksi</th>";
                        }
                        ?>
                    </tr>
                <tbody>
                <?php
                    for ($i=0; $i <count($array_ikan); $i++) { 
                    echo "<tr>";
                    echo "<td>".$array_ikan[$i]."</td>";
                    for ($j=0; $j < (count($array_tahun)); $j++) { 
                    echo "<td>".number_format($array_hasil[$i][$j],0,",",".")."</td>";
                }
                echo"</tr>";
                }
                ?>
                </tbody>
                <tfoot>
                     <tr>
                        <th style="text-align: center;">Jumlah</th>
                              <?php 
                       
                    for ($a=0; $a <count($array_tahun); $a++) { 
                       $jml[$a]=array_sum($jumlah[$a]);
                        echo "<th style=text-align:center;>".$jml[$a]."</th>";                        
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
