CREATE TABLE IF NOT EXISTS role_utilisateur (
    id_role_utilisateur SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS utilisateur (
    id_utilisateur SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    id_role_utilisateur INT NOT NULL,
    FOREIGN KEY (id_role_utilisateur) REFERENCES role_utilisateur(id_role_utilisateur) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS produit (
    id_produit SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image TEXT NOT NULL,
    prix FLOAT NOT NULL
);

CREATE TABLE IF NOT EXISTS commande (
    id_commande SERIAL PRIMARY KEY,
    date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS produit_commande (
    id_produit INT NOT NULL,
    id_commande INT NOT NULL,
    PRIMARY KEY (id_produit, id_commande),
    FOREIGN KEY (id_produit) REFERENCES produit(id_produit) ON DELETE CASCADE,
    FOREIGN KEY (id_commande) REFERENCES commande(id_commande) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS message (
    id_message SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL
);