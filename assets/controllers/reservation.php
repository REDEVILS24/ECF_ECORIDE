<?php
require_once("./admin/bdd/config.php");

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
        $sql = "SELECT prix, places_disponibles FROM covoiturage WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$covoiturage_id]);
        $result = $stmt->fetch();



        if ($result["prix"] >= 1 && $result["places_disponibles"] >= 1) {
            $reservation = "INSERT INTO reservation (covoiturage_id, passager_id, statut) VALUES(?,?,?) ";
            $majCredit = "UPDATE utilisateur SET credits = credits - ? WHERE id = ?";
            $majPlaceDispo = "UPDATE covoiturage SET places_disponibles = places_disponibles-1 WHERE id = ?";

            $stmtRes = $this->db->prepare($reservation);
            $stmtCredit = $this->db->prepare($majCredit);
            $stmtPlace = $this->db->prepare($majPlaceDispo);

            $stmtRes->execute([$covoiturage_id, $passager_id, $statut]);
            $stmtCredit->execute([$result['prix'], $passager_id]);
            $stmtPlace->execute([$covoiturage_id]);
        }

        return $stmtRes->rowCount();
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
}

