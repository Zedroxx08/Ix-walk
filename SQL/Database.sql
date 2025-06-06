CREATE SCHEMA IF NOT EXISTS ixwalk;
SET search_path TO ixwalk;

CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    mail VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    num VARCHAR(20) NOT NULL,
    pays VARCHAR(100) NOT NULL,
    adresse VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS chaussures (
    id SERIAL PRIMARY KEY,
    nom_chaussure VARCHAR(100) NOT NULL,
    taille INT NOT NULL,
    prix INT NOT NULL
);
CREATE TABLE IF NOT EXISTS chaussures_livraison (
    id SERIAL PRIMARY KEY,
    id_chaussure INT NOT NULL,
    id_user INT NOT NULL,
    a_livrer BOOLEAN DEFAULT True,
    FOREIGN KEY (id_chaussure) REFERENCES chaussures(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
);
INSERT INTO chaussures (nom_chaussure, taille, prix) VALUES
    ('Night Glow Runner', 42, 88),
    ('Neon Sunset Drift', 43, 91),
    ('Urban Fire Step', 44, 86),
    ('Cyber Cross Pulse', 41, 90),
    ('Aurora Rose Sprint', 37, 72),
    ('Coral Motion Flex', 38, 79),
    ('Peach Air Runner', 39, 84),
    ('Ruby Wave Light', 37, 76),
    ('Pink Stream Energy', 40, 90),
    ('Sunset Curve Max', 38, 81),
    ('Blush Edge Street', 39, 74),
    ('Storm Cloud Trek', 42, 92),
    ('Mint Rush Evo', 43, 95),
    ('Ocean Drive Runner', 44, 89),
    ('Volt Dash Prime', 41, 87),
    ('Mini Pop Splash', 22, 35),
    ('Tiny Trail Blush', 23, 38),
    ('Lil Rocket Zoom', 24, 42),
    ('Baby Step Air', 25, 41),
    ('Soft Bounce Peach', 21, 36);