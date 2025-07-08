<?php
require_once("./admin/bdd/config.php");


class User
{
    private $db;
    private int $id;
    private string $nom;
    private string $prenom;
    private string $pseudo;
    private string $email;
    private string $mdp;
    private $dateDeNaissance;
    private string $adresse;
    private int $codePostal;
    private string $ville;
    private string $permis;
    private int $credits;
    private string $role;


    public function __construct(
        int $id,
        string $nom,
        string $prenom,
        string $pseudo,
        string $email,
        string $mdp,
        $dateDeNaissance,
        string $adresse,
        int $codePostal,
        string $ville,
        string $permis,
        int $credits,
        string $role,
        $db
    ) {
        $this->db = Database::connect();
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->dateDeNaissance = $dateDeNaissance;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->permis = $permis;
        $this->credits = $credits;
        $this->role = $role;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM utilisateur WHERE id =?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$id]);

        $result = $stmt->fetch();

        return $result;
    }
    public function createUser(

        $nom,
        $prenom,
        $pseudo,
        $email,
        $mdp,
        $dateDeNaissance,
        $adresse,
        $codePostal,
        $ville,
        $permis,
        $credits,
        $role
    ) {
        $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateur (nom, prenom, pseudo, email, mdp, dateDeNaissance, adresse, codePostal, ville, permis, credits, role) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $nom,
            $prenom,
            $pseudo,
            $email,
            $hashedMdp,
            $dateDeNaissance,
            $adresse,
            $codePostal,
            $ville,
            $permis,
            $credits,
            $role
        ]);
        return $stmt->rowCount();
    }

    public function updateUser(
        $nom,
        $prenom,
        $pseudo,
        $email,
        $mdp,
        $dateDeNaissance,
        $adresse,
        $codePostal,
        $ville,
        $permis,
        $credits,
        $role,
        $id
    ) {
        $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "UPDATE utilisateur SET nom=?, prenom=?, pseudo=?, email=?, mdp=?, dateDeNaissance=?, adresse=?, codePostal=?, ville=?, permis=?, credits=?, role=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $nom,
            $prenom,
            $pseudo,
            $email,
            $hashedMdp,
            $dateDeNaissance,
            $adresse,
            $codePostal,
            $ville,
            $permis,
            $credits,
            $role,
            $id
        ]);
        return $stmt->rowCount();
    }


    public function deleteUser($id)
    {
        $sql = "DELETE FROM utilisateur WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

}
