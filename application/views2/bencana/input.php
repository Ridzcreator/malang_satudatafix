<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            JUMLAH KORBAN BENCANA
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Bencana</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php echo form_open_multipart('bencana/proses_input_bencana') ?>
         <div class="form-group">
          <label>Bencana Alam</label>
          <select name="bencana" class="form-control">
          <?php foreach ($data->result() as $row) {
          ?>
          <option value="<?php echo $row->bencana; ?>"><?php echo $row->bencana; ?></option>
          <?php
          }
          ?>
          </select>
         </div>
          <div class="form-group">
             <label>Banyak Bencana</label>
             <input type="number" class="form-control" name="banyak_bencana" placeholder="banyak_bencana" required>
          </div>
          <div class="form-group">
             <label>Meninggal</label>
             <input type="number" class="form-control" name="meninggal" placeholder="Jumlah Meninggal" required>
          </div>
          <div class="form-group">
             <label>Luka - luka</label>
             <input type="number" class="form-control" name="luka" placeholder="Jumlah Luka" required>
          </div>  
          <div class="form-group">
             <label>Tanggal</label>
             <input type="date" name="date" class="form-control" id="datepicker">
          </div>  
          <?php $name = $this->session->userdata('user');?>
            <input class="form-control" type="hidden" name="penginput" value="<?php echo $name;?>" style="width:335px;" readonly>   
            <div class="form-group">
             <label></label>
             <input type="hidden" class="form-control" name="status" value="1" required>
          </div>    
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-success" href="<?php echo base_url('bencana'); ?>">Back</button>       
                  
        <?php echo form_close(); ?>                  
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
 function getDate() {
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();

  if(dd<10) {
      dd = '0'+dd
  } 

  if(mm<10) {
      mm = '0'+mm
  } 

  today = yyyy + '/' + mm + '/' + dd;
  console.log(today);
  document.getElementById("tanggal").value = today;
}


window.onload = function() {
  getDate();
};
</script>  
