<?php 

session_start();

$_SESSION['username'] = "Luke";
$_SESSION['password'] = "admin";
$_SESSION['email'] = "jaekelluke@gmail.com";

echo "Session data is saved";
 
?>