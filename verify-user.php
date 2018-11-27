<?php
session_start();
if (!isset($_SESSION['user_rank'])) {$_SESSION['user_rank'] = $_POST['user_rank'];}
if (!isset($_SESSION['user_password'])) {$_SESSION['user_password'] = $_POST['user_password'];}
	
if ($_SESSION['user_rank'] == "Admin" && $_SESSION['user_password'] == "Admin") {
	header("Location: login-success.php?status=Logged%20in%20as%20Admin");
	die();	
}
elseif ($_SESSION['user_rank'] == "Owner" && $_SESSION['user_password'] == "Owner") {
	header("Location: login-success.php?status=Logged%20in%20as%20Owner");
	die();	
}
elseif ($_SESSION['user_rank'] == "Staff" && $_SESSION['user_password'] == "Staff") {
	header("Location: login-success.php?status=Logged%20in%20as%20Staff");
	die();
}
elseif ($_SESSION['user_rank'] == "Director" && $_SESSION['user_password'] == "Director") {
	header("Location: director.php?status=Logged%20in%20as%20Director");
	die();
}
else {
	session_destroy();
	header("Location: login.php?status=Failed%20to%20Login");
	die();
}
?>