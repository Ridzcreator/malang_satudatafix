<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <b>Peta Wisata Budaya<b>
            <small>KABUPATEN MALANG SATU DATA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= base_url('C_wisata_budaya'); ?>"></i> Peta Wisata budaya</a></li>
            <li class="active">Data peta lokasi wisata budaya di kabupaten malang</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <!DOCTYPE html>
<html>
  <head>
    <style>
      #map-canvas {
        width: 1080px;
        height: 480px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzcnTANpwosyk7obMSuKH4HcBn-B1YxP0&callback=initMap""></script>
    <script>
        var markers = [];
        <?php for ($i=0; $i < $jumlah; $i++) { ?>
            markers.push([<?php echo "'".$nama[$i]."'"; ?>,<?php echo "'".$lat[$i]."'"; ?>,<?php echo "'".$lng[$i]."'"; ?>]);
        <?php } ?>
 
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }     
        var map = new google.maps.Map(mapCanvas, mapOptions)
 
    var infowindow = new google.maps.InfoWindow(), marker, i;
    var bounds = new google.maps.LatLngBounds(); // diluar looping
    for (i = 0; i < markers.length; i++) {  
    pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
    bounds.extend(pos); // di dalam looping
    marker = new google.maps.Marker({
        position: pos,
        map: map
    });
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            infowindow.setContent(markers[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
    map.fitBounds(bounds); // setelah looping
    }
 
      }
 
 
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>
    <!-- /.content -->

</div>
