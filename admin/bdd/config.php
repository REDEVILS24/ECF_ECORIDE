<?php
// Version finale qui marche LOCAL + HEROKU
function loadEnv($path)
{
    if (getenv('JAWSDB_URL') || isset($_SERVER['DYNO'])) {
        return; // Sur Heroku, on skip le .env
    }

    if (file_exists($path)) {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '#') === 0)
                continue;
            if (strpos($line, '=') === false)
                continue;
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

loadEnv(__DIR__ . '/../../.env');

class Database
{
    private static $connection = null;

    public static function connect()
    {
        if (self::$connection === null) {
            if (getenv('JAWSDB_URL')) {
                // HEROKU
                $url = parse_url(getenv('JAWSDB_URL'));
                $host = $url["host"];
                $user = $url["user"];
                $pass = $url["pass"];
                $dbname = substr($url["path"], 1);
                $port = $url["port"];
            } else {
                // LOCAL
                $host = $_ENV['DB_HOST'] ?? 'localhost';
                $user = $_ENV['DB_USER'] ?? 'root';
                $pass = $_ENV['DB_PASSWORD'] ?? 'password';
                $dbname = $_ENV['DB_NAME'] ?? 'ecoride';
                $port = $_ENV['DB_PORT'] ?? 3306;
            }

            try {
                self::$connection = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
?>