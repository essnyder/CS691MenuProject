<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Registration/Login Page</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="content">
		<?php include_once("library/navBar.php"); ?>
		<div class="titleBar">Registration/Login</div>
		<div class="section manager">
            <form action="verify-user.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Register/Login</legend>
                    <dl>
                    	<dt><label for="user_email">User Email:</label></dt>
						<dd><input class="textbox" type="email" name="user_email" id="user_email" required></dd>
                        <dt><label for="user_password">User Password:</label></dt>
                        <dd><input class="textbox" type="password" name="user_password" id="user_password" required></dd>                                                                                          	
                	</dl>
                    <input class="submit" type="submit" name="submit" value="Register/Login">
                </fieldset>
            </form>
     	</div>
	</div>
<?php include_once("library/footer.php"); ?>