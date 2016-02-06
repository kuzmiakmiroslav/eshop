<?php
session_start();
include_once("./includes/config.php");

$id=$_GET['id'];

$code=$_GET['product_code'];

$qty=$_GET['quantity'];



if($id!=""){
	//treba spravit insert do db

}
$sql = "INSERT INTO `basket` (`id`, `product_code`, `quantity`) VALUES
( '$id' , '$code' , '25')";
$results = $mysqli->query($sql);

echo $sql;
echo $id;
echo $code;

?>

	