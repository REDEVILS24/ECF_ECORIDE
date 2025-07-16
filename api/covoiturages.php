<?php
require_once('../assets/controllers/covoiturage.php');

session_start();

$json = file_get_contents('php://input');
$data = json_decode($json, true);



$conducteur_id = $_SESSION['user_id'] ?? null;

if (!$conducteur_id) {
    echo json_encode(['error' => 'Utilisateur non connecté']);
    exit;
}

$endpoint = $data['endpoint'] ?? 'default';
header('Content-Type: application/json');

$covoiturage = new Covoiturage();

if ($endpoint === 'all') {
    $data = $covoiturage->getAllCovoiturage();
    echo json_encode(['covoiturages' => $data]);

} else if ($endpoint === 'createCovoiturage') {

    $result = $covoiturage->createCovoiturage(
        $conducteur_id,
        $data['ville_depart'],
        $data['ville_arrivee'],
        $data['date_depart'],
        $data['heure_depart'],
        $data['prix'],
        $data['places_disponibles']
    );
    echo json_encode(['message' => 'Covoiturage créé', 'result' => $result]);
} else if ($endpoint === 'search') {
    $depart = $_GET['depart'] ?? '';
    $arrivee = $_GET['arrivee'] ?? '';
    $data = $covoiturage->searchCovoiturage($depart, $arrivee);
    echo json_encode(['results' => $data]);
} else {
    echo json_encode(['message' => 'API Covoiturage fonctionne']);
}