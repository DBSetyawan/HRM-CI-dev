<?php
$servername     = "192.168.88.88";
$username       = "root";
$password       = "19K23O15P";
$db             = "paytest";

$serverhrm      = "192.168.88.99";
$userhrm        = "maria";
$passhrm        = "maria123";
$dbhrm          = "hrsale";

// Create connection
$conn           = mysqli_connect($servername, $username, $password, $db);
$connhrm        = mysqli_connect($serverhrm, $userhrm, $passhrm, $dbhrm);

if (!$conn || !$connhrm) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
