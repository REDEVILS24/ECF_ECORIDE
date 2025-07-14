<?php
require_once('../assets/controllers/MongoDb.php');
// récuperation de la methode et de l'url

$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$endpoint = $data['endpoint'] ?? 'default';

session_start();
$utilisateur_id = $_SESSION['user_id'] ?? null;
// Reponse JSON 

header('Content-Type: application/json');

$mongo = new MongoDb();

$preferences = $mongo->getPreferences();


if ($endpoint === 'all') {
    echo json_encode([
        'message' => 'Preferences récupérées',
        'count' => count($preferences),
        'data' => $preferences
    ]);
} else if ($endpoint === 'insert') {

    $donnees = [
        'fumeur_accepte' => $data['fumeur_accepte'] ?? false,
        'animaux_acceptes' => $data['animaux_acceptes'] ?? false,
        'type_musique' => $data['type_musique'] ?? '',
        'discussion' => $data['discussion'] ?? '',
        'temperature' => $data['temperature'] ?? '',
        'pauses' => $data['pauses'] ?? false,
        'utilisateur_id' => $utilisateur_id,
        'date_creation' => date('Y-m-d H:i:s')
    ];

    $resultat = $mongo->insertPreference($donnees);

    echo json_encode([
        'message' => 'Preferences créé',
        'result' => $resultat
    ]);
} else if ($endpoint === 'update') {
    $id = $_GET['id'] ?? '';

    $donnees = [
        'fumeur_accepte' => $data['fumeur_accepte'] ?? false,
        'animaux_acceptes' => $data['animaux_acceptes'] ?? false,
        'type_musique' => $data['type_musique'] ?? '',
        'discussion' => $data['discussion'] ?? '',
        'temperature' => $data['temperature'] ?? '',
        'pauses' => $data['pauses'] ?? false,
        'utilisateur_id' => $utilisateur_id,
    ];

    $resultat = $mongo->updatePreference($id, $donnees);

    echo json_encode([
        'message' => 'Préferences modifiée',
        'result' => $resultat
    ]);
} else if ($endpoint === 'delete') {

    $id = $_GET['id'] ?? '';

    $resultat = $mongo->deletePreference($id);

    echo json_encode([
        'message' => 'Preference supprimer',
        'result' => $resultat
    ]);
}