<?php include_once("db-vars.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Login Page</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
</head>
<body>
	<div id="content">
    	<div class="tagline">
			<h4>Centralized Login</h4>
		</div>
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
                	<label for="userRank">User Rank:</label><br>
                	<input class="text" type="text" name="userRank" required>
                </p>
                <p>
                	<label for="userPassword">User Password:</label><br>
                	<input class="text" type="password" name="userPassword" required>
                    <input type="hidden" name="restaurantId" value="<?php echo $_GET['restaurantId']; ?>">
                </p>                                                                                          	
                <p><input class="submit" type="submit" name="submit" value="Login"></p>
            </form>
     	</div>
	</div>
    <footer><a href="index<?php echo $_GET['restaurantId']; ?>.php">Back to Menu</a></footer>
</body>
</html>