<?php

$servername = "192.168.1.4";
$username = "stockalot";
$password = "5t0ck410t/@";
$database = "stockalot";


// Establish a database connection
$connection = new mysqli($servername, $username, $password, $database);


// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>