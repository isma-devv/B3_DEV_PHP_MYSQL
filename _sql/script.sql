-- création de la base de données videogames
CREATE DATABASE videogames;

-- utilisation de la base de données videogames
USE videogames;
US
-- création de la table game
CREATE TABLE game (
  id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  release_date DATE NOT NULL,
  poster VARCHAR(255) NOT NULL,
  price DECIMAL(5,2) NOT NULL
);

-- insertion de quelques jeux vidéo dans la table game
INSERT INTO game (title, description, release_date, poster, price)
VALUES
  ('Super Mario Bros.', 'Jeu de plates-formes emblématique de Nintendo', '1985-09-13', 'mario.jpg', 19.99),
  ('The Legend of Zelda: Breath of the Wild', 'Action-RPG de la série The Legend of Zelda', '2017-03-03', 'zelda.jpg', 59.99),
  ('Final Fantasy VII', 'Jeu de rôle de Square Enix', '1997-01-31', 'ffvii.jpg', 29.99),
  ('Minecraft', 'Jeu de construction et d'aventure en monde ouvert', '2011-11-18', 'minecraft.jpg', 24.99),
  ('Grand Theft Auto V', 'Jeu d'action en monde ouvert', '2013-09-17', 'gta5.jpg', 49.99);
