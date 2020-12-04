<?php // 40058095
$config = parse_ini_file("config.ini");

$serverName = $config['serverName'];
$dbUsername = $config['dbUsername'];
$dbPassword = $config['dbPassword'];
$dbName = $config['dbName'];

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// if connection fails
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    exit();
}
