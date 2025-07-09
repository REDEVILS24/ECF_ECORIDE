<?php
require_once("./admin/bdd/config.php");

class Reservation
{
    private $db;
    private int $id;
    private int $covoiturage_id;
    private int $passager_id;
    private $date_reservation;
    private string $statut;

    public function __construct($db, int $id, int $covoiturage_id, int $passager_id, $date_reservation, string $statut)
    {
        $this->id = $id;
        $this->covoiturage_id = $covoiturage_id;
        $this->passager_id = $passager_id;
        $this->date_reservation = $date_reservation;
        $this->statut = $statut;
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


    }
}

