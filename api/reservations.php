<?php
require_once('../assets/controllers/reservation.php');
$url = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$endpoint = $data['endpoint'] ?? 'default';

header('Content-Type: application/json');

session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Utilisateur non connecté']);
    exit;
}

$reservation = new Reservation();


if ($endpoint === 'by-id') {
    $id = $data['id'] ?? 0;
    $data = $reservation->getReservationById($id);
    echo json_encode(['reservation' => $data]);
} else if ($endpoint === 'create') {
    $covoiturage_id = $data['covoiturage_id'] ?? 0;
    $passager_id = $_SESSION['user_id'];
    $statut = $data['statut'] ?? 'en_attente';
    $result = $reservation->createReservation($covoiturage_id, $passager_id, $statut);
    if ($result === 1) {
        echo json_encode(['message' => 'Réservation créée', 'result' => 1]);
    } else {
        // Ici tu pourrais vérifier pourquoi ça a échoué
        echo json_encode(['message' => 'Réservation impossible (déjà existante, crédits insuffisants ou plus de places)', 'result' => 0]);
    }
} else if ($endpoint === 'delete') {
    $id = $data['id'] ?? 0;
    $result = $reservation->deleteReservation($id);
    echo json_encode(['message' => 'Réservation supprimée', 'result' => $result]);
} else if ($endpoint === 'getMyReservations') {
    $user_id = $_SESSION['user_id'];
    $result = $reservation->getReservationsByUserId($user_id);
    echo json_encode(['message' => 'Mes Réservations', 'result' => $result]);
} else {
    echo json_encode(['message' => 'API Reservation fonctionne']);
}