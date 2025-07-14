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

session_start();

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
} else if ($endpoint === 'login') {
    // Connexion utilisateur
    $loginResult = $user->login($data['email'], $data['mdp']);

    if ($loginResult) {
        // Démarrer une session
        session_start();
        $_SESSION['user_id'] = $loginResult['id'];
        $_SESSION['user_email'] = $loginResult['email'];

        echo json_encode([
            'message' => 'Connexion réussie',
            'result' => 1,
            'user' => $loginResult
        ]);
    } else {
        echo json_encode([
            'message' => 'Email ou mot de passe incorrect',
            'result' => 0
        ]);
    }

} else if ($endpoint === 'profile') {
    $userData = $user->getUserById($_SESSION['user_id']);
    echo json_encode(['user' => $userData]);
} else {
    echo json_encode(['message' => 'API fonctionne', 'url' => $url, 'method' => $method]);
}



