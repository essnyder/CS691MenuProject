<?php 
session_start();
include_once("db-vars.php"); 
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CS691 - Edit Menu Page</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="custom.css" type="text/css">
</head>
<body>
	<div id="content">
    	<div class="tagline">
			<h4>Menu Editor & Report Generator</h4>
		</div>      
		<div class="category">
			<p>Logged in as <?php echo $_SESSION['userRank']; ?> for Restaurant #<?php echo $_SESSION['restaurantId']; ?></p>
		</div>
		<?php	
			if ($_POST['entry'] == "Run Reports") {
		?>
        <div class="form">
            <form class="center" action="run-reports.php" method="post">
                <p>
                    <label for="date">Week Starting:</label><br>
                    <input class="text" type="text" name="date" id="date" placeholder="YYYY-MM-DD" required>
                </p>                                                                                         	
                <p><input class="submit" type="submit" name="submit" value="Run Reports"></p>
            </form>
        </div>
        <?php				
			}
			elseif ($_POST['entry'] == "Switch Restaurant") {
		?>
        <div class="form">
            <form class="center" action="switch-restaurant.php" method="post">
                <p>
                    <label for="restaurantId">Restaurant Id:</label><br>
                    <select class="text" name="restaurantId" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                	</select>
                </p>                                                                                         	
                <p><input class="submit" type="submit" name="submit" value="Switch Restaurant"></p>
            </form>
        </div>
        <?php				
			}
			elseif ($_POST['entry'] == "Edit Tagline") {
		?>			
        <div class="form">
            <form class="center" action="edit-tagline.php" method="post">
                <p>
                    <label for="message">Tagline:</label><br>
                    <input class="text" type="text" name="message" id="message" placeholder="<?php echo $tagline['message'] ?>" required>
                </p>
                <p>
                    <select class="text" name="style">
                        <option value="1" selected>Plain</option>
                        <option value="2">Fire</option>
                        <option value="3">Shimmer</option>
                    </select>                                
                </p>                                                                                          	
                <p><input class="submit" type="submit" name="submit" value="Edit Tagline"></p>
            </form>
        </div>            
		<?php
            } 
			elseif ($_POST['entry'] != "Add New Item") {
				$entry = $_POST['entry'];
				$query = "SELECT * FROM menu WHERE entry = '$entry'";
				$result = mysql_query($query);
				$row = mysql_fetch_array($result);
        ?>
        <div class="form">
            <form class="center" action="edit-item.php" method="post">
                <p>
                    <label for="entry">Item: </label>
                    <input type="hidden" name="entry" id="entry" value="<?php echo $row['entry']; ?>">
                    <?php echo $row['entry']; ?>
                </p>
                <?php 
					if ($_SESSION['userRank'] == "Staff") {
				?>
					<input type="hidden" name="action" id="action" value="change">
				<?php
					}
					else {
				?>
                    <p>
                        <label for="action">Action:</label><br>
                        Activate: <input type="radio" name="action" id="action" value="activate" required>&nbsp;&nbsp;&nbsp;
                        Deactivate: <input type="radio" name="action" id="action" value="deactivate">&nbsp;&nbsp;&nbsp;
                        Delete: <input type="radio" name="action" id="action" value="delete">&nbsp;&nbsp;&nbsp;
                        Change: <input type="radio" name="action" id="action" value="change">
                    </p>
                <?php 
					}
				?>
                <p>
                    <label for="description">Description:</label><br>
                    <input class="text" type="text" name="description" id="description" value="<?php echo $row['description']; ?>" required>
                </p>
               	<p>
                    <label for="allergens">Allergens:</label><br>
                    <input class="text" type="text" name="allergens" id="allergens" value="<?php echo $row['allergens']; ?>">
                </p>
               	<p>
                    <label for="price">Price:</label><br>
                    <input class="text" type="text" name="price" id="price" value="<?php echo $row['price']; ?>" required>
                </p>
                <p>
                    <label for="category">Category:</label><br>
                    <input class="text" type="text" name="category" id="category" value="<?php echo $row['category']; ?>" required>
                </p>                                                                                          	
                <p><input class="submit" type="submit" name="submit" value="Edit Item"></p>
            </form>
        </div>           
		<?php
			}
			else {
		?>
        <div class="form">
            <form class="center" action="edit-item.php" method="post">
                <p>
                    <label for="entry">Item:</label><br>
                    <input class="text" type="text" name="entry" id="entry" placeholder="Name of item." required>
                </p>
                <p>
                    <label for="description">Description:</label><br>
                    <input class="text" type="text" name="description" id="description" placeholder="Description of item." required>
                </p>
               	<p>
                    <label for="allergens">Allergens:</label><br>
                    <input class="text" type="text" name="allergens" id="allergens" placeholder="List of any allergens.">
                </p>
               	<p>
                    <label for="price">Price:</label><br>
                    <input class="text" type="text" name="price" id="price" placeholder="Price of item, no dollar sign." required>
                </p>
                <p>
                    <label for="category">Category:</label><br>
                    <input class="text" type="text" name="category" id="category" placeholder="Category of item." required>
                </p>                                                                                          	
                <p><input class="submit" type="submit" name="submit" value="Add New Item"></p>
            </form>
        </div>
        <?php
			}
		?>
	</div>
    <footer><a href="logout.php">Back to Menu</a></footer>
</body>
</html>