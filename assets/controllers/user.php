<?php
require_once("../admin/bdd/config.php");


class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();

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
        $date_naissance,
        $adresse,
        $codePostal,
        $ville,
        $permis,
        $credits,
        $role
    ) {
        $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateur (nom, prenom, pseudo, email, mdp, date_naissance, adresse, codePostal, ville, permis, credits, role) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $nom,
            $prenom,
            $pseudo,
            $email,
            $hashedMdp,
            $date_naissance,
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
        $date_naissance,
        $adresse,
        $codePostal,
        $ville,
        $permis,
        $credits,
        $role,
        $id
    ) {
        $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "UPDATE utilisateur SET nom=?, prenom=?, pseudo=?, email=?, mdp=?, date_naissance=?, adresse=?, codePostal=?, ville=?, permis=?, credits=?, role=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $nom,
            $prenom,
            $pseudo,
            $email,
            $hashedMdp,
            $date_naissance,
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

    public function login($email, $password)
    {
        $sql = "SELECT * FROM utilisateur WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mdp'])) {
            return $user; // Connexion réussie
        }
        return false; // Échec
    }

    public function updateCredits($userId, $montant)
    {
        $sql = "UPDATE utilisateur SET credits = credits + ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$montant, $userId]);
        return $stmt->rowCount();
    }

    public function getCredits($userId)
    {
        $sql = "SELECT credits FROM utilisateur WHERE id =?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        $result = $stmt->fetch();
        return $result ? $result['credits'] : 0;

    }




}
