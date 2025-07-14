DROP TABLE IF EXISTS covoiturage;

DROP TABLE IF EXISTS user;

DROP TABLE IF EXISTS utilisateur;

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    pseudo VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    dateDeNaissance DATE NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    ville VARCHAR(150) NOT NULL,
    codePostal INT(6) NOT NULL,
    credits INT DEFAULT 20,
    role ENUM(
        "visiteur",
        "passager",
        "chauffeur",
        "employe",
        "admin"
    ) DEFAULT "visiteur",
    permis VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE covoiturage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conducteur_id INT NOT NULL,
    ville_depart VARCHAR(100) NOT NULL,
    ville_arrivee VARCHAR(100) NOT NULL,
    date_depart DATETIME NOT NULL,
    prix DECIMAL(6, 2) NOT NULL,
    places_disponibles INT NOT NULL,
    FOREIGN KEY (conducteur_id) REFERENCES utilisateur (id)
)

CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    covoiturage_id INT NOT NULL,
    passager_id INT NOT NULL,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    statut ENUM(
        "en_attente",
        "confirmee",
        "annulee"
    ) DEFAULT "en_attente",
    FOREIGN KEY (covoiturage_id) REFERENCES covoiturage (id),
    FOREIGN KEY (passager_id) REFERENCES utilisateur (id)
)

ALTER TABLE utilisateur ADD COLUMN nom VARCHAR(100) AFTER id;

ALTER TABLE utilisateur ADD COLUMN prenom VARCHAR(100) AFTER nom;

ALTER TABLE utilisateur ADD COLUMN date_naissance DATE AFTER email;

ALTER TABLE utilisateur
ADD COLUMN adresse VARCHAR(255) AFTER date_naissance;

ALTER TABLE utilisateur ADD COLUMN code_postal INT AFTER adresse;

ALTER TABLE utilisateur
ADD COLUMN ville VARCHAR(100) AFTER code_postal;

ALTER TABLE utilisateur ADD COLUMN telephone VARCHAR(20) AFTER ville;

ALTER TABLE utilisateur
ADD COLUMN photo_profil VARCHAR(255) AFTER telephone;

ALTER TABLE utilisateur
ADD COLUMN date_premiere_circulation DATE AFTER photo_profil;

ALTER TABLE covoiturage
ADD COLUMN heure_depart TIME AFTER date_depart;

ALTER TABLE covoiturage
ADD COLUMN heure_arrivee TIME AFTER ville_arrivee;