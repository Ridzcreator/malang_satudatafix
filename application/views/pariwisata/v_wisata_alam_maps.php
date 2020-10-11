<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->


<body class="hold-transition skin-blue sidebar-mini">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>DAYA TARIK WISATA ALAM<b>
                        <small>KABUPATEN MALANG SATU DATA</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Pariwisata</a></li>
                <li><a href="<?= base_url('C_wisata_alam'); ?>">Daya Tarik Wisata Alam</a></li>
                <li class="active">Maps Wisata Alam </li>
            </ol>
        </section>
        <!-- Main content -->

        <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-header">
                            <h4 class="box-title" style="margin-bottom: 10px">Maps Wisata Alam Kabupaten Malang</h3><br>
                        </div>


                        <div class="box-body">
                            <div id="map-canvas"></div>

                            <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!--Google Maps-->
                                        <style>
                                            #map-canvas {
                                                width: 1220px;
                                                height: 500px;
                                            }
                                        </style>
                                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeM7wY1YRzynn4DNyFk1RhhBfpsihr3nM&callback=initMap"></script>
                                        <script>
                                            var markers = [
                                                <?php
                                                foreach ($data->result_array() as $a) {
                                                ?>[
                                                        '<?php echo $a['nama'] ?>',
                                                        <?php echo $a['latitude'] ?>,
                                                        <?php echo $a['longitude'] ?>
                                                    ],
                                                <?php
                                                }
                                                ?>

                                            ];

                                            function initialize() {
                                                var mapCanvas = document.getElementById('map-canvas');
                                                var mapOptions = {
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                }
                                                var map = new google.maps.Map(mapCanvas, mapOptions)

                                                var infowindow = new google.maps.InfoWindow(),
                                                    marker, i;
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
                            <!-- /.box-body -->
                            <!-- /.box -->
                        </div>
        </section>
        <!-- /.content -->
    </div>
</body>