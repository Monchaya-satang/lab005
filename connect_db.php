<?php
$servername = "localhost";
$username = "Monchaya";
$password = "ai160345";
$db = "monchaya";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>