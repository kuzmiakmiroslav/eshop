<?php

include_once("includes/session.php");
include_once("includes/checkUser.php");
include_once("includes/databaseConnect.php");

$notify = "Košik je prázdny.";
$message = $_POST['message'];
$order_id = date('YmdHs');



$SQL = "SELECT * FROM `users`
    where id= " . GetSession("UserId");
$results = $connection->query($SQL);
if ($results) {
    $user = $results->fetch_object();
}



$basket_id = $_COOKIE['shopping_cart_id'];
$SQL = "SELECT * FROM `basket`
    inner join products on basket.product_code = products.product_code
    where basket.basket_id='$basket_id' ";

$results = $connection->query($SQL);
if ($results) {

    while ($obj = $results->fetch_object()) {
        $notify = "Objednavka bola odoslaná.";
        $SQL = "insert into orders (order_id,message,email,user_name,user_address,product_code,product_name,price, quantity  )
            values ('$order_id','$message','$user->email','$user->name','$user->address','$obj->product_code', '$obj->product_name', $obj->price, $obj->quantity )";
        $connection->query($SQL);
    }
    $SQL = "delete from `basket` where basket.basket_id='$basket_id'";
    $results = $connection->query($SQL);

}


include_once("pageHeader.php");

?>
<div class="container">
    <div class="well well-sm">
        <p><?php echo $notify ?></p>
        <a href="index.php" class="btn btn-success">Pokračovať</a>
    </div>
</div>
<?php
include_once("pageFooter.php");
include_once("includes/databaseClose.php");

?>