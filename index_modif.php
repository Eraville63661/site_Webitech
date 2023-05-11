<?php 

$servername = "localhost"; //serveur
$username = "root";             //identifiant
$password = "";                 //mot de passe
$dbname = "mon_site";               //nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);  //connexion à MySQL

$sql = "SELECT * FROM avion"; //Requete SQL, 
$sql = "SELECT * FROM destinantion"; //Requete SQL, 
$sql = "SELECT * FROM utilisateurs"; //Requete SQL, 
$sql = "SELECT * FROM vol"; //Requete SQL, 

$result = $conn->query($sql); //Execution de la requete SQL


?>

<html>
<head><title>Modification</title></head>
<body>
<h1> Modifie tes informations personnel</h1>
<form action="modification.php" method="post">
<fieldset>
<table>
<tr>
   <td>Identifiant</td>
   <td><input type="text" name="idmodification" required></td>
<table>
<tr>
   <td>Mot de passe</td>
   <td><input type="text" name="mot_de_passe" required></td>
</tr>
<tr>
   <td>email</td>
   <td><input type="text" name="email" required></td>
</tr>
<tr>
   <td>Nom</td>
   <td><input type="text" name="nom" required></td>
</tr>
<tr>
   <td>Prenom</td>
   <td><input type="text" name="prenom" required></td>
</tr>
<tr>
   <td>Age</td>
   <td><input type="text" name="age" required></td>
</tr>
<tr>
   <td>Nationalite</td>
   <td><input type="text" name="nationalite" required></td>
</tr>
<tr>
   <td>Pays de naissance</td>
   <td><input type="text" name="pays_naissance" required></td>
</tr>
<tr>
   <td>Ville de naissance</td>
   <td><input type="text" name="ville_naissance" required></td>
</tr>
<tr>
   <td>Adresse</td>
   <td><input type="text" name="adresse" required></td>
</tr>
<tr>
   <td>Numero de passeport</td>
   <td><input type="text" name="numero_de_passeport" required></td>
</tr>
<tr>
   <td>Telephone</td>
   <td><input type="text" name="numero_tel" required></td>
</tr>
<tr>
   <td>Role</td>
   <td><input type="text" name="role" required></td>
</tr>
<tr>
	<td><input type="submit" value="Insertion"></td>
	<td><input type="reset" value="Reinitialiser"></td>
</tr>	
</table>
</fieldset>
</form>