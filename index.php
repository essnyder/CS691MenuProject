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
			include_once("db_vars.php"); 
			
			$query = "SELECT message FROM tagline";
			$result = mysql_query($query);
			$tagline = mysql_result($result, 0); 

			echo "<div class='titleBar'>" . $tagline . "</div>";
		?>
        
		<div class="section">
			<p>Hello and Welcome to the CS691 and TRS Project Website.</p>
		</div>
	</div>
<?php include_once("library/footer.php"); ?>