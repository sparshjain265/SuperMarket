<?php

$servername = "localhost";
$username = "root";
$password = "arpit12345";
$db = "superMarket";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
	
