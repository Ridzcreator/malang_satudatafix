<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>PARIWISATA<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Total Warisan Budaya</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    
                <div class="box">

                 <!-- /.box-header -->
                <div class="box-header">
                    <h4 class="box-title" style="margin-bottom:10px">Jumlah Total Warisan Budaya</h3><br>
                    <a class="btn btn-primary" href="C_warisan_budaya/tampil_grafik_warisan">Lihat Grafik</a>
                </div>
                    
                    <div class="box-body">
                        <table  class="table table-striped" id="tampilWarisan" width="100%" height="100%" style="font-size: 11.5px;padding: 10px 0px; ">
                            <thead >
                                <tr>
                                    <th style="text-align:center;padding: 10px 0px; vertical-align: middle" rowspan="2">Warisan Budaya</th>
                                    <th style="text-align:center;padding: 10px 0px; vertical-align: middle" rowspan="2">Cagar Budaya</th>
                                    <th style="text-align:center;padding: 10px 0px; vertical-align: middle" rowspan="2">Museum</th>
                                    <th style="text-align:center;padding: 10px 0px; vertical-align: middle" colspan="15">Cagar Budaya Tak Benda</th>
                                </tr>
                                <tr>
                                    <th style="text-align:center;padding: 10px 0px">Arsitektur Tradisional</th>
                                    <th style="text-align:center;padding: 10px 0px">Bahasa Daerah</th>
                                    <th style="text-align:center;padding: 10px 0px">Kain Tradisional</th>
                                    <th style="text-align:center;padding: 10px 0px">Kearifan Lokal</th>
                                    <th style="text-align:center;padding: 10px 0px">Kerajinan Tradisional</th>
                                    <th style="text-align:center;padding: 10px 0px">Kuliner Tradisional</th>
                                    <th style="text-align:center;padding: 10px 0px">Naskah kuno</th>
                                    <th style="text-align:center;padding: 10px 0px">Pakaian Adat</th>
                                    <th style="text-align:center;padding: 10px 0px">Permainan Tradisional</th>
                                    <th style="text-align:center;padding: 10px 0px">Seni Tradisional</th>
                                    <th style="text-align:center;padding: 10px 0px">Senjata Tradisional</th>
                                    <th style="text-align:center;padding: 10px 0px">Teknologi Tradisional</th>
                                    <th style="text-align:center;padding: 10px 0px">Tradisi Lisan</th>
                                    <th style="text-align:center;padding: 10px 0px">Upacara/ Ritus</th>
                                    <th style="text-align:center;padding: 10px 0px">Tidak/Belum Terklarifikasi</th>

                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;padding: 10px 0px; ">
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
                                
                                <tr>
                                    <td style="text-align:center">Jumlah</td>
                                    <td style="text-align:center"><?php echo $totalbudaya; ?></td>
                                    <td style="text-align:center"><?php echo $totalmuseum; ?></td>
                                    <td style="text-align:center"><?php echo $totalarsitektur; ?></td>
                                    <td style="text-align:center"><?php echo $totalbahasa; ?></td>
                                    <td style="text-align:center"><?php echo $totalkain; ?></td>
                                    <td style="text-align:center"><?php echo $totalkearifan; ?></td>
                                    <td style="text-align:center"><?php echo $totalkerajinan; ?></td>
                                    <td style="text-align:center"><?php echo $totalkuliner; ?></td>
                                    <td style="text-align:center"><?php echo $totalnaskah; ?></td>
                                    <td style="text-align:center"><?php echo $totalpakaian; ?></td>
                                    <td style="text-align:center"><?php echo $totalpermainan; ?></td>
                                    <td style="text-align:center"><?php echo $totalseni; ?></td>
                                    <td style="text-align:center"><?php echo $totalsenjata; ?></td>
                                    <td style="text-align:center"><?php echo $totalteknologi; ?></td>
                                    <td style="text-align:center"><?php echo $totallisan; ?></td>
                                    <td style="text-align:center"><?php echo $totalupacara; ?></td>
                                    <td style="text-align:center"><?php echo $totalbelum; ?></td>
                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>




            </div><!-- /.box-body -->
            
           </div> <!-- /.box -->
        
    </section>
    <!-- /.content -->
</div>
</body>