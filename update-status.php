<?php 
session_start();
include_once("db-vars.php"); 

$orderTime = $_POST['orderTime'];
$orderStatus = $_POST['orderStatus'];

mysql_query ("UPDATE orders SET orderStatus = '$orderStatus' WHERE orderTime = '$orderTime'");echo $query;

header("Location: director.php");
die();
?>