<?php
//start session
session_start();

//creating constants to store non repating value
define('SITEURL', 'http://localhost/food-order/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mydb');




	$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//database connection
	$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());//selectiong database whice name is food-order

	?>