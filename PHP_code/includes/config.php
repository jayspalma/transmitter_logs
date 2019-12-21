<?php
$servername = "localhost";
$username = "txloguser";
$password = "tvtx223";

try {
    $db = new PDO("mysql:host=$servername;dbname=transmitter", $username, $password);
    // set the PDO error mode to exception
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>