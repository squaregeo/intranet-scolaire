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