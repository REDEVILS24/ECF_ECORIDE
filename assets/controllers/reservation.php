<?php
require_once("../admin/bdd/config.php");

class Reservation
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getReservationById($id)
    {
        $sql = "SELECT * FROM reservation WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }


    public function createReservation($covoiturage_id, $passager_id, $statut)
    {
        // Vérification covoiturage
        $sql = "SELECT prix, places_disponibles FROM covoiturage WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$covoiturage_id]);
        $result = $stmt->fetch();

        if (!$result) {
            error_log("ERREUR: Covoiturage inexistant - ID: " . $covoiturage_id);
            return false;
        }

        // Vérification utilisateur
        $sqlUser = "SELECT credits FROM utilisateur WHERE id = ?";
        $stmtUser = $this->db->prepare($sqlUser);
        $stmtUser->execute([$passager_id]);
        $resultUser = $stmtUser->fetch();

        if (!$resultUser) {
            error_log("ERREUR: Utilisateur inexistant - ID: " . $passager_id);
            return false;
        }

        // Debug valeurs
        error_log("DEBUG: Crédits=" . $resultUser["credits"] . ", Prix=" . $result["prix"] . ", Places=" . $result["places_disponibles"]);

        $sqlCheck = "SELECT id FROM reservation WHERE covoiturage_id = ? AND passager_id = ?";
        $stmtCheck = $this->db->prepare($sqlCheck);
        $stmtCheck->execute([$covoiturage_id, $passager_id]);
        $existingReservation = $stmtCheck->fetch();

        if ($existingReservation) {
            error_log("ERREUR: Réservation déjà existante pour ce trajet");
            return false; // Ou return un code d'erreur spécifique
        }

        // Vérification condition
        if ((float) $resultUser["credits"] >= (float) $result["prix"] && (int) $result["places_disponibles"] >= 1) {

            error_log("CONDITION OK - Début des requêtes");

            // Préparation requêtes
            $reservation = "INSERT INTO reservation (covoiturage_id, passager_id, statut) VALUES(?,?,?)";
            $majCredit = "UPDATE utilisateur SET credits = credits - ? WHERE id = ?";
            $majPlaceDispo = "UPDATE covoiturage SET places_disponibles = places_disponibles - 1 WHERE id = ?";

            $stmtRes = $this->db->prepare($reservation);
            $stmtCredit = $this->db->prepare($majCredit);
            $stmtPlace = $this->db->prepare($majPlaceDispo);

            // Exécution avec vérification
            $resultRes = $stmtRes->execute([$covoiturage_id, $passager_id, $statut]);
            $resultCredit = $stmtCredit->execute([$result['prix'], $passager_id]);
            $resultPlace = $stmtPlace->execute([$covoiturage_id]);

            // Debug des résultats
            error_log("INSERT réservation: " . ($resultRes ? "SUCCESS" : "FAILED"));
            error_log("UPDATE crédits: " . ($resultCredit ? "SUCCESS" : "FAILED"));
            error_log("UPDATE places: " . ($resultPlace ? "SUCCESS" : "FAILED"));
            error_log("RowCount INSERT: " . $stmtRes->rowCount());

            // Vérification finale
            if ($resultRes && $resultCredit && $resultPlace) {
                error_log("TOUTES LES REQUÊTES OK");
                return 1;
            } else {
                error_log("UNE OU PLUSIEURS REQUÊTES ONT ÉCHOUÉ");
                return false;
            }

        } else {
            error_log("CONDITION ÉCHOUE - Crédits insuffisants ou plus de places");
            return false;
        }
    }


    public function updateReservation($id, $statut)
    {
        $sql = "UPDATE reservation SET statut = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$statut, $id]);
        return $stmt->rowCount();

    }

    public function deleteReservation($id)
    {

        // Récuperation des infos 

        $sql = "SELECT r.covoiturage_id, r.passager_id, c.prix FROM reservation r JOIN covoiturage c ON r.covoiturage_id = c.id WHERE r.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        // Update des infos 

        $majCredit = "UPDATE utilisateur SET credits = credits + ? WHERE id = ?";
        $majPlaceDispo = "UPDATE covoiturage SET places_disponibles = places_disponibles + 1 WHERE id = ?";

        $stmtCredit = $this->db->prepare($majCredit);
        $stmtPlace = $this->db->prepare($majPlaceDispo);

        $stmtCredit->execute([$result['prix'], $result['passager_id']]);
        $stmtPlace->execute([$result['covoiturage_id']]);

        // Suppression des infos 

        $sqlDelete = "DELETE FROM reservation WHERE id = ?";
        $stmt = $this->db->prepare($sqlDelete);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
    public function getReservationsByUserId($user_id)
    {
        $sql = "SELECT c.ville_depart, c.ville_arrivee, c.date_depart, c.prix, r.id, r.statut FROM covoiturage c INNER JOIN reservation r on c.id=r.covoiturage_id WHERE r.passager_id = ? ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll();

        return $result;
    }
}

