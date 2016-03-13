<?php

session_start();

function SetSession($param_name, $param_value)
{
	$_SESSION[$param_name] = $param_value;
}

function GetSession($parameter_name, $default_value = "")
{
	return isset($_SESSION[$parameter_name]) ? $_SESSION[$parameter_name] : $default_value;
}

?>
