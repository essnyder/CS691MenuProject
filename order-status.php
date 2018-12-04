<?php include_once("db-vars.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Order Status Page</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
</head>
<body>
	<div id="content">
    	<div class="tagline">
			<h4>Order Status</h4>
		</div>
        <div class="category">			
			<?php
            	$query = "SELECT orderStatus, restaurantId FROM orders WHERE orderTime = '" . $_GET['orderTime'] . "'";
				$result = mysql_query($query);
				$orderData = mysql_fetch_array($result);
				
				echo "<p>" . $orderData['orderStatus'] . "</p>\n";
			?>           
		</div>
		<div class="form">
            <form class="center" action="order-status.php" method="get">
            	<input type="hidden" name="orderTime" value="<?php echo $_GET['orderTime']; ?>">                                                                                        	
                <p><input class="submit" type="submit" name="submit" value="Order Status"></p>
            </form>
     	</div>
	</div>
    <footer><a href="index<?php echo $orderData['restaurantId']; ?>.php">Back to Menu</a></footer>
</body>
</html>