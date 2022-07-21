<?php 

$serverName = 'localhost';
$userName = 'admin';
$password = 'admin';
$dbName = 'grocery';


$conn = mysqli_connect($serverName, $userName, $password, $dbName) or die("DB Connection is not created");

?>