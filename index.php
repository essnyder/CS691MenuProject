<?php include_once("db-vars.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Home Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<p>Entrees</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'entree' AND status = 'Active'";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>\n";
					echo "<dl>\n";
						// echo "<dt><img src='data:image/jpeg;base64," . base64_encode($item['image']) . "'></dt>\n";					
						echo "<dd>" . $item['entry'] . "</dd>\n";
						echo "<dd>" . $item['description'] . "</dd>\n";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>\n";
						}
						echo "<dd>$" . $item['price'] . "</dd>\n";					
					echo "</dl>\n";
				echo "</div>\n";
			}
		?>        
		<div class="category">
			<p>Desserts</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'dessert' AND status = 'Active'";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>\n";
					echo "<dl>\n";					
						// echo "<dt><img src='data:image/jpeg;base64," . base64_encode($item['image']) . "'></dt>\n";
						echo "<dd>" . $item['entry'] . "</dd\n>";
						echo "<dd>" . $item['description'] . "</dd>\n";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>\n";
						}
						echo "<dd>$" . $item['price'] . "</dd>\n";					
					echo "</dl>\n";
				echo "</div>\n";
			}
		?>        
		<div class="category">
			<p>Beverages</p>
		</div>        
		<?php 
			$query = "SELECT * FROM menu WHERE category = 'beverage' AND status = 'Active'";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>\n";
					echo "<dl>\n";					
						// echo "<dt><img src='data:image/jpeg;base64," . base64_encode($item['image']) . "'></dt>\n";
						echo "<dd>" . $item['entry'] . "</dd\n>";
						echo "<dd>" . $item['description'] . "</dd>\n";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>\n";
						}
						echo "<dd>$" . $item['price'] . "</dd>\n";					
					echo "</dl>\n";
				echo "</div>\n";
			}
		?>
		<div class="warning">
			<p>"Consuming raw or undercooked meats, poultry, seafood, shellfish, or eggs may increase your risk of food borne illness."</p>
		</div>                              
	</div>
	<footer><a href="login.php?status=Login">Login</a></footer>
</body>
</html>