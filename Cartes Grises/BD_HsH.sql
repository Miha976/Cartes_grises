USE assurvehicules;
DROP TABLE IF EXISTS Modele;
DROP TABLE IF EXISTS Proprietaire;
DROP TABLE IF EXISTS Vehicule;

CREATE TABLE Modele  
(
	id_modele INT(3),
	modele VARCHAR(30) NOT NULL,
	carburant ENUM('essence','diesel','gpl','electrique') default 'essence' NOT NULL,
	CONSTRAINT pk_modele PRIMARY KEY(id_modele)
) ENGINE=INNODB;

CREATE TABLE Proprietaire  
(
	id_proprietaire INT(3),
	nom VARCHAR(30) NOT NULL,
	prenom VARCHAR(30) NOT NULL,
	adresse VARCHAR(100) NOT NULL,
	ville VARCHAR(30) NOT NULL,
	codePostal VARCHAR(5) NOT NULL,
	CONSTRAINT pk_proprietaire PRIMARY KEY(id_proprietaire)
) ENGINE=INNODB;

CREATE TABLE Vehicule  
(
	immat VARCHAR(10),
	dateCirculation DATE NOT NULL,
	dateCarteGrise DATE NOT NULL,
	couleur ENUM('claire', 'moyenne', 'foncee') NOT NULL,
	modele VARCHAR(50) NOT NULL,
	proprietaire VARCHAR(50) NOT NULL,
	CONSTRAINT pk_vehicule PRIMARY KEY(immat)
) ENGINE=INNODB;


INSERT INTO Modele VALUES(1,'Volkswagen','essence');
INSERT INTO Modele VALUES(2,'Renault','essence');
INSERT INTO Modele VALUES(3,'Volkswagen','diesel');
INSERT INTO Modele VALUES(4,'Renault','diesel');
INSERT INTO Modele VALUES(5,'Peugeot','diesel');
INSERT INTO Modele VALUES(6,'Peugeot','gpl');
INSERT INTO Modele VALUES(7,'Ligier','electrique');
INSERT INTO Modele VALUES(8,'BMW','essence');

INSERT INTO Vehicule VALUES('EF-2571-Z','2019-07-31','2019-07-31', 'claire', 'Volkswagen', 'Davolio');
INSERT INTO Vehicule VALUES('EG-0047-A','2019-09-01','2019-09-01', 'foncee', 'Volkswagen', 'Fuller');


INSERT INTO Proprietaire VALUES(1,'Davolio','Rose', '5, rue de la Poste', 'VICHY', '03700');
INSERT INTO Proprietaire VALUES(2,'Fuller','Andrew', 'Place de la Gare', 'VICHY', '03700');
INSERT INTO Proprietaire VALUES(3,'Daverling','Janet', "1, Boulevard d'Italie", 'VICHY', '03700');
INSERT INTO Proprietaire VALUES(4,'Peacock','Margaret', '23, imapsse des Fleurs', 'MOULINS', '03000');


