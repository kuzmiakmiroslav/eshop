<?php

include_once("includes/session.php");
include_once("./includes/databaseConnect.php");

$code = $_GET['code'];

if ($code != "") {

    $basket_id  = $_COOKIE['shopping_cart_id'];
    if($basket_id==""){
        $basket_id = uniqid();
        setcookie("shopping_cart_id", $basket_id, time() + 3600 * 24 * 365, "/");
    }



    $sql = "INSERT INTO `basket` (`product_code`, `quantity`, `basket_id`) VALUES (  '$code', 1, '$basket_id')";
    $connection->query($sql);
    header('Location: basket.php');

}
else{

    echo "Chyba: Prázdny alebo nespravny kod.";

}

include_once("./includes/databaseClose.php");

?>

