<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 03.01.16
 * Time: 22:08
 */

include_once("./includes/config.php");
$id = $_GET['id'];
if($id==''){
    $id = $_POST['id'];

}



$sql = "DELETE FROM `basket` WHERE id =" . $id;
$results = $mysqli->query($sql);

header('Location: basket.php');
exit;

