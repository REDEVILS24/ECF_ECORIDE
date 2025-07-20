-- ========================================
-- ECORIDE - DONNÉES DE TEST
-- Projet ECF - Développeur Web et Web Mobile
-- Date : Juillet 2025
-- ========================================

-- ========================================
-- DONNÉES DE TEST - UTILISATEURS
-- ========================================
INSERT INTO
    utilisateur (
        nom,
        prenom,
        pseudo,
        email,
        mdp,
        dateDeNaissance,
        adresse,
        ville,
        codePostal,
        credits,
        role,
        permis
    )
VALUES (
        'Admin',
        'Super',
        'admin',
        'admin@ecoride.com',
        'Admin123!',
        '1985-01-10',
        '1 place de la République',
        'Marseille',
        13001,
        100,
        'admin',
        'ADMIN001'
    ),
    (
        'Dupont',
        'Marie',
        'marie_driver',
        'conducteur@test.com',
        'Conduc123!',
        '1988-03-15',
        '15 rue de la Paix',
        'Paris',
        75001,
        75,
        'chauffeur',
        'CONDUC001'
    ),
    (
        'Martin',
        'Jean',
        'jean_pass',
        'passager@test.com',
        'Pass123!',
        '1992-07-22',
        '8 avenue des Fleurs',
        'Lyon',
        69001,
        50,
        'passager',
        'PASS001'
    );

-- ========================================
-- DONNÉES DE TEST - COVOITURAGES
-- ========================================
INSERT INTO
    covoiturage (
        conducteur_id,
        ville_depart,
        ville_arrivee,
        date_depart,
        prix,
        places_disponibles
    )
VALUES (
        2,
        'Paris',
        'Lyon',
        '2025-07-20 08:00:00',
        35.50,
        3
    ),
    (
        2,
        'Lyon',
        'Marseille',
        '2025-07-21 14:30:00',
        28.00,
        2
    ),
    (
        2,
        'Marseille',
        'Nice',
        '2025-07-22 10:15:00',
        22.00,
        4
    );

-- ========================================
-- DONNÉES DE TEST - RÉSERVATIONS
-- ========================================
INSERT INTO
    reservation (
        covoiturage_id,
        passager_id,
        statut
    )
VALUES (1, 3, 'confirmee'),
    (2, 3, 'en_attente');