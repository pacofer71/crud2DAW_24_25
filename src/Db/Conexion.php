<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Conexion
{
    private static ?PDO $conexion = null;

    protected static function getConexion(): PDO
    {
        if (self::$conexion === null) {
            self::setConexion();
        }
        return self::$conexion;
    }
    private static function setConexion(): void
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();
        $user = $_ENV['USER'];
        $port = $_ENV['PORT'];
        $host = $_ENV['HOST'];
        $db = $_ENV['DB'];
        $pass = $_ENV['PASS'];
        $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ];
        try {
            self::$conexion = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $ex) {
            throw new PDOException("Error en conexion: " . $ex->getMessage(), -1);
        }
    }
    protected static function cerrarConexion(): void
    {
        self::$conexion = null;
    }
}
