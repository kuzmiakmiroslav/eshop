<?php

include_once("./includes/databaseConnect.php");
$code = $_GET['code'];

if ($code != "") {

    $sql = "INSERT INTO `basket` (`product_code`, `quantity`) VALUES (  '$code', 1)";
    $connection->query($sql);
    header('Location: basket.php');

}
else{

    echo "Chyba: Prázdny alebo nespravny kod.";
    exit;

}


?>

