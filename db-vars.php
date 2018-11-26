<?php
$db_host = 'localhost';
$db_user = 'ogre_cs691';
$db_password = 'Hus3y|n';
$database = 'ogre_cs691';

mysql_connect($db_host, $db_user, $db_password) or die('Cannot connect to the database');
mysql_select_db($database);
?>