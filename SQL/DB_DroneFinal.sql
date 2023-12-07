--Création de la base de données
USE msdb;
DROP DATABASE droneDB;

CREATE DATABASE droneDB;
GO

USE droneDB;

--Création des tables
CREATE TABLE Drones (
id INT NOT NULL,
modele VARCHAR(255),
id_type INT,
id_marque INT ,
id_garantie INT NULL,
prix MONEY,
CONSTRAINT PK_DronesId PRIMARY KEY (id)
);


CREATE TABLE Marques (
id INT NOT NULL,
nom_marque VARCHAR(50),
CONSTRAINT PK_MarqueId PRIMARY KEY (id)
);

CREATE TABLE Types (
id INT NOT NULL,
nom_type VARCHAR(50),
CONSTRAINT PK_TypesId PRIMARY KEY (id)
);

CREATE TABLE Garanties (
id INT NOT NULL ,
duree_garantie INT,
CONSTRAINT PK_GarantiesId PRIMARY KEY (id)
);

CREATE TABLE Utilisateurs (
id INT NOT NULL,
prenom VARCHAR(50),
nom VARCHAR(50),
mdp VARCHAR(255),
courriel VARCHAR(255),
telephone VARCHAR(16),
CONSTRAINT PK_UtilisateursId PRIMARY KEY (id)
);

CREATE TABLE Fournisseurs (
id INT NOT NULL,
nom_compagnie VARCHAR(255),
nom_contact VARCHAR(255),
adresse_production VARCHAR(255),
courriel VARCHAR(255),
num_telephone VARCHAR(16),
CONSTRAINT PK_FournisseursId PRIMARY KEY (id)
);


CREATE TABLE Commandes (
id INT NOT NULL,
id_utilisateur INT ,
id_facturation INT, 
id_fournisseur INT,
id_status INT,
id_drone INT,
date DATE,
prix_total MONEY,
CONSTRAINT PK_CommandeId PRIMARY KEY (id)
);

CREATE TABLE Adresse_Facturation (
id INT NOT NULL,
pays VARCHAR(32),
province VARCHAR(32),
ville VARCHAR(64),
rue VARCHAR(100),
numero_maison INT,
code_postal VARCHAR(16),
num_appartement INT NULL,
CONSTRAINT PK_AdresseFacturationId PRIMARY KEY (id)
);

CREATE TABLE Status(
id INT NOT NULL,
status VARCHAR(50)
CONSTRAINT PK_StatusId PRIMARY KEY (id)
);

--Ajout des clés étrangères
ALTER TABLE Drones
ADD CONSTRAINT FK_type FOREIGN KEY (id_type) REFERENCES Types (id);
ALTER TABLE Drones
ADD CONSTRAINT FK_marque FOREIGN KEY (id_marque) REFERENCES Marques (id);
ALTER TABLE Drones
ADD CONSTRAINT FK_garantie FOREIGN KEY (id_garantie) REFERENCES Garanties (id) ON DELETE SET NULL;

ALTER TABLE Commandes
ADD CONSTRAINT FK_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs (id);
ALTER TABLE Commandes
ADD CONSTRAINT FK_facturation FOREIGN KEY (id_facturation) REFERENCES Adresse_Facturation (id);
ALTER TABLE Commandes
ADD CONSTRAINT FK_fournisseur FOREIGN KEY (id_fournisseur) REFERENCES Fournisseurs (id);
ALTER TABLE Commandes
ADD CONSTRAINT FK_status FOREIGN KEY (id_status) REFERENCES Status (id);
ALTER TABLE Commandes
ADD CONSTRAINT FK_drone FOREIGN KEY (id_drone) REFERENCES Drones (id);


--Insertion des données dans les tables
INSERT INTO Marques
VALUES 
(1,'DJI'),
(2, 'The bigly brothers'),
(3,'Shendrone'),
(4, 'Hexadrone'),
(5, 'walkera'),
(6, 'ARRIS'),
(7, 'EMAX'),
(8, 'Yuneec'),
(9, 'Parrot'),
(10, 'PowerVision'),
(11, 'AutelRobotics'),
(12, 'Husban');


INSERT INTO Types	(id, nom_type)
VALUES 
(1, 'Photo aérienne'),
(2, 'Vol immersif'),
(3, 'Cinématique aérienne'),
(4, 'Drone épendage'),
(5, 'Drone multi-tache'),
(6, 'Drone de course'),
(7, 'Professionel, recherche');


INSERT INTO Garanties 
VALUES 
(1, 730),
(2, 365),
(3, 182),
(4, 60),
(5, 30),
(6, 14);


INSERT INTO Drones (id, modele, id_type , id_marque, id_garantie, prix)
VALUES 
(1, 'Air 3', 1 , 1, 1, 1407.96),
(2, 'Mavie 3 Pro', 1, 1 , 1, 2083.31),
(3, 'Mini 4 Pro', 1, 1, 1, 1038.52),
(4, 'Phantom 4 Pro v2.0', 1, 1, 1, 2129.00),
(5, 'GD96 midnight alpha ultra hd', 2, 1 ,2,599.99),
(6, 'avata',1,2,1,860.65),
(7, 'FPV',1,2,1,1230.08),
(8, 'Cinelifter Shendrone Thicc X8',3,2,1,1799.99),
(9, 'Inspire 3',1,3,1,18061.30),
(10, 'Argra t10',1,4,1,21000.00),
(11, 'Tundra 2',4,5,1,30266.01),
(12, 'F210 3D',5,6,1,477.39),
(13, 'X220 V2',6,6,1,450.03),
(14, 'Hawk Pro',7,6,4,328.29),
(15, 'Typhoon H Pro',1,8,2,2050.56), 
(16, 'Evo Lite+',1,11,2,1106.67), 
(17, 'AnafiUSA',7,9, NULL,11011.00), 
(18, 'PowerEgg X',1,10,2,1229.77), 
(19, 'Dragonfish',7,11,2,112750.00), 
(20, 'Zino Pro Plus',1,12,2,389.00);


INSERT INTO Status (id, status)
VALUES
(1, 'N/A'),
(2, 'traitement'),
(3, 'expedié'),
(4, 'en cours de livraison'),
(5, 'livré');


INSERT INTO Fournisseurs
VALUES
(1, 'DJI', 'John Doe', '123 Main Street, Cityville', 'john.doe@outlook.com', '987-654-3210'),
(2, 'The Bigly Brothers', 'Jane Smith', '456 Oak Avenue, Townsville', 'jane.smith@hotmail.com', '876-543-2109'),
(3, 'Shendrone', 'Robert Johnson', '789 Pine Road, Villageton', 'robert.johnson@gmail.com', '765-432-1098'),
(4, 'Hexadrone', 'Sarah White', '101 Cedar Lane, Hamletville', 'sarah.white@yahoo.com', '654-321-0987'),
(5, 'Walkera', 'Michael Brown', '202 Maple Street, Boroughburg', 'michael.brown@live.com', '543-210-9876'),
(6, 'Arris', 'Amanda Wilson', '303 Elm Court, Township', 'amanda.wilson@icloud.com', '432-109-8765'),
(7, 'Emax', 'Christopher Lee', '404 Birch Avenue, Village', 'christopher.lee@protonmail.com', '321-098-7654'),
(8, 'Yuneec', 'Jessica Davis', '505 Willow Drive, Cityton', 'jessica.davis@hotmail.com', '210-987-6543'),
(9, 'Parrot', 'David Miller', '606 Oak Lane, Hamlet', 'david.miller@outlook.com', '109-876-5432'),
(10, 'Powervision', 'Emily Taylor', '707 Pine Street, Town', 'emily.taylor@yahoo.com', '098-765-4321'),
(11, 'Autel Robotics', 'Kevin Brown', '808 Cedar Road, Villagetown', 'kevin.brown@icloud.com', '876-543-2109'),
(12, 'Husban', 'Olivia Johnson', '909 Maple Avenue, Borough', 'olivia.johnson@gmail.com', '765-432-1098');


INSERT INTO Utilisateurs
VALUES
(1, 'Alice', 'Martin', 'motdepasse1', 'alice.martin@gmail.com', '123-456-7890'),
(2, 'Bob', 'Johnson', 'motdepasse2', 'bob.johnson@outlook.com', '234-567-8901'),
(3, 'Charlie', 'Davis', 'motdepasse3', 'charlie.davis@yahoo.com', '345-678-9012'),
(4, 'David', 'Smith', 'motdepasse4', 'david.smith@hotmail.com', '456-789-0123'),
(5, 'Eva', 'White', 'motdepasse5', 'eva.white@gmail.com', '567-890-1234'),
(6, 'Frank', 'Taylor', 'motdepasse6', 'frank.taylor@outlook.com', '678-901-2345'),
(7, 'Grace', 'Anderson', 'motdepasse7', 'grace.anderson@yahoo.com', '789-012-3456'),
(8, 'Henry', 'Miller', 'motdepasse8', 'henry.miller@hotmail.com', '890-123-4567'),
(9, 'Ivy', 'Brown', 'motdepasse9', 'ivy.brown@gmail.com', '901-234-5678'),
(10, 'Jack', 'Moore', 'motdepasse10', 'jack.moore@yahoo.com', '012-345-6789'),
(11, 'Karen', 'Clark', 'motdepasse11', 'karen.clark@gmail.com', '123-456-7890'),
(12, 'Leo', 'Garcia', 'motdepasse12', 'leo.garcia@outlook.com', '234-567-8901'),
(13, 'Mia', 'Wang', 'motdepasse13', 'mia.wang@yahoo.com', '345-678-9012'),
(14, 'Nathan', 'Lopez', 'motdepasse14', 'nathan.lopez@hotmail.com', '456-789-0123'),
(15, 'Olivia', 'Lee', 'motdepasse15', 'olivia.lee@gmail.com', '567-890-1234');


INSERT INTO Adresse_Facturation
VALUES
(1, 'Canada', 'Quebec', 'Montreal', 'Rue Sainte-Catherine', '123', 'H1A 1A1', NULL),
(2, 'États-Unis', 'California', 'Los Angeles', 'Sunset Boulevard', '456', '90001', NULL),
(3, 'France', 'Île-de-France', 'Paris', 'Avenue des Champs-Élysées', '789', '75001', NULL),
(4, 'Allemagne', 'Berlin', 'Berlin', 'Unter den Linden', '101', '10117', NULL),
(5, 'Japon', 'Tokyo', 'Tokyo', 'Ginza', '202', '100-0001', NULL),
(6, 'Chine', 'Beijing', 'Beijing', 'Wangfujing Street', '303', '100006', NULL),
(7, 'Royaume-Uni', 'Angleterre', 'Londres', 'Oxford Street', '404', 'W1A 1AB', NULL),
(8, 'Australie', 'Nouvelle-Galles du Sud', 'Sydney', 'George Street', '505', '2000', NULL),
(9, 'Brésil', 'São Paulo', 'São Paulo', 'Avenida Paulista', '606', '01311-000', NULL),
(10, 'Inde', 'Delhi', 'Delhi', 'Connaught Place', '707', '110001', NULL),
(11, 'Mexique', 'Mexico', 'Mexico City', 'Paseo de la Reforma', '808', '06000', NULL),
(12, 'Russie', 'Moscou', 'Moscou', 'Tverskaya Street', '909', '125009', NULL),
(13, 'Afrique du Sud', 'Gauteng', 'Johannesburg', 'Nelson Mandela Square', '101', '2000', NULL),
(14, 'Corée du Sud', 'Séoul', 'Séoul', 'Myeongdong', '202', '04538', NULL),
(15, 'Italie', 'Lombardie', 'Milan', 'Via della Moscova', '303', '20121', NULL);


INSERT INTO Commandes
VALUES --Prix total: prix + 30% (cote) + 15% (taxes)
(1, 4, 2, 1, 2, 3, '2023-11-29', 1552.59),
(2, 13, 6, 8, 2, 15, '2023-12-04', 3065.59),
(3, 12, 11, 3, 5, 8, '2023-11-15', 2690.99),
(4, 5, 15, 10, 3, 18, '2023-11-25', 1838.51),
(5, 12, 11, 11, 2, 16, '2023-12-15', 1654.47);


--Requêtes avec jointure
--Tommy
SELECT Drones.modele, Marques.nom_marque, Types.nom_type
FROM Drones
JOIN Marques ON Drones.id_marque = Marques.id
JOIN Types ON Drones.id_type = Types.id;

--Samuel
SELECT
    C.id AS id_commande,D.modele AS modele_drone,
    F.nom_compagnie AS nom_fournisseur,C.prix_total
FROM
    Commandes C
JOIN
    Drones D ON C.id_drone = D.id
JOIN
    Fournisseurs F ON C.id_fournisseur = F.id;


--Benoît
SELECT Utilisateurs.prenom, Utilisateurs.nom, Fournisseurs.nom_compagnie, Drones.modele, Status.status, Commandes.date
FROM Commandes
	INNER JOIN Utilisateurs ON Commandes.id_utilisateur = Utilisateurs.id
	INNER JOIN Fournisseurs ON Commandes.id_fournisseur = Fournisseurs.id
	INNER JOIN Drones ON Commandes.id_drone = Drones.id
	INNER JOIN Status ON Commandes.id_status = Status.id;


--Philippe
Select Adresse_Facturation.code_postal, Adresse_Facturation.pays, Adresse_Facturation.province, Adresse_Facturation.ville, Adresse_Facturation.rue, Adresse_Facturation.numero_maison, Utilisateurs.prenom , Utilisateurs.nom
From Commandes
    INNER JOIN Adresse_Facturation ON Commandes.id_facturation = Adresse_Facturation.id
    INNER JOIN Utilisateurs ON Commandes.id_utilisateur = Utilisateurs.id;


--Requêtes avec ORDER BY
--Tommy
SELECT id, prenom, nom
FROM Utilisateurs
ORDER BY nom;

--Samuel
SELECT id,modele,id_type,id_marque,id_garantie,prix
From Drones
ORDER BY prix;

--Philippe
Select *
From Commandes
ORDER BY prix_total;

--Benoît
SELECT Commandes.id, Utilisateurs.prenom, Utilisateurs.nom, Drones.modele, id_facturation, Status.status, Commandes.date, Commandes.prix_total
FROM Commandes
    INNER JOIN Utilisateurs ON Commandes.id_utilisateur = Utilisateurs.id
    INNER JOIN Drones ON Commandes.id_drone = Drones.id
	INNER JOIN Status ON Commandes.id_status = Status.id
ORDER BY prix_total ASC;


--Requêtes avec WHERE
--Tommy
SELECT id, modele, prix
FROM Drones
WHERE prix > 1000;

--Samuel
SELECT id, id_utilisateur, id_facturation,id_fournisseur,id_status,id_drone,date,prix_total
FROM Commandes
WHERE prix_total > 100000;

--Philippe
Select Adresse_Facturation.code_postal, Adresse_Facturation.ville, Adresse_Facturation.rue, Adresse_Facturation.numero_maison
FROM Adresse_Facturation
WHERE pays = 'Canada' AND province = 'Quebec';

--Benoît
SELECT id, prenom, nom
FROM Utilisateurs
WHERE nom LIKE 'M%';


--Requêtes avec sous-requête
--Tommy
SELECT id, nom_compagnie
FROM Fournisseurs
WHERE id IN (SELECT id_fournisseur FROM Commandes WHERE id_status = 3);

--Samuel
SELECT *
FROM Commandes
WHERE id_drone IN (SELECT id FROM Drones WHERE id_garantie=2);

--Philippe
Select nom, prenom
From Utilisateurs
WHERE id IN (SELECT DISTINCT id_utilisateur FROM Commandes WHERE prix_total > 10000);

--Benoît
SELECT *
FROM Commandes
WHERE id_facturation IN (SELECT id FROM Adresse_Facturation WHERE pays = 'États-Unis');


--Requêtes avec fonction d'agrégat
--Tommy
SELECT id_utilisateur, COUNT(id) AS nombre_commandes
FROM Commandes
GROUP BY id_utilisateur;

--Samuel
SELECT id_utilisateur, SUM(prix_total) AS montant_total_ventes
FROM Commandes
GROUP BY id_utilisateur;

--Philippe
SELECT id_marque, COUNT(id_type) AS disversite_du_fabricant
FROM Drones
group by id_marque;

--Benoît
SELECT COUNT(id_utilisateur) AS total_utilisateur, AVG(prix_total) AS montant_moyen
FROM Commandes;


--Création des vues
--Tommy
CREATE VIEW VueUtilisateurs AS
SELECT id, prenom, nom
FROM Utilisateurs;

--Samuel
-- Création d'une vue pour le montant total des ventes par utilisateur
CREATE VIEW VueMontantTotalVentes AS
SELECT id_utilisateur, SUM(prix_total) AS montant_total_ventes
FROM Commandes
GROUP BY id_utilisateur;

--Philippe
CREATE VIEW VueAdresses AS
SELECT pays, province, ville, rue, numero_maison, code_postal, num_appartement
FROM Adresse_Facturation;

--Benoît
CREATE VIEW VueMontantMoyen AS
SELECT COUNT(id_utilisateur) AS total_utilisateur, AVG(prix_total) AS montant_moyen
FROM Commandes;


--Requêtes de mise à jour 
--Tommy
UPDATE Drones
SET prix = 1500
WHERE id = 1;

UPDATE Commandes
SET id_status = 5
WHERE id = 1;

--Samuel
--J'ai envie de faire de l'inflation avec les drones aussi
UPDATE Commandes
SET prix_total = 550.00
WHERE id_drone = 13;

--Pourquoi pas avec tous les drones finalement
UPDATE Drones
SET prix = prix * 1.5;

--Philippe
UPDATE Commandes
SET prix_total = prix_total * 0.14975;

UPDATE Marques
SET nom_marque = 'Sony'
WHERE id = 1;

--Benoît
--Un utilisateur ajoute un numéro d'appartement à son adresse
UPDATE Utilisateurs
SET num_appartement = 5
WHERE id = 1;

--Un fournisseur annonce une garantie d'un an sur son drone
UPDATE Drones
SET id_garantie = 2
WHERE id = 17;


--Suppression de données
--L'utilisateur David Smith souhaite retirer sa commande
DELETE FROM Commandes
WHERE id_utilisateur = (SELECT id FROM Utilisateurs WHERE prenom = 'David' AND nom = 'Smith');

--La compagnie Autel Robotics souhaite retirer son modèle Dragonfish puisque son prix élevé ne génère aucune vente sur notre site
DELETE FROM Drones
WHERE modele = 'Dragonfish';

--Fonction retournant une table
--Retourne toutes les commandes placées par un utilisateur (en paramètre)
CREATE FUNCTION commandes_par_utilisateur(@userid INT)
RETURNS TABLE
AS
    RETURN (SELECT Commandes.id AS id_commande, Utilisateurs.prenom, Utilisateurs.nom, Drones.modele, Status.status, Commandes.date, Commandes.prix_total
            FROM Commandes
                INNER JOIN Utilisateurs ON Commandes.id_utilisateur = Utilisateurs.id
                INNER JOIN Drones ON Commandes.id_drone = Drones.id
	            INNER JOIN Status ON Commandes.id_status = Status.id
            WHERE id_utilisateur = @userid);

SELECT * FROM commandes_par_utilisateur(12);