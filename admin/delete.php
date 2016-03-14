<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 03.01.16
 * Time: 22:08
 */

include_once("../includes/databaseConnect.php");
$id = $_GET['id'];
if($id==''){
	$id = $_POST['id'];

}
///$sql = "DELETE FROM `products` WHERE (`ID`) VALUES ('ID')";



$sql = ("DELETE FROM `products`WHERE id = " . $id);
$results = $connection->query($sql);

header('Location: productList.php');
exit;
