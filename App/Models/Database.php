<?php

namespace App\Models;

use PDO;
use PDOException;
use mysqli;
use Exception;

class Database
{
    use QueryBuilder;

    private static $dbHost = 'localhost';
    private static $dbName = 'quanlitailieuu';
    private static $dbUser = 'root';
    private static $dbPassword = 'mysql';
    private static $dbPort = '3306';

    public function PDO()
    {
        try {
            $conn = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbPassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi kết nối
        }
    }

    public function mysQli()
    {
        $conn = new mysqli(self::$dbHost, self::$dbUser, self::$dbPassword, self::$dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function query($sql)
    {
        try {
            $statement = $this->PDO()->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $ex) {
            $mess = $ex->getMessage();
            echo $mess;
            return null; // Trả về null nếu có lỗi truy vấn
        }
    }
}
