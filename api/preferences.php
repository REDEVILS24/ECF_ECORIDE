<?php
require_once('../assets/controllers/MongoDb.php');
// récuperation de la methode et de l'url

$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$endpoint = $_GET['endpoint'] ?? 'default';

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
        'utilisateur_id' => $_GET['utilisateur_id'] ?? 0,
        'fumeur' => $_GET['fumeur'] ?? false,
        'animaux' => $_GET['animaux'] ?? false,
        'musique' => $_GET['musique'] ?? ''
    ];
    $resultat = $mongo->insertPreference($donnees);

    echo json_encode([
        'message' => 'Preferences créé',
        'result' => $resultat
    ]);
} else if ($endpoint === 'update') {
    $id = $_GET['id'] ?? '';

    $donnees = [
        'utilisateur_id' => $_GET['utilisateur_id'] ?? 0,
        'fumeur' => $_GET['fumeur'] ?? false,
        'animaux' => $_GET['animaux'] ?? false,
        'musique' => $_GET['musique'] ?? ''
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