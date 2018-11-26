<?php include_once("db-vars.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Login Success Page</title>
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
            	echo "<p>" . $_GET['status'] . "</p>";
			?>
		</div>
        
        <div class="login">
        	<form action="edit-menu.php" method="post">
                <label for="entry">Select Item to Edit:</label>
                <select name="entry" id="entry">
                	<option>--Select--</option>
                    <?php
						if ($_GET['status'] != "Logged in as Staff") {
							echo "<option>Tagline</option>\n";							
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
</body>
</html>