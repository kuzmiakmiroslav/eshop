<?php

include_once("includes/common.php");
include_once("includes/config.php");

include_once("header.php");

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
    <th>zmazať produkt</th>
</tr>

<?php
$SQL ="
  SELECT
    basket.id,
    products.product_code,
    products.product_name,
    products.product_img_name,
    products.price,
    quantity
    FROM `basket` inner join products on basket.product_code = products.product_code
";
$results = $mysqli->query($SQL);
if ($results) {

    while ($obj = $results->fetch_object()) {

        echo '<tr>';
        echo '<td><img src="images/' . $obj->product_img_name . '"  width="60" height="60" /></td>'; //
        echo '<td>' . $obj->product_code . '</td>'; //
        echo '<td>' . $obj->product_name . '</td>'; //
        echo '<td>' . $obj->price . '</td>'; //
        echo '<td>' . $obj->quantity . '</td>';
        echo '<td><a href="delete.php?id=' . $obj->id . '"><i class="fa fa-times"></i></a></td>';
        echo '</tr>';


    }
}


    ?>
</table>
</div>

<div class="container">
    <a href="men.php">pokračovať v nákupe</a>
    <a href="#">objednať</a>
</div>
</html></body>

<?php

    include_once("footer.php");



?>
