<?php
$adminId = GetSession("UserId");
if($adminId==""){
    header("Location: login.php" );
    exit;
}

?>
