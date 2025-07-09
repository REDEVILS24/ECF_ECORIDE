-- Donnée de test
-- Données de test UTILISATEUR

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
        'Dupont',
        'Marie',
        'marie_driver',
        'marie@conducteur.com',
        'password123',
        '1988-03-15',
        '15 rue de la Paix',
        'Paris',
        75001,
        50,
        'chauffeur',
        12345
    ),
    (
        'Martin',
        'Jean',
        'jean_pass',
        'jean@passager.com',
        'password123',
        '1992-07-22',
        '8 avenue des Fleurs',
        'Lyon',
        69001,
        20,
        'passager',
        23456
    ),
    (
        'Admin',
        'Super',
        'admin',
        'admin@ecoride.fr',
        'adminpass123',
        '1985-01-10',
        '1 place de la République',
        'Marseille',
        13001,
        100,
        'admin',
        34567
    );

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
        4,
        'Paris',
        'Lyon',
        '2025-07-15 08:00:00',
        35.50,
        3
    ),
    (
        4,
        'Lyon',
        'Marseille',
        '2025-07-16 14:30:00',
        28.00,
        2
    ),
    (
        4,
        'Marseille',
        'Nice',
        '2025-07-17 10:15:00',
        22.00,
        4
    );

INSERT INTO
    reservation (
        covoiturage_id,
        passager_id,
        statut
    )
VALUES (12, 5, 'confirmee'),
    (13, 5, 'en_attente'),
    (14, 5, 'confirmee');

SELECT *, pseudo FROM utilisateur;

SELECT id, ville_depart, ville_arrivee FROM covoiturage;

DELETE FROM reservation;

-- 2. Supprimer les covoiturages ensuite
DELETE FROM covoiturage;

-- 3. Enfin supprimer les utilisateurs
DELETE FROM utilisateur;