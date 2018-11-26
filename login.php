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
			$query = "SELECT * FROM tagline";
			$result = mysql_query($query);
			$tagline = mysql_fetch_array($result); 

			echo "<div class='tagline'>\n";
				echo "<h" . $tagline['style'] . ">" . $tagline['message'] . "</h" . $tagline['style'] . ">\n";
			echo "</div>\n";
		?>        
		<div class="category">			
			<?php
            	if ($_GET['status'] == "Failed to Login") {
            		$class = "red";
                } else {
                	$class = "white";
                }
            	echo "<p class=\"" . $class . "\">" . $_GET['status'] . "</p>\n";
			?>           
		</div>
		<div class="form">
            <form class="center" action="verify-user.php" method="post">
                <p>
                	<label for="user_rank">User Rank:</label><br>
                	<input class="text" type="text" name="user_rank" id="user_rank" required>
                </p>
                <p>
                	<label for="user_password">User Password:</label><br>
                	<input class="text" type="password" name="user_password" id="user_password" required>
                </p>                                                                                          	
                <p><input class="submit" type="submit" name="submit" value="Login"></p>
            </form>
     	</div>
	</div>
    <footer><a href="index.php">Back to Menu</a></footer>
</body>
</html>