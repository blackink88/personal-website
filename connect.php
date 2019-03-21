<?php

// Definition of the database
define('dbhost', '127.0.0.1');
define('dbuser', 'exploit');
define('dbpass', 'mondesa');
define('dbname', 'blog');
// Connect to the database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}
?>