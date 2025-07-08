<?php
require_once("assets/controllers/user.php");

$user = new User(1, "Test", "User", "testeur", "test@email.com", "password123", "1990-01-01", "1 rue Test", 12345, "TestVille", "PERMIT123", 20, "visiteur", null);

$result = $user->createUser(
    "Securite",
    "Test",
    "secureuser888",        // ← NOUVEAU pseudo
    "secure888@test.com",   // ← NOUVEAU email
    "MonMotDePasseSecret123!",
    "1990-12-25",
    "10 rue Sécurisée",
    75000,
    "Paris",
    111888,                 // ← NOUVEAU permis
    25,
    "chauffeur"
);

echo "✅ Utilisateur créé (hashé) : " . $result . "<br>";

// Tester plusieurs IDs pour trouver le bon
for ($id = 12; $id <= 20; $id++) {
    $userData = $user->getUserById($id);
    if ($userData && $userData['pseudo'] == 'secureuser888') {
        echo "🎯 Trouvé ! ID: $id<br>";
        echo "🔒 Mot de passe hashé : " . $userData['mdp'] . "<br>";
        echo "📏 Longueur : " . strlen($userData['mdp']) . "<br>";
        break;
    }
}