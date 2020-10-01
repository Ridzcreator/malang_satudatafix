<b<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>KOMUNIKASI DAN INFORMATIKA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Report Aplikasi Terselesaikan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Aplikasi Terselesaikan Kabupaten Malang</h3>
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
           
            array_push($array_tahun, $row1['tahun']);
        }
         $array_apl=array();
        foreach ($nama_apl->result_array() as $row2) {
           
            array_push($array_apl, $row2['nama_apl']);
        }

        $array_data_1=array();
        $array_data_2=array();
        $array_data_3=array();
        $array_data_4=array();
 
        foreach ($data->result_array() as $row4) {
        array_push($array_data_1, $row4['nama_apl']);
        array_push($array_data_2, $row4['stts']);
        array_push($array_data_3, $row4['tahun']);
        }

        // foreach ($jumlah->result_array() as $row5) {
        // array_push($array_data_4, $row5['stts']);

        // }


        $temp = 0;  
        for ($i=0; $i < count($array_apl) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_apl[$i]==$array_data_1[$x]&& $array_tahun[$j]==$array_data_3[$x]) {
                        $isinya = $array_data_2[$x];
                        $temp = 1;
                        break;
                    } else {
                        $temp=0;
                    }
                } 


                if ($temp != 0 ){
                    $array_hasil[$i][$j]=$isinya;

                } else {
                    $array_hasil[$i][$j]="0";

                }
            } 

       }   

        ?>

        


        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; " id="tampilcrostabtower">
                <thead>
                   <tr>
                 <th rowspan="2" style="text-align: center;">Nama Aplikasi</th>
                 <?php 
                    for ($i=0; $i<count($array_tahun) ; $i++) { 
                    echo "<th style=\"text-align:center;\" colspan=\"1\">$array_tahun[$i]</th>";
                    }
                    ?>
                </tr>
                <tr>
                <?php 
                for ($i=0; $i <count($array_tahun) ; $i++) { 
                    echo "<th style=\"text-align:center;\">Status Terselesaikan</th>";
                }
                ?>
            </tr>
                <tbody>
                <?php
                    for ($i=0; $i <count($array_apl); $i++) { 
                    echo "<tr>";
                    echo "<td>".$array_apl[$i]."</td>";
                    for ($j=0; $j < (count($array_tahun)); $j++) { 
                    echo "<td>".$array_hasil[$i][$j]."</td>";
                }
                echo"</tr>";
                }
                ?>
                </tbody>

                

        </table>
        
    </div>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
</html>
