<?php

include_once("includes/session.php");
include_once("includes/databaseConnect.php");
include_once("pageHeader.php");
$isEmpty = true;

?>


<div class="container">
    <h1>Košík</h1>
    <table class="table">
        <tr>
            <th>Obrázok</th>
            <th>Kód</th>
            <th>Názov</th>
            <th>Cena</th>
            <th>Množstvo</th>
            <th>Zmazať</th>
        </tr>

        <?php

        $basket_id = $_COOKIE['shopping_cart_id'];
        $SQL = "
  SELECT
    basket.id,
    products.product_code,
    products.product_name,
    products.product_img_name,
    products.price,
    quantity
    FROM `basket` inner join products on basket.product_code = products.product_code
    where basket.basket_id='$basket_id'
";
        $results = $connection->query($SQL);
        if ($results) {


            while ($obj = $results->fetch_object()) {

                echo '<tr>';
                echo '<td><img src="images/' . $obj->product_img_name . '"  width="80" height="80" /></td>'; //
                echo '<td>' . $obj->product_code . '</td>'; //
                echo '<td>' . $obj->product_name . '</td>'; //
                echo '<td>' . $obj->price . '</td>'; //
                echo '<td>' . $obj->quantity . '</td>';
                echo '<td><a  class="btn btn-default" href="productDelete.php?id=' . $obj->id . '"><i class="fa fa-times"></i></a></td>';
                echo '</tr>';
                $isEmpty = false;


            }
        }


        ?>
    </table>
</div>

<div class="container">

    <div class="clearfix">
        <a class="pull-left btn btn-default" href="products.php"><i class="fa fa-angle-double-left"></i> Pokračovať v
            nákupe</a>

        <?php
            if ( !$isEmpty ) {
                echo '<a class="pull-right btn btn-default" href="order.php">Objednať <i class="fa fa-angle-double-right"></i></a>';
            }
        ?>

    </div>

</div>

<?php

include_once("pageFooter.php");
include_once("includes/databaseClose.php");



?>
