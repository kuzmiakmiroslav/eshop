<?php

include_once("includes/session.php");
include_once("includes/checkUser.php");
include_once("includes/databaseConnect.php");

$message = "Kosik je prazdny.";

$SQL = "SELECT * FROM `users`
    where id= " . GetSession("UserID");
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
        $message = "Objednavka odoslana.";
        $SQL = "insert into orders (email,product_code,product_name,price, quantity  ) values ('$user->email','$obj->product_code', '$obj->product_name', $obj->price, $obj->quantity )";
        echo $SQL;
        $connection->query($SQL);
    }
    //$SQL = "delete from `basket` where basket.basket_id='$basket_id'";
    //$results = $connection->query($SQL);

}


include_once("pageHeader.php");

?>
<div class="container">
    <div class="well well-sm">
        <p><?php echo $message ?></p>
        <a href="index.php" class="btn btn-success">Pokračovať</a>
    </div>
</div>
<?php
include_once("pageFooter.php");
include_once("includes/databaseClose.php");

?>