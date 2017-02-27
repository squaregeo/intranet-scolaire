<!DOCTYPE html>
<html>
	<head>
    <title>Notes Elève</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css">
		<link rel="stylesheet" href="style.css" />
    <meta charset="utf-8"/>
	</head>
	
	<body>
  <?php
    include('inc_dbconnexion.php');
    $id = (isset($_GET['id']) ? $_GET['id'] : "");
  
    if (empty($id)) {
      $request = $pdo->prepare('SELECT * FROM eleves');
      $request->execute();
      $row = $request->fetchAll();
      
      echo "<form class=\"pure-form  pure-form-aligned\" method='get'>";
      
      
      echo "<div class=\"pure-control-group\"> \n <select name='id'>";
      foreach($row as $eleve) {
        echo "<option value='".$eleve['id']."'>".$eleve['nom']." ".$eleve['prenom']."</option>";
      }
      echo "</select></div>";
      
      echo " <div class=\"pure-controls\"> \n <button class=\"pure-button pure-button-primary\" type='submit'>Voir mes notes</button> \n </div>";
      
      echo "</form>";
      
      
      return;
    }
    $request = $pdo->prepare('SELECT note,nom FROM notes INNER JOIN matieres ON matieres.id = notes.idMatiere WHERE idEleve="'.$id.'"');
    $request->execute();
    $notes = $request->fetchAll();
  
  ?>
  <table class="pure-table pure-table-horizontal" border="2" width="auto">
    <thead>
      <tr>
        <th width="auto">Matière</th>
        <th width="auto">Notes</th>
      </tr>
    </thead>
    <tbody>

    <?php
      foreach($notes as $note) {
        echo "<tr>";
        echo "<td>".$note['nom']."</td>";
        echo "<td>".$note['note']."</td>";
        echo "</tr>";
      }
    
    ?>
    
    </tbody>
    </table>
    
    <a href="notesEleves.php"><button>Retour</button></a>

  </body>
</html>