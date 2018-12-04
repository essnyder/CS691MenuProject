<?php include_once("db-vars.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Home Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
</head>
<body>
	<div id="content">
    	<img src="images/logo2.png" alt="logo restaurant 2">       
		<?php 
			$query = "SELECT * FROM tagline WHERE restaurantId = 2";
			$result = mysql_query($query);
			$tagline = mysql_fetch_array($result); 

			echo "<div class='tagline'>\n";
				echo "<h" . $tagline['style'] . ">" . $tagline['message'] . "</h" . $tagline['style'] . ">\n";
			echo "</div>\n";
		?>        
		<div class="category">
			<p>Raw Meaty Bone</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'rmb' AND status = 'Active' AND restaurantId = 2";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>\n";
					echo "<dl>\n";
						echo "<dd>" . $item['entry'] . "</dd>\n";
						echo "<dd>" . $item['description'] . "</dd>\n";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>\n";
						}
						echo "<dd>$" . $item['price'] . "</dd>\n";					
					echo "</dl>\n";
					echo "<p>\n";
            			echo "<label for='" . $item['entry'] . "'>Qty:</label><br>\n";
            			echo "<input class='quantity' form='orderForm' type='text' name='" . $item['entry'] . "' id='" . $item['entry'] . "'>\n";
        			echo "</p>\n";
				echo "</div>\n";
			}
		?>        
		<div class="category">
			<p>Muscle Meat</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'mm' AND status = 'Active' AND restaurantId = 2";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>\n";
					echo "<dl>\n";					
						echo "<dd>" . $item['entry'] . "</dd\n>";
						echo "<dd>" . $item['description'] . "</dd>\n";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>\n";
						}
						echo "<dd>$" . $item['price'] . "</dd>\n";					
					echo "</dl>\n";
					echo "<p>\n";
            			echo "<label for='" . $item['entry'] . "'>Qty:</label><br>\n";
            			echo "<input class='quantity' form='orderForm' type='text' name='" . $item['entry'] . "' id='" . $item['entry'] . "'>\n";
        			echo "</p>\n";
				echo "</div>\n";
			}
		?>        
		<div class="category">
			<p>Organ Meat</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'organ' AND status = 'Active' AND restaurantId = 2";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>\n";
					echo "<dl>\n";					
						echo "<dd>" . $item['entry'] . "</dd\n>";
						echo "<dd>" . $item['description'] . "</dd>\n";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>\n";
						}
						echo "<dd>$" . $item['price'] . "</dd>\n";					
					echo "</dl>\n";
					echo "<p>\n";
            			echo "<label for='" . $item['entry'] . "'>Qty:</label><br>\n";
            			echo "<input class='quantity' form='orderForm' type='text' name='" . $item['entry'] . "' id='" . $item['entry'] . "'>\n";
        			echo "</p>\n";
				echo "</div>\n";
			}
		?>
		<div class="category">
			<p>Tasty Treats</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'treat' AND status = 'Active' AND restaurantId = 2";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>\n";
					echo "<dl>\n";					
						echo "<dd>" . $item['entry'] . "</dd\n>";
						echo "<dd>" . $item['description'] . "</dd>\n";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>\n";
						}
						echo "<dd>$" . $item['price'] . "</dd>\n";					
					echo "</dl>\n";
					echo "<p>\n";
            			echo "<label for='" . $item['entry'] . "'>Qty:</label><br>\n";
            			echo "<input class='quantity' form='orderForm' type='text' name='" . $item['entry'] . "' id='" . $item['entry'] . "'>\n";
        			echo "</p>\n";
				echo "</div>\n";
			}
		?>        
        <div class="order">
        	<p class="right">
                <label for="tip">Tip:</label><br>
                <input class="tip" form="orderForm" type="text" name="tip">
                <input form="orderForm" type="hidden" name="restaurantId" value="2">
            </p>
            <form class="left" id="orderForm" action="submit-order.php" method="post">
                    <p><input class="submitOrder" type="submit" name="submit" value="Submit Order"></p>
            </form>
		</div>
		<div class="warning">
			<p>"Consuming raw or undercooked meats, poultry, seafood, shellfish, or eggs may increase your risk of food borne illness."</p>
		</div>                              
	</div>
	<footer><a href="login.php?status=Login&restaurantId=2">Login</a></footer>
</body>
</html>