<?php
echo "=== TEST DE CONNEXION HEROKU ===<br><br>";

if (getenv('JAWSDB_URL')) {
    echo "✅ JAWSDB_URL trouvée !<br>";
    $url = parse_url(getenv('JAWSDB_URL'));
    echo "Host: " . $url["host"] . "<br>";
    echo "User: " . $url["user"] . "<br>";
    echo "Database: " . substr($url["path"], 1) . "<br>";
    echo "Port: " . $url["port"] . "<br><br>";

    try {
        $pdo = new PDO(
            "mysql:host=" . $url["host"] . ";port=" . $url["port"] . ";dbname=" . substr($url["path"], 1),
            $url["user"],
            $url["pass"]
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "🎉 CONNEXION MYSQL RÉUSSIE !<br><br>";

        // Test de création de table
        $pdo->exec("CREATE TABLE IF NOT EXISTS test_table (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50))");
        echo "✅ Création de table OK !<br>";

        $pdo->exec("INSERT INTO test_table (name) VALUES ('test_heroku')");
        echo "✅ Insertion de données OK !<br>";

    } catch (Exception $e) {
        echo "❌ ERREUR DE CONNEXION: " . $e->getMessage() . "<br>";
    }
} else {
    echo "❌ JAWSDB_URL non trouvée !";
}
?>