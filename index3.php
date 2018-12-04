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
    	<img src="images/logo3.png" alt="logo restaurant 3">       
		<?php 
			$query = "SELECT * FROM tagline WHERE restaurantId = 3";
			$result = mysql_query($query);
			$tagline = mysql_fetch_array($result); 

			echo "<div class='tagline'>\n";
				echo "<h" . $tagline['style'] . ">" . $tagline['message'] . "</h" . $tagline['style'] . ">\n";
			echo "</div>\n";
		?>        
		<div class="category">
			<p>Pot/Hash/Weed</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'Marijuana' AND status = 'Active' AND restaurantId = 3";
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
            			echo "<input class='quantity' form='orderForm' type='text' name='" . $item['entry'] . "'>\n";
        			echo "</p>\n";
				echo "</div>\n";
			}
		?>        
		<div class="category">
			<p>Beers/Ales/Meads</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'beverage' AND status = 'Active' AND restaurantId = 3";
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
            			echo "<input class='quantity' form='orderForm' type='text' name='" . $item['entry'] . "'>\n";
        			echo "</p>\n";
				echo "</div>\n";
			}
		?>        
        <div class="order">
        	<p class="left" style="line-height: 40px;"><?php echo $_GET['order']; ?></p>
        	<form id="orderForm" action="submit-order.php" method="post">
				<p><input class="submit" type="submit" name="submit" value="Submit Order"></p>
            </form>
		</div>
		<div class="warning">
			<p>"Consuming raw or undercooked meats, poultry, seafood, shellfish, or eggs may increase your risk of food borne illness."</p>
		</div>                              
	</div>
	<footer><a href="login.php?status=Login&restaurantId=3">Login</a></footer>
</body>
</html>