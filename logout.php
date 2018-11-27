<?php
session_start();
session_destroy();
header("Location: index.php?order=" . $_GET['order']);
die();
?>