<?php

include_once("./includes/config.php");
$code = $_GET['code'];

if ($code != "") {

    $sql = "INSERT INTO `basket` (`product_code`, `quantity`) VALUES (  '$code' , 1)";
    $mysqli->query($sql);
    header('Location: basket.php');

}else{

    echo "Chyba: Prazdny alebo nespravny kod.";
    exit;

}


?>

