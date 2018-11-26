<?php include_once("db-vars.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Login Page</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="content">
    	<img src="images/logo.png" alt="logo">
        
		<?php 
			$query = "SELECT message FROM tagline";
			$result = mysql_query($query);
			$tagline = mysql_result($result, 0); 

			echo "<div class='tagline'>" . $tagline . "</div>";
		?>
        
		<div class="category">
			<?php
            	if ($_GET['status'] == "Failed to Login") {
            		$class = "red";
                } else {
                	$class = "white";
                }
            	echo '<p class="' . $class . '">' . $_GET['status'] . '</p>';
			?>
		</div>
		<div class="login">
            <form class="center" action="verify-user.php" method="post" enctype="multipart/form-data">
                <p>
                	<label for="user_rank">User Rank:</label>
                	<input class="textbox" type="text" name="user_rank" id="user_rank" required>
                </p>
                <p>
                	<label for="user_password">User Password:</label>
                	<input class="textbox" type="password" name="user_password" id="user_password" required>
                </p>                                                                                          	
                <p><input class="submit" type="submit" name="submit" value="Login"></p>
            </form>
     	</div>
	</div>
</body>
</html>