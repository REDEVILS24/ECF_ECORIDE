<?php
require_once('./assets/controllers/MongoDb.php');

try {
    $mongo = new MongoDb();
    echo "✅ Connexion MongoDB réussie !";
} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage();
}
