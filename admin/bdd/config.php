<?php
// Charger le fichier .env
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception('.env file not found');
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '#') === 0)
            continue; // Skip comments
        list($key, $value) = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}

// Charger les variables
loadEnv(__DIR__ . '/../../.env');

class Database
{
    private static $dbHost;
    private static $dbName;
    private static $dbUser;
    private static $dbPassword;
    private static $connection = null;


    public static function connect()
    {
        // Initialiser les variables si pas déjà fait
        if (self::$dbHost === null) {
            self::$dbHost = $_ENV['DB_HOST'];
            self::$dbName = $_ENV['DB_NAME'];
            self::$dbUser = $_ENV['DB_USER'];
            self::$dbPassword = $_ENV['DB_PASSWORD'];
        }

        try {
            self::$connection = new PDO("mysql:host=" . self::$dbHost . "; dbname=" . self::$dbName, self::$dbUser, self::$dbPassword);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }

        return self::$connection;
    }
}

