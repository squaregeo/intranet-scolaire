<!DOCTYPE html>
<html>
	<head>
    <title>Administration</title>
		<meta charset="utf-8"></meta>
	</head>
	
	<body>
    <script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="main.js"></script>
		<?php
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
    
    <form method="post" onsubmit="return validate();">
      <input type="text" name="nom" placeholder="Exemple: Simpson" />
      <input type="text" name="prenom" placeholder="Exemple: Homer" />
      <input type="date" name="naissance" value="<?php echo date('Y-m-d'); ?>"/>   
      <select name="classe">
        <?php
          foreach ($pdo->query("SELECT * FROM classes") as $row) {
            echo "<option value='".$row['id']."'>".$row['nom']."</option>";
          }
        ?>
      </select>  
      <button type="submit" name="submit">Envoyez</button>
    </form>
	</body>
</html>