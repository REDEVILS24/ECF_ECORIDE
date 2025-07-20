-- ========================================
-- ECORIDE - STRUCTURE DE LA BASE DE DONNÉES
-- Projet ECF - Développeur Web et Web Mobile
-- Date : Juillet 2025
-- ========================================

-- Suppression des tables si elles existent (dans l'ordre des dépendances)
DROP TABLE IF EXISTS reservation;

DROP TABLE IF EXISTS covoiturage;

DROP TABLE IF EXISTS utilisateur;

-- ========================================
-- TABLE UTILISATEUR
-- ========================================
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

-- ========================================
-- TABLE COVOITURAGE
-- ========================================
CREATE TABLE covoiturage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conducteur_id INT NOT NULL,
    ville_depart VARCHAR(100) NOT NULL,
    ville_arrivee VARCHAR(100) NOT NULL,
    date_depart DATETIME NOT NULL,
    prix DECIMAL(6, 2) NOT NULL,
    places_disponibles INT NOT NULL,
    FOREIGN KEY (conducteur_id) REFERENCES utilisateur (id)
);

-- ========================================
-- TABLE RESERVATION
-- ========================================
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
);