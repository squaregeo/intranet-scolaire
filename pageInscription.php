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

    <div class="inscription-wrapper">

    <?php
          include('inc_dbconnexion.php') 
          
          if (isset($_POST['submit'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $naissance = $_POST['naissance'];
            $idClasse = $_POST['classe'];
            if (empty($nom)) {
              echo "<h3 class=\"alert\">Vous devez entrer le nom de l'élève.</h3>";
              
            } else if (empty($prenom)) {
              echo "<h3 class=\"alert\">Vous devez entrer le prénom de l'élève.</h3>";
            } else {
              $pdo->query('INSERT INTO eleves (nom, prenom, naissance, idClasse) VALUES ("'.$nom.'", "'.$prenom.'", "'.$naissance.'", "'.$idClasse.'")');
            }
          }
    ?>
        
        <form class="pure-form pure-form-stacked" method="post">
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
