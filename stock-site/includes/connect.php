<?php

$servername = "192.168.1.5";
$username = "stockalot";
$password = "5t0ck410t/@";
$database = "qubedaudio_new";


// Establish a database connection
$connection = new mysqli($servername, $username, $password, $database);


// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>