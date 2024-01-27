<?php
namespace App\Models;
use PDO;

class Database{
    private static $dbHost = 'localhost';
    private static $dbName = 'PHP2_Lab5';
    private static $dbUser = 'root';
    private static $dbPassword = 'root';
    private static $dbPort = '3306';

    public static function PDO(){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
    public static function mysqli(){

    }

}