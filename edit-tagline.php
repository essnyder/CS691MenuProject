<?php
session_start();
include_once("db-vars.php");
$message = $_POST['message'];
$style = $_POST['style'];

mysql_query("UPDATE tagline SET message = '$message', style = '$style' WHERE id = '1'");

include_once("verify-user.php");
?>