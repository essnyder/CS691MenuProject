<?php 
	session_start();
	include_once("db-vars.php"); 
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Edit Menu Page</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
</head>
<body>
	<div id="content">
    	<div class="tagline">
			<h4>Menu Editor & Report Generator</h4>
		</div>      
		<div class="category">
			<?php
            	echo "<p>" . $_GET['status'] . " for RestaurantId #" . $_GET['restaurantId'] . "</p>\n";
			?>
		</div>        
        <div class="form">
        	<form action="edit-menu.php" method="post">
                <label for="entry">Select Item to Edit:</label>
                <select class="text" name="entry" id="entry">
                	<option>--Select--</option>
                    <?php
						if  (($_SESSION['user_rank'] == "Owner") || ($_SESSION['user_rank'] == "Admin")) {
							echo "<option>Switch Restaurant</option>\n";
							echo "<option>Run Reports</option>\n";
							echo "<option>Add New Item</option>\n";
							echo "<option>Tagline</option>\n";
						} elseif ($_SESSION['user_rank'] == "Director") {							
						} elseif ($_SESSION['user_rank'] == "Staff") {
							session_destroy();
							header("Location: login.php?status=Failed%20to%20Login");
							die();
						}

                        $query = "SELECT entry FROM menu";
                        $result = mysql_query($query);
                        													
						while ($row = mysql_fetch_array($result)) {
							echo "<option>" . $row[0] . "</option>\n";
						}
                    ?>				               
                </select>
                <p><input class="submit" type="submit" name="submit" value="Edit"></p>
        	</form>
		</div>
	</div>
    <footer><a href="logout.php">Back to Menu</a></footer>
</body>
</html>