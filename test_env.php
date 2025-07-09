<?php
require_once 'admin/bdd/config.php';

echo "🔍 Test de la connexion avec .env<br>";

try {
    $db = Database::connect();
    echo "✅ Connexion réussie avec .env !<br>";
    echo "🗃️ Base de données : " . $_ENV['DB_NAME'] . "<br>";
    echo "👤 Utilisateur : " . $_ENV['DB_USER'] . "<br>";
} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage();
}
?>