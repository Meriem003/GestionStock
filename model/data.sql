CREATE DATABASE gestionproduits;

USE gestionproduits;


CREATE TABLE utilisateurs (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'client') NOT NULL DEFAULT 'client'
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

INSERT INTO utilisateurs (user_name, email, code, role) 
VALUES 
('Admin1', 'admin1@example.com', 'admin123', 'admin'),
('Client1', 'client1@example.com', 'client123', 'client'),
('Client2', 'client2@example.com', 'client456', 'client');

INSERT INTO produits (produit_name, prix, disc, categorie, quantité) 
VALUES 
('Produit A', 100.00, 'Description produit A', 'Électronique', 50),
('Produit B', 200.50, 'Description produit B', 'Maison', 30),
('Produit C', 150.75, 'Description produit C', 'Électronique', 20);

INSERT INTO commandes (user_id, Total) 
VALUES 
(2, 500.00), -- Commande passée par Client1
(3, 300.50); -- Commande passée par Client2

INSERT INTO details_commandes (commande_id, produit_id, quantité, prix_unité) 
VALUES 
(1, 1, 2, 100.00), -- Commande 1 : 2 unités de Produit A
(1, 2, 1, 200.50), -- Commande 1 : 1 unité de Produit B
(2, 3, 2, 150.75); -- Commande 2 : 2 unités de Produit C
