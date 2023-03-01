-- Création de la table category
CREATE TABLE category (
    id TINYINT PRIMARY KEY,
    name VARCHAR(50) UNIQUE
);

-- Création de la table game_category
CREATE TABLE game_category (
    game_id TINYINT,
    category_id TINYINT,
    PRIMARY KEY (game_id, category_id),
    FOREIGN KEY (game_id) REFERENCES game(id),
    FOREIGN KEY (category_id) REFERENCES category(id)
);

-- Insertion de quelques catégories dans la table category
INSERT INTO category (id, name) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'Sport'),
(4, 'Stratégie'),
(5, 'Simulation');

-- Insertion des liens entre les jeux vidéo et les catégories dans la table game_category
INSERT INTO game_category (game_id, category_id) VALUES
(1, 1), -- Doom est un jeu d'action
(1, 4), -- Doom est aussi un jeu de stratégie
(2, 1), -- Quake est un jeu d'action
(3, 2), -- Tomb Raider est un jeu d'aventure
(4, 3), -- FIFA est un jeu de sport
(5, 5), -- Les Sims est un jeu de simulation
(6, 1), -- Half-Life est un jeu d'action
(6, 4); -- Half-Life est aussi un jeu de stratégie
