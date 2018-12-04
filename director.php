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
			$query = "SELECT * FROM orders WHERE server IS NULL AND restaurantId = " . $_SESSION['restaurantId'];
			$result = mysql_query($query); 
			
			while ($orderData = mysql_fetch_array($result)) {
				$orderNumber = $orderData['orderNumber'];
				$orderInfo = $orderData['orderInfo'];
		?>		
				<div class="director">
					<form id="directorForm" action="assign-server.php" method="post">
                    	<p>Order #<?php echo $orderNumber; ?></p>						
						<p><?php echo $orderInfo; ?></p>						
						<p>
                        	<label for="server">Server:</label><br>
            				<input class="server" type="text" name="server">
							<input type="hidden" name="orderNumber" value="<?php echo $orderNumber; ?>">
						</p>
                        <p><input class="submit" type="submit" name="submit" value="Assign Server"></p>					
					</form>
				</div>
		<?php
            }
		?>                                    
		<?php 
			$query = "SELECT * FROM orders WHERE orderStatus != 'Your order has been completed.' AND restaurantId = " . $_SESSION['restaurantId'];
			$result = mysql_query($query); 
			
			while ($orderData = mysql_fetch_array($result)) {				
				echo "<div class='director'>\n";
					echo "<dl>\n";
						echo "<dd>Order #" . $orderData['orderNumber'] . "</dd>\n";												
						echo "<dd><select form='statusUpdateForm' class='text' name='orderStatus'>\n";
                			echo "<option>" . $orderData['orderStatus'] . "</option>\n";
							echo "<option>Your order has been received.</option>\n";
							echo "<option>Your order is being prepared.</option>\n";
							echo "<option>Your order is own way to your table.</option>\n";
							echo "<option>Your order has been completed.</option>\n";
							echo "<input form='statusUpdateForm' type='hidden' name='orderTime' value='" . $orderData['orderTime'] . "'>\n";
						echo "</dd>\n";					
					echo "</dl>\n";
				echo "</div>\n";
			}
		?>        
        <div class="order">
        	<form id="statusUpdateForm" action="update-status.php" method="post">
				<p><input class="submit" type="submit" name="submit" value="Update Status"></p>
            </form>
		</div>                              
	</div>    
	<footer><a href="logout.php">Logout</a></footer>
</body>
</html>