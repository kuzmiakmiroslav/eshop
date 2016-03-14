<?php

include_once("includes/session.php");
include_once("includes/databaseConnect.php");

$id = $_GET['id'];
if($id==''){
    $id = $_POST['id'];

}



$sql = "DELETE FROM `basket` WHERE id =" . $id;
$results = $connection->query($sql);

header('Location: basket.php');

include_once("includes/databaseClose.php");
