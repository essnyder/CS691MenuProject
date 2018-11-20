<?php
$user_email = $_POST['user_email'];
$user_password = md5($_POST['user_password']);

$filename = "users.php";
$file = fopen($filename, "r");
$userlist = fread($file, filesize($filename));
fclose($file);

$userdata = explode("\n", $userlist);
foreach ($userdata as $arrayrow) {
	$datapair = explode("|", $arrayrow);
	if ($datapair[0] == $user_email && $datapair[1] == $user_password) {
		header("Location: http://pactusaquilus.com/CS691/login-success.php?user_email=$user_email");
		die();
	}
}

header("Location: http://pactusaquilus.com/CS691/login-failure.php?user_email=$user_email");
die();
?>
