<?php
/**
 * Created by PhpStorm.
 * User: kuzmiak
 * Date: 06.02.16
 * Time: 13:47
 */

include_once("./includes/config.php");
include_once("header.php");

?>

<div class="container">
<h1>Kosik</h1>
<table class="table">
<tr>
    <th>Kod</th>
    <th>Nazov</th>
    <th>Mnozstvo</th>
    <th>Mnozstvo</th>
</tr>

<?php
$SQL ="
  SELECT
    products.product_code,
    products.product_name,
    products.product_img_name,
    products.price,
    quantity
    FROM basket inner join products on basket.product_code = products.product_code
";
$results = $mysqli->query($SQL); //vyber produktov z tabulky produkty zoradit podla zostupu
if ($results) {

    while ($obj = $results->fetch_object()) {

        echo '<tr>';
        echo '<td><img src="images/' . $obj->product_img_name . '"  width="60" height="60" /></td>'; //
        echo '<td>' . $obj->product_code . '</td>'; //
        echo '<td>' . $obj->product_name . '</td>'; //
        echo '<td>' . $obj->product_price . '</td>'; //
        echo '<td>' . $obj->quantity . '</td>';
        echo '</tr>';


    }

    ?>

</div>
</table>

<?php

    include_once("footer.php");

}
?>
