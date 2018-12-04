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
</head>
<body>
	<div id="content">
    	<div class="tagline">
			<h4>Run Reports</h4>
		</div>      
		<div class="category">
			<p>Logged in as <?php echo $_SESSION['userRank']; ?> for Restaurant #<?php echo $_SESSION['restaurantId']; ?></p>
		</div>              
		<?php 
			$dateStart = strtotime($_POST['date']);
			$dateEnd = strtotime("+1 week", $dateStart);
			$query = "SELECT * FROM orders WHERE orderTime BETWEEN '$dateStart' AND '$dateEnd' AND restaurantId = " . $_SESSION['restaurantId'];
			$result = mysql_query($query); 
			
			while ($reportData = mysql_fetch_array($result)) {
				echo "<div class='director'>\n";
					echo "<dl>\n";
						echo "<dd>Order #" . $reportData['orderNumber'] . "</dd>\n";						
						echo "<dd>" . $reportData['orderTime'] . "</dd>\n";
						echo "<dd>" . $reportData['orderInfo'] . "</dd>\n";
						echo "<dd>" . $reportData['server'] . "</dd>\n";											
					echo "</dl>\n";
				echo "</div>\n";
			}
			
			$query = "SELECT server, count(orderNumber), sum(totalCost), sum(tip) FROM orders WHERE restaurantId = " . $_SESSION['restaurantId'] . " AND orderTime BETWEEN '$dateStart' AND '$dateEnd' GROUP BY server";
			$result = mysql_query($query);
			
			while ($reportData = mysql_fetch_array($result)) {
				echo "<div class='director'>\n";
					echo "<dl>\n";
						echo "<dd>Week Starting: " . $_POST['date'] . "</dd>\n";
						if (is_null($reportData['server'])) {
							echo "<dd>Server: Unassigned</dd>\n";
						}
						else {
							echo "<dd>Server: " . $reportData['server'] . "</dd>\n";
						}
						echo "<dd># of Orders: " . $reportData['count(orderNumber)'] . "</dd>\n";
						echo "<dd>Total Value of Orders: $" . $reportData['sum(totalCost)'] . "</dd>\n";
						echo "<dd>Total Value of Tips: $" . $reportData['sum(tip)'] . "</dd>\n";																	
					echo "</dl>\n";
				echo "</div>\n";
			}
		?>                                      
	</div>
	<footer>
    	<a href="logout.php">Logout</a><br>
    	<a href="task-selector.php">Return to Task Selector</a>
    </footer>
</body>
</html>