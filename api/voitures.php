<?php
require_once('../assets/controllers/MongoDb.php');
// récuperation de la methode et de l'url

$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$endpoint = $data['endpoint'] ?? 'default';

session_start();
$proprietaire_id = $_SESSION['user_id'] ?? null;
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
        'marque' => $data['marque'] ?? '',
        'modele' => $data['modele'] ?? '',
        'couleur' => $data['couleur'] ?? '',
        'annee' => $data['annee'] ?? 2025,
        'energie' => $data['energie'] ?? "essence",
        'nb_places' => $data['nb_places'] ?? 2,
        'plaque' => $data['plaque'] ?? "",
        'photos' => $data['photos'] ?? [],
        'proprietaire_id' => $proprietaire_id
    ];
    $resultat = $mongo->insertVoiture($donnees);

    echo json_encode([
        'message' => 'Voiture créée',
        'result' => $resultat
    ]);
} else if ($endpoint === 'update') {
    $id = $_GET['id'] ?? '';

    $donnees = [
        'marque' => $data['marque'] ?? '',
        'modele' => $data['modele'] ?? '',
        'couleur' => $data['couleur'] ?? '',
        'annee' => $data['annee'] ?? 2025,
        'energie' => $data['energie'] ?? "essence",
        'proprietaire_id' => $proprietaire_id
    ];

    $resultat = $mongo->updateVoitures($id, $donnees);

    echo json_encode([
        'message' => 'Voiture modifiée',
        'result' => $resultat
    ]);
} else if ($endpoint === 'mes-voitures') {
    $mesVoitures = $mongo->getVoituresByUser($_SESSION['user_id']);
    echo json_encode(['voitures' => $mesVoitures]);
} else if ($endpoint === 'delete') {

    $id = $_GET['id'] ?? '';

    $resultat = $mongo->deleteVoiture($id);

    echo json_encode([
        'message' => 'Voiture supprimer',
        'result' => $resultat
    ]);
}