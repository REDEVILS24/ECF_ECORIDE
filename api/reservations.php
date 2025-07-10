<?php
require_once('./assets/controllers/reservation.php');

$endpoint = $_GET['endpoint'] ?? 'default';
header('Content-Type: application/json');

$reservation = new Reservation();

if ($endpoint === 'by-id') {
    $id = $_GET['id'] ?? 0;
    $data = $reservation->getReservationById($id);
    echo json_encode(['reservation' => $data]);
} else if ($endpoint === 'create') {
    $covoiturage_id = $_GET['covoiturage_id'] ?? 0;
    $passager_id = $_GET['passager_id'] ?? 0;
    $statut = $_GET['statut'] ?? 'en_attente';
    $result = $reservation->createReservation($covoiturage_id, $passager_id, $statut);
    echo json_encode(['message' => 'Réservation créée', 'result' => $result]);
} else if ($endpoint === 'delete') {
    $id = $_GET['id'] ?? 0;
    $result = $reservation->deleteReservation($id);
    echo json_encode(['message' => 'Réservation supprimée', 'result' => $result]);
} else {
    echo json_encode(['message' => 'API Reservation fonctionne']);
}