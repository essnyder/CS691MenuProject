<?php
$user_rank = $_POST['user_rank'];
$user_password = $_POST['user_password'];
if ($user_rank == "Admin" && $user_password == "Admin") {
	header("Location: login-success.php?status=Logged%20in%20as%20Admin");
	die();	
}
elseif ($user_rank == "Owner" && $user_password == "Owner") {
	header("Location: login-success.php?status=Logged%20in%20as%20Owner");
	die();	
}
elseif ($user_rank == "Staff" && $user_password == "Staff") {
	header("Location: login-success.php?status=Logged%20in%20as%20Staff");
	die();
}
else {
	header("Location: login.php?status=Failed%20to%20Login");
	die();
}
?>