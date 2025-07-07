<?php
require_once 'admin/bdd/config.php';

echo "<h2>🔍 Test de connexion EcoRide</h2>";

try {
    $db = Database::connect();
    echo "✅ Connexion réussie à la base de données !<br>";

    // Test simple
    $query = $db->query("SHOW TABLES");
    $tables = $query->fetchAll();
    echo "📊 Nombre de tables : " . count($tables) . "<br>";

    if (count($tables) > 0) {
        echo "<ul>";
        foreach ($tables as $table) {
            echo "<li>" . $table[0] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "⚠️ Aucune table trouvée - il faut créer la structure !";
    }

} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage();
}
?>