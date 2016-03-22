<?php

include_once("includes/session.php");
include_once("includes/databaseConnect.php");
include_once("pageHeader.php");


?>
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('./images/bck.jpg');"></div>
            <div class="carousel-caption">

            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('./images/bck1.jpg');"></div>
            <div class="carousel-caption">

            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('./images/bck2.jpg');"></div>
            <div class="carousel-caption">

            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

<!-- Page Content -->
<div class="container">

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Vitajte v uStore
            </h1>
        </div>
        <H2 style="color: black">
         HOLLISTER SALE
        30% NA VŠETKY DRUHY
        </H2>
        <H3>Prejdite do nášho obchodu kde si môžete vybrať z veľkého sortimentu oblečenia značky hollister.</H3>
    </div>
</div>


<?php

include_once("pageFooter.php");

?>
