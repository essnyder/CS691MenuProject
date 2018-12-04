<?php
include_once("db-vars.php");
$tip = $_POST['tip'];

$query = "SELECT entry, price FROM menu WHERE status = 'Active' AND restaurantId = " . $_POST['restaurantId'];
$result = mysql_query($query); 
$total = 0;
$orderInfo = "";

while ($row = mysql_fetch_array($result)) {
	$item = str_replace(" ", "_", $row['entry']);
	$price = $row['price'];
	if ($_POST[$item]) {
		$orderInfo .= $_POST[$item] . " x " . $row['entry'] . " = $" . $_POST[$item] * $row['price'] . "<br>\n";
		$totalCost += $_POST[$item] * $row['price'];
	}
}

$orderInfo .= "----------------------------------------------------<br>\n";
$orderInfo .= "Total Cost = $" . $totalCost . "<br>\n";
$orderInfo .= "Tip = $" . $tip . "\n";
$orderStatus = "Your order has been submitted.";
$orderTime = time();

mysql_query ("INSERT INTO orders (orderInfo, totalCost, tip, orderStatus, orderTime, restaurantId) VALUES ('$orderInfo', '$totalCost', '$tip', '$orderStatus', '$orderTime', '" . $_POST['restaurantId'] . "')");

header("Location: order-status.php?orderTime=$orderTime");
die();
?>