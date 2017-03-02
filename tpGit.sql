--
--  Création de la base
--

DROP DATABASE IF EXISTS TPGit;
CREATE DATABASE TPGit DEFAULT CHARACTER SET 'utf8';
USE TPGit;

--
--  Création des tables
--

CREATE TABLE Classes (
    id INT UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = INNODB;

CREATE TABLE Eleves (
    id INT UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    naissance DATE NOT NULL,
    idClasse INT UNSIGNED NOT NULL,
    PRIMARY KEY (id)
) ENGINE = INNODB;

CREATE TABLE Matieres (
    id INT UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = INNODB;

CREATE TABLE Notes (
    id INT UNSIGNED AUTO_INCREMENT,
    idMatiere INT UNSIGNED NOT NULL,
    idEleve INT UNSIGNED NOT NULL,
    note INT NOT NULL,
    PRIMARY KEY (id)
) ENGINE = INNODB;

--
--  Ajout des clés étrangères
--

ALTER TABLE Eleves
    ADD CONSTRAINT fk_Eleves_idClasse FOREIGN KEY (idClasse) REFERENCES Classes(id);

ALTER TABLE Notes
    ADD CONSTRAINT fk_Notes_idMatiere FOREIGN KEY (idMatiere) REFERENCES Matieres(id),
    ADD CONSTRAINT fk_Notes_idEleve FOREIGN KEY (idEleve) REFERENCES Eleves(id);

--
--  Liste des requêtes par page
--

-- adminNotes
-- SELECT e.nom, prenom, naissance, c.nom as classe FROM Eleves e INNER JOIN Classes c ON c.id = e.idClasse WHERE e.id = :id;
--
-- SELECT nom as matiere, note FROM Notes n INNER JOIN matieres m ON m.id = n.idMatiere WHERE idEleve = :id;

--
--  Insert donnée dans la base
--


--
-- Isert dans la table classes
--
INSERT INTO Classes VALUES (1,'classe 1');
INSERT INTO Classes VALUES (2,'classe 2');
INSERT INTO Classes VALUES (3,'classe 3');

--
--  Insert donnée dans la table Eleves
--

INSERT INTO Eleves VALUES (1,'nom 1', 'prenom 1', '20090208',1);
INSERT INTO Eleves VALUES (2,'nom 2', 'prenom 2', '20080522',2);
INSERT INTO Eleves VALUES (3,'nom 3', 'prenom 3', '20070711',2);
INSERT INTO Eleves VALUES (4,'nom 4', 'prenom 4', '20090309',3);
INSERT INTO Eleves VALUES (5,'nom 5', 'prenom 5', '20080612',3);
INSERT INTO Eleves VALUES (6,'nom 6', 'prenom 6', '20070821',1);

--
--  Insert donnée dans la table Matieres
--

INSERT INTO Matieres VALUES (1,'matiere 1');
INSERT INTO Matieres VALUES (2,'matiere 2');
INSERT INTO Matieres VALUES (3,'matiere 3');

--
--  Insert donnée dans la table Notes
--

INSERT INTO Notes VALUES (1, 1, 1, 15);
INSERT INTO Notes VALUES (2, 1, 2, 11);
INSERT INTO Notes VALUES (3, 2, 1, 13);
INSERT INTO Notes VALUES (4, 2, 2, 18);
