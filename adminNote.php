<?php
include("inc_dbconnexion.php");

$sql = "select * from Eleves";
$sth = $pdo->query($sql);
$sth -> setFetchMode(PDO::FETCH_OBJ);
?>
<?php
if (isset( $_POST['select'])) {
$id = $_POST['select'];
}
?>
<form name="formulaire" method="post">
<select name="select">
<?php
foreach ($sth as $UnSth)
{
	echo "<option value=".$UnSth->id.">".$UnSth->nom."&nbsp".$UnSth->prenom."</option>";
}
?>
</select>
<button type="submit">envoyer</button>
</form>




