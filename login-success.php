<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Login Success Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="content">
		<?php include_once("library/navBar.php"); ?>
		<div class="titleBar">
			Logged In
		</div>
		<div class="section">
			<?php
				$user_email = $_GET['user_email'];				
				echo "<p>Hello " . $user_email . ". Great to see you!</p>";
				echo "<p>What would you like to do?</p>";
			?>
		</div>
	</div>
<?php include_once("library/footer.php"); ?>