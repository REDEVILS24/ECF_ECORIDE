<?php
require_once('admin/bdd/config.php');

echo "=== CRÉATION DES TABLES ECORIDE ===<br><br>";

try {
    $pdo = Database::connect();

    // Table utilisateur
    $pdo->exec("CREATE TABLE IF NOT EXISTS utilisateur (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(50),
        prenom VARCHAR(50),
        pseudo VARCHAR(50) UNIQUE,
        email VARCHAR(100) UNIQUE,
        mdp VARCHAR(255),
        date_naissance DATE,
        adresse VARCHAR(255),
        code_postal INT,
        ville VARCHAR(50),
        num_permis VARCHAR(50),
        credits INT DEFAULT 50,
        statut ENUM('visiteur', 'utilisateur', 'chauffeur', 'passager', 'employe', 'admin') DEFAULT 'visiteur'
    )");
    echo "✅ Table utilisateur créée !<br>";

    // Table covoiturage
    $pdo->exec("CREATE TABLE IF NOT EXISTS covoiturage (
        id INT AUTO_INCREMENT PRIMARY KEY,
        conducteur_id INT,
        ville_depart VARCHAR(100),
        ville_arrivee VARCHAR(100),
        date_depart DATE,
        heure_depart TIME,
        date_arrivee DATE,
        heure_arrivee TIME,
        prix DECIMAL(10,2),
        places_disponibles INT,
        statut ENUM('actif', 'complet', 'termine', 'annule') DEFAULT 'actif',
        FOREIGN KEY (conducteur_id) REFERENCES utilisateur(id)
    )");
    echo "✅ Table covoiturage créée !<br>";

    // Table reservation
    $pdo->exec("CREATE TABLE IF NOT EXISTS reservation (
        id INT AUTO_INCREMENT PRIMARY KEY,
        covoiturage_id INT,
        passager_id INT,
        statut ENUM('en_attente', 'confirmee', 'annulee') DEFAULT 'en_attente',
        date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (covoiturage_id) REFERENCES covoiturage(id),
        FOREIGN KEY (passager_id) REFERENCES utilisateur(id)
    )");
    echo "✅ Table reservation créée !<br><br>";

    echo "🎉 TOUTES LES TABLES SONT PRÊTES !";

} catch (Exception $e) {
    echo "❌ ERREUR: " . $e->getMessage();
}
?>