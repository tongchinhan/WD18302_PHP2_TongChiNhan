<?php

require_once "vendor/autoload.php";

session_start();
ob_start();
use App\Core\Route;
use App\Models\Database;

define("ROOT_URL", "127.0.0.1:5000");

// Khởi tạo đối tượng Database và PDO
$dbConnection = (new Database())->PDO();

// Khởi tạo đối tượng Route và truyền giá trị $dbConnection
$route = new Route($dbConnection);


