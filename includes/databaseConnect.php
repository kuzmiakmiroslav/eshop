<?php

$db_username = 'root';
$db_password = 'root';
$db_name = 'eshop';
$db_host = 'localhost';

//vytvorime spojenie do DB
$connection = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($connection->connect_error) {
    die('Error : (' . $connection->connect_errno . ') ' . $connection->connect_error);
}

?>