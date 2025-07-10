<?php
require_once('./assets/controllers/covoiturage.php');

$endpoint = $_GET['endpoint'] ?? 'default';
header('Content-Type: application/json');

$covoiturage = new Covoiturage();

if ($endpoint === 'all') {
    $data = $covoiturage->getAllCovoiturage();
    echo json_encode(['covoiturages' => $data]);
} else if ($endpoint === 'search') {
    $depart = $_GET['depart'] ?? '';
    $arrivee = $_GET['arrivee'] ?? '';
    $data = $covoiturage->searchCovoiturage($depart, $arrivee);
    echo json_encode(['results' => $data]);
} else {
    echo json_encode(['message' => 'API Covoiturage fonctionne']);
}