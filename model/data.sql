CREATE DATABASE gestionproduits;

USE gestionproduits;


CREATE TABLE utilisateurs (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    code VARCHAR(255) NOT NULL,
    role ENUM('admin', 'client') NOT NULL
);


CREATE TABLE produits (
    produit_id INT AUTO_INCREMENT PRIMARY KEY,
    produit_name VARCHAR(255) NOT NULL,
    prix DECIMAL(8, 2) NOT NULL,
    disc VARCHAR(255) NOT NULL,
    categorie VARCHAR(100) NOT NULL,
    quantité INT NOT NULL
);


CREATE TABLE commandes (
    commande_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    Total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES utilisateurs(user_id)
);


CREATE TABLE details_commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commande_id INT NOT NULL,
    produit_id INT NOT NULL,
    quantité INT NOT NULL,
    prix_unité DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (commande_id) REFERENCES commandes(commande_id),
    FOREIGN KEY (produit_id) REFERENCES produits(produit_id)
);
