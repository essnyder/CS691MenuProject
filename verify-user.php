<?php
session_start();
if (!isset($_SESSION['user_rank'])) {$_SESSION['user_rank'] = $_POST['user_rank'];}
if (!isset($_SESSION['user_password'])) {$_SESSION['user_password'] = $_POST['user_password'];}
$_SESSION['restaurantId'] = $_POST['restaurantId'];

include_once("db-vars.php"); 

$query = "SELECT * FROM employees WHERE rank = '" . $_SESSION['user_rank'] . "' AND restaurantId = " . $_SESSION['restaurantId'];
$result = mysql_query($query);
$employeeData = mysql_fetch_array($result); 
					
if (($_SESSION['user_rank'] == "Director") && ($_SESSION['user_password'] == $employeeData['password'])) {
	header("Location: director.php?status=Logged%20in%20as%20" . $_SESSION['user_rank'] . "&restaurantId=" . $_SESSION['restaurantId']);
	die();
}
elseif ($_SESSION['user_password'] == $employeeData['password']) {
	header("Location: edit-select.php?status=Logged%20in%20as%20" . $_SESSION['user_rank'] . "&restaurantId=" . $_SESSION['restaurantId']);
	die();
}
else {
	session_destroy();
	header("Location: login.php?status=Failed%20to%20Login&restaurantId=" . $_SESSION['restaurantId']);
	die();
}
?>