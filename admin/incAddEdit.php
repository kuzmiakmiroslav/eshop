<?php

include_once("../includes/session.php");
include_once("includes/checkUser.php");
include_once("../includes/databaseConnect.php");

$name = "";
$code = "";
$price = 0;
$desc = "";
$sex = "";
$imgCurrent = "";

//inicializacia premennej pola errors
$errors = array();
if(!isset($_POST['Submit'])) {

	if($action=="edit"){

		$results = $connection->query("SELECT * FROM products where id=" . $id);
		if ($obj = $results->fetch_object()) {
			$code = $obj->product_code;
			$name = $obj->product_name;
			$price = $obj->price;
			$desc = $obj->product_desc;
            $imgCurrent = $obj->product_img_name;
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

        if( $code == ""){
            $errors[]="kod tovaru nemoze byt prazdny.";
        }

		$product_img_name  ="";

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

                if($product_img_name==""){
                    $sql = "update `products` set product_name='$name',product_code='$code',product_desc='$desc',price='$price'
					where id=" . $id;

                }else{
                    $sql = "update `products` set product_name='$name',product_code='$code',product_desc='$desc',price='$price',product_img_name='$product_img_name'
					where id=" . $id;

                }


			}


			$result = $connection->query($sql);
			if(!$result){
				$errors[]= $connection->error;
			}


		}


		if (empty($errors)) {
			header('Location: productList.php');
			exit;
		}

	}

}

include_once("pageHeader.php");

?>

<div class="container">
<h1>Formular: Produkt <?php echo $action ?></h1>

<?php

if (!empty($errors)) {
	echo '<div class="alert alert-danger">';
	foreach ($errors as $err) {
		echo $err . "<br/>";
	}
	echo '</div>';
}

$formAction="productAdd.php";
if($action=="edit"){
	$formAction="productEdit.php?id=".$id;
}

?>


<form role="form" name="addProduct" method="post" action="<?php echo $formAction ?>" enctype = "multipart/form-data">




    <div class="form-group">
      <label for="product_name">Názov produktu</label>
      <input value="<?php echo $name ?>" id="product_name" type="text" class="form-control" name="product_name">
    </div>

    <div class="form-group">
      <label for="product_code">Číslo produktu</label>
      <input value="<?php echo $code ?>" id="product_code" type="text" class="form-control" name="product_code">
    </div>
    <div class="form-group">
      <label for="product_img">Obrazok</label>
		<span><?php echo $imgCurrent ?></span>
        <input type="hidden" name="product_img_current" value="<?php echo $imgCurrent ?>">
        <input id="product_img" type="file" class="upload" name="product_img">
    </div>
    <div class="form-group">
      <label for="price">Cena</label>
      <input value="<?php echo $price ?>" id="price" type="text" class="form-control" name="price">
    </div>
    <div class="form-group">
      <label for="product_desc">Popis</label>
      <textarea id="product_desc" class="form-control" name="product_desc"><?php echo $desc ?></textarea>
    </div>
    <button type="submit" name="Submit"  class="btn btn-default">Odošli</button>
    <a href="productList.php" class="btn btn-default">Návrat</a>
  </form>
</div>

<?php
include_once("pageFooter.php");
include_once("../includes/databaseClose.php");
?>


