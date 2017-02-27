<!DOCTYPE html>
<html>
	<head>
    <title>Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css">
		<link rel="stylesheet" href="style.css" />
    <meta charset="utf-8"/>
	</head>
	
	<body>
    <script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="main.js"></script>
    <div class="inscription-wrapper">
      <?php
        include('inc_dbconnexion.php');
      
        $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
        $pdo = new PDO('mysql:host=localhost;dbname=TPGit', 'root', '', $pdo_options);    
      
        if (isset($_POST['submit'])) {
        
          $nom = $_POST['nom'];
          $prenom = $_POST['prenom'];
          $naissance = $_POST['naissance'];
          $idClasse = $_POST['classe'];
          $pdo->query('INSERT INTO eleves (nom, prenom, naissance, idClasse) VALUES ("'.$nom.'", "'.$prenom.'", "'.$naissance.'", "'.$idClasse.'")');
          echo "<h3>Vous venez d'enregistrer l'élève ".$prenom." ".$nom.".</h3>";
          echo "<a href='pageInscription.php'><button>Retour</button></a>";
          return;
        }
      ?>
    
      <form class="pure-form pure-form-stacked" method="post" onsubmit="return validate();">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Exemple: Simpson" value="<?php echo $nom; ?>" />
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom"  name="prenom" placeholder="Exemple: Homer" />
        <label for="naissance">Naissance</label>
        <input type="date" id="naissance" name="naissance" value="<?php echo date('Y-m-d'); ?>" />   
        <label for="classe">Classe</label>
        <select id="classe" name="classe">
          <?php
            foreach ($pdo->query("SELECT * FROM classes") as $row) {
              echo "<option value='".$row['id']."'>".$row['nom']."</option>";
            }
          ?>
        </select>  
        <button class="pure-button pure-button-primary" type="submit" name="submit">Envoyez</button>
      </form>
    </div>
  </body>
</html>
