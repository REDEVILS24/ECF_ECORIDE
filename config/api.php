<?php
require_once('../assets/controllers/User.php');
// récuperation de la methode et de l'url

$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$endpoint = $_GET['endpoint'] ?? 'default';

// Reponse JSON 

header('Content-Type: application/json');


$user = new User(1, "test", "test", "test", "test", "test", "test", "test", 1, "test", "test", 1, "test", null);

$userData = $user->getUserById(1);

if ($endpoint === 'test') {
    echo json_encode(['message' => 'Endpoint TEST fonctionne !', 'data' => 'Données de test']);
} else if ($endpoint === 'users') {
    echo json_encode(['utilisateur' => $userData]);
} else if ($endpoint === 'create-user') {
    // Créer un utilisateur de test
    $result = $user->createUser(
        "Dupont",
        "Jean",
        "jean123",
        "jean@test.com",
        "password123",
        "1990-01-01",
        "1 rue Test",
        75000,
        "Paris",
        "12345",
        20,
        "passager"
    );
    echo json_encode(['message' => 'Utilisateur créé', 'result' => $result]);
} else {
    echo json_encode(['message' => 'API fonctionne', 'url' => $url, 'method' => $method]);
}



