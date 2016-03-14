<?php

include_once("includes/session.php");
include_once("includes/databaseConnect.php");
include_once("pageHeader.php");

?>
<div class="container">
    <h1>Obchod</h1>

    <div class="container">
        <div class="row">

            <?php


            $results = $connection->query("SELECT * FROM `products` ");
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
                    echo '<a class="btn btn-default btn-kosik pull-right" href="buy.php?code=' . $obj->product_code . '">Do košíka</a>';

                    echo '<div class="price">' . '€ &nbsp' . $obj->price . '</div>';

                    echo '</div></div></div>';

                    $poradie = $poradie + 1;

                }


            }

            ?>

        </div>
    </div>
</div>

<?php

include_once("pageFooter.php");
include_once("includes/databaseClose.php");

?>

	