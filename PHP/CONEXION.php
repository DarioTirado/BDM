<?php 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdm";

date_default_timezone_set("America/Mexico_City");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
  echo "Connected successfully";
}
?>










