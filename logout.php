<?php
session_start();
header("Location: index" . $_SESSION['restaurantId'] . ".php");
die();
?>