<?php include_once("db_vars.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Group Project</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
        
		<div class="section">
			<p>Entrees</p>
		</div>
        
		<?php 
			$query = "SELECT * FROM menu WHERE catagory = 'entree'";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>";
					echo "<dl>";
						echo "<dt><img src='data:image/jpeg;base64," . base64_encode($item['image']) . "'></dt>";					
						echo "<dd>" . $item['entree'] . "</dd>";
						echo "<dd>" . $item['ingredients'] . "</dd>";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>";
						}
						echo "<dd>$" . $item['price'] . "</dd>";					
					echo "</dl>";
				echo "</div>";
			}
		?>
        
		<div class="section">
			<p>Desserts</p>
		</div>
        
		<?php 
			$query = "SELECT * FROM menu WHERE catagory = 'dessert'";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>";
					echo "<dl>";					
						echo "<dt><img src='data:image/jpeg;base64," . base64_encode($item['image']) . "'></dt>";
						echo "<dd>" . $item['entree'] . "</dd>";
						echo "<dd>" . $item['ingredients'] . "</dd>";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>";
						}
						echo "<dd>$" . $item['price'] . "</dd>";					
					echo "</dl>";
				echo "</div>";
			}
		?>
        
		<div class="section">
			<p>Beverages</p>
		</div>
        
		<?php 
			$query = "SELECT * FROM menu WHERE catagory = 'beverage'";
			$result = mysql_query($query); 
			
			while ($item = mysql_fetch_array($result)) {
				echo "<div class='item'>";
					echo "<dl>";					
						echo "<dt><img src='data:image/jpeg;base64," . base64_encode($item['image']) . "'></dt>";
						echo "<dd>" . $item['entree'] . "</dd>";
						echo "<dd>" . $item['ingredients'] . "</dd>";
						if ($item['allergens']) {
							echo "<dd>Allergens: " . $item['allergens'] . "</dd>";
						}
						echo "<dd>$" . $item['price'] . "</dd>";					
					echo "</dl>";
				echo "</div>";
			}
		?>

		<div class="section smallPoint">
			<p>"Consuming raw or undercooked meats, poultry, seafood, shellfish, or eggs may increase your risk of food borne illness."</p>
		</div>
                                
	</div>
<?php include_once("library/footer.php"); ?>