<?php
require_once('../assets/controllers/user.php');
// récuperation de la methode et de l'url

$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$endpoint = $data['endpoint'] ?? 'default';

// Reponse JSON 

header('Content-Type: application/json');


$user = new User();

$userData = $user->getUserById(1);

if ($endpoint === 'test') {
    echo json_encode(['message' => 'Endpoint TEST fonctionne !', 'data' => 'Données de test']);
} else if ($endpoint === 'users') {
    echo json_encode(['utilisateur' => $userData]);
} else if ($endpoint === 'create') {
    // Créer un utilisateur de test
    $result = $user->createUser(
        $data['nom'],
        $data['prenom'],
        $data['pseudo'],
        $data['email'],
        $data['mdp'],
        $data['date_naissance'],
        $data['adresse'] ?? '',
        $data['codePostal'] ?? 0,
        $data['ville'] ?? '',
        $data['permis'] ?? NULL,
        20,
        'passager'
    );
    echo json_encode(['message' => 'Utilisateur créé', 'result' => $result]);
} else {
    echo json_encode(['message' => 'API fonctionne', 'url' => $url, 'method' => $method]);
}



