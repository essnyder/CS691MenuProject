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
 
			$query = "SELECT * FROM orders WHERE orderStatus != 'Your order has been completed.' AND restaurantId = " . $_SESSION['restaurantId'];
			$result = mysql_query($query); 
			
			while ($orderData = mysql_fetch_array($result)) {
		?>				
				<div class="director">
                	<form id="statusUpdateForm" action="update-status.php" method="post">
						<p>Order #<?php echo $orderData['orderNumber']; ?></p>											
						<select class="text" name="orderStatus">
                			<option><?php echo $orderData['orderStatus']; ?></option>
                            <option>Your order has been received.</option>
							<option>Your order is being prepared.</option>
							<option>Your order is own way to your table.</option>
							<option>Your order has been completed.</option>
                        </select>
						<input type="hidden" name="orderTime" value="<?php echo $orderData['orderTime']; ?>">
						<p><input class="submit" type="submit" name="submit" value="Update Status"></p>
					</form>
                </div>
        <?php
			}
		?>                                      
	</div>    
	<footer><a href="logout.php">Logout</a></footer>
</body>
</html>