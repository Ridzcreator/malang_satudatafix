<b<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Kelola Data Lembaga Masyarakat<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Lembaga Masyarakat</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Data Lembaga Masyarakat Tiap Tahun di Kabupaten Malang</h3>
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
         $array_kecamatan=array();
        foreach ($kecamatan->result_array() as $row2) {
           
           
        }
        $array_desa=array();
        foreach ($desa->result_array() as $row3) {
           
            array_push($array_desa, $row3['nama_desa']);
             array_push($array_kecamatan, $row3['nama_kecamatan']);
        }

        $array_data_1=array();
        $array_data_2=array();
        $array_data_3=array();
        $array_data_4=array();
        $array_data_5=array();
        $array_data_6=array();
        foreach ($data->result_array() as $row4) {
        array_push($array_data_1, $row4['nama_kecamatan']);
        array_push($array_data_2, $row4['jumlah']); 
        array_push($array_data_3, $row4['periode']);
        array_push($array_data_4, $row4['nama_desa']);
        }

        foreach ($jumlah->result_array() as $row5) {
        array_push($array_data_5, $row5['jumlah']);

        }
       
        foreach ($jumlah1->result_array() as $row6) {
        array_push($array_data_6, $row6['jumlah']);

        }

        $jumlah = array();
        $temp = 0;  
        for ($i=0; $i < count($array_desa) ; $i++) { 
            for ($j=0; $j < (count($array_tahun)) ; $j++) { 
                $isinya = '';
                for ($x=0; $x < count($array_data_1) ; $x++) { 
                    if ($array_desa[$i]==$array_data_4[$x] && $array_tahun[$j]==$array_data_3[$x]) {

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
        <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; " id="tampilcrosstablembaga">
                <thead>
                   <tr>
                 <th rowspan="2" style="text-align: center; padding-bottom: 20px;">Kecamatan</th>
                 <th rowspan="2" style="text-align: center; padding-bottom: 20px;">Desa</th>
                 <th colspan="<?php echo count($array_tahun); ?>" style="text-align: center; padding-bottom: 20px;">Tahun</th>
                 
                </tr>
                <tr>
                <?php 
                for ($i=0; $i <count($array_tahun) ; $i++) { 
                     echo "<th style=\"text-align:center;\">$array_tahun[$i]</th>";
                }
                ?>
               
            </tr>
                <tbody>
             
                <?php
                $no = 0;
                    for ($i=0; $i <count($array_desa); $i++) { 
                    echo "<tr>";
                     echo "<td>".$array_kecamatan[$i]."</td>";
                     echo "<td>".$array_desa[$i]."</td>";
                    for ($j=0; $j < (count($array_tahun)); $j++) { 
                    echo "<td>".$array_hasil[$i][$j]."</td>";

                }    
            
            
                echo"</tr>";
                }
                    
                
                ?>
                
                </tbody>

                <tfoot>
                <tr>
                <th></th>
                <th style="text-align: center;" >Jumlah</th>



   <?php 
    for ($i=0; $i <count($array_tahun); $i++) {
        
        echo "<th style=\"text-align:center;\">".$array_data_5[$i]."</th>";
       

    }
    ?>
</tr>
                </tfoot>

        </table>
        </div>
        <div class="col-md-2" style="padding-top: 0px; padding-left: -40px;">
       <table class="table table-bordered table-striped compact cell-border" style="font-size:15px; width:100%; text-align:center; " id="tampilcrosstablembaga1">
       <thead>
             <th style="text-align: center; height: 53px; padding-bottom: 20px;" >Jumlah</th>
             </thead>
             <tbody>

                  <?php 
         for ($x=0; $x < count($array_desa) ; $x++) { 
                echo "<tr>";
                    for ($a=0; $a <count($array_desa) ; $a++) { 
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
             
        </div>
       
        
    </div>
    </div><!-- /.box -->
    </section>
    <!-- /.content -->

</div>
</body>
</html>
