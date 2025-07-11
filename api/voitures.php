<?php
require_once('../assets/controllers/MongoDb.php');
// récuperation de la methode et de l'url

$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$endpoint = $_GET['endpoint'] ?? 'default';

// Reponse JSON 

header('Content-Type: application/json');

$mongo = new MongoDb();

$voitures = $mongo->getVoitures();


if ($endpoint === 'all') {
    echo json_encode([
        'message' => 'Voitures récupérées',
        'count' => count($voitures),
        'data' => $voitures
    ]);
} else if ($endpoint === 'insert') {
    $donnees = [
        'marque' => $_GET['marque'] ?? '',
        'modele' => $_GET['modele'] ?? '',
        'couleur' => $_GET['couleur'] ?? '',
        'electrique' => $_GET['electrique'] ?? false,
        'proprietaire_id' => $_GET['proprietaire_id'] ?? 0
    ];
    $resultat = $mongo->insertVoiture($donnees);

    echo json_encode([
        'message' => 'Voiture créée',
        'result' => $resultat
    ]);
} else if ($endpoint === 'update') {
    $id = $_GET['id'] ?? '';

    $donnees = [
        'marque' => $_GET['marque'] ?? '',
        'modele' => $_GET['modele'] ?? '',
        'couleur' => $_GET['couleur'] ?? '',
        'electrique' => $_GET['electrique'] ?? false,
        'proprietaire_id' => $_GET['proprietaire_id'] ?? 0
    ];

    $resultat = $mongo->updateVoitures($id, $donnees);

    echo json_encode([
        'message' => 'Voiture modifiée',
        'result' => $resultat
    ]);
} else if ($endpoint === 'delete') {

    $id = $_GET['id'] ?? '';

    $resultat = $mongo->deleteVoiture($id);

    echo json_encode([
        'message' => 'Voiture supprimer',
        'result' => $resultat
    ]);
}