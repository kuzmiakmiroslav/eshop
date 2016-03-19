<?php
include_once("includes/session.php");
include_once("includes/checkUser.php");

include_once("includes/databaseConnect.php");
include_once("pageHeader.php");
$isEmpty = true;

?>


<div class="container">
    <h1>Objednávka</h1>
    <table class="table">
        <tr>
            <th>Obrázok</th>
            <th>Kód</th>
            <th>Názov</th>
            <th>Cena</th>
            <th>Množstvo</th>
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

                $isEmpty = false;
                echo '<tr>';
                echo '<td><img src="images/' . $obj->product_img_name . '"  width="80" height="80" /></td>'; //
                echo '<td>' . $obj->product_code . '</td>'; //
                echo '<td>' . $obj->product_name . '</td>'; //
                echo '<td>' . $obj->price . '</td>'; //
                echo '<td>' . $obj->quantity . '</td>';
                echo '</tr>';


            }
        }


        ?>
    </table>
</div>

<?php
if ( !$isEmpty ) {
    ?>
<div class="container">

    <form action="orderSend.php" method="post">

        <div class="form-group">
            <label for="message">Správa</label>
            <textarea name="message" type="email" class="form-control" id="message" placeholder="Správa"></textarea>
        </div>

        <button type="submit" name="Submit" class="btn btn-success">Odoslať</button>
    </form>


</div>

    <?php
}
?>



<?php

include_once("pageFooter.php");


include_once("./includes/databaseClose.php");

