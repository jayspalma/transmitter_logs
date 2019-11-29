<?php
$servername = "192.168.254.200";
$username = "TvTx";
$password = "TVtx223!";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
