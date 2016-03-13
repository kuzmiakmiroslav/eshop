<?php
include_once("includes/common.php");
include_once("includes/config.php");
include_once("header.php");

?>
<!DOCTYPE html>
<html lang="en">


<body>
<html>
<div class="container">
    <h1>Obchod</h1>
    <div class="container">
        <div class="row">

            <?php


            $results = $mysqli->query("SELECT product_name, product_desc, price, product_img_name, product_code FROM `products` WHERE sex = 0 ");
            if ($results) {


                $poradie = 0;
                while ($obj = $results->fetch_object()) {

                    if ($poradie % 3 == 0 && $poradie > 0) {
                        echo '</div><div class="row">';
                    }

                    echo '<div class="col-md-4"><div class="thumbnail">';
                    echo '<img class="img-responsive" src="images/' . $obj->product_img_name . '"/>';
                    echo '<div class="caption">';
                    echo '<h4>' . $obj->product_name . '</h4>';
                    echo '<div class="descr">' . $obj->product_desc . '</div>';
                    echo '<a href="buy.php?code=' . $obj->product_code . '"><div class="btn btn-default btn-kosik pull-right">Do košíka</div></a>';

                    echo '<div class="price">' . $obj->price . '</div>';

                    echo '</div></div></div>';

                    $poradie = $poradie + 1;

                }


            }

            ?>

        </div>
    </div>
</div>
</html>
</body>

<?php

include_once("footer.php");

?>

