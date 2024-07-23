<?php

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */


$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'crud_with_login';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


	
?>
