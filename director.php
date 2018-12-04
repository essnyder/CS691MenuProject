<?php 
session_start();
include_once("db-vars.php"); 
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Director Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
</head>
<body>
	<div id="content">
    	<div class="tagline">
			<h4>Director's Page</h4>
		</div>      
		<div class="category">
			<p>Logged in as <?php echo $_SESSION['userRank']; ?> for Restaurant #<?php echo $_SESSION['restaurantId']; ?></p>
		</div>                  
		<?php 
			$query = "SELECT * FROM orders WHERE server IS NULL AND restaurantId = " . $_SESSION['restaurantId'] . " LIMIT 1";
			$result = mysql_query($query); 
			
			while ($row = mysql_fetch_array($result)) {
				$orderNumber = $row['orderNumber'];
				$orderInfo = $row['orderInfo'];
				
				echo "<div class='director'>\n";
					echo "<dl>\n";
						echo "<dd>Order #" . $orderNumber . "</dd>\n";						
						echo "<dd>" . $orderInfo . "</dd>\n";						
						echo "<dd>\n";
							echo "<br><label for='server'>Server:</label><br>\n";
            				echo "<input class='server' form='directorForm' type='text' name='server'>\n";
							echo "<input form='directorForm' type='hidden' name='orderNumber' value='" . $orderNumber . "'>\n";
						echo "</dd>\n";					
					echo "</dl>\n";
				echo "</div>\n";
			}
		?>        
        <div class="order">
        	<form id="directorForm" action="submit-director-form.php" method="post">
            	<input type="hidden" name="count" value="<?php echo $counter; ?>">
				<p><input class="submit" type="submit" name="submit" value="Assign Server(s)"></p>
            </form>
		</div>                              
	</div>
	<footer><a href="logout.php">Logout</a></footer>
</body>
</html>