<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Consultation des notes</title>
</head>
<body>
	<?php include ("inc_dbconnexion.php");
	$reponse = $pdo->prepare('SELECT * FROM Notes');
	$reponse->fetch();
	?>

	<h1>Page de consultation des notes</h1>
	<p>Vous pouvez ici consulter vos notes</p>

	<p>
	<select>Veuilez-vous identifier<br/></select>
		<?php foreach($reponse as $donnees) 
		{?>
			<option value="<?php $donnees['idEleve']; ?>"><?php echo $donnees["eleves"];?></option>	
		<?php
		}
		?>


		</p>
		<?php $reponse->closeCursor(); ?>
</body>
</html>

