-- Créer la table admin
CREATE TABLE IF NOT EXISTS admin (
    id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

-- Ajouter un administrateur
INSERT INTO admin (email, password)
VALUES ('isma@admin.com', '$argon2id$v=19$m=65536,t=4,p=1$u11LVlhOgUMl71wu7VX0mQ$oh7VQ/btJZ/7/wZ2tIc/dND+Il3nvfJuz7llX9okRvE');

-- Le mot de passe est : "password123"
-- Il est haché avec Argon2, avec les paramètres suivants :
-- - v=19 (version du hachage)
-- - m=65536 (mémoire utilisée)
-- - t=4 (nombre d'itérations)
-- - p=1 (nombre de processeurs parallèles utilisés)
-- - u11LVlhOgUMl71wu7VX0mQ (sel aléatoire)
-- - oh7VQ/btJZ/7/wZ2tIc/dND+Il3nvfJuz7llX9okRvE (hachage)
