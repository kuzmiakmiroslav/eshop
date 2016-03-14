<?php
include_once("includes/session.php");
include_once("includes/checkUser.php");

include_once("includes/databaseConnect.php");

$message = "Kosik je prazdny.";
$basket_id = $_COOKIE['shopping_cart_id'];
$SQL = "SELECT * FROM `basket`  where basket.basket_id='$basket_id' ";

$results = $connection->query($SQL);
if ($results) {

    if ($obj = $results->fetch_object()) {
        $message = "Objednavka odoslana.";
        $SQL = "delete from `basket` where basket.basket_id='$basket_id'";
        $results = $connection->query($SQL);

    }
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