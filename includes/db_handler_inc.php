<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsys";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// if connection fails
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    exit();
}