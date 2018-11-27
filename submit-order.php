<?php
include_once("db-vars.php");

$query = "SELECT entry, price FROM menu WHERE status = 'Active'";
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
$orderInfo .= "Total Cost = $" . $totalCost . "\n";

mysql_query ("INSERT INTO orders (orderInfo, totalCost) VALUES ('$orderInfo', '$totalCost')");

header("Location: index.php?order=Your%20order%20was%20received.");
die();
?>