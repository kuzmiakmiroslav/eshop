<?php
$adminId = GetSession("AdminId");
if($adminId==""){
    header("Location: login.php" );
}

?>
