<?php
session_start();
include_once("./includes/config.php");
include_once("header.php");


$results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
if($results){

	echo '<div class="container"><div class="row">';

	$poradie = 0;
	while($obj = $results->fetch_object()){

		if($poradie%3 == 0 && $poradie>0){
			echo '</div><div class="row">';
		}

		echo '<div class="col-md-4"><div class="thumbnail">';
		echo '<img class="img-responsive" src="images/' . $obj->product_img_name . '"/>';
		echo '<div class="caption">';
		echo '<h4>'.$obj->product_name.'</h4>';
		echo '<div class="descr">'.$obj->product_desc.'</div>';
		echo '<div class="btn btn-default btn-kosik pull-right"><a href="buy.php?code='.$obj->product_code.'">Kupit</a></div>';

		echo '<div class="price">'.$obj->price.'.</div>';

		echo '</div></div></div>';

		$poradie = $poradie + 1;

	}

	echo '</div></div>';

}


?>

	