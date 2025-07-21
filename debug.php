<?php
echo "=== DEBUG HEROKU ===<br><br>";

echo "1. JAWSDB_URL: " . (getenv('JAWSDB_URL') ? 'TROUVÉ' : 'NON TROUVÉ') . "<br>";
echo "2. DYNO: " . (isset($_SERVER['DYNO']) ? 'TROUVÉ' : 'NON TROUVÉ') . "<br>";

if (getenv('JAWSDB_URL')) {
    echo "3. URL complète: " . getenv('JAWSDB_URL') . "<br><br>";

    $url = parse_url(getenv('JAWSDB_URL'));
    echo "4. Host: " . $url["host"] . "<br>";
    echo "5. User: " . $url["user"] . "<br>";
    echo "6. Database: " . substr($url["path"], 1) . "<br>";
    echo "7. Port: " . $url["port"] . "<br><br>";
}

echo "8. Chargement config...<br>";
try {
    require_once('admin/bdd/config.php');
    echo "✅ Config chargé !<br>";

    echo "9. Test connexion...<br>";
    $db = Database::connect();
    echo "✅ CONNEXION RÉUSSIE !<br>";

} catch (Exception $e) {
    echo "❌ ERREUR: " . $e->getMessage() . "<br>";
}

// Test direct PDO
echo "<br>10. Test PDO direct...<br>";
if (getenv('JAWSDB_URL')) {
    try {
        $url = parse_url(getenv('JAWSDB_URL'));
        $pdo = new PDO(
            "mysql:host=" . $url["host"] . ";port=" . $url["port"] . ";dbname=" . substr($url["path"], 1),
            $url["user"],
            $url["pass"]
        );
        echo "✅ PDO DIRECT OK !<br>";
    } catch (Exception $e) {
        echo "❌ PDO DIRECT ERREUR: " . $e->getMessage() . "<br>";
    }
}
?>