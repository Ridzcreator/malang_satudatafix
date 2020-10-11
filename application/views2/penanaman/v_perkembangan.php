<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>PENANAMAN MODAL<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Penanaman Modal</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tabel Perkembangan Investasi Dalam Skala Besar di Kabupaten Malang</h3>
        </div>
        <div class="box-body">
        <table>
        <tr>
           <!--  <td>
        <a class="btn btn-primary" href="#modalAdd" data-toggle="modal" title="Add">Input Penanaman Modal</a>
        </td><td width="15"> </td> -->
        
            
        </tr>
        </table>
        <table class="table table-bordered table-striped" style="font-size:15px;" id="tampilperkembangan">
                <thead>
                    <tr>
                        <th style="vertical-align:middle; text-align:left;width:40px;" >No</th>
                        <th style="vertical-align:middle; text-align:left;width:40px;" >Bidang Usaha</th>
                        <th style="vertical-align:middle; text-align:left;width:40px;" >Unit Usaha</th>
                        <th style="vertical-align:middle; text-align:left;width:40px;" >Realisasi Investasi</th>
                        <th style="vertical-align:middle; text-align:left;width:40px;" >Tenaga Kerja Indonesia</th>
                        <th style="vertical-align:middle; text-align:center;width:40px;" >Tahun</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

             <?php
                    foreach ($data->result_array() as $a) {
                        $id = $a['id'];
                        $sektor=$a['sektor'];
                        $jns=$a['jenis_sektor'];
                        $nilaipma=$a['nilai_pma'];
                        $unitpma=$a['unit_pma'];
                        $nilaipmdn=$a['nilai_pmdn'];
                        $unitpmdn=$a['unit_pmdn'];
                        $nilai=$a['nilai_non'];
                        $unit=$a['unit_non'];
                        $tng=$a['tenaga_kerja'];
                        $tahun=$a['tahun'];
                    ?>


     <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Penanaman Modal</h3>
                </div>
                    <?php echo form_open_multipart('C_penanaman/proses_edit_penanaman') ?>
                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
                            <input class="form-control" type="hidden" name="tahun" value="<?php echo $tahun;?>" readonly>
                           <!--  <input class="form-control" type="hidden" name="jumlah" value="<?php echo $jumlah;?>"> -->
                   
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Nama Sektor</label></td><td>:</td>
                            <td style="padding:  10px"><input name="sektor" id="" class="form-control" value="<?php echo $sektor; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jenis Sektor</label></td><td>:</td>
                            <td style="padding:  10px"><input name="jenis_sektor" class="form-control" type="text" placeholder="" value="<?php echo $jns; ?>" style="width:335px;" required></td>
                        </tr> <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Modal Asing</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_pma" class="form-control" type="text" placeholder="" value="<?php echo $nilaipma; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Modal Asing</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_pma" class="form-control" type="text" placeholder="" value="<?php echo $unitpma; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Modal Dalam Negeri</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_pmdn" class="form-control" type="text" placeholder="" value="<?php echo $nilaipmdn; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Modal Dalam Negeri</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_pmdn" class="form-control" type="text" placeholder="" value="<?php echo $unitpmdn; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Non-PMA/Non-PMDN</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_non" class="form-control" type="text" placeholder="" value="<?php echo $nilai; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Non-PMA/Non-PMDN</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_non" class="form-control" type="text" placeholder="" value="<?php echo $unit; ?>" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tenaga Kerja Indonesia</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tenaga_kerja" class="form-control" type="text" placeholder="" value="<?php echo $tng; ?>" style="width:335px;" required></td>
                        </tr>
                   </table>     
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                        <input type="submit" class="btn btn-success pull-right" value="Save"></input> &nbsp &nbsp
                     </div>
                <?php echo form_close(); ?>
                </div>
           </div>
        </div>


    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Data Penanaman Modal</h3>
                    </div>
                    <?php echo form_open_multipart('C_penanaman/proses_input_penanaman') ?>

                    <div class="modal-body">
                            <input class="form-control" type="hidden" name="id" readonly>
                
                    <table>
                       <tr>
                            <td style="padding:  10px"> <label>Nama Sektor</label></td><td>:</td>
                            <td style="padding:  10px"><select name="sektor" id="sektor" class="form-control" style="width:335px;" required>
                                        <?php foreach ($datas->result() as $row) {
                                            ?>
                                        <option value="<?php echo $row->sektor ?>"><?php echo $row->sektor ?>   
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jenis Sektor</label></td><td>:</td>
                            <td style="padding:  10px"><select name="jenis_sektor" id="jenis_sektor" value="jenis_sektor" class="form-control" type="text" placeholder="" style="width:335px;" required></select></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Modal Asing</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_pma" class="form-control" type="text" placeholder="" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Modal Asing</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_pma" class="form-control" type="text" placeholder="" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Modal Dalam Negeri</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_pmdn" class="form-control" type="text" placeholder="" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Unit Usaha Penanaman Modal Dalam Negeri</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_pmdn" class="form-control" type="text" placeholder="" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Non-PMA/Non-PMDN</label></td><td>:</td>
                            <td style="padding:  10px"><input name="nilai_non" class="form-control" type="text" placeholder="" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Jumlah Nilai Investasi Penanaman Non-PMA/Non-PMDN</label></td><td>:</td>
                            <td style="padding:  10px"><input name="unit_non" class="form-control" type="text" placeholder="" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tenaga Kerja Indonesia</label></td><td>:</td>
                            <td style="padding:  10px"><input name="tenaga_kerja" class="form-control" type="text" placeholder="" style="width:335px;" required></td>
                        </tr>
                        <tr>
                            <td style="padding:  10px"><label>Tahun</label></td><td>:</td>
                            <td style="padding:  10px">
                            <select name="tahun" id="tahun" class="form-control">
                            <?php
                            $tg_awal= date('Y')-10;
                            $tgl_akhir= date('Y');
                            for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                            {
                            echo "
                            <option value='$i'";
                            if(date('Y')==$i){echo "selected";}
                            echo">$i</option>";
                            }
                            ?>
                            </select>
                    </td>

                        </tr>
                        <?php $name = $this->session->userdata('user');?>
                        <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>
                    </table>
                    
                    <div class="modal-footer">
                            <input type="submit" class="btn btn-success pull-right" value="Save"></input>
                    </div>
                </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
   


        
     <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    </div>
                   <?php echo form_open_multipart('C_penanaman/proses_hapus_penanaman') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
                                    <input name="id" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                       <?php echo form_close(); ?>
                </div>
                </div>
                </div>
    <!-- /.content -->

<?php  
} 
?>

    </section>
    <!-- /.content -->

</div>
</body>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>MALANG SATU DATA</b>
    </div>
    <strong>Copyright &copy; <?php echo $date=date('Y');?>.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears">&nbsp;&nbsp;&nbsp;Pengaturan Layar</i></a></li>
    </ul>
    
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
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
<script>
   $(document).ready(function() {
       var end;
       
        var tp1 = $('#tampilperkembangan').DataTable( {
        dom: 'frtipB',
        buttons: [
    { extend: 'copy', className: 'btn btn-sm btn-warning down',exportOptions: {columns: ':visible'}},
    { extend: 'pdf', className: 'btn btn-sm btn-danger down',exportOptions: {columns: ':visible'}},
    { extend: 'print', className: 'btn btn-sm btn-success down',exportOptions: {columns: ':visible'}},
    { extend:'colvis', className: 'btn btn-sm btn-primary down'},

        ],
        "language":{
            "url":"<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
        },
         "ajax": 'get2'
    } );
       
    $("#tahun").change(function () {
        end = this.value;
        console.log(end);
        tp1.ajax.url( 'get2?tahun='+end ).load();
    });
    
} );

   var sektor=document.getElementById("sektor").value;
console.log(sektor);
  $.ajax({url: "C_penanaman/tampil_jenis_sektor?sktr="+sektor, success: function(result){
            $("#jenis_sektor").html(result);
        }});

$("#sektor").change(function () {
        var end = this.value;
        console.log(end);
        $.ajax({url: "C_penanaman/tampil_jenis_sektor?sktr="+end, success: function(result){
            $("#jenis_sektor").html(result);
            console.log(result);
        }});
        //document.getElementById("jenis_air").innerHTML = "<option value=0>TES</option>";
    });

</script>