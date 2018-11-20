<?php
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

if ($user_name == "Admin" && $user_password == "Admin") {
	header("Location: http://cs691.pactusaquilus.com/login-success.php?status=Logged%20in%20as%20Admin");
	die();	
}
elseif ($user_name == "Owner" && $user_password == "Owner") {
	header("Location: http://cs691.pactusaquilus.com/login-success.php?status=Logged%20in%20as%20Owner");
	die();	
}
elseif ($user_name == "Staff" && $user_password == "Staff") {
	header("Location: http://cs691.pactusaquilus.com/login-success.php?status=Logged%20in%20as%20Staff");
	die();
}
else {
	header("Location: http://cs691.pactusaquilus.com/login.php?status=Failed%20to%20Login");
	die();
}
?>
