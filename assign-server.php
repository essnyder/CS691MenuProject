<?php 
session_start();
include_once("db-vars.php"); 

$server = $_POST['server'];
$orderNumber = $_POST['orderNumber'];

mysql_query ("UPDATE orders SET server = '$server' WHERE orderNumber = '$orderNumber' AND restaurantId = '" . $_SESSION['restaurantId'] . "'");

header("Location: director.php");
die();
?>