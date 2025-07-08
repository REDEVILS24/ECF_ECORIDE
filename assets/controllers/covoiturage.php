<?php
require_once("./admin/bdd/config.php");


class Covoiturage
{
    private $db;
    private int $id;
    private int $conducteur_id;
    private string $ville_depart;
    private string $ville_arrivee;
    private $date_depart;
    private float $prix;
    private int $places_disponibles;


    public function __construct(
        $db,
        $id,
        $conducteur_id,
        $ville_depart,
        $ville_arrivee,
        $date_depart,
        $prix,
        $places_disponibles
    ) {
        $this->db = Database::connect();
        $this->id = $id;
        $this->conducteur_id = $conducteur_id;
        $this->ville_depart = $ville_depart;
        $this->ville_arrivee = $ville_arrivee;
        $this->date_depart = $date_depart;
        $this->prix = $prix;
        $this->places_disponibles = $places_disponibles;
    }

    public function getCovoiturageById($id)
    {
        $sql = "SELECT * FROM covoiturage WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function createCovoiturage($conducteur_id, $ville_depart, $ville_arrivee, $date_depart, $prix, $places_disponibles)
    {
        $sql = "INSERT INTO covoiturage(conducteur_id,ville_depart, ville_arrivee, date_depart, prix, places_disponibles) VALUES(?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$conducteur_id, $ville_depart, $ville_arrivee, $date_depart, $prix, $places_disponibles]);
        return $stmt->rowCount();
    }

    public function updateCovoiturage($id, $ville_depart, $ville_arrivee, $date_depart, $prix, $places_disponibles)
    {
        $sql = "UPDATE  covoiturage SET ville_depart=?, ville_arrivee=?, date_depart=?, prix=?, places_disponibles=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $ville_depart,
            $ville_arrivee,
            $date_depart,
            $prix,
            $places_disponibles,
            $id
        ]);
        return $stmt->rowCount();
    }
    public function deleteCovoiturage($id)
    {
        $sql = "DELETE FROM covoiturage WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

}