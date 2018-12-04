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
			<h4>Task Selector</h4>
		</div>      
		<div class="category">
			<p>Logged in as <?php echo $_SESSION['userRank']; ?> for Restaurant #<?php echo $_SESSION['restaurantId']; ?></p>
		</div>        
        <div class="form">
        	<form action="edit-menu.php" method="post">
                <label for="entry">Select Item to Edit:</label>
                <select class="text" name="entry">
                	<option>--Select--</option>
                    <?php
						if ($_SESSION['userRank'] == "Owner") {
							echo "<option>Switch Restaurant</option>\n";
							echo "<option>Run Reports</option>\n";
							echo "<option>Add New Item</option>\n";
							echo "<option>Edit Tagline</option>\n";
						}

                        $query = "SELECT entry FROM menu WHERE restaurantId = " . $_SESSION['restaurantId'];
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