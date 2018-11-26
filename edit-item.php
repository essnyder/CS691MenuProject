<?php
session_start();
include_once("db-vars.php");
$action = $_POST['action'];
$entry = $_POST['entry'];

if ($action == "delete") {
	mysql_query ("DELETE FROM menu WHERE entry = '$entry'");
}
elseif ($action == "activate") {
	mysql_query ("UPDATE menu SET status = 'Active' WHERE entry = '$entry'");
}
elseif ($action == "deactivate") {
	mysql_query ("UPDATE menu SET status = 'Inactive' WHERE entry = '$entry'");
}
elseif ($action == "change") {
	$description = $_POST['description'];
	$allergens = $_POST['allergens'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	
	mysql_query ("UPDATE menu SET description = '$description', allergens = '$allergens', price = '$price', category = '$category' WHERE entry = '$entry'");
}	
else {
	$entry = $_POST['entry'];
	$description = $_POST['description'];
	$allergens = $_POST['allergens'];
	$price = $_POST['price'];
	$category = $_POST['category'];
		
	mysql_query ("INSERT INTO menu (entry, description, allergens, price, category, status) VALUES ('$entry', '$description', '$allergens', '$price', '$category', 'Active')");
}

include_once("verify-user.php");
?>