<?php

$servername = "mysql";
$username = "root";
$password = "root";
$dbname = "altschool";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>