<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>PERUMAHAN & KAWASAN PEMUKIMAN<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Perumahan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="box box-primary">
           <?php echo form_open_multipart('Unjukrasa/input_unjukrasa') ?>
                  <div class="container">
                  <div class="box-body">
                  
                  <table>
                  <tr>
                       <td>
                            <label> Periode </label>
                            <select name="periode" id="periode" class="form-control" onchange="myFunction(event)" required>
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
                            </select></td>
                  </tr>
                  <tr>
                            <td>
                            <div class="form-group">
                            <label>Jenis Kasus</label>
                            <input type="text" class="form-control" name="jenis_kasus[]" value="Bidang Politik" required readonly>
                        </div>
                        </td>
                            <td>
                        <div class="form-group">
                            <label>Jumlah Kasus</label>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="jumlah" required>
                        </div>
                            </td>
                            <td>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" id="tahun" name="tahun[]" readonly required>
                        </div>
                        <input type="hidden" name="status[]" value="0">
                        <input type="hidden" name="penginput[]" value="admin">
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group">
                            <label>Jenis Kasus</label>
                            <input type="text" class="form-control" name="jenis_kasus[]" 
                                value="Bidang Ekonomi" required readonly>
                        </div>
                        </td>
                            <td>
                        <div class="form-group">
                            <label>Jumlah Kasus</label>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="jumlah" required>
                        </div>
                            </td>
                            <td>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" id="tahun1" name="tahun[]" readonly required>
                        </div>
                        <input type="hidden" name="status[]" value="0">
                        <input type="hidden" name="penginput[]" value="admin">
                            </td>
                        </tr>   
                           <tr>
                            <td>
                            <div class="form-group">
                            <label>Jenis Kasus</label>
                            <input type="text" class="form-control" name="jenis_kasus[]" value="Bidang Agama" required readonly>
                        </div>
                        </td>
                            <td>
                        <div class="form-group">
                            <label>Jumlah Kasus</label>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="jumlah" required>
                        </div>
                            </td>
                            <td>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" id="tahun2" name="tahun[]" readonly required>
                        </div>
                        <input type="hidden" name="status[]" value="0">
                        <input type="hidden" name="penginput[]" value="admin">
                            </td>
                        </tr>
                           <tr>
                            <td>
                            <div class="form-group">
                            <label>Jenis Kasus</label>
                            <input type="text" class="form-control" name="jenis_kasus[]" value="Bidang Lainnya" required readonly>
                        </div>
                        </td>
                            <td>
                        <div class="form-group">
                            <label>Jumlah Kasus</label>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="jumlah" required>
                        </div>
                            </td>
                            <td>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" id="tahun3" name="tahun[]" readonly required>
                        </div>
                        <input type="hidden" name="status[]" value="0">
                        <input type="hidden" name="penginput[]" value="admin">
                            </td>
                        </tr>
                           <tr>
                            <td>
                            <div class="form-group">
                            <label>Korban Unjuk Rasa</label>
                            <input type="text" class="form-control" name="jenis_kasus[]" value="Korban Meninggal" required readonly>
                        </div>
                        </td>
                            <td>
                        <div class="form-group">
                            <label>Jumlah Kasus</label>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="jumlah" required>
                        </div>
                            </td>
                            <td>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" id="tahun4" name="tahun[]" readonly required>
                        </div>
                        <input type="hidden" name="status[]" value="0">
                        <input type="hidden" name="penginput[]" value="admin">
                            </td>
                        </tr>
                           <tr>
                            <td>
                            <div class="form-group">
                            <label>Korban Unjuk Rasa</label>
                            <input type="text" class="form-control" name="jenis_kasus[]" value="Korban Luka" required readonly>
                        </div>
                        </td>
                            <td>
                        <div class="form-group">
                            <label>Jumlah Kasus</label>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="jumlah" required>
                        </div>
                            </td>
                            <td>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" id="tahun5" name="tahun[]" readonly required>
                        </div>
                        <input type="hidden" name="status[]" value="0">
                        <input type="hidden" name="penginput[]" value="admin">
                            </td>
                        </tr>
                           <tr>
                            <td>
                            <div class="form-group">
                            <label>Jumlah Pengungsi</label>
                            <input type="text" class="form-control" name="jenis_kasus[]" value="Jumlah Pengungsi" required readonly>
                        </div>
                        </td>
                            <td>
                        <div class="form-group">
                            <label>Jumlah Kasus</label>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="jumlah" required>
                        </div>
                            </td>
                            <td>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" id="tahun6" name="tahun[]" readonly required>
                        </div>
                        <input type="hidden" name="status[]" value="0">
                        <input type="hidden" name="penginput[]" value="admin">
                            </td>
                        </tr>
                           <tr>
                            <td>
                            <div class="form-group">
                            <label>Kerugian Material</label>
                            <input type="text" class="form-control" name="jenis_kasus[]" value="Kerugian Material" required readonly>
                        </div>
                        </td>
                            <td>
                        <div class="form-group">
                            <label>Jumlah Kasus</label>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="jumlah" required>
                        </div>
                            </td>
                            <td>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" id="tahun7" name="tahun[]" readonly required>
                        </div>
                        <input type="hidden" name="status[]" value="0">
                        <input type="hidden" name="penginput[]" value="admin">
                            </td>
                        </tr>
                        <tr>
                            <td> <div>
                            <input type="submit" class="btn btn-success" name="add" value="Save">
                        <a class="btn btn-primary" href="../perumahan">Back</a>
                        </div> </td>
                        </tr>
                  </table>
                        
                      </div>  
                    </div>    
                  </div>
          <?php echo form_close(); ?>
    </section>
    <!-- /.content -->

</div>
<script type="text/javascript">
    function myFunction(e) {
    document.getElementById("tahun").value = e.target.value
    document.getElementById("tahun1").value = e.target.value
    document.getElementById("tahun2").value = e.target.value
    document.getElementById("tahun3").value = e.target.value
    document.getElementById("tahun4").value = e.target.value
    document.getElementById("tahun5").value = e.target.value
    document.getElementById("tahun6").value = e.target.value
    document.getElementById("tahun7").value = e.target.value

}
</script>


