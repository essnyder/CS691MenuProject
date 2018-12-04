<?php
session_start();
include_once("db-vars.php");
$action = $_POST['action'];
$entry = $_POST['entry'];
$restaurantId = $_SESSION['restaurantId'];

if ($action == "delete") {
	mysql_query ("DELETE FROM menu WHERE entry = '$entry' AND restaurantId = $restaurantId");
}
elseif ($action == "activate") {
	mysql_query ("UPDATE menu SET status = 'Active' WHERE entry = '$entry' AND restaurantId = $restaurantId");
}
elseif ($action == "deactivate") {
	mysql_query ("UPDATE menu SET status = 'Inactive' WHERE entry = '$entry' AND restaurantId = $restaurantId");
}
elseif ($action == "change") {
	$description = $_POST['description'];
	$allergens = $_POST['allergens'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	
	mysql_query ("UPDATE menu SET description = '$description', allergens = '$allergens', price = '$price', category = '$category' WHERE entry = '$entry' AND restaurantId = $restaurantId");
}	
else {
	$entry = $_POST['entry'];
	$description = $_POST['description'];
	$allergens = $_POST['allergens'];
	$price = $_POST['price'];
	$category = $_POST['category'];
		
	mysql_query ("INSERT INTO menu (entry, description, allergens, price, category, status, restaurantId) VALUES ('$entry', '$description', '$allergens', '$price', '$category', 'Active', '$restaurantId')");
}

include_once("verify-user.php");
?>