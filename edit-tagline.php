<?php
session_start();
include_once("db-vars.php");
$message = $_POST['message'];
$style = $_POST['style'];

mysql_query("UPDATE tagline SET message = '$message', style = '$style' WHERE restaurantId = " . $_SESSION['restaurantId']);

include_once("verify-user.php");
?>