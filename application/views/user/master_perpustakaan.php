<body class="hold-transition skin-blue sidebar-mini">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>Master Perpustakaan<b>
                        <small>KABUPATEN MALANG SATU DATA</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Master Perpustakaan</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tabel Master Perpustakaan</h3>
                </div>
                <div class="box-body">
                    <table>
                        <tr>
                            <td>
                                <a style="margin-right: 10px" class="btn btn-primary" href="#modalAdd"
                                    data-toggle="modal" title="Add">Tambah Data Master Tajuk Buku</a>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-striped compact cell-border"
                        style="font-size:15px; width:100%;  text-align:center" id="tampiltajukbuku">
                        <thead>
                            <tr>
                                <th style="text-align:center;text-align:center;width:50px;">No</th>
                                <th style="text-align:center;text-align:center;width:50px;">Nama Perpustakaan</td>
                                <th style="text-align:center;text-align:center;width:50px;">Lattitude</td>
                                <th style="text-align:center;text-align:center;width:50px;">Longitude</td>
                                <th style="text-align:center;text-align:center;width:50px;">Alamat</td>
                                <th style="text-align:center;width:80px;text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                    <h3 class="modal-title" id="myModalLabel">Tambah Data Perpustakaan</h3>
                                </div>
                                <?php echo form_open_multipart('C_master_perpustakaan/proses_input_perpustakaan') ?>

                                <div class="modal-body">
                                    <div class="modal-body">
                                        <input class="form-control" type="hidden" name="id" readonly>

                                        <table>

                                            <tr>
                                                <td style="padding:  10px"><label>Nama Perpustakaan</label></td>
                                                <td>:</td>
                                                <td style="padding:  10px"><input name="nama_perpustakaan"
                                                        class="form-control" type="text" placeholder=" "
                                                        style="width:335px;" required autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:  10px"><label>Lattitude</label></td>
                                                <td>:</td>
                                                <td style="padding:  10px"><input name="lattitude" class="form-control"
                                                        type="text" placeholder=" " style="width:335px;" required
                                                        autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:  10px"><label>Longitude</label></td>
                                                <td>:</td>
                                                <td style="padding:  10px"><input name="longitude" class="form-control"
                                                        type="text" placeholder=" " style="width:335px;" required
                                                        autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:  10px"><label>Alamat</label></td>
                                                <td>:</td>
                                                <td style="padding:  10px"><input name="alamat" class="form-control"
                                                        type="text" placeholder=" " style="width:335px;" required
                                                        autocomplete="off"></td>
                                            </tr>

                                        </table>
                                    </div>

                                    </tr>
                                    <?php $name = $this->session->userdata('user');?>
                                    <input class="form-control" type="hidden" name="penginput"
                                        value="<?php echo $name;?>" style="width:335px;" readonly>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success pull-right" value="Save"></input>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    foreach ($data->result_array() as $a) {
                        
                       $id = $a['id'];
                        $nama_perpustakaan=$a['nama_perpustakaan'];
                        $lattitude=$a['lattitude'];
                        $longitude=$a['longitude'];
                        $alamat=$a['alamat'];

                    ?>
                    <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                    <h3 class="modal-title" id="myModalLabel">Edit Master Tajuk Buku</h3>
                                </div>
                                <?php echo form_open_multipart('master_tajukbuku/proses_edit_tajuk_buku') ?>

                                <div class="modal-body">
                                    <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>"
                                        readonly>
                                    <table>
                                        <tr>
                                            <td style="padding:  10px"> <label>Tajuk Buku</label></td>
                                            <td>:</td>
                                            <td style="padding:  10px"><input name="tajuk_buku" class="form-control"
                                                    value="<?php echo $tb;?>" style="width:335px;" required></td>
                                        </tr>

                                    </table>
                                    <?php $name = $this->session->userdata('user');?>
                                    <input class="form-control" type="hidden" name="penginput"
                                        value="<?php echo $name;?>" style="width:335px;" readonly>
                                    <input type="submit" class="btn btn-success pull-right" value="Save"></input> &nbsp
                                    &nbsp
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Hapus Data </h3>
                        </div>
                        <?php echo form_open_multipart('master_tajukbuku/proses_hapus_tajuk_buku') ?>
                        <div class="modal-body">
                            <p>Yakin mau menghapus data ini..?</p>
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

            <?php } ?>
    </div>
    </section>
    <!-- /.content -->


    </div>
</body>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>MALANG SATU DATA</b>
    </div>
    <strong>Copyright &copy; 2019.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i
                    class="fa fa-gears">&nbsp;&nbsp;&nbsp;Pengaturan Layar</i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">

        </div>
        <!-- /.tab-pane -->

    </div>

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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
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


<script type="text/javascript">
$(document).ready(function() {
    var end;

    var tp1 = $('#tampiltajukbuku').DataTable({
        dom: 'frtipB',
        buttons: [{
                extend: 'copy',
                className: 'button-data'
            },
            {
                extend: 'pdf',
                className: 'button-data'
            },
            {
                extend: 'print',
                className: 'button-data',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'colvis',
                className: 'button-data'
            },
        ],

        "language": {
            "url": "<?php echo base_url(); ?>assets/bhs_indo/bahasa.json"
        },
        "ajax": 'master_tajukbuku/get'
    });

    $("#tahun").change(function() {
        end = this.value;
        console.log(end);
        tp1.ajax.url('master_tajukbuku/get?tahun=' + end).load();
    });

});
</script>
<!--
$('.buttons-copy').each(function() {
        $(this).removeClass('btn-default').addClass('btn-success')
})
-->
<style>
.button-data {
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
    background: -moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background: -webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background: -o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background: -ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background: linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2', GradientType=0);
    background-color: #33bdef;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    border: 1px solid #057fd0;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    font-family: Arial;
    font-size: 12px;
    padding: 5px 16px;
    text-decoration: none;
    margin-top: 5px;
    margin-bottom: 2px;
    margin-right: 2px;
    margin-left: 2px;
}

.button-data: hover {
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
    background: -moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background: -webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background: -o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background: -ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background: linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef', GradientType=0);
    background-color: #019ad2;
}

.button-data:active {
    position: relative;
    top: 1px;
}

.dataTables_wrapper .dt-buttons {
    float: none;
    text-align: center;
}
</style>
</body>

</html>