<?php

class Database
{
    private static $dbHost = "db";
    private static $dbName = "ecoride";
    private static $dbUser = "user";
    private static $dbPassword = "password";

    private static $connection = null;


    public static function connect()
    {
        try {
            self::$connection = new PDO("mysql:host=" . self::$dbHost . "; dbname=" . self::$dbName, self::$dbUser, self::$dbPassword);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }

        return self::$connection;

    }

    public static function disconnect()
    {
        self::$connection = null;
    }
}

Database::connect();

?>