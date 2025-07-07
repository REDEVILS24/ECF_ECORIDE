CREATE TABLE user (
    id int AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    credits INT DEFAULT 20,
    role ENUM(
        'visiteur',
        'passager',
        'chauffeur',
        'employe',
        'admin'
    ) DEFAULT 'visiteur'
);

INSERT INTO
    user (
        pseudo,
        email,
        password,
        credits,
        role
    )
VALUES (
        'admin',
        'admin@ecoride.fr',
        SHA2('password123', 256),
        100,
        'admin'
    );