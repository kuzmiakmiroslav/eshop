<?php

include_once("includes/session.php");
include_once("includes/databaseConnect.php");

include_once("pageHeader.php");

?>



<body>

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <br><h1 class="page-header">Contact

                </h1>

            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="http://freedirectorysubmissionsites.com/">free web directories</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(49.1038790106026,21.946521485156264),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(49.1038790106026,21.946521485156264)});infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>poprad <br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Kontaktné údaje</h3>
                <p>
                    Slovensko<br>Poprad, Okružná 23<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">Phone</abbr>: 0904 423 765</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">Email</abbr>: <a href="mailto:name@example.com">ustore@ustore.sk</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">Hours</abbr>: Pondelok - Piatok: 9:00  - 18:00</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                  
                      <li>
                        <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

     

        <hr>
</div>

    </div>
    <!-- /.container -->



</body>

</html>
<?php

    include_once("pageFooter.php");

    ?>
