<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "laliga_new";

// Create connection for cloudways
//$conn = new mysqli("localhost", "ceddqksdvq", "4hs0112DB", "ceddqksdvq");

// for local test environment
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  //echo "Connected successfully";



 ?>

