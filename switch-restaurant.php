<?php
session_start();
$_SESSION['restaurantId'] = $_POST['restaurantId'];

include_once("verify-user.php");
?>