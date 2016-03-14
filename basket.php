<?php

include_once("includes/session.php");
include_once("includes/databaseConnect.php");
include_once("pageHeader.php");

?>

<body>
<html>

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
        $SQL = "
  SELECT
    basket.id,
    products.product_code,
    products.product_name,
    products.product_img_name,
    products.price,
    quantity
    FROM `basket` inner join products on basket.product_code = products.product_code
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
                echo '<td><a href="productDelete.php?id=' . $obj->id . '"><i class="fa fa-times"></i></a></td>';
                echo '</tr>';


            }
        }


        ?>
    </table>
</div>

<div class="container">

    <div class="clearfix">
        <a class="pull-left btn btn-default" href="products.php"><i class="fa fa-angle-double-left"></i> Pokračovať v nákupe</a>
        <a class="pull-right btn btn-default" href="#">Objednať <i class="fa fa-angle-double-right"></i></a>
    </div>

    </div>
</html>
</body>

<?php

include_once("pageFooter.php");
include_once("includes/databaseClose.php");



?>
