<?php
    // Tente une connexion à la base de données
    // Les erreurs sql lanceront des erreurs php
    // Pas besoin d'écrire fetch(PDO::FETCH_ASSOC), c'est fait par défaut
    try {
        $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
        $pdo = new PDO('mysql:host=localhost;dbname=TPGit', 'root', '', $pdo_options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }