<?php 

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "root";                                 
$dbName = "fitnezz";

// Create connection
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>