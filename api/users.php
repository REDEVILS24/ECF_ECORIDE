<?php
require_once('../assets/controllers/user.php');
// récuperation de la methode et de l'url

$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$endpoint = $data['endpoint'] ?? 'default';


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

    $loginResult = $user->login($data['email'], $data['mdp']);

    if ($loginResult) {
        // Démarrer une session
        $_SESSION['user_id'] = $loginResult['id'];
        $_SESSION['user_email'] = $loginResult['email'];
        $_SESSION['user_role'] = $loginResult['role'];

        echo json_encode([
            'message' => 'Connexion réussie',
            'result' => 1,
            'role' => $loginResult['role']
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
} else if ($endpoint === 'logout') {

    session_destroy();

    echo json_encode(['message' => 'Déconnexion réussie', 'result' => 1]);

} else if ($endpoint === 'checkSession') {

    if (isset($_SESSION['user_id'])) {
        echo json_encode(['connected' => true, 'user_id' => $_SESSION['user_id'], 'email' => $_SESSION['user_email'], 'role' => $_SESSION['user_role'] ?? 'utilisateur']);
    } else {
        echo json_encode(['connected' => false]);
    }
} else {
    echo json_encode(['message' => 'API fonctionne', 'url' => $url, 'method' => $method]);
}



