<?php
$host		= "localhost";
$usname		= "root";
$pas		= "";
$db			= "db_dosa";	

// Create connection
$conn = new mysqli($host, $usname, $pas, $db);

// Check connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";*/
?>