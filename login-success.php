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
            	echo "<p>" . $_GET['status'] . "</p>\n";
			?>
		</div>        
        <div class="form">
        	<form action="edit-menu.php" method="post">
                <label for="entry">Select Item to Edit:</label>
                <select class="text" name="entry" id="entry">
                	<option>--Select--</option>
                    <?php
						if  (($_SESSION['user_rank'] == "Owner") || ($_SESSION['user_rank'] == "Admin")) {
							echo "<option>Run Reports</option>\n";
							echo "<option>Add New Item</option>\n";
							echo "<option>Tagline</option>\n";							
						} elseif ($_SESSION['user_rank'] != "Staff") {
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