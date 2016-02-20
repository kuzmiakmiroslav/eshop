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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>uStore | Košík</title>


    <link href="css/footer.css" rel="stylesheet" type="text/css">






    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<html>

<div class="container">
<h1>Košik</h1>
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
    skuska
</div>
</html></body>

<?php

    include_once("footer.php");



?>
