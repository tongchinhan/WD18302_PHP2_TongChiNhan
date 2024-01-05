<?php
// config.php

$servername = "localhost";
$username = "root";
$password = "mysql";
$database = "tcndatabase";

$connection = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($connection->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $connection->connect_error);
}
?>
