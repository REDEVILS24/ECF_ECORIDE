<?php
require_once("../admin/bdd/config.php");


class Covoiturage
{
    private $db;


    public function __construct()
    {
        $this->db = Database::connect();

    }

    public function getCovoiturageById($id)
    {
        $sql = "SELECT * FROM covoiturage WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function createCovoiturage($conducteur_id, $ville_depart, $ville_arrivee, $date_depart, $heure_depart, $prix, $places_disponibles)
    {
        $sql = "INSERT INTO covoiturage(conducteur_id,ville_depart, ville_arrivee, date_depart, heure_depart, prix, places_disponibles) VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$conducteur_id, $ville_depart, $ville_arrivee, $date_depart, $heure_depart, $prix, $places_disponibles]);
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

    public function getAllCovoiturage()
    {
        $sql = "SELECT   c.id, 
        c.conducteur_id, 
        c.ville_depart, 
        c.ville_arrivee, 
        c.date_depart, 
        c.heure_depart, 
        c.prix, 
        c.places_disponibles,
        u.pseudo  FROM covoiturage c 
INNER JOIN utilisateur u ON c.conducteur_id = u.id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function searchCovoiturage($ville_depart, $ville_arrivee)
    {
        $sql = "SELECT * FROM covoiturage WHERE ville_depart =?, ville_arrivee=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$ville_depart, $ville_arrivee]);
        return $stmt->fetchAll();
    }

    public function getCovoituragesByUser($conducteur_id)
    {
        $sql = "SELECT * FROM covoiturage WHERE conducteur_id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$conducteur_id]);
        return $stmt->fetchAll();
    }

}