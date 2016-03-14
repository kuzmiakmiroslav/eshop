<?php

//zacneme session, klientovi sa posle cookies PHPSESSID=jov66atp4eksh5r71loo81u361; path=/; domain=localhost
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//ulozi do session zaslany parameter a hodnotu
function SetSession($param_name, $param_value){
    $_SESSION[$param_name] = $param_value;
}

//vrai so session zaslany parameter
function GetSession($parameter_name, $default_value = ""){
	//
    return isset($_SESSION[$parameter_name]) ? $_SESSION[$parameter_name] : $default_value;
}

?>