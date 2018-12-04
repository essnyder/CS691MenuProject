<?php
session_start();
if (!isset($_SESSION['userRank'])) {$_SESSION['userRank'] = $_POST['userRank'];}
if (!isset($_SESSION['userPassword'])) {$_SESSION['userPassword'] = $_POST['userPassword'];}
if (!isset($_SESSION['restaurantId'])) {$_SESSION['restaurantId'] = $_POST['restaurantId'];}

include_once("db-vars.php"); 

$query = "SELECT * FROM employees WHERE userRank = '" . $_SESSION['userRank'] . "' AND restaurantId = " . $_SESSION['restaurantId'];
$result = mysql_query($query);
$employeeData = mysql_fetch_array($result); 
					
if (($_SESSION['userRank'] == "Director") && ($_SESSION['userPassword'] == $employeeData['userPassword'])) {
	header("Location: director.php");
	die();
}
elseif ($_SESSION['userPassword'] == $employeeData['userPassword']) {
	header("Location: task-selector.php");
	die();
}
else {
	session_destroy();
	header("Location: login.php?status=Failed%20to%20Login&restaurantId=" . $_SESSION['restaurantId']);
	die();
}
?>