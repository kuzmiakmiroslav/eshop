<?php
include_once("includes/session.php");
include_once("includes/databaseConnect.php");

$basket_id = $_COOKIE['shopping_cart_id'];
$SQL = "delete from `basket` where basket.basket_id='$basket_id'";
$results = $connection->query($SQL);

include_once("pageHeader.php");

?>
<div class="container">
    <div class="well well-sm">
        <p>Objednavka odoslana.</p>
        <a href="index.php" class="btn btn-success">Pokračovať</a>
    </div>
</div>
<?php
include_once("pageFooter.php");
include_once("includes/databaseClose.php");

?>