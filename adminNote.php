<?php
include("inc_dbconnexion.php");

$sql = "select * from Eleves";
$sth = $pdo->query($sql);
$sth -> setFetchMode(PDO::FETCH_OBJ);
?>
<select name="select">
<?php
foreach ($sth as $UnSth)
{
	echo "<option value=".$UnSth->id.">".$UnSth->nom."&nbsp".$UnSth->prenom."</option>";
}
?>
</select>


