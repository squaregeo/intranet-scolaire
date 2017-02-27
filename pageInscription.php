<!DOCTYPE html>
<html>
	<head>
    <title>Administration</title>
		<meta charset="utf-8"></meta>
	</head>
	
	<body>
		<?php
      $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
      $pdo = new PDO('mysql:host=localhost;dbname=TPGit', 'root', '', $pdo_options);   
      
      if (isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $naissance = $_POST['naissance'];
        $idClasse = $_POST['classe'];
        if (empty($nom)) {
          echo "<h3>Vous devez entrer le nom de l'élève.</h3>";
          
        } else if (empty($prenom)) {
          echo "<h3>Vous devez entrer le prénom de l'élève.</h3>";
        } else {
          $pdo->query('INSERT INTO eleves (nom, prenom, naissance, idClasse) VALUES ("'.$nom.'", "'.$prenom.'", "'.$naissance.'", "'.$idClasse.'")');
        }
      }
		?>
    
    <form method="post">
      <input type="text" name="nom" placeholder="Exemple: Simpson" value="<?php echo $nom; ?>" />
      <input type="text" name="prenom" placeholder="Exemple: Homer" />
      <input type="date" name="naissance" value="<?php echo date('Y-m-d'); ?>" />   
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