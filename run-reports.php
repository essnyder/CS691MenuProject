<?php 
session_start();
include_once("db-vars.php"); 
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Run Reports Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="content">
    	<img src="images/logo1.png" alt="logo">        
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
            	echo "<p>Logged in as Owner</p>\n";
			?>
		</div>              
		<?php 
			$dateStart = $_POST['date'];
			$dateEnd = date("Y-m-d", strtotime("+1 week", strtotime($dateStart)));
			$query = "SELECT * FROM orders WHERE date BETWEEN '$dateStart' AND '$dateEnd'";
			$result = mysql_query($query); 
			
			while ($row = mysql_fetch_array($result)) {
				echo "<div class='director'>\n";
					echo "<dl>\n";
						echo "<dd>Order #" . $row['orderNumber'] . "</dd>\n";						
						echo "<dd>" . $row['date'] . "</dd>\n";
						echo "<dd>" . $row['orderInfo'] . "</dd>\n";
						echo "<dd>" . $row['server'] . "</dd>\n";											
					echo "</dl>\n";
				echo "</div>\n";
			}
			
			$query = "SELECT server, count(orderNumber), sum(totalCost) FROM orders WHERE date BETWEEN '$dateStart' AND '$dateEnd' GROUP BY server";
			$result = mysql_query($query);
			
			while ($row = mysql_fetch_array($result)) {
				echo "<div class='director'>\n";
					echo "<dl>\n";
						echo "<dd>Week Starting: " . $dateStart . "</dd>\n";
						if (is_null($row['server'])) {
							echo "<dd>Server: Unassigned</dd>\n";
						}
						else {
							echo "<dd>Server: " . $row['server'] . "</dd>\n";
						}
						echo "<dd># of Orders: " . $row['count(orderNumber)'] . "</dd>\n";
						echo "<dd>Total Value of Orders: $" . $row['sum(totalCost)'] . "</dd>\n";																	
					echo "</dl>\n";
				echo "</div>\n";
			}
		?>                                      
	</div>
	<footer><a href="logout.php">Logout</a></footer>
</body>
</html>