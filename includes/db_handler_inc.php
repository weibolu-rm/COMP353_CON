<?php // 40058095

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "consys";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// if connection fails
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    exit();
}
