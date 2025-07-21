<?php
require_once('admin/bdd/config.php');

echo "=== TEST INSCRIPTION DIRECT ===<br><br>";

try {
    $pdo = Database::connect();
    echo "✅ BDD connectée !<br>";

    // Test d'insertion d'utilisateur
    $stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, pseudo, email, mdp, date_naissance, adresse, code_postal, ville, num_permis, credits, statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $result = $stmt->execute([
        'Admin',
        'Test',
        'admin_test',
        'admin@ecoride.com',
        password_hash('Admin123!', PASSWORD_DEFAULT),
        '1990-01-01',
        '1 rue Admin',
        75000,
        'Paris',
        'ADMIN123',
        100,
        'admin'
    ]);

    if ($result) {
        echo "✅ INSCRIPTION RÉUSSIE !<br>";
        echo "🎯 Compte admin créé : admin@ecoride.com / Admin123!";
    } else {
        echo "❌ Erreur insertion";
    }

} catch (Exception $e) {
    echo "❌ ERREUR: " . $e->getMessage();
}
?>