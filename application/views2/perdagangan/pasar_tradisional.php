<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>PASAR TRADISIONAL<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pasar Tradisional</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
    <div class="box">
            <div class="box-header">
            <h3 class="box-title">Tabel Pasar Tradisional</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
            <td>
                <a class="btn btn-primary" href="Pasar_tradisional/detail_pasar_tradisional">Data Semua Pasar Tradisional</a><br><br>
                </td>
        
        </tr>
        </div>
        </table>


                  <table  class="table table-bordered table-striped" id="tampil1" style="font-size:15px; width: 100%; text-align:left;">
                    <thead >
                    <tr>
                        <th rowspan="2" style="text-align:center; vertical-align: middle;">Pengelola</th>
                        <th colspan="3" style="text-align:center; vertical-align: middle;">Jenis Bangunan</th>
                        <th rowspan="2" style="text-align:center; vertical-align: middle; width:130px;">Aksi</th>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Permanen</th>
                        <th style="text-align: left;">Semipermanen</th>
                        <th style="text-align: left;">Tanpa Bangunan/Tenda</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($data->result_array() as $a):
                        $nama_pasar=$a['Nama_Pasar'];
                        $alamat=$a['Alamat_Lengkap'];
                        $luas=$a['Luas_Lahan'];
                        $luas_bangunan=$a['Luas_Bangunan'];
                        $nama_pengelola=$a['Nama_Pengelola'];
                        $tahun_b=$a['Tahun_Berdiri'];
                        $tahun_akhir=$a['Tahun_Terakhir'];
                        $kondisi=$a['Kondisi_Fisik'];
                        $penginput=$a['Penginput'];
                        $timestamp=$a['Timestamp'];
                        $status=$a['Status'];
                        endforeach;?>
                        <?php 
                        foreach ($datas->result_array() as $a):
                        $pengelola_pemerintah=$a['Pengelola'];
                        endforeach;?>
                         <?php 
                        foreach ($dataq->result_array() as $a):
                        $pengelola_swasta=$a['Pengelola'];
                        endforeach;?>
                         <?php 
                        foreach ($datap->result_array() as $a):
                        $pengelola_masyarakat=$a['Pengelola'];
                        endforeach;?>
                        <tr>
                            <td>Dikelola Pemerintah</td>
                            <td><?php echo $pengelola_pemerintah ?>   Unit</td>
                            <td>0</td>
                            <td>0</td>
                            <td style="text-align:center;width: 130px">
                                <a class="btn btn-xs btn-warning" href="Pasar_tradisional/detail_pasar_tra_pemerintah" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Dikelola Swasta</td>
                            <td><?php echo $pengelola_swasta ?>   Unit</td>
                            <td>0</td>
                            <td>0</td>
                            <td style="text-align:center;width: 130px">
                                <a class="btn btn-xs btn-warning" href="Pasar_tradisional/detail_pasar_tra_swasta" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Detail</a>
                            </td>
                        </tr>
                         <tr>
                            <td>Dikelola Masyarakat</td>
                            <td><?php echo $pengelola_masyarakat ?>   Unit</td>
                            <td>0</td>
                            <td>0</td>
                            <td style="text-align:center;width: 130px">
                                <a class="btn btn-xs btn-warning" href="Pasar_tradisional/detail_pasar_tra_masyarakat" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Detail</a>
                            </td>
                        </tr>
                           
                    
                </tbody>
            </table>

                
            <!-- /.box-body -->
                  
        <!-- /.box -->
                </div>
            
 
</div>

    </section>
    <!-- /.content -->
</div>
</body>