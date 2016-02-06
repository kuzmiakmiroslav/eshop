<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 03.01.16
 * Time: 20:34
 */



include_once("../includes/config.php");

$name = "";
$code = "";
$price = 0;
$desc = "";

//inicializacia premennej pola errors
$errors = array();
if(!isset($_POST['Submit'])) {

	if($action=="edit"){

		$results = $mysqli->query("SELECT id,product_code, product_name, product_desc, product_img_name, price FROM products where id=" . $id);

		if ($obj = $results->fetch_object()) {


			$code = $obj->product_code;
			$name = $obj->product_name;
			$price = $obj->price;
			$desc = $obj->product_desc;


		}


	}

}else {


	//kontrola ci bol odoslany formular
	if(isset($_POST['Submit'])) {


		//priradenie post premennych do lokanych premennych
		$name = $_POST['product_name'];
		$code = $_POST['product_code'];
		$price = $_POST['price'];
		$desc = $_POST['product_desc'];


		//validacia odoslanych premennych
		if( $name == ""){
			$errors[]="Nazov tovaru nemoze byt prazdny.";
		}


		//kontrola ci bol odoslany obrazok
		if( empty($errors)==true && isset($_FILES['product_img']) && $_FILES['product_img']['size'] > 0){



			$product_img_name = $_FILES['product_img']['name'];
			$file_size = $_FILES['product_img']['size'];
			$file_tmp = $_FILES['product_img']['tmp_name'];
			$file_type = $_FILES['product_img']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['product_img']['name'])));

			$expensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$expensions)=== false){
				$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}

			if($file_size > 2097152) {
				$errors[]='File size must be excately 2 MB';
			}

			if(empty($errors)==true) {
				move_uploaded_file($file_tmp,"../images/".$product_img_name);
			}

		}

		if (empty($errors)==true) {

			if($action=="insert"){
				$sql = "INSERT INTO `products` (`product_code`, `product_name`, `product_desc`, `product_img_name`, `price`)
						VALUES ( '$code', '$name', '$desc', '$product_img_name',$price)";

			}else{
				$sql = "update `products` set product_name='$name',product_code='$code',product_desc='$desc',price='$price',product_img_name='$product_img_name'
					where id=" . $id;

			}


			$result = $mysqli->query($sql);
			if(!$result){
				$errors[]= $mysqli->error;
			}


		}


		if (empty($errors)) {
			header('Location: productList.php');
			exit;
		}

	}

}

include_once("header.php");


?>

<div class="container">
<h1>Form: Product <?php echo $action ?></h1>  

<?php

if (!empty($errors)) {
	echo '<div class="alert alert-danger">';
	foreach ($errors as $err) {
		echo $err . "<br/>";
	}
	echo '</div>';
}

$formAction="add.php";
if($action=="edit"){
	$formAction="edit.php?id=".$id;
}

?>


<form role="form" name="addProduct" method="post" action="<?php echo $formAction ?>" enctype = "multipart/form-data">
    <div class="form-group">
      <label for="product_name">N·zov produktu</label>
      <input value="<?php echo $name ?>" id="product_name" type="text" class="form-control" name="product_name">
    </div>
    <div class="form-group">
      <label for="product_code">»Ìslo produktu</label>
      <input value="<?php echo $code ?>" id="product_code" type="text" class="form-control" name="product_code">
    </div>
    <div class="form-group">
      <label for="product_img">Obrazok</label>
      <input id="product_img" type="file" class="form-control" name="product_img">
    </div>
    <div class="form-group">
      <label for="price">Cena</label>
      <input value="<?php echo $price ?>" id="price" type="text" class="form-control" name="price">
    </div>
    <div class="form-group">
      <label for="product_desc">Popis</label>
      <input value="<?php echo $desc ?>" id="product_desc" type="text" class="form-control" name="product_desc">
    </div>
    <button type="submit" name="Submit"  class="btn btn-default">Odosli</button>
    <a href="productList.php" class="btn btn-default">Navrat</a>
  </form>
</div>

<?php
include_once("footer.php");


?>


