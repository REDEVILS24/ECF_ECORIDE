<?php
require_once('admin/bdd/config.php');

echo "=== CRÉATION COMPTES DE TEST ===<br><br>";

try {
    $pdo = Database::connect();
    echo "✅ BDD connectée !<br><br>";

    // Compte Conducteur
    $stmt = $pdo->prepare("INSERT IGNORE INTO utilisateur (nom, prenom, pseudo, email, mdp, date_naissance, adresse, code_postal, ville, num_permis, credits, statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $result1 = $stmt->execute([
        'Martin',
        'Jean',
        'conducteur_test',
        'conducteur@test.com',
        password_hash('Conduc123!', PASSWORD_DEFAULT),
        '1985-05-15',
        '2 rue Conducteur',
        69000,
        'Lyon',
        'CONDUC456',
        75,
        'chauffeur'
    ]);

    if ($result1)
        echo "✅ Conducteur créé : conducteur@test.com / Conduc123!<br>";

    // Compte Passager
    $result2 = $stmt->execute([
        'Dupont',
        'Marie',
        'passager_test',
        'passager@test.com',
        password_hash('Pass123!', PASSWORD_DEFAULT),
        '1992-03-20',
        '3 rue Passager',
        13000,
        'Marseille',
        'PASS789',
        50,
        'passager'
    ]);

    if ($result2)
        echo "✅ Passager créé : passager@test.com / Pass123!<br>";

    echo "<br>🎯 TOUS LES COMPTES DE TEST SONT PRÊTS !";

} catch (Exception $e) {
    echo "❌ ERREUR: " . $e->getMessage();
}
?>