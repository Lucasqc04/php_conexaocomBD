<?php

namespace App\Persistence;

use PDO;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\SystemServices\MonologFactory;

class ConnectionFactory 
{
    private static $conn;  

    static $host = 'localhost';
    static $dbname = 'test';
    static $username = 'root';
    static $password = '';

    public static function getConnection() {
        try {
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$username, self::$password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $logger = MonologFactory::getInstance()->info("Conexão com bd bem-sucedida!");
        } catch (PDOException $e) {
            $logger = MonologFactory::getInstance()->info("Erro na conexão com bd: " . $e->getMessage());
        }

        return self::$conn;  
    }
}
