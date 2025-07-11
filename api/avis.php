<?php
require_once('../assets/controllers/MongoDb.php');
// récuperation de la methode et de l'url

$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$endpoint = $_GET['endpoint'] ?? 'default';

// Reponse JSON 

header('Content-Type: application/json');

$mongo = new MongoDb();

$avis = $mongo->getAvis();


if ($endpoint === 'all') {
    echo json_encode([
        'message' => 'Avis récupérés',
        'count' => count($avis),
        'data' => $avis
    ]);
} else if ($endpoint === 'insert') {
    $donnees = [
        'trajet_id' => $_GET['trajet_id'] ?? 0,
        'utilisateur_id' => $_GET['utilisateur_id'] ?? 0,
        'note' => $_GET['note'] ?? 0,
        'commentaire' => $_GET['commentaire'] ?? ''
    ];
    $resultat = $mongo->insertAvis($donnees);

    echo json_encode([
        'message' => 'Avis créé',
        'result' => $resultat
    ]);
} else if ($endpoint === 'update') {
    $id = $_GET['id'] ?? '';

    $donnees = [
        'trajet_id' => $_GET['trajet_id'] ?? 0,
        'utilisateur_id' => $_GET['utilisateur_id'] ?? 0,
        'note' => $_GET['note'] ?? 0,
        'commentaire' => $_GET['commentaire'] ?? ''
    ];

    $resultat = $mongo->updateAvis($id, $donnees);

    echo json_encode([
        'message' => 'Avis modifiée',
        'result' => $resultat
    ]);
} else if ($endpoint === 'delete') {

    $id = $_GET['id'] ?? '';

    $resultat = $mongo->deleteAvis($id);

    echo json_encode([
        'message' => 'Avis supprimer',
        'result' => $resultat
    ]);
}